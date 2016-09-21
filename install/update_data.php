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
$nv_update_config['packageID'] = 'NVUD4100';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1463504400;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.1.00';
$nv_update_config['to_version'] = '4.1.00';
$nv_update_config['allow_old_version'] = array('4.0.29');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modcomment'] = 'Cập nhật module comment lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modnews'] = 'Cập nhật module news lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modvoting'] = 'Cập nhật module voting lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modusers'] = 'Cập nhật module users lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_mod2step'] = 'Thêm module xác thực hai bước';
$nv_update_config['lang']['vi']['nv_up_fucsys'] = 'Cập nhật các chức năng hệ thống';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.1.00';
// English
$nv_update_config['lang']['en']['nv_up_modcomment'] = 'Update module comment to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modnews'] = 'Update module news to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modvoting'] = 'Update module voting to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modusers'] = 'Update module users to 4.1.00';
$nv_update_config['lang']['en']['nv_up_mod2step'] = 'Add module two-step-verification';
$nv_update_config['lang']['en']['nv_up_fucsys'] = 'Update system functions';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.1.00';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modcomment',
    'f' => 'nv_up_modcomment'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modnews',
    'f' => 'nv_up_modnews'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modvoting',
    'f' => 'nv_up_modvoting'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modusers',
    'f' => 'nv_up_modusers'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_mod2step',
    'f' => 'nv_up_mod2step'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_fucsys',
    'f' => 'nv_up_fucsys'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_modcomment()
 *
 * @return
 *
 */
function nv_up_modcomment()
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat ADD ad_block_cat varchar(250) NOT NULL default '' AFTER featured");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
        }
    }

    return $return;
}

/**
 * nv_up_modnews()
 *
 * @return
 *
 */
function nv_up_modnews()
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_detail 
                ADD titlesite varchar(255) NOT NULL DEFAULT '' AFTER id,
                ADD description text NOT NULL AFTER titlesite;");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
            
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'htmlhometext', '0')");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
        }
    }

    return $return;
}

/**
 * nv_up_modvoting()
 *
 * @return
 *
 */
function nv_up_modvoting()
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'voting'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . " ADD active_captcha tinyint(1) UNSIGNED NOT NULL DEFAULT '0' AFTER  acceptcm;");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
        }
    }

    return $return;
}

/**
 * nv_up_modusers()
 *
 * @return
 *
 */
function nv_up_modusers()
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $mod_data . "_backupcodes (
                    userid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
                    code varchar(20) NOT NULL,
                    is_used tinyint(1) unsigned NOT NULL DEFAULT '0',
                    time_used int(11) unsigned NOT NULL DEFAULT '0',
                    time_creat int(11) unsigned NOT NULL DEFAULT '0',
                    UNIQUE KEY userid (userid, code)
                ) ENGINE=MyISAM");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
            
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "  
                ADD active2step tinyint(1) unsigned NOT NULL DEFAULT '0' AFTER active, 
                ADD secretkey varchar(20) DEFAULT '' AFTER active2step;");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
            }
        }
    }

    return $return;
}

/**
 * nv_up_fucsys()
 *
 * @return
 *
 */
function nv_up_fucsys()
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
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'is_login_blocker', '1')");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'login_number_tracking', '5')");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'login_time_tracking', '5')");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'login_time_ban', '1440')");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }

    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'two_step_verification', '0')");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_setup_language ADD weight smallint(4) UNSIGNED NOT NULL DEFAULT '0' AFTER setup ;");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    // Cập nhật lại thứ tự
    $weight = 0;
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_setup_language";
    $result = $db->query($sql);
    
    while ($row = $result->fetch()) {
        $weight++;
        $db->query("UPDATE " . $db_config['prefix'] . "_setup_language SET weight=" . $weight . " WHERE lang='" . $row['lang'] . "'");
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
    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    // Cập nhật phiên bản
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='4.1.00' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='4.1.00 " . $nv_update_config['release_date'] . "' WHERE type='module' and basename IN ('banners', 'comment','contact','feeds','freecontent','menu','news','page','seek','statistics','users','voting')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='4.1.00 " . $nv_update_config['release_date'] . "' WHERE type='theme' and basename IN ('default', 'mobile_default')");
    
    $nv_Cache->delAll();
    
    nv_rewrite_change($global_config);
    nv_save_file_config_global();

    return $return;
}