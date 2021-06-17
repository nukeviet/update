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

// Lấy tất cả ngôn ngữ đã cài đặt
$sql = "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup=1 ORDER BY weight ASC";
$array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

// Duyệt tất cả các ngôn ngữ đa
$_module_users = [];
foreach ($array_sitelangs as $lang) {
    // Lấy tất cả các module và module ảo của nó
    $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file='users'");
    while (list ($mod, $mod_data) = $mquery->fetch(3)) {
        if (!in_array($mod_data, $_module_users)) {
            // mỗi module ảo chỉ chạy 1 lần
            $_module_users[] = $mod_data;

            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_groups DROP title;");
            } catch (PDOException $e) {
            }
        }
    }
}
