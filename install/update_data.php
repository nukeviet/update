<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (!defined('NV_IS_UPDATE')) {
    die('Stop!!!');
}

$nv_update_config = [];

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4401';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1592038800;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.4.01';
$nv_update_config['to_version'] = '4.4.01';
$nv_update_config['allow_old_version'] = ['4.4.00', '4.4.01'];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4401'] = 'Cập nhật module users lên 4.4.01';
$nv_update_config['lang']['vi']['nv_up_sys4401'] = 'Cập nhật hệ thống lên 4.4.01';

$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.4.01';

// English
$nv_update_config['lang']['en']['nv_up_modusers4401'] = 'Update module users to 4.4.01';
$nv_update_config['lang']['en']['nv_up_sys4401'] = 'Update system to 4.4.01';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.4.01';

$nv_update_config['tasklist'] = [];
$nv_update_config['tasklist'][] = [
    'r' => '4.4.01',
    'rq' => 2,
    'l' => 'nv_up_modusers4401',
    'f' => 'nv_up_modusers4401'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.4.01',
    'rq' => 2,
    'l' => 'nv_up_sys4401',
    'f' => 'nv_up_sys4401'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.4.01',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
];

/**
 * @return number[]|string[]
 */
function nv_up_modusers4401()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    // Lấy tất cả ngôn ngữ đã cài đặt
    $sql = "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup=1 ORDER BY weight ASC";
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Duyệt tất cả các ngôn ngữ
    foreach ($array_sitelangs as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file='users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Thêm trường bảng reg
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg ADD idsite mediumint(8) unsigned NOT NULL DEFAULT '0' AFTER openid_info, ADD INDEX (idsite);");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            // Cập nhật lại cấu hình xem danh sách quản trị
            try {
                $sql = "SELECT content FROM " . $db_config['prefix'] . "_" . $mod_data . "_config WHERE config='access_admin'";
                $access_admin = $db->query($sql)->fetchColumn();
                if (!empty($access_admin)) {
                    $access_admin = (array) unserialize($access_admin);
                    if (!isset($access_admin['access_viewlist'])) {
                        $access_admin['access_viewlist'] = [
                            1 => 1,
                            2 => 1,
                            3 => 1
                        ];
                        $access_admin = serialize($access_admin);

                        $sql = "UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_config SET content=" . $db->quote($access_admin) . " WHERE config='access_admin'";
                        $db->query($sql);
                    }
                }
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
        }
    }

    return $return;
}

/**
 * @return number[]|string[]
 */
function nv_up_sys4401()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Cập nhật lại cấu hình SMTP
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='mail' WHERE config_name='mailer_mode' AND lang='sys' AND module='site' AND config_value='';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Thêm một số cấu hình an ninh
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'domains_restrict', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'domains_whitelist', '[\"youtube.com\",\"www.youtube.com\",\"google.com\",\"www.google.com\",\"drive.google.com\"]');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crosssite_restrict', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crosssite_valid_domains', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crosssite_valid_ips', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crossadmin_restrict', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crossadmin_valid_domains', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'crossadmin_valid_ips', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=(SELECT config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_restrict_domains') WHERE lang = 'sys' AND module = 'global' AND config_name = 'crosssite_restrict';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=(SELECT config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_restrict_domains') WHERE lang = 'sys' AND module = 'global' AND config_name = 'crossadmin_restrict';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=(SELECT config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_valid_domains') WHERE lang = 'sys' AND module = 'global' AND config_name = 'crosssite_valid_domains';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=(SELECT config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_valid_domains') WHERE lang = 'sys' AND module = 'global' AND config_name = 'crossadmin_valid_domains';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_restrict_domains';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'site' AND config_name = 'cors_valid_domains';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
}

/**
 * nv_up_finish()
 *
 * @return
 *
 */
function nv_up_finish()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    nv_deletefile(NV_ROOTDIR . '/admin/settings/cdn.php');
    nv_deletefile(NV_ROOTDIR . '/admin/themes/change_layout.php');
    nv_deletefile(NV_ROOTDIR . '/vendor/pclzip', true);

    // Cập nhật phiên bản
    $array_modules = [
        'banners',
        'comment',
        'contact',
        'feeds',
        'freecontent',
        'menu',
        'news',
        'page',
        'seek',
        'statistics',
        'users',
        'voting',
        'two-step-verification'
    ];
    $array_themes = [
        'default',
        'mobile_default'
    ];

    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='module' AND basename IN ('" . implode("', '", $array_modules) . "')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='theme' AND basename IN ('" . implode("', '", $array_themes) . "')");

    nv_save_file_config_global();

    $array_config_rewrite = [
        'rewrite_enable' => $global_config['rewrite_enable'],
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
    ];
    nv_rewrite_change($array_config_rewrite);

    return $return;
}
