<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (!defined('NV_IS_UPDATE')) die('Stop!!!');

$nv_update_config = array();

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4102';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1492966799;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.1.02';
$nv_update_config['to_version'] = '4.1.02';
$nv_update_config['allow_old_version'] = array('4.0.29', '4.1.00', '4.1.01');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modcomment4100'] = 'Cập nhật module comment lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modnews4100'] = 'Cập nhật module news lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modvoting4100'] = 'Cập nhật module voting lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_modusers4100'] = 'Cập nhật module users lên 4.1.00';
$nv_update_config['lang']['vi']['nv_up_mod2step4100'] = 'Thêm module xác thực hai bước';
$nv_update_config['lang']['vi']['nv_up_fucsys4100'] = 'Cập nhật các chức năng hệ thống';
$nv_update_config['lang']['vi']['nv_up_delfiles4100'] = 'Xóa file thừa bản 4.1.00';

$nv_update_config['lang']['vi']['nv_up_delunusefiles4101'] = 'Xóa các file thừa bản 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modnews4101'] = 'Cập nhật module news lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modusers4101'] = 'Cập nhật module users lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modbanners4101'] = 'Cập nhật module banners lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modpage4101'] = 'Cập nhật module page lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modcontact4101'] = 'Cập nhật module contact lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_modmenu4101'] = 'Cập nhật module menu lên 4.1.01';
$nv_update_config['lang']['vi']['nv_up_systemcfg4101'] = 'Cập nhật các cấu hình hệ thống bản 4.1.01';

$nv_update_config['lang']['vi']['nv_up_modnews4102'] = 'Cập nhật module news lên 4.1.02';
$nv_update_config['lang']['vi']['nv_up_modpage4102'] = 'Cập nhật module page lên 4.1.02';

$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.1.02';

// English
$nv_update_config['lang']['en']['nv_up_modcomment4100'] = 'Update module comment to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modnews4100'] = 'Update module news to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modvoting4100'] = 'Update module voting to 4.1.00';
$nv_update_config['lang']['en']['nv_up_modusers4100'] = 'Update module users to 4.1.00';
$nv_update_config['lang']['en']['nv_up_mod2step4100'] = 'Add module two-step-verification';
$nv_update_config['lang']['en']['nv_up_fucsys4100'] = 'Update system functions';
$nv_update_config['lang']['vi']['nv_up_delfiles4100'] = 'Delete unused files 4.1.00';

$nv_update_config['lang']['en']['nv_up_delunusefiles4101'] = 'Delete unused files 4.1.01';
$nv_update_config['lang']['en']['nv_up_modnews4101'] = 'Update module news 4.1.01';
$nv_update_config['lang']['en']['nv_up_modusers4101'] = 'Update module users 4.1.01';
$nv_update_config['lang']['en']['nv_up_modbanners4101'] = 'Update module banners 4.1.01';
$nv_update_config['lang']['en']['nv_up_modpage4101'] = 'Update module page 4.1.01';
$nv_update_config['lang']['en']['nv_up_modcontact4101'] = 'Update module contact 4.1.01';
$nv_update_config['lang']['en']['nv_up_modmenu4101'] = 'Update module menu 4.1.01';
$nv_update_config['lang']['en']['nv_up_systemcfg4101'] = 'Update system config 4.1.01';

$nv_update_config['lang']['en']['nv_up_modnews4102'] = 'Update module news 4.1.02';
$nv_update_config['lang']['en']['nv_up_modpage4102'] = 'Update module page 4.1.02';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.1.02';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modcomment4100',
    'f' => 'nv_up_modcomment4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modnews4100',
    'f' => 'nv_up_modnews4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modvoting4100',
    'f' => 'nv_up_modvoting4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_modusers4100',
    'f' => 'nv_up_modusers4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_mod2step4100',
    'f' => 'nv_up_mod2step4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_fucsys4100',
    'f' => 'nv_up_fucsys4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.00',
    'rq' => 1,
    'l' => 'nv_up_delfiles4100',
    'f' => 'nv_up_delfiles4100'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_delunusefiles4101',
    'f' => 'nv_up_delunusefiles4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modnews4101',
    'f' => 'nv_up_modnews4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modusers4101',
    'f' => 'nv_up_modusers4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modbanners4101',
    'f' => 'nv_up_modbanners4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modpage4101',
    'f' => 'nv_up_modpage4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modcontact4101',
    'f' => 'nv_up_modcontact4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modmenu4101',
    'f' => 'nv_up_modmenu4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 2,
    'l' => 'nv_up_systemcfg4101',
    'f' => 'nv_up_systemcfg4101'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.02',
    'rq' => 1,
    'l' => 'nv_up_modnews4102',
    'f' => 'nv_up_modnews4102'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.02',
    'rq' => 1,
    'l' => 'nv_up_modpage4102',
    'f' => 'nv_up_modpage4102'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.02',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_modcomment4100()
 *
 * @return
 *
 */
function nv_up_modcomment4100()
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
        $result = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $lang . '_modules ORDER BY weight');
        while ($row = $result->fetch()) {
            $module_name = $row['title'];
            $sql = "SELECT * FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='" . $lang . "' AND module='" . $module_name . "'";
            $result1 = $db->query($sql);
            
            $array_config_module = array();
            while ($cfg = $result1->fetch()) {
                $array_config_module[$cfg['config_name']] = $cfg['config_value'];
            }
            
            if (isset($array_config_module['activecomm'])) {
                if (!isset($array_config_module['perpagecomm'])) {
                    try {
                        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'perpagecomm', '5')");
                    } catch (Exception $e) {
                        //
                    }
                }
                if (!isset($array_config_module['timeoutcomm'])) {
                    try {
                        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeoutcomm', '360')");
                    } catch (Exception $e) {
                        //
                    }
                }
            }
        }
    }

    return $return;
}

/**
 * nv_up_modnews4100()
 *
 * @return
 *
 */
function nv_up_modnews4100()
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
 * nv_up_modvoting4100()
 *
 * @return
 *
 */
function nv_up_modvoting4100()
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
 * nv_up_modusers4100()
 *
 * @return
 *
 */
function nv_up_modusers4100()
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
 * nv_up_mod2step4100()
 *
 * @return
 *
 */
function nv_up_mod2step4100()
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
        $db->query("INSERT INTO " . $db_config['prefix'] . "_setup_extensions (
            id, type, title, is_sys, is_virtual, basename, table_prefix, version, addtime, author, note
        ) VALUES (
            327, 'module', 'two-step-verification', 1, 0, 'two-step-verification', 'two_step_verification', '4.0.29 1463652000', " . NV_CURRENTTIME . ", 'VINADES (contact@vinades.vn)', ''
        )");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        nv_setup_module2setp($lang);
    }

    return $return;
}

/**
 * nv_setup_module2setp()
 * 
 * @param mixed $lang
 * @return void
 */
function nv_setup_module2setp($lang)
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache;
    
    $setmodule = 'two-step-verification';
    
    $sth = $db->prepare('SELECT basename, table_prefix FROM ' . $db_config['prefix'] . '_setup_extensions WHERE title=:title AND type=\'module\'');
    $sth->bindParam(':title', $setmodule, PDO::PARAM_STR);
    $sth->execute();
    $modrow = $sth->fetch();

    if (! empty($modrow)) {
        $weight = $db->query('SELECT MAX(weight) FROM ' . $db_config['prefix'] . '_' . $lang . '_modules')->fetchColumn();
        $weight = intval($weight) + 1;

        $module_version = array(
            'name' => 'Two-Step Verification',
            'modfuncs' => 'main,setup,confirm',
            'submenu' => 'main,setup,confirm',
            'is_sysmod' => 1,
            'virtual' => 0,
            'version' => '4.0.30',
            'date' => 'Tue, 02 Aug 2016 10:33:12 GMT',
            'author' => 'VINADES (contact@vinades.vn)',
            'note' => 'Two-Step Verification'
        );
        $admin_file = 0;
        $main_file = 1;

        $custom_title = preg_replace('/(\W+)/i', ' ', $setmodule);

        try {
            $sth = $db->prepare("INSERT INTO " . $db_config['prefix'] . '_' . $lang . '_modules' . "
				(title, module_file, module_data, module_upload, custom_title, admin_title, set_time, main_file, admin_file, theme, mobile, description, keywords, groups_view, weight, act, admins, rss) VALUES
				(:title, :module_file, :module_data, :module_upload, :custom_title, '', " . NV_CURRENTTIME . ", " . $main_file . ", " . $admin_file . ", '', '', '', '', '6', " . $weight . ", 0, '',1)
			");
            $sth->bindParam(':title', $setmodule, PDO::PARAM_STR);
            $sth->bindParam(':module_file', $modrow['basename'], PDO::PARAM_STR);
            $sth->bindParam(':module_data', $modrow['table_prefix'], PDO::PARAM_STR);
            $sth->bindParam(':module_upload', $setmodule, PDO::PARAM_STR);
            $sth->bindParam(':custom_title', $custom_title, PDO::PARAM_STR);
            $sth->execute();
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }

        $nv_Cache->delMod('modules');
        
        $return = nv_setup_data_module($lang, $setmodule, 1);
        
        if ($return == 'OK_' . $setmodule) {
            nv_setup_block_module($setmodule, $lang);

            $sth = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $lang . '_modules SET act=1 WHERE title=:title');
            $sth->bindParam(':title', $setmodule, PDO::PARAM_STR);
            $sth->execute();
        }
    }
}

/**
 * nv_up_fucsys4100()
 *
 * @return
 *
 */
function nv_up_fucsys4100()
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

    try {
        $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET is_virtual=1 WHERE type='module' AND title='freecontent'");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    return $return;
}

/**
 * nv_up_delfiles4100()
 *
 * @return
 *
 */
function nv_up_delfiles4100()
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

    // Xóa file thừa
    @nv_deletefile(NV_ROOTDIR . '/admin/siteinfo/notification_load.php');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/siteinfo/notification_load.tpl');
    @nv_deletefile(NV_ROOTDIR . '/vendor/vinades/nukeviet/Core/FloodBlocker.php');

    return $return;
}

/**
 * nv_up_delunusefiles4101()
 *
 * @return
 *
 */
function nv_up_delunusefiles4101()
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
    nv_deletefile(NV_ROOTDIR . '/includes/rewrite.php');
    nv_deletefile(NV_ROOTDIR . '/includes/rewrite_index.php');
    
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/css/autosave.css');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/js/difflib.js');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/js/diffview.js');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/js/jsdiff.js');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/js/lz-string-1.3.3.js');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave/js/moment.js');
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/gg', true);
    nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/googledocs/.gitignore');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.watermarker.js');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/Jcrop.gif');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.Jcrop.min.css');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.Jcrop.min.js');
    nv_deletefile(NV_ROOTDIR . '/themes/default/css/jquery.Jcrop.min.css');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/css/jquery.Jcrop.min.css');
    return $return;
}

/**
 * nv_up_modnews4101()
 *
 * @return
 *
 */
function nv_up_modnews4101()
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
            // Facebook Instant Articles
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_modfuncs (
                    func_id, func_name, alias, func_custom_name, in_module, show_func, in_submenu, subweight, setting
                ) VALUES (NULL, 'instant-rss', 'instant-rss', 'Instant Articles RSS', '" . $mod . "', '0', '0', '0', '');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_active', '0');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_template', 'default');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_httpauth', '0');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_username', '');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_password', '');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_livetime', '60');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_gettime', '120');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_auto', '1');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows 
                ADD external_link TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0' AFTER allowed_rating ,
                ADD instant_active TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER click_rating ,
                ADD instant_template VARCHAR( 100 ) NOT NULL DEFAULT '' AFTER instant_active, 
                ADD instant_creatauto TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER instant_template ;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX instant_active (instant_active);");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX edittime (edittime);");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX instant_creatauto (instant_creatauto);");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Lấy tất cả các chủ đề
            $sql = "SELECT catid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat";
            $result = $db->query($sql);
            while ($row = $result->fetch()) {
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " 
                    ADD external_link TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0' AFTER allowed_rating ,
                    ADD instant_active TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER click_rating ,
                    ADD instant_template VARCHAR( 100 ) NOT NULL DEFAULT '' AFTER instant_active, 
                    ADD instant_creatauto TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER instant_template ;");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX instant_active (instant_active);");
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX edittime (edittime);");
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX instant_creatauto (instant_creatauto);");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
            }
            // Thêm bảng tmp
            try {
                $db->query("CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_tmp (
                  id mediumint(8) UNSIGNED NOT NULL,
                  admin_id int(11) NOT NULL DEFAULT '0',
                  time_edit int(11) NOT NULL,
                  time_late int(11) NOT NULL,
                  ip varchar(50) NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modusers4101()
 *
 * @return
 *
 */
function nv_up_modusers4101()
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
            // Ghi log đăng nhập của thành viên
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('active_user_logs', '1', " . NV_CURRENTTIME . ")");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Cập nhật độ dài trường pass
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . " CHANGE password password VARCHAR(150) NOT NULL DEFAULT '';");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg CHANGE password password VARCHAR(150) NOT NULL DEFAULT '';");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modbanners4101()
 *
 * @return
 *
 */
function nv_up_modbanners4101()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'banners'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Cấu hình khối quảng cáo có yêu cầu sử dụng ảnh không.
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_plans CHANGE description description TEXT;");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_plans ADD require_image tinyint(1) unsigned NOT NULL DEFAULT '1' AFTER act;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Lỗi không đủ ký tự cho trường PASS
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_clients CHANGE  pass  pass VARCHAR( 200 ) NOT NULL ;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm trình soạn thảo HTML vào QC
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_rows ADD bannerhtml MEDIUMTEXT NOT NULL AFTER target;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modpage4101()
 *
 * @return
 *
 */
function nv_up_modpage4101()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "  ADD hitstotal MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0'  AFTER status;");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "  ADD hot_post TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'  AFTER hitstotal;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modcontact4101()
 *
 * @return
 *
 */
function nv_up_modcontact4101()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'contact'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_send ADD sender_address VARCHAR(250) NOT NULL AFTER sender_name;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_supporter (
                  id smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
                  departmentid smallint(5) UNSIGNED NOT NULL,
                  full_name varchar(255) NOT NULL,
                  image varchar(255) NOT NULL DEFAULT '',
                  phone varchar(255) NOT NULL,
                  email varchar(100) NOT NULL,
                  others text NOT NULL,
                  act tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
                  weight smallint(5) NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modmenu4101()
 *
 * @return
 *
 */
function nv_up_modmenu4101()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'menu'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD image VARCHAR(255) NULL DEFAULT '' AFTER icon;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_systemcfg4101()
 *
 * @return
 *
 */
function nv_up_systemcfg4101()
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
    // Recaptcha
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_sitekey', '')");
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_secretkey', '')");
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_type', 'image')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Cho phép mỗi module ảo dùng 1 giao diện module riêng (Cùng theme)
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules ADD module_theme VARCHAR(50) NOT NULL DEFAULT '' AFTER module_upload;");
            $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_modules SET module_theme=module_file");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thêm trường cho bảng module và các function của module
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules CHANGE admin_title admin_title VARCHAR(255) NOT NULL DEFAULT '';");
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules ADD site_title VARCHAR(255) NOT NULL DEFAULT '' AFTER custom_title;");
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modfuncs ADD func_site_title VARCHAR(255) NOT NULL DEFAULT '' AFTER func_custom_name;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thay đổi độ dài trường
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modfuncs CHANGE in_module in_module VARCHAR(50) NOT NULL;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thay đổi độ dài trường
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules CHANGE title title VARCHAR(50) NOT NULL, CHANGE module_file module_file VARCHAR(50) NOT NULL DEFAULT '', CHANGE module_data module_data VARCHAR(50) NOT NULL DEFAULT '', CHANGE module_upload module_upload VARCHAR(50) NOT NULL DEFAULT '';");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
    }
    
    // Thêm cấu hình googleMapsAPI
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'googleMapsAPI', '')"); 
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Mở thiết lập google+ đối với điều hành chung
    try {
        $db->query("UPDATE " . $db_config['prefix'] . "_authors_module SET act_2 = '1' WHERE module = 'seotools';"); 
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi luật rewrite
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'rewrite_enable', '1')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi cấu hình cho module users
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET  module='site' WHERE lang = 'sys' AND module='global' AND config_name IN ('site_phone', 'nv_upass_type', 'nv_unick_type', 'allowmailchange', 'allowuserpublic', 'allowquestion', 'allowloginchange', 'allowuserlogin', 'allowuserloginmulti', 'allowuserreg', 'is_user_forum', 'openid_servers', 'openid_processing', 'user_check_pass_time', 'auto_login_after_reg', 'whoviewuser')");
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET  module='site' WHERE lang = 'sys' AND module='define' AND config_name IN ('dir_forum','nv_unickmin','nv_unickmax','nv_upassmin','nv_upassmax')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi mã hóa
    if (!empty($global_config['ftp_user_pass']) or !empty($global_config['smtp_password'])) {
        global $crypt;
        
        if (!empty($global_config['ftp_user_pass'])) {
            $ftp_user_pass = $crypt->aes_decrypt(nv_base64_decode($global_config['ftp_user_pass']));
            $ftp_user_pass = nv_tmp_encrypt($ftp_user_pass);
            
            try {
                $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=" . $db->quote($ftp_user_pass) . " WHERE lang='sys' AND module='global' AND config_name='ftp_user_pass'");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
        
        if (!empty($global_config['smtp_password'])) {
            $smtp_password = $crypt->aes_decrypt(nv_base64_decode($global_config['smtp_password']));
            $smtp_password = nv_tmp_encrypt($smtp_password);
            
            try {
                $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=" . $db->quote($smtp_password) . " WHERE lang='sys' AND module='site' AND config_name='smtp_password'");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    // Cập nhật độ dài bảng authors_module
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_authors_module CHANGE module module VARCHAR(50) NOT NULL;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    // Cập nhật độ dài bảng config
    try {
        $db->query("ALTER TABLE " . NV_CONFIG_GLOBALTABLE . " CHANGE module module VARCHAR(50) NOT NULL DEFAULT 'global';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    // Cập nhật độ dài bảng logs
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_logs CHANGE module_name module_name VARCHAR(50) NOT NULL;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    return $return;
}

/**
 * nv_up_modnews4102()
 *
 * @return
 *
 */
function nv_up_modnews4102()
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
            // Thêm Elastic (Fix gói 4.1.01)
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'elas_use', '0')");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'elas_host', '')");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'elas_port', '9200')");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'elas_index', '')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm cấu hình copy bài viết
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'copy_news', '0')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modpage4102()
 *
 * @return
 *
 */
function nv_up_modpage4102()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Cấu hình copy bài viết
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'copy_page', 0);");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
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
    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    // Cập nhật phiên bản
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='module' and basename IN ('banners', 'comment','contact','feeds','freecontent','menu','news','page','seek','statistics','users','voting', 'two-step-verification')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='theme' and basename IN ('default', 'mobile_default')");
    
    $array_config_rewrite = array(
        'rewrite_enable' => 1,
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
        'ssl_https' => $global_config['ssl_https']
    );
    try {
        $rewrite = nv_rewrite_change_tmp($array_config_rewrite);
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    if (empty($rewrite[0])) {
        trigger_error('Error write file: ' . $rewrite[1]);
    }
    
    try {
        nv_save_file_config_global_tmp();
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    return $return;
}

/**
 * nv_setup_block_module()
 *
 * @param mixed $mod
 * @param mixed $lang
 * @param integer $func_id
 * @return
 */
function nv_setup_block_module($mod, $lang, $func_id = 0)
{
    global $db, $nv_Cache, $db_config;

    if (empty($func_id)) {
        //xoa du lieu tai bang blocks
        $sth = $db->prepare('DELETE FROM ' . $db_config['prefix'] . '_' . $lang . '_blocks_weight WHERE bid in (SELECT bid FROM ' . $db_config['prefix'] . '_' . $lang . '_blocks_groups WHERE module= :module)');
        $sth->bindParam(':module', $mod, PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('DELETE FROM ' . $db_config['prefix'] . '_' . $lang . '_blocks_groups WHERE module= :module');
        $sth->bindParam(':module', $mod, PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('DELETE FROM ' . $db_config['prefix'] . '_' . $lang . '_blocks_weight WHERE func_id in (SELECT func_id FROM ' . $db_config['prefix'] . '_' . $lang . '_modfuncs WHERE in_module= :module)');
        $sth->bindParam(':module', $mod, PDO::PARAM_STR);
        $sth->execute();
    }

    $array_funcid = array();
    $sth = $db->prepare('SELECT func_id FROM ' . $db_config['prefix'] . '_' . $lang . '_modfuncs WHERE show_func = 1 AND in_module= :module ORDER BY subweight ASC');
    $sth->bindParam(':module', $mod, PDO::PARAM_STR);
    $sth->execute();
    while (list($func_id_i) = $sth->fetch(3)) {
        if ($func_id == 0 or $func_id == $func_id_i) {
            $array_funcid[] = $func_id_i;
        }
    }

    $weight = 0;
    $old_theme = $old_position = '';

    $sql = 'SELECT bid, theme, position FROM ' . $db_config['prefix'] . '_' . $lang . '_blocks_groups WHERE all_func= 1 ORDER BY theme ASC, position ASC, weight ASC';
    $result = $db->query($sql);
    while ($row = $result->fetch()) {
        if ($old_theme == $row['theme'] and $old_position == $row['position']) {
            ++$weight;
        } else {
            $weight = 1;
            $old_theme = $row['theme'];
            $old_position = $row['position'];
        }

        foreach ($array_funcid as $func_id) {
            $db->query('INSERT INTO ' . $db_config['prefix'] . '_' . $lang . '_blocks_weight (bid, func_id, weight) VALUES (' . $row['bid'] . ', ' . $func_id . ', ' . $weight . ')');
        }
    }

    $nv_Cache->delMod('themes');
}

/**
 * nv_setup_data_module()
 *
 * @param mixed $lang
 * @param mixed $module_name
 * @param integer $sample
 * @return
 */
function nv_setup_data_module($lang, $module_name, $sample = 0)
{
    global $nv_Cache, $db, $db_config, $global_config, $install_lang;

    $return = 'NO_' . $module_name;

    $sth = $db->prepare('SELECT module_file, module_data, module_upload, theme FROM ' . $db_config['prefix'] . '_' . $lang . '_modules WHERE title= :title');
    $sth->bindParam(':title', $module_name, PDO::PARAM_STR);
    $sth->execute();

    list($module_file, $module_data, $module_upload, $module_theme) = $sth->fetch(3);

    if (! empty($module_file)) {
        $module_version = array();
        $version_file = NV_ROOTDIR . '/install/update/modules/' . $module_file . '/version.php';

        if (file_exists($version_file)) {
            include $version_file;
        }

        $arr_modfuncs = (isset($module_version['modfuncs']) and ! empty($module_version['modfuncs'])) ? array_map('trim', explode(',', $module_version['modfuncs'])) : array();

        // Delete config value in prefix_config table
        $sth = $db->prepare("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang= '" . $lang . "' AND module= :module");
        $sth->bindParam(':module', $module_name, PDO::PARAM_STR);
        $sth->execute();

        $nv_Cache->delAll();

        // Re-Creat all module table
        if (file_exists(NV_ROOTDIR . '/install/update/modules/' . $module_file . '/action_' . $db->dbtype . '.php')) {
            $sql_recreate_module = array();

            try {
                $db->exec('ALTER DATABASE ' . $db_config['dbname'] . ' DEFAULT CHARACTER SET ' . $db_config['charset'] . ' COLLATE ' . $db_config['collation']);
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            include NV_ROOTDIR . '/install/update/modules/' . $module_file . '/action_' . $db->dbtype . '.php' ;

            if (! empty($sql_create_module)) {
                foreach ($sql_create_module as $sql) {
                    try {
                        $db->query($sql);
                    } catch (PDOException $e) {
                        trigger_error($e->getMessage());
                        return $return;
                    }
                }
            }
        }

        // Setup layout if site module
        $arr_func_id = array();
        $arr_show_func = array();
        $new_funcs = nv_scandir(NV_ROOTDIR . '/install/update/modules/' . $module_file . '/funcs', $global_config['check_op_file']);

        if (! empty($new_funcs)) {
            // Get default layout
            $layout_array = nv_scandir(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/layout', $global_config['check_op_layout']);
            if (! empty($layout_array)) {
                $layout_array = preg_replace($global_config['check_op_layout'], '\\1', $layout_array);
            }

            $selectthemes = 'default';
            if (! empty($module_theme) and file_exists(NV_ROOTDIR . '/themes/' . $module_theme . '/config.ini')) {
                $selectthemes = $module_theme;
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/config.ini')) {
                $selectthemes = $global_config['site_theme'];
            }

            $xml = simplexml_load_file(NV_ROOTDIR . '/themes/' . $selectthemes . '/config.ini');
            $layoutdefault = ( string )$xml->layoutdefault;
            $layout = $xml->xpath('setlayout/layout');

            $array_layout_func_default = array();
            for ($i = 0, $count = sizeof($layout); $i < $count; ++$i) {
                $layout_name = ( string )$layout[$i]->name;

                if (in_array($layout_name, $layout_array)) {
                    $layout_funcs = $layout[$i]->xpath('funcs');
                    for ($j = 0, $count2 = sizeof($layout_funcs); $j < $count2; ++$j) {
                        $mo_funcs = ( string )$layout_funcs[$j];
                        $mo_funcs = explode(':', $mo_funcs);
                        $m = $mo_funcs[0];
                        $arr_f = explode(',', $mo_funcs[1]);
                        foreach ($arr_f as $f) {
                            $array_layout_func_default[$m][$f] = $layout_name;
                        }
                    }
                }
            }

            $_layoutdefault = (isset($module_version['layoutdefault'])) ? $module_version['layoutdefault'] : '';
            if (! empty($_layoutdefault)) {
                $_layout_mod = explode(';', $_layoutdefault);
                foreach ($_layout_mod as $_layout_fun) {
                    list($layout_name, $_func) = explode(':', trim($_layout_fun));
                    $arr_f = explode(',', trim($_func));
                    foreach ($arr_f as $f) {
                        if (! isset($array_layout_func_default[$module_name][$f])) {
                            $array_layout_func_default[$module_name][$f] = $layout_name;
                        }
                    }
                }
            }

            $arr_func_id_old = array();

            $sth = $db->prepare('SELECT func_id, func_name FROM ' . $db_config['prefix'] . '_' . $lang . '_modfuncs WHERE in_module= :in_module');
            $sth->bindParam(':in_module', $module_name, PDO::PARAM_STR);
            $sth->execute();
            while ($row = $sth->fetch()) {
                $arr_func_id_old[$row['func_name']] = $row['func_id'];
            }

            $new_funcs = preg_replace($global_config['check_op_file'], '\\1', $new_funcs);
            $new_funcs = array_flip($new_funcs);
            $array_keys = array_keys($new_funcs);

            $array_submenu = (isset($module_version['submenu'])) ? explode(',', $module_version['submenu']) : array();
            foreach ($array_keys as $func) {
                $show_func = 0;
                $weight = 0;
                $in_submenu = (in_array($func, $array_submenu)) ? 1 : 0;
                if (isset($arr_func_id_old[$func]) and isset($arr_func_id_old[$func]) > 0) {
                    $arr_func_id[$func] = $arr_func_id_old[$func];
                    $db->query('UPDATE ' . $db_config['prefix'] . '_' . $lang . '_modfuncs SET show_func= ' . $show_func . ', in_submenu=' . $in_submenu . ', subweight=0 WHERE func_id=' . $arr_func_id[$func]);
                } else {
                    $data = array();
                    $data['func_name'] = $func;
                    $data['alias'] = $func;
                    $data['func_custom_name'] = ucfirst($func);
                    $data['in_module'] = $module_name;

                    $arr_func_id[$func] = $db->insert_id("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_modfuncs
						(func_name, alias, func_custom_name, in_module, show_func, in_submenu, subweight, setting) VALUES
					 	(:func_name, :alias, :func_custom_name, :in_module, " . $show_func . ", " . $in_submenu . ", " . $weight . ", '')", "func_id", $data);
                    if ($arr_func_id[$func]) {
                        -                    $layout = $layoutdefault;
                        if (isset($array_layout_func_default[$module_name][$func])) {
                            if (file_exists(NV_ROOTDIR . '/themes/' . $selectthemes . '/layout/layout.' . $array_layout_func_default[$module_name][$func] . '.tpl')) {
                                $layout = $array_layout_func_default[$module_name][$func];
                            }
                        }
                        $db->query('INSERT INTO ' . $db_config['prefix'] . '_' . $lang . '_modthemes (func_id, layout, theme) VALUES (' . $arr_func_id[$func] . ', ' . $db->quote($layout) . ', ' . $db->quote($selectthemes) . ')');
                    }
                }
            }

            $subweight = 0;
            foreach ($arr_modfuncs as $func) {
                if (isset($arr_func_id[$func])) {
                    $func_id = $arr_func_id[$func];
                    $arr_show_func[] = $func_id;
                    $show_func = 1;
                    ++$subweight;
                    $db->query('UPDATE ' . $db_config['prefix'] . '_' . $lang . '_modfuncs SET subweight=' . $subweight . ', show_func=' . $show_func . ' WHERE func_id=' . $func_id);
                }
            }
        } else {
            // Xoa du lieu tai bang _modfuncs
            $sth = $db->prepare('DELETE FROM ' . $db_config['prefix'] . '_' . $lang . '_modfuncs WHERE in_module= :in_module');
            $sth->bindParam(':in_module', $module_name, PDO::PARAM_STR);
            $sth->execute();
        }

        // Creat upload dirs
        if (isset($module_version['uploads_dir']) and ! empty($module_version['uploads_dir'])) {
            $sth_dir = $db->prepare('INSERT INTO ' . NV_UPLOAD_GLOBALTABLE . '_dir (dirname, time, thumb_type, thumb_width, thumb_height, thumb_quality) VALUES (:dirname, 0, 0, 0, 0, 0)');

            foreach ($module_version['uploads_dir'] as $path) {
                $cp = '';
                $arr_p = explode('/', $path);

                foreach ($arr_p as $p) {
                    if (trim($p) != '') {
                        if (! is_dir(NV_UPLOADS_REAL_DIR . '/' . $cp . $p)) {
                            $mk = nv_mkdir(NV_UPLOADS_REAL_DIR . '/' . $cp, $p);
                            if ($mk[0]) {
                                try {
                                    $sth_dir->bindValue(':dirname', NV_UPLOADS_DIR . '/' . $cp . $p, PDO::PARAM_STR);
                                    $sth_dir->execute();
                                } catch (PDOException $e) {
                                }
                            }
                        }

                        $cp .= $p . '/';
                    }
                }
            }
        }

        // Creat assets dirs
        if (isset($module_version['files_dir']) and ! empty($module_version['files_dir'])) {
            foreach ($module_version['files_dir'] as $path) {
                $cp = '';
                $arr_p = explode('/', $path);

                foreach ($arr_p as $p) {
                    if (trim($p) != '') {
                        if (! is_dir(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $cp . $p)) {
                            nv_mkdir(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $cp, $p);
                        }
                        $cp .= $p . '/';
                    }
                }
            }
        }

        // Install sample data
        if ($sample) {
            $sample_lang_file = NV_ROOTDIR . '/install/update/modules/' . $module_file . '/language/data_' . $lang . '.php';
            $sample_default_file = NV_ROOTDIR . '/install/update/modules/' . $module_file . '/language/data_en.php';

            if (file_exists($sample_lang_file)) {
                include $sample_lang_file;
            } elseif (file_exists($sample_default_file)) {
                include $sample_default_file;
            }
        }

        $return = 'OK_' . $module_name;

        $nv_Cache->delAll();
    }

    return $return;
}

/**
 * nv_tmp_encrypt()
 * 
 * @param mixed $data
 * @return
 */
function nv_tmp_encrypt($data)
{
    global $global_config;
    $key = sha1($global_config['sitekey']);
    if (isset($key{64})) {
        $key = pack('H32', $key);
    }
    if (! isset($key{63})) {
        $key = str_pad($key, 64, chr(0));
    }
    $ipad = substr($key, 0, 64) ^ str_repeat(chr(0x36), 64);
    $opad = substr($key, 0, 64) ^ str_repeat(chr(0x5C), 64);
    
    $iv = substr($key, 0, 16);
    
    $data = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return strtr($data, '+/=', '-_,');
}

/**
 * nv_rewrite_change_tmp()
 *
 * @param mixed $rewrite_optional
 * @return
 */
function nv_rewrite_change_tmp($array_config_global)
{
    global $sys_info;
    $rewrite_rule = $filename = '';
    $endurl = ($array_config_global['rewrite_endurl'] == $array_config_global['rewrite_exturl']) ? nv_preg_quote($array_config_global['rewrite_endurl']) : nv_preg_quote($array_config_global['rewrite_endurl']) . '|' . nv_preg_quote($array_config_global['rewrite_exturl']);
    if ($sys_info['supports_rewrite'] == 'rewrite_mode_iis') {
        $filename = NV_ROOTDIR . '/web.config';
        $rulename = 0;
        $rewrite_rule .= "\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " <match url=\"^\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " <conditions>\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" pattern=\"/robots.txt$\" />\n";
        $rewrite_rule .= " </conditions>\n";
        $rewrite_rule .= " <action type=\"Rewrite\" url=\"robots.php?action={HTTP_HOST}\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_NAME_VARIABLE . "=SitemapIndex\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\-([a-z]{2})\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_LANG_VARIABLE . "={R:2}&amp;" . NV_NAME_VARIABLE . "=SitemapIndex\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\-([a-z]{2})\.([a-zA-Z0-9-]+)\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_LANG_VARIABLE . "={R:2}&amp;" . NV_NAME_VARIABLE . "={R:3}&amp;" . NV_OP_VARIABLE . "=sitemap\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule .= " <rule name=\"nv_rule_rewrite\">\n";
        $rewrite_rule .= " 	<match url=\"(.*)(" . $endurl . ")$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " 	<conditions logicalGrouping=\"MatchAll\">\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" matchType=\"IsFile\" ignoreCase=\"false\" negate=\"true\" />\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" matchType=\"IsDirectory\" ignoreCase=\"false\" negate=\"true\" />\n";
        $rewrite_rule .= " 	</conditions>\n";
        $rewrite_rule .= " 	<action type=\"Rewrite\" url=\"index.php\" />\n";
        $rewrite_rule .= " </rule>\n";
		
        $rewrite_rule .= " <rule name=\"nv_rule_rewrite_tag\">\n";
        $rewrite_rule .= " 	<match url=\"(.*)tag\/([^?]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " 	<action type=\"Rewrite\" url=\"index.php\" />\n";
        $rewrite_rule .= " </rule>\n";
		
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++ $rulename . "\" stopProcessing=\"true\">\n";
        $rewrite_rule .= " \t<match url=\"^([a-zA-Z0-9-\/]+)\/([a-zA-Z0-9-]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Redirect\" redirectType=\"Permanent\" url=\"" . NV_BASE_SITEURL . "{R:1}/{R:2}/\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++ $rulename . "\" stopProcessing=\"true\">\n";
        $rewrite_rule .= " \t<match url=\"^([a-zA-Z0-9-]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Redirect\" redirectType=\"Permanent\" url=\"" . NV_BASE_SITEURL . "{R:1}/\" />\n";
        $rewrite_rule .= " </rule>\n";
        $rewrite_rule = nv_rewrite_rule_iis7_tmp($rewrite_rule);
    } elseif ($sys_info['supports_rewrite'] == 'rewrite_mode_apache') {
        $filename = NV_ROOTDIR . '/.htaccess';
        $htaccess = '';
        $rewrite_rule = "##################################################################################\n";
        $rewrite_rule .= "#nukeviet_rewrite_start //Please do not change the contents of the following lines\n";
        $rewrite_rule .= "##################################################################################\n\n";
        $rewrite_rule .= "#Options +FollowSymLinks\n\n";
        $rewrite_rule .= "<IfModule mod_rewrite.c>\n";
        $rewrite_rule .= "RewriteEngine On\n";
        $rewrite_rule .= "#RewriteBase " . NV_BASE_SITEURL . "\n";
        if ($array_config_global['ssl_https'] == 1) {
            $rewrite_rule .= "RewriteCond %{SERVER_PORT} !^443$\n";
            $rewrite_rule .= "RewriteRule (.*)  https://%{SERVER_NAME}%{REQUEST_URI} [L,R]\n";
        }
        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} /robots.txt$ [NC]\n";
        $rewrite_rule .= "RewriteRule ^ robots.php?action=%{HTTP_HOST} [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\.xml$ index.php?" . NV_NAME_VARIABLE . "=SitemapIndex [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\-([a-z]{2})\.xml$ index.php?" . NV_LANG_VARIABLE . "=$2&" . NV_NAME_VARIABLE . "=SitemapIndex [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\-([a-z]{2})\.([a-zA-Z0-9-]+)\.xml$ index.php?" . NV_LANG_VARIABLE . "=$2&" . NV_NAME_VARIABLE . "=$3&" . NV_OP_VARIABLE . "=sitemap [L]\n";
        
        // Rewrite for other module's rule
        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} !-f\n";
        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} !-d\n";
        $rewrite_rule .= "RewriteRule (.*)(" . $endurl . ")\$ index.php\n";
        $rewrite_rule .= "RewriteRule (.*)tag\/([^?]+)$ index.php\n";
        $rewrite_rule .= "RewriteRule ^([a-zA-Z0-9-\/]+)\/([a-zA-Z0-9-]+)$ " . NV_BASE_SITEURL . "$1/$2/ [L,R=301]\n";
        $rewrite_rule .= "RewriteRule ^([a-zA-Z0-9-]+)$ " . NV_BASE_SITEURL . "$1/ [L,R=301]\n";
        $rewrite_rule .= "</IfModule>\n\n";
        $rewrite_rule .= "#nukeviet_rewrite_end\n";
        $rewrite_rule .= "##################################################################################\n\n";
        if (file_exists($filename)) {
            $htaccess = @file_get_contents($filename);
            if (! empty($htaccess)) {
                $htaccess = preg_replace("/[\n\s]*[\#]+[\n\s]+\#nukeviet\_rewrite\_start(.*)\#nukeviet\_rewrite\_end[\n\s]+[\#]+[\n\s]*/s", "\n", $htaccess);
                $htaccess = trim($htaccess);
            }
        }
        $htaccess .= "\n\n" . $rewrite_rule;
        $rewrite_rule = $htaccess;
    }
    $return = true;
    if (! empty($filename) and ! empty($rewrite_rule)) {
        try {
            $filesize = file_put_contents($filename, $rewrite_rule, LOCK_EX);
            if (empty($filesize)) {
                $return = false;
            }
        } catch (exception $e) {
            $return = false;
        }
    }
    return array( $return, NV_BASE_SITEURL . basename($filename) );
}

/**
 * nv_rewrite_rule_iis7_tmp()
 *
 * @param mixed $rewrite_rule
 * @return
 */
function nv_rewrite_rule_iis7_tmp($rewrite_rule = '')
{
    $filename = NV_ROOTDIR . '/web.config';
    if (! class_exists('DOMDocument')) {
        return false;
    }
    // If configuration file does not exist then we create one.
    if (! file_exists($filename)) {
        $fp = fopen($filename, 'w');
        fwrite($fp, '<configuration/>');
        fclose($fp);
    }
    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    if ($doc->load($filename) === false) {
        return false;
    }
    $xpath = new DOMXPath($doc);
    // Check the XPath to the rewrite rule and create XML nodes if they do not exist
    $xmlnodes = $xpath->query('/configuration/system.webServer/rewrite/rules');
    if ($xmlnodes->length > 0) {
        $child = $xmlnodes->item(0);
        $parent = $child->parentNode;
        $parent->removeChild($child);
    }
    if (! empty($rewrite_rule)) {
        $rules_node = $doc->createElement('rules');
        $xmlnodes = $xpath->query('/configuration/system.webServer/rewrite');
        if ($xmlnodes->length > 0) {
            $rewrite_node = $xmlnodes->item(0);
            $rewrite_node->appendChild($rules_node);
        } else {
            $rewrite_node = $doc->createElement('rewrite');
            $rewrite_node->appendChild($rules_node);
            $xmlnodes = $xpath->query('/configuration/system.webServer');
            if ($xmlnodes->length > 0) {
                $system_webServer_node = $xmlnodes->item(0);
                $system_webServer_node->appendChild($rewrite_node);
            } else {
                $system_webServer_node = $doc->createElement('system.webServer');
                $system_webServer_node->appendChild($rewrite_node);
                $xmlnodes = $xpath->query('/configuration');
                if ($xmlnodes->length > 0) {
                    $config_node = $xmlnodes->item(0);
                    $config_node->appendChild($system_webServer_node);
                } else {
                    $config_node = $doc->createElement('configuration');
                    $doc->appendChild($config_node);
                    $config_node->appendChild($system_webServer_node);
                }
            }
        }
        $rule_fragment = $doc->createDocumentFragment();
        $rule_fragment->appendXML($rewrite_rule);
        $rules_node->appendChild($rule_fragment);
    }
    $doc->formatOutput = true;
    return $doc->saveXML();
}

/**
 * nv_save_file_config_global_tmp()
 *
 * @return
 */
function nv_save_file_config_global_tmp()
{
    global $nv_Cache, $db, $sys_info, $global_config, $db_config;
    if ($global_config['idsite']) {
        return false;
    }
    $content_config = "<?php" . "\n\n";
    $content_config .= NV_FILEHEAD . "\n\n";
    $content_config .= "if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );\n\n";
    //disable_classes
    $sys_info['disable_classes'] = (($disable_classes = ini_get('disable_classes')) != '' and $disable_classes != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_classes)) : array();
    if (! empty($sys_info['disable_classes'])) {
        $disable_classes = "'" . implode("','", $sys_info['disable_classes']) . "'";
    } else {
        $disable_classes = '';
    }
    $content_config .= "\$sys_info['disable_classes']=array(" . $disable_classes . ");\n";
    //disable_functions
    $sys_info['disable_functions'] = (($disable_functions = ini_get('disable_functions')) != '' and $disable_functions != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_functions)) : array();
    if (extension_loaded('suhosin')) {
        $sys_info['disable_functions'] = array_merge($sys_info['disable_functions'], array_map('trim', preg_split("/[\s,]+/", ini_get('suhosin.executor.func.blacklist'))));
    }
    if (! empty($sys_info['disable_functions'])) {
        $disable_functions = "'" . implode("','", $sys_info['disable_functions']) . "'";
    } else {
        $disable_functions = '';
    }
    $content_config .= "\$sys_info['disable_functions']=array(" . $disable_functions . ");\n";
    //ini_set_support
    $sys_info['ini_set_support'] = (function_exists('ini_set') and ! in_array('ini_set', $sys_info['disable_functions'])) ? true : false;
    $ini_set_support = ($sys_info['ini_set_support']) ? 'true' : 'false';
    $content_config .= "\$sys_info['ini_set_support']= " . $ini_set_support . ";\n";
    //Kiem tra ho tro rewrite
	$iis_info = explode( '/', $_SERVER['SERVER_SOFTWARE']);
    if (function_exists('apache_get_modules')) {
        $apache_modules = apache_get_modules();
        if (in_array('mod_rewrite', $apache_modules)) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_apache';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    } elseif (strpos($iis_info[0], 'Microsoft-IIS') !== false AND $iis_info[1] >= 7) {
        if (isset($_SERVER['IIS_UrlRewriteModule']) and class_exists('DOMDocument')) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_iis';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    }
    if ($sys_info['supports_rewrite'] == 'rewrite_mode_iis' or $sys_info['supports_rewrite'] == 'rewrite_mode_apache') {
        $content_config .= "\$sys_info['supports_rewrite']='" . $sys_info['supports_rewrite'] . "';\n";
    } else {
        $content_config .= "\$sys_info['supports_rewrite']=false;\n";
    }
    $content_config .= "\n";
    $config_variable = array();
    $allowed_html_tags = '';
    $sql = "SELECT module, config_name, config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='sys' AND (module='global' OR module='define') ORDER BY config_name ASC";
    $result = $db->query($sql);
    while (list($c_module, $c_config_name, $c_config_value) = $result->fetch(3)) {
        if ($c_module == 'define') {
            if (preg_match('/^\d+$/', $c_config_value)) {
                $content_config .= "define('" . strtoupper($c_config_name) . "', " . $c_config_value . ");\n";
            } else {
                $content_config .= "define('" . strtoupper($c_config_name) . "', '" . $c_config_value . "');\n";
            }
            if ($c_config_name == 'nv_allowed_html_tags') {
                $allowed_html_tags = $c_config_value;
            }
        } else {
            $config_variable[$c_config_name] = $c_config_value;
        }
    }
    $nv_eol = strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ? '"\r\n"' : (strtoupper(substr(PHP_OS, 0, 3) == 'MAC') ? '"\r"' : '"\n"');
    $upload_max_filesize = min(nv_converttoBytes(ini_get('upload_max_filesize')), nv_converttoBytes(ini_get('post_max_size')), $config_variable['nv_max_size']);
    $content_config .= "define('NV_EOL', " . $nv_eol . ");\n";
    $content_config .= "define('NV_UPLOAD_MAX_FILESIZE', " . floatval($upload_max_filesize) . ");\n";
    $my_domains = array_map('trim', explode(',', $config_variable['my_domains']));
    $my_domains[] = NV_SERVER_NAME;
    $config_variable['my_domains'] = implode(',', array_unique($my_domains));
    $config_variable['check_rewrite_file'] = nv_check_rewrite_file();
    $config_variable['allow_request_mods'] = NV_ALLOW_REQUEST_MODS != '' ? NV_ALLOW_REQUEST_MODS : "request";
    $config_variable['request_default_mode'] = NV_REQUEST_DEFAULT_MODE != '' ? trim(NV_REQUEST_DEFAULT_MODE) : 'request';
    $config_variable['log_errors_list'] = NV_LOG_ERRORS_LIST;
    $config_variable['display_errors_list'] = NV_DISPLAY_ERRORS_LIST;
    $config_variable['send_errors_list'] = NV_SEND_ERRORS_LIST;
    $config_variable['error_log_path'] = NV_LOGS_DIR . '/error_logs';
    $config_variable['error_log_filename'] = NV_ERRORLOGS_FILENAME;
    $config_variable['error_log_fileext'] = NV_LOGS_EXT;
    $config_variable['error_send_email'] = $config_variable['error_send_email'];
    $config_name_array = array( 'file_allowed_ext', 'forbid_extensions', 'forbid_mimes', 'allow_sitelangs', 'openid_servers', 'allow_request_mods', 'config_sso' );
    foreach ($config_variable as $c_config_name => $c_config_value) {
        if ($c_config_name == 'config_sso') {
            $config_sso = empty($c_config_value) ? '' : nv_var_export(unserialize($c_config_value));
            $content_config .= "\$global_config['" . $c_config_name . "']=" . $config_sso . ";\n";
        } elseif (in_array($c_config_name, $config_name_array)) {
            if (! empty($c_config_value)) {
                $c_config_value = "'" . implode("','", array_map('trim', explode(',', $c_config_value))) . "'";
            } else {
                $c_config_value = '';
            }
            $content_config .= "\$global_config['" . $c_config_name . "']=array(" . $c_config_value . ");\n";
        } else {
            if (preg_match('/^\d+$/', $c_config_value) and $c_config_name != 'facebook_client_id') {
                $content_config .= "\$global_config['" . $c_config_name . "']=" . $c_config_value . ";\n";
            } else {
                $c_config_value = nv_unhtmlspecialchars($c_config_value);
                if (! preg_match("/^[a-z0-9\-\_\.\,\;\:\@\/\\s]+$/i", $c_config_value) and $c_config_name != 'my_domains') {
                    $c_config_value = nv_htmlspecialchars($c_config_value);
                }
                $content_config .= "\$global_config['" . $c_config_name . "']='" . $c_config_value . "';\n";
            }
        }
    }
    //allowed_html_tags
    if (! empty($allowed_html_tags)) {
        $allowed_html_tags = "'" . implode("','", array_map('trim', explode(',', $allowed_html_tags))) . "'";
    } else {
        $allowed_html_tags = '';
    }
    $content_config .= "\$global_config['allowed_html_tags']=array(" . $allowed_html_tags . ");\n";
    //Xac dinh cac search_engine
    $engine_allowed = (file_exists(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) ? nv_object2array(simplexml_load_file(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) : array();
    $content_config .= "\$global_config['engine_allowed']=" . nv_var_export($engine_allowed) . ";\n";
    $content_config .= "\n";
    $language_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/langs.ini', true);
    $tmp_array = array();
    $lang_array_exit = nv_scandir(NV_ROOTDIR . '/includes/language', "/^[a-z]{2}+$/");
    foreach ($lang_array_exit as $lang) {
        $tmp_array[$lang] = $language_array[$lang];
    }
    unset($language_array);
    $content_config .= "\$language_array=" . nv_var_export($tmp_array) . ";\n";
    $tmp_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/timezone.ini', true);
    $content_config .= "\$nv_parse_ini_timezone=" . nv_var_export($tmp_array) . ";\n";
    $global_config['rewrite_optional'] = $config_variable['rewrite_optional'];
    $global_config['rewrite_op_mod'] = $config_variable['rewrite_op_mod'];
    $global_config['rewrite_endurl'] = $config_variable['rewrite_endurl'];
    $global_config['rewrite_exturl'] = $config_variable['rewrite_exturl'];
    $content_config .= "\n";
    $nv_plugin_area = array();
    $_sql = 'SELECT * FROM ' . $db_config['prefix'] . '_plugin ORDER BY plugin_area ASC, weight ASC';
    $_query = $db->query($_sql);
    while ($row = $_query->fetch()) {
        $nv_plugin_area[$row['plugin_area']][] = $row['plugin_file'];
    }
    $content_config .= "\$nv_plugin_area=" . nv_var_export($nv_plugin_area) . ";\n\n";
    $return = file_put_contents(NV_ROOTDIR . "/" . NV_DATADIR . "/config_global.php", trim($content_config), LOCK_EX);
    $nv_Cache->delAll();
    //Resets the contents of the opcode cache
    if (function_exists('opcache_reset')) {
        opcache_reset();
    }
    return $return;
}
