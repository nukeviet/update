<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (!defined('NV_IS_UPDATE'))
    die('Stop!!!');

$nv_update_config = array();

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4300';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1510138800;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.3.00';
$nv_update_config['to_version'] = '4.3.00';
$nv_update_config['allow_old_version'] = array('4.2.01', '4.2.02', '4.2.03');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modnews4300'] = 'Cập nhật module news lên 4.3.00';
$nv_update_config['lang']['vi']['nv_up_modcomment4300'] = 'Cập nhật module comment lên 4.3.00';
$nv_update_config['lang']['vi']['nv_up_modpage4300'] = 'Cập nhật module page lên 4.3.00';
$nv_update_config['lang']['vi']['nv_up_syscfg4300'] = 'Cập nhật hệ thống lên 4.3.00';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.3.00';

// English
$nv_update_config['lang']['en']['nv_up_modnews4300'] = 'Update module news to 4.3.00';
$nv_update_config['lang']['en']['nv_up_modcomment4300'] = 'Update module comment to 4.3.00';
$nv_update_config['lang']['en']['nv_up_modpage4300'] = 'Update module page to 4.3.00';
$nv_update_config['lang']['en']['nv_up_syscfg4300'] = 'Update system to 4.3.00';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.3.00';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.3.00',
    'rq' => 2,
    'l' => 'nv_up_modnews4300',
    'f' => 'nv_up_modnews4300'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.3.00',
    'rq' => 2,
    'l' => 'nv_up_modcomment4300',
    'f' => 'nv_up_modcomment4300'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.3.00',
    'rq' => 2,
    'l' => 'nv_up_modpage4300',
    'f' => 'nv_up_modpage4300'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.3.00',
    'rq' => 2,
    'l' => 'nv_up_syscfg4300',
    'f' => 'nv_up_syscfg4300'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.3.00',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_modnews4300()
 *
 * @return
 *
 */
function nv_up_modnews4300()
{
    global $nv_update_baseurl, $db, $db_config, $global_config;
    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );

    foreach ($global_config['allow_sitelangs'] as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            /* Thêm cấu hình sắp xếp:
             - order_articles = 0: Sắp xếp theo ngày
             - order_articles = 1: Sắp xếp theo số thứ tự
             */
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'order_articles', '1')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'frontend_edit_alias', '0')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'frontend_edit_layout', '1')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Thêm trường weight
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD `weight` INT NOT NULL DEFAULT '0' AFTER `status`");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_detail ADD `layout_func` varchar(100) DEFAULT '' AFTER `imgposition`");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            $cquery = $db->query("SELECT catid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat");
            while (list ($_catid) = $cquery->fetch(3)) {
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $_catid . " ADD `weight` INT NOT NULL DEFAULT '0' AFTER `status`");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
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
                    if ($_catid > 0) {
                        try {
                            $db->query('UPDATE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . '_' . $_catid . ' SET weight=' . $weight . ' WHERE id=' . $_id);
                        } catch (PDOException $e) {
                            trigger_error($e->getMessage());
                        }
                    }
                }
            }

            // Chức năng đình chỉ hoạt động chuyên mục news
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat ADD status smallint(4) NOT NULL DEFAULT '1' AFTER groups_view, ADD INDEX status (status)");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat SET status=1 WHERE inhome=1");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat SET status=2 WHERE inhome=0");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat DROP inhome");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Thêm trường đính kèm cho news
            try {
                $db->query("ALTER TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_detail` ADD `files` TEXT NULL AFTER `sourcetext`;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_modcomment4300()
 *
 * @return
 *
 */
function nv_up_modcomment4300()
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

    if (!is_dir(NV_UPLOADS_REAL_DIR . '/comment')) {
        $mk = nv_mkdir(NV_UPLOADS_REAL_DIR, 'comment');
        if ($mk[0] > 0) {
            try {
                $db->query("INSERT INTO " . NV_UPLOAD_GLOBALTABLE . "_dir (dirname, time) VALUES ('" . NV_UPLOADS_DIR . "/comment', 0)");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    // Duyệt tất cả các ngôn ngữ
    foreach ($global_config['allow_sitelangs'] as $lang) {
        // Chỉnh lại bảng bình luận
        try {
            $db->query("ALTER TABLE `" . $db_config['prefix'] . "_" . $lang . "_comment` ADD `attach` VARCHAR(255) NOT NULL DEFAULT '' AFTER `content`;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }

        // Lấy các module có bình luận
        $sql = "SELECT * FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='" . $lang . "' AND config_name IN('activecomm', 'emailcomm', 'adminscomm')";
        $result = $db->query($sql);
        $all = $result->fetchAll();
        $array_modules = array();
        foreach ($all as $row) {
            if (!isset($array_modules[$row['module']])) {
                $array_modules[$row['module']] = 1;
            } else {
                $array_modules[$row['module']]++;
            }
        }

        foreach ($array_modules as $module_name => $countConfig) {
            if ($countConfig == 3) {
                // Thêm cấu hình
                try {
                    $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
                try {
                    $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
            }
        }

        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'comment'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            $subweight = $db->query("SELECT COUNT(*) FROM " . $db_config['prefix'] . "_" . $lang . "_modfuncs WHERE in_module='" . $mod . "'")->fetchColumn();
            $subweight++;
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_modfuncs (
                    func_name, alias, func_custom_name, func_site_title, in_module, show_func, in_submenu, subweight, setting
                ) VALUES (
                    'down', 'down', 'Down', '', '" . $mod . "', 0, 0, " . $subweight . ", ''
                )");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modpage4300()
 *
 * @return
 *
 */
function nv_up_modpage4300()
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
    foreach ($global_config['allow_sitelangs'] as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang. "_" . $mod_data . "_config VALUES ('alias_lower', '0')");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}


/**
 * nv_up_syscfg4300()
 *
 * @return
 *
 */
function nv_up_syscfg4300()
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
        $db->query("DELETE FROM `" . NV_CONFIG_GLOBALTABLE . "` WHERE `module` = 'global' AND  `config_name` = 'ssl_https_modules'");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET lang = 'sys', `module` = 'site' WHERE `module` = 'global' AND `config_name` = 'ssl_https'");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("INSERT INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'verify_peer_ssl', '1')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("INSERT INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'site', 'verify_peer_name_ssl', '1')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("ALTER TABLE `" . NV_AUTHORS_GLOBALTABLE . "` ADD `main_module` VARCHAR(50) NOT NULL DEFAULT 'siteinfo' AFTER `position`");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("INSERT INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'upload_chunk_size', '0');");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET `module` = 'site' WHERE `lang` = 'sys' AND `module` = 'global' AND `config_name` = 'google_client_id';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET `module` = 'site' WHERE `lang` = 'sys' AND `module` = 'global' AND `config_name` = 'google_client_secret';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET `module` = 'site' WHERE `lang` = 'sys' AND `module` = 'global' AND `config_name` = 'facebook_client_id';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET `module` = 'site' WHERE `lang` = 'sys' AND `module` = 'global' AND `config_name` = 'facebook_client_secret';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE `" . NV_CONFIG_GLOBALTABLE . "` SET `module` = 'site' WHERE `lang` = 'sys' AND `module` = 'global' AND `config_name` = 'config_sso';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
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

    $array_config_rewrite = array(
        'rewrite_enable' => $global_config['rewrite_enable'],
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
        'ssl_https' => $global_config['ssl_https']
    );
    nv_rewrite_change($array_config_rewrite);

    return $return;
}
