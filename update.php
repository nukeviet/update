<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 31/05/2010, 00:36
 */

define('NV_ADMIN', true);

// Xac dinh thu muc goc cua site
define('NV_ROOTDIR', pathinfo(str_replace(DIRECTORY_SEPARATOR, '/', __file__), PATHINFO_DIRNAME));

require NV_ROOTDIR . '/includes/mainfile.php';

// Admin dang nhap
if (! defined('NV_IS_ADMIN') or ! isset($admin_info) or empty($admin_info)) {
    nv_redirect_location(NV_BASE_ADMINURL);
}

if (file_exists(NV_ROOTDIR . '/includes/language/' . NV_LANG_INTERFACE . '/admin_global.php')) {
    require NV_ROOTDIR . '/includes/language/' . NV_LANG_INTERFACE . '/admin_global.php';
} elseif (file_exists(NV_ROOTDIR . '/includes/language/' . NV_LANG_DATA . '/admin_global.php')) {
    require NV_ROOTDIR . '/includes/language/' . NV_LANG_DATA . '/admin_global.php';
} elseif (file_exists(NV_ROOTDIR . '/includes/language/en/admin_global.php')) {
    require NV_ROOTDIR . '/includes/language/en/admin_global.php';
}

include_once NV_ROOTDIR . '/includes/core/admin_functions.php';

// Cập nhật module news
// Duyệt tất cả các ngôn ngữ
$language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
while (list ($lang) = $language_query->fetch(3)) {
    // Lấy tất cả các module và module ảo của nó
    $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
    while (list ($mod, $mod_data) = $mquery->fetch(3)) {
        /* Thêm cấu hình sắp xếp:
         - order_articles = 0: Sắp xếp theo ngày
         - order_articles = 1: Sắp xếp theo số thứ tự
         */
        try {
            $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'order_articles', '0')");
        } catch (PDOException $e) {
            echo("Thêm cấu hình thất bại - cấu hình đã có<br />");
        }
        // Thêm trường weight
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD `weight` INT NOT NULL DEFAULT '0' AFTER `status`");
        } catch (PDOException $e) {
            echo("Thêm trường weight bảng rows thất bại: " . $e->getMessage() . "<br />");
        }
        $cquery = $db->query("SELECT catid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat");
        while (list ($_catid) = $cquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $_catid . " ADD `weight` INT NOT NULL DEFAULT '0' AFTER `status`");
            } catch (PDOException $e) {
                echo("Thêm trường weight bảng " . $mod_data . "_" . $_catid . " thất bại: " . $e->getMessage() . "<br />");
            }
        }
        // Sắp xếp lại thứ tự các bài viết đã có
        $weight = 0;
        $cquery = $db->query("SELECT id, listcatid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows  ORDER BY `publtime` ASC");
        while (list ($_id, $_listcatid) = $cquery->fetch(3)) {
            $weight = $weight + 1;
            $db->query('UPDATE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . '_rows SET weight=' . $weight . ' WHERE id=' . $_id);
            $_array_cat = explode(',', $_listcatid);
            foreach ($_array_cat as $_catid) {
                $sql = 'UPDATE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . '_' . $_catid . ' SET weight=' . $weight . ' WHERE id=' . $_id;
                try {
                    $db->query($sql);
                } catch (PDOException $e) {
                    echo("Chạy câu lệnh " . $sql . " thất bại: " . $e->getMessage() . "<br />");
                }
            }
        }
    }
}

// Cập nhật lại số phiên bản
$nv_update_config = array();
$nv_update_config['to_version'] = '4.2.03';
$nv_update_config['release_date'] = 1504773820;
$db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
$db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='module' and basename IN ('banners', 'comment','contact','feeds','freecontent','menu','news','page','seek','statistics','users','voting', 'two-step-verification')");
$db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='theme' and basename IN ('default', 'mobile_default')");

// Viết lại file .htaccess
$array_config_rewrite = array(
    'rewrite_enable' => $global_config['rewrite_enable'],
    'rewrite_optional' => $global_config['rewrite_optional'],
    'rewrite_endurl' => $global_config['rewrite_endurl'],
    'rewrite_exturl' => $global_config['rewrite_exturl'],
    'rewrite_op_mod' => $global_config['rewrite_op_mod'],
    'ssl_https' => $global_config['ssl_https']
);
nv_rewrite_change($array_config_rewrite);
nv_server_config_change($global_config);

$nv_Cache->delAll();

die('Cap nhat hoan tat');
