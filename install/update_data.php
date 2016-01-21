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
$nv_update_config['packageID'] = 'NVUD4025';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = "";

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1453362921;
$nv_update_config['author'] = "VINADES.,JSC (contact@vinades.vn)";
$nv_update_config['support_website'] = "http://forum.nukeviet.vn/";
$nv_update_config['to_version'] = "4.0.25";
$nv_update_config['allow_old_version'] = array(
    "4.0.24"
);

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Đánh dấu phiên bản mới';
// English
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.25',
    'rq' => 1,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

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
    $language_query = $db->query("SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1");
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

    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.25' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'");
    $nv_Cache->delAll();
    return $return;
}