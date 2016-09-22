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
 * nv_up_mod2step()
 *
 * @return
 *
 */
function nv_up_mod2step()
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
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='4.1.00 " . $nv_update_config['release_date'] . "' WHERE type='module' and basename IN ('banners', 'comment','contact','feeds','freecontent','menu','news','page','seek','statistics','users','voting', 'two-step-verification')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='4.1.00 " . $nv_update_config['release_date'] . "' WHERE type='theme' and basename IN ('default', 'mobile_default')");
    
    $nv_Cache->delAll();
    
    nv_rewrite_change($global_config);
    nv_save_file_config_global();

    return $return;
}