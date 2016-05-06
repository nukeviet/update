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
$nv_update_config['packageID'] = 'NVUD4028';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1456136052;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'http://nukeviet.vn';
$nv_update_config['to_version'] = '4.0.28';
$nv_update_config['allow_old_version'] = array('4.0.27');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modnews'] = 'Cập nhật module news';
$nv_update_config['lang']['vi']['nv_up_modusers'] = 'Cập nhật module users';
$nv_update_config['lang']['vi']['nv_up_delunuse_files'] = 'Xóa các file thừa';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.0.28';
// English
$nv_update_config['lang']['en']['nv_up_modnews'] = 'Update module news';
$nv_update_config['lang']['en']['nv_up_modusers'] = 'Update module users';
$nv_update_config['lang']['en']['nv_up_delunuse_files'] = 'Delete unuse files';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.0.28';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 1,
    'l' => 'nv_up_modnews',
    'f' => 'nv_up_modnews'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 1,
    'l' => 'nv_up_modusers',
    'f' => 'nv_up_modusers'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 1,
    'l' => 'nv_up_delunuse_files',
    'f' => 'nv_up_delunuse_files'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 1,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

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
    while (list($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
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
    
    try {
        $db->query("RENAME TABLE " . $db_config['prefix'] . "_groups TO " . $db_config['prefix'] . "_users_groups");
        $db->query("RENAME TABLE " . $db_config['prefix'] . "_groups_users TO " . $db_config['prefix'] . "_users_groups_users");
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_users_groups ADD email varchar(100) DEFAULT '' AFTER title");
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_users_groups ADD config varchar(250) DEFAULT '' AFTER siteus");      
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_setup_extensions CHANGE `virtual` `is_virtual` TINYINT( 1 ) NOT NULL DEFAULT '0'");
        } catch (PDOException $e) {
            //
        }
        $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET is_virtual = '1' WHERE type = 'module' AND title = 'users'");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }

    return $return;
}

/**
 * nv_up_delunuse_files()
 *
 * @return
 *
 */
function nv_up_delunuse_files()
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
    
    nv_deletefile(NV_ROOTDIR . '/admin/seotools/siteDiagnostic.php', false);
    nv_deletefile(NV_ROOTDIR . '/includes/cronjobs/siteDiagnostic_update.php', false);
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/seotools/siteDiagnostic.tpl', false);
    nv_deletefile(NV_ROOTDIR . '/themes/default/system/dump.tpl', false);
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.lazyload.js', false);
    nv_deletefile(NV_ROOTDIR . '/assets/js/ui', true);

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
    global $nv_update_baseurl, $db, $db_config, $nv_Cache;
    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );
    
    $db->query("DELETE FROM " . NV_CRONJOBS_GLOBALTABLE . " WHERE run_file = 'siteDiagnostic_update.php'");
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.28' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'");
    
    $nv_Cache->delAll();
    nv_save_file_config_global();
    
    return $return;
}
