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
$nv_update_config['packageID'] = 'NVUD4027';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1456136052;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'http://nukeviet.vn';
$nv_update_config['to_version'] = '4.0.27';
$nv_update_config['allow_old_version'] = array(
    '4.0.24',
    '4.0.25',
    '4.0.26'
);

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_v4026'] = 'Cập nhật CSDL lên phiên bản 4.0.26';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.0.27';
// English
$nv_update_config['lang']['en']['nv_up_v4026'] = 'Update new version 4.0.26';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.0.27';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.26',
    'rq' => 1,
    'l' => 'nv_up_v4026',
    'f' => 'nv_up_v4026'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.0.27',
    'rq' => 1,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_v4026()
 *
 * @return
 *
 */
function nv_up_v4026()
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
    
    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_searchkeys CHANGE skey skey VARCHAR(250) NOT NULL DEFAULT ''");
        } catch (PDOException $e) {
            //
        }
        
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows CHANGE author author VARCHAR(250) NOT NULL DEFAULT ''");
            } catch (PDOException $e) {
                //
            }
            
            // Duyệt các chủ đề của News
            $mquery_cat = $db->query("SELECT catid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat");
            while (list ($_catid) = $mquery_cat->fetch(3)) {
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $_catid . " CHANGE author author VARCHAR(250) NOT NULL DEFAULT ''");
                } catch (PDOException $e) {
                    //
                }
            }
        }
    }
    // Update module banner
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_banners_clients CHANGE full_name full_name VARCHAR(250) NOT NULL DEFAULT ''");
    } catch (PDOException $e) {
        //
    }
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_banners_plans CHANGE title title VARCHAR(250) NOT NULL DEFAULT ''");
    } catch (PDOException $e) {
        //
    }
    
    //Cập nhật lại ID các ứng dụng hệ thống
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET id = 312 WHERE type = 'module' AND title = 'freecontent'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET id = 307 WHERE type = 'theme' AND title = 'default'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET id = 311 WHERE type = 'theme' AND title = 'mobile_default'");
    
    //Bảng nhóm
    try {
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . " ADD group_type tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:Sys, 1:approval, 2:public' AFTER content");
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . " ADD group_color varchar(10) NOT NULL AFTER group_type");
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . " ADD group_avatar varchar(255) NOT NULL AFTER group_color");
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . " ADD is_default tinyint(1) unsigned NOT NULL DEFAULT '0' AFTER group_avatar");
        $db->query("UPDATE " . NV_GROUPS_GLOBALTABLE . " SET group_type = 2 WHERE group_id > 9 AND publics = '1'");
        
        //Bảng thành viên của nhóm
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . "_users ADD is_leader tinyint(1) unsigned NOT NULL DEFAULT '0' AFTER userid");
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . "_users ADD approved tinyint(1) unsigned NOT NULL DEFAULT '0' AFTER is_leader");
    
        //Chạy lệnh cập nhật approved=1 cho tất cả các row hiện tại.
        $db->query("UPDATE " . NV_GROUPS_GLOBALTABLE . "_users SET approved = 1");
        
        // Bảng thành viên
        $db->query("ALTER TABLE " . NV_USERS_GLOBALTABLE . " ADD group_id smallint(5) unsigned NOT NULL DEFAULT '0' AFTER userid");
        
        $db->query("ALTER TABLE " . NV_GROUPS_GLOBALTABLE . " DROP publics");
    } catch (PDOException $e) {
        //
    }
    
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.26' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'");
    nv_mkdir(NV_UPLOADS_REAL_DIR . '/users', 'groups');
    $nv_Cache->delAll();
    nv_save_file_config_global();
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
        
    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . " ADD `imageposition` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `imagealt`");
            } catch (PDOException $e) {
                //
            }
        }
    }
    
    // Cập nhật chức năng thành viên mới đăng ký
    $db->query("INSERT INTO " . NV_GROUPS_GLOBALTABLE . " (group_id, title, description, content, group_type, group_color, group_avatar, is_default, add_time, exp_time, weight, act, idsite, numbers, siteus) VALUES (7, 'New Users', 'New Users', '', 0, '', '', 0, " . NV_CURRENTTIME . ", 0, 5, 1, 0, 0, 0)");
    
    // Cập nhật weight bảng NV_GROUPS_GLOBALTABLE
    $db->query("INSERT INTO " . NV_USERS_GLOBALTABLE . "_config (config, content, edit_time) VALUES ('active_group_newusers', '0', " . NV_CURRENTTIME . ")");
    
    //  Fix setup for webserver Apache 8.1.0 
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_setup_extensions CHANGE `virtual` is_virtual TINYINT(1) NOT NULL DEFAULT '0'");
    
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.27' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'");
    $nv_Cache->delAll();
    nv_save_file_config_global();
    return $return;
}