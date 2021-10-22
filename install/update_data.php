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
$nv_update_config['packageID'] = 'NVUD4404';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1635498000;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.4.04';
$nv_update_config['to_version'] = '4.4.04';
$nv_update_config['allow_old_version'] = [
    '4.4.00',
    '4.4.01',
    '4.4.02',
    '4.4.03',
    '4.4.04'
];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4401'] = 'Cập nhật module users lên 4.4.01';
$nv_update_config['lang']['vi']['nv_up_sys4401'] = 'Cập nhật hệ thống lên 4.4.01';
$nv_update_config['lang']['vi']['nv_up_sys4403'] = 'Cập nhật hệ thống lên 4.4.03';
$nv_update_config['lang']['vi']['nv_up_sys4404'] = 'Cập nhật hệ thống lên 4.4.04';

$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.4.04';

// English
$nv_update_config['lang']['en']['nv_up_modusers4401'] = 'Update module users to 4.4.01';
$nv_update_config['lang']['en']['nv_up_sys4401'] = 'Update system to 4.4.01';
$nv_update_config['lang']['en']['nv_up_sys4403'] = 'Update system to 4.4.03';
$nv_update_config['lang']['en']['nv_up_sys4404'] = 'Update system to 4.4.04';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.4.04';

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
    'r' => '4.4.03',
    'rq' => 2,
    'l' => 'nv_up_sys4403',
    'f' => 'nv_up_sys4403'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.4.04',
    'rq' => 2,
    'l' => 'nv_up_sys4404',
    'f' => 'nv_up_sys4404'
];
$nv_update_config['tasklist'][] = [
    'r' => $nv_update_config['to_version'],
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
];

/**
 *
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
 *
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

    // Cập nhật file .htaccess
    $htaccess = NV_ROOTDIR . '/.htaccess';
    if (is_writable($htaccess)) {
        $htaccess_content = file_get_contents($htaccess);
        $htaccess_content = preg_replace('/error\.php\?code\=([0-9]{3})/', 'error.php?code=\\1&nvDisableRewriteCheck=1', $htaccess_content);
        file_put_contents($htaccess, $htaccess_content, LOCK_EX);
    }

    return $return;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_sys4403()
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

    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'allow_null_origin', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'ip_allow_null_origin', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp', 'script-src &#039;self&#039; *.google.com *.google-analytics.com *.googletagmanager.com *.gstatic.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me *.zaloapp.com &#039;unsafe-inline&#039; &#039;unsafe-eval&#039;;style-src &#039;self&#039; *.google.com &#039;unsafe-inline&#039;;frame-src &#039;self&#039; *.google.com *.youtube.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me;base-uri &#039;self&#039;;');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp', 'no-referrer-when-downgrade, strict-origin-when-cross-origin');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_SameSite', 'Lax');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Duyệt tất cả các ngôn ngữ của modusers
    // Lấy tất cả ngôn ngữ đã cài đặt
    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    $_module_users = [];
    foreach ($array_sitelangs as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file='users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            if (!in_array($mod_data, $_module_users)) {
                // mỗi module ảo chỉ chạy 1 lần
                $_module_users[] = $mod_data;

                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_field CHANGE COLUMN match_type match_type ENUM('none','alphanumeric','unicodename','email','url','regex','callback') NOT NULL DEFAULT 'none' AFTER sql_choices;");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                /**
                 * @deprecated không ép cấu hình họ tên về tên người
                try {
                    $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET match_type='unicodename' WHERE  field IN ('first_name','last_name');");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                */
                try {
                    $db->query('INSERT IGNORE INTO ' . $db_config['prefix'] . '_' . $mod_data . "_config (config, content, edit_time) VALUES ('auto_assign_oauthuser', '0', " . NV_CURRENTTIME . ')');
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
            }
        }
    }

    //API
    try {
        $db->query("CREATE TABLE " . $db_config['prefix'] . "_authors_api_role (
            role_id smallint(4) NOT NULL AUTO_INCREMENT,
            role_title varchar(250) NOT NULL DEFAULT '',
            role_description text NOT NULL,
            role_data text NOT NULL,
            addtime int(11) NOT NULL DEFAULT '0',
            edittime int(11) NOT NULL DEFAULT '0',
            PRIMARY KEY (role_id)
        ) ENGINE = MYISAM COMMENT 'Bảng lưu quyền truy cập API'");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("CREATE TABLE " . $db_config['prefix'] . "_authors_api_credential (
            admin_id int(11) UNSIGNED NOT NULL,
            credential_title varchar(255) NOT NULL DEFAULT '',
            credential_ident varchar(50) NOT NULL DEFAULT '',
            credential_secret varchar(250) NOT NULL DEFAULT '',
            credential_ips varchar(255) NOT NULL DEFAULT '',
            api_roles varchar(255) NOT NULL DEFAULT '',
            addtime int(11) NOT NULL DEFAULT '0',
            edittime int(11) NOT NULL DEFAULT '0',
            last_access int(11) NOT NULL DEFAULT '0',
            UNIQUE KEY credential_ident (credential_ident),
            UNIQUE KEY credential_secret (credential_secret),
            KEY admin_id (admin_id)
        ) ENGINE = MYISAM COMMENT 'Bảng lưu key API của quản trị'");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("INSERT INTO " . $db_config['prefix'] . "_config (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_access', '0')");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("INSERT INTO " . $db_config['prefix'] . "_config (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_log', '1')");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    nv_deletefile(NV_ROOTDIR . '/admin/settings/cdn.php');
    nv_deletefile(NV_ROOTDIR . '/admin/themes/change_layout.php');
    nv_deletefile(NV_ROOTDIR . '/vendor/pclzip', true);
    nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.min.css');
    nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.min.js');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/texture.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded@2x.png');

    return $return;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_sys4404()
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

    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    foreach ($array_sitelangs as $lang) {
        // Gỡ cấu hình các block QR-Code
        try {
            $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_blocks_groups SET config='' WHERE file_name='global.QR_code.php';");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }
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

    // Chạy lại .htaccess
    $array_config_rewrite = [
        'rewrite_enable' => $global_config['rewrite_enable'],
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
        'ssl_https' => $global_config['ssl_https']
    ];
    nv_rewrite_change($array_config_rewrite);

    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='module' AND basename IN ('" . implode("', '", $array_modules) . "')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='theme' AND basename IN ('" . implode("', '", $array_themes) . "')");

    nv_save_file_config_global();

    return $return;
}
