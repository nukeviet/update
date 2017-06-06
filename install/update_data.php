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
$nv_update_config['packageID'] = 'NVUD4103';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1492966799;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.1.03';
$nv_update_config['to_version'] = '4.1.03';
$nv_update_config['allow_old_version'] = array('4.1.02');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4103'] = 'Cập nhật module users lên 4.1.03';
$nv_update_config['lang']['vi']['nv_up_systemcfg4103'] = 'Cập nhật các cấu hình hệ thống bản 4.1.03';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.1.03';

// English
$nv_update_config['lang']['vi']['nv_up_modusers4103'] = 'Update module users to 4.1.03';
$nv_update_config['lang']['vi']['nv_up_systemcfg4103'] = 'Update system config to 4.1.03';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Update new version 4.1.03';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.03',
    'rq' => 2,
    'l' => 'nv_up_modusers4103',
    'f' => 'nv_up_modusers4103'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.03',
    'rq' => 2,
    'l' => 'nv_up_systemcfg4103',
    'f' => 'nv_up_systemcfg4103'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.03',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_modusers4103()
 *
 * @return
 *
 */
function nv_up_modusers4103()
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
            // Thêm cấu hình tuổi để đăng ký
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('min_old_user', '16', '0');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm trường hệ thống vào bảng field
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_field ADD system TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Trường dữ liệu hệ thống' AFTER default_value;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm trường vào bảng reg
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg ADD gender CHAR(1) NOT NULL DEFAULT '' AFTER last_name;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg ADD birthday INT(11) NOT NULL AFTER gender;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg ADD sig TEXT NULL DEFAULT NULL AFTER birthday;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm cấu hình bắt buộc xác thực hai bước cho nhóm
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_groups ADD require_2step_admin TINYINT(1) UNSIGNED NOT NULL AFTER group_avatar;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_groups ADD require_2step_site TINYINT(1) UNSIGNED NOT NULL AFTER require_2step_admin;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_systemcfg4103()
 *
 * @return
 *
 */
function nv_up_systemcfg4103()
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Thêm cấu hình bật tắt sitemap
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules ADD sitemap TINYINT(4) NOT NULL DEFAULT '1' AFTER rss;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
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

    nv_save_file_config_global();
    
    return $return;
}
