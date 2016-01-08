<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC.
 * All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (!defined('NV_IS_UPDATE')) die('Stop!!!');

$nv_update_config = array();

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4024';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = "";

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1416814789;
$nv_update_config['author'] = "VINADES.,JSC (contact@vinades.vn)";
$nv_update_config['support_website'] = "http://forum.nukeviet.vn/";
$nv_update_config['to_version'] = "4.0.24";
$nv_update_config['allow_old_version'] = array(
    "4.0.23"
);

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 2;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_sysdb'] = 'Cập nhật CSDL hệ thống';
$nv_update_config['lang']['vi']['nv_up_contact'] = 'Cập nhật CSDL module contact';
$nv_update_config['lang']['vi']['nv_up_delfiles'] = 'Xóa các file thừa';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Đánh dấu phiên bản mới';

// English
$nv_update_config['lang']['en']['nv_up_sysdb'] = 'Update system database';
$nv_update_config['lang']['en']['nv_up_contact'] = 'Update contact database';
$nv_update_config['lang']['en']['nv_up_delfiles'] = 'Delete files';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.24',
    'rq' => 1,
    'l' => 'nv_up_sysdb',
    'f' => 'nv_up_sysdb'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.0.24',
    'rq' => 1,
    'l' => 'nv_up_contact',
    'f' => 'nv_up_contact'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.0.24',
    'rq' => 0,
    'l' => 'nv_up_delfiles',
    'f' => 'nv_up_delfiles'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.24',
    'rq' => 1,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_sysdb()
 *
 * @return
 *
 */
function nv_up_sysdb()
{
    global $nv_update_baseurl, $db, $db_config;

    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    try {
        $db->query("DELETE FROM " . $db_config['prefix'] . "_counter WHERE `c_type` = 'os' AND `c_val` = 'Unspecified'");
    } catch (PDOException $e) {
        //
    }

    try {
        $db->query("DELETE FROM " . $db_config['prefix'] . "_counter WHERE `c_type` = 'browser' AND `c_val` = 'Unspecified'");
    } catch (PDOException $e) {
        //
    }

    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'auto_login_after_reg', '0')");
    } catch (PDOException $e) {
        //
    }

    // Lấy tất cả ngôn ngữ của site
    $language_query = $db->query("SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1");
    // Duyệt tất cả các ngôn ngữ
    while (list ($lang) = $language_query->fetch(PDO::FETCH_NUM)) {
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_blocks_groups ADD act TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER active");
        } catch (PDOException $e) {
            //
        }

        try {
            $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', 'global', 'upload_logo_pos', 'bottomRight')");
        } catch (PDOException $e) {
            //
        }
    }

    return $return;
}

/**
 * nv_up_contact()
 *
 * @return
 *
 */

function nv_up_contact()
{
    global $nv_update_baseurl, $db, $db_config;

    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );
    $sqls = array();

    // Lấy tất cả ngôn ngữ của site
    $language_query = $db->query("SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1");

    if (!$language_query) {
        $return['status'] = 0;
        $return['complete'] = 0;

        return $return;
    }

    // Duyệt tất cả các ngôn ngữ
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module contact và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'contact'");

        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD address VARCHAR(255) NOT NULL AFTER email");
            } catch (PDOException $e) {
                //
            }
        }
    }

    return $return;
}

/**
 * nv_up_delfiles()
 *
 * @return
 *
 */

function nv_up_delfiles()
{
    global $nv_update_baseurl;

    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    @nv_deletefile(NV_ROOTDIR . '/dmin/themes/front_outgroup.php');
    @nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/timeago/jquery.timeago.js');
    @nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/timeago/locales/jquery.timeago.en.js');
    @nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/timeago/locales/jquery.timeago.vi.js');

    @nv_deletefile(NV_ROOTDIR . '/includes/core/cache_functions.php');
    @nv_deletefile(NV_ROOTDIR . '/includes/core/qr.php');
    @nv_deletefile(NV_ROOTDIR . '/includes/language/vi/phpmailer.lang-vi.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/users/CAS.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/users/login/openid-nukeviet.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/users/login/openid-yahoo.php');

    @nv_deletefile(NV_ROOTDIR . '/includes/class', true);
    @nv_deletefile(NV_ROOTDIR . '/modules/users/oAuthLib/', true);
    @nv_deletefile(NV_ROOTDIR . '/modules/users/CAS/', true);

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
    global $nv_update_baseurl, $db, $db_config;

    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.24' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'");

    return $return;
}