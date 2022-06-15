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

$nv_update_config = [];

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4502';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1655715600;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.5.02';
$nv_update_config['to_version'] = '4.5.02';
$nv_update_config['allow_old_version'] = [
    '4.5.00',
    '4.5.01',
    '4.5.02'
];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4501'] = 'Cập nhật module Users lên 4.5.01';
$nv_update_config['lang']['vi']['nv_up_sys4501'] = 'Cập nhật hệ thống lên 4.5.01';
$nv_update_config['lang']['vi']['nv_up_modnews4502'] = 'Cập nhật module News lên 4.5.02';
$nv_update_config['lang']['vi']['nv_up_sys4502'] = 'Cập nhật hệ thống lên 4.5.02';

$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.5.02';

// English
$nv_update_config['lang']['en']['nv_up_modusers4501'] = 'Update module Users to 4.5.01';
$nv_update_config['lang']['en']['nv_up_sys4501'] = 'Update system to 4.5.01';
$nv_update_config['lang']['en']['nv_up_modnews4502'] = 'Update module News lên 4.5.02';
$nv_update_config['lang']['en']['nv_up_sys4501'] = 'Update system to 4.5.02';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.5.02';

$nv_update_config['tasklist'] = [];

$nv_update_config['tasklist'][] = [
    'r' => '4.5.01',
    'rq' => 2,
    'l' => 'nv_up_modusers4501',
    'f' => 'nv_up_modusers4501'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.01',
    'rq' => 2,
    'l' => 'nv_up_sys4501',
    'f' => 'nv_up_sys4501'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.02',
    'rq' => 2,
    'l' => 'nv_up_modnews4502',
    'f' => 'nv_up_modnews4502'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.02',
    'rq' => 2,
    'l' => 'nv_up_sys4502',
    'f' => 'nv_up_sys4502'
];

$nv_update_config['tasklist'][] = [
    'r' => $nv_update_config['to_version'],
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
];

/**
 * @return string
 */
function nv_get_captchaconfig()
{
    global $global_config;

    $captcha = (!empty($global_config['recaptcha_sitekey']) and !empty($global_config['recaptcha_secretkey'])) ? 'recaptcha' : 'captcha';
    $data = [
        0 => '', // Không hiển thị
        1 => $captcha, // Khi admin đăng nhập
        2 => $captcha, // Khi thành viên đăng nhập
        3 => $captcha, // Khi khách đăng ký
        4 => $captcha, // Khi thành viên đăng nhập hoặc khách đăng ký
        5 => $captcha, // Khi admin hoặc thành viên đăng nhập
        6 => $captcha, // Khi admin đăng nhập hoặc khách đăng ký
        7 => $captcha, // Hiển thị trong mọi trường hợp
    ];

    if (isset($global_config['gfx_chk'])) {
        return (isset($data[$global_config['gfx_chk']]) ? $data[$global_config['gfx_chk']] : $captcha);
    }

    return $captcha;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_modusers4501()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    // Lấy tất cả ngôn ngữ đã cài đặt
    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Duyệt tất cả các ngôn ngữ đa
    $_module_users = [];
    foreach ($array_sitelangs as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file='users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            if (!in_array($mod_data, $_module_users)) {
                // mỗi module ảo chỉ chạy 1 lần
                $_module_users[] = $mod_data;

                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_openid DROP PRIMARY KEY,
                    CHANGE COLUMN openid openid CHAR(50) NOT NULL DEFAULT '' AFTER userid,
                    ADD COLUMN id CHAR(50) NOT NULL DEFAULT '' AFTER opid,
                    ADD UNIQUE INDEX opid (openid, opid);");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }

                // Thêm cấu hình
                try {
                    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('admin_email', '0', '0');");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
            }
        }
    }

    return $return;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_sys4501()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Duyệt tất cả các ngôn ngữ
    foreach ($global_config['allow_sitelangs'] as $lang) {
        // Xóa cấu hình loại captcha bình luận
        try {
            $db->query("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='" . $lang . "' AND config_name='captcha_type_comm';");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }

        // Lấy tất cả các module và module ảo của news
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Xóa cấu hình captcha news
            try {
                $db->query("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='" . $lang . "' AND module='" . $mod . "' AND config_name='ucaptcha_type';");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query("DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='" . $lang . "' AND module='" . $mod . "' AND config_name='scaptcha_type';");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            // Bổ sung cấu hình captcha chung cho news
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
        }

        // Bổ sung cấu hình captcha chung bình luận
        try {
            $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', 'comment', 'captcha_type', '" . nv_get_captchaconfig() . "');");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }

        // Gỡ cấu hình các block QR-Code
        try {
            $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_blocks_groups SET config='' WHERE file_name='global.QR_code.php';");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }
    }

    // Thay đổi key config của captcha
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_name='captcha_type' WHERE lang='sys' AND module='site' AND config_name='ucaptcha_type';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_name='captcha_area' WHERE lang='sys' AND module='site' AND config_name='ucaptcha_area';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Thêm Zalo
    try {
        $sql = "SELECT COUNT(mid) FROM " . $db_config['prefix'] . "_authors_module";
        $weight = intval($db->query($sql)->fetchColumn()) + 1;

        $db->query("INSERT INTO " . $db_config['prefix'] . "_authors_module (module, lang_key, weight, act_1, act_2, act_3) VALUES ('zalo', 'mod_zalo', " . $weight . ", 1, 0, 0);");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloAppID', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloAppSecretKey', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloOAAccessToken', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloOARefreshToken', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloOAAccessTokenTime', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Thêm field bảng oauth của admin
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_authors_oauth ADD COLUMN oauth_id VARCHAR(50) NOT NULL DEFAULT '' AFTER oauth_email;");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Thêm field bảng oauth của admin
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='connect,create,auto' WHERE lang='sys' AND module='site' AND config_name='openid_processing';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
}

/**
 * nv_up_modnews4502()
 *
 * @return
 *
 */
function nv_up_modnews4502()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;
    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];
    // Duyệt tất cả các ngôn ngữ
    foreach ($global_config['allow_sitelangs'] as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Chức năng lịch sử bài viết trong quản trị cho module news
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'active_history', '0');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query("CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_row_histories (
                  id int(11) unsigned NOT NULL AUTO_INCREMENT,
                  new_id int(11) unsigned NOT NULL DEFAULT '0',
                  historytime int(11) unsigned NOT NULL DEFAULT '0',
                  catid smallint(5) unsigned NOT NULL DEFAULT '0',
                  listcatid varchar(255) NOT NULL DEFAULT '',
                  topicid smallint(5) unsigned NOT NULL DEFAULT '0',
                  admin_id mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ID người đăng',
                  author varchar(250) NOT NULL DEFAULT '',
                  sourceid mediumint(8) unsigned NOT NULL DEFAULT '0',
                  publtime int(11) unsigned NOT NULL DEFAULT '0',
                  exptime int(11) unsigned NOT NULL DEFAULT '0',
                  archive tinyint(1) unsigned NOT NULL DEFAULT '0',
                  title varchar(250) NOT NULL DEFAULT '',
                  alias varchar(250) NOT NULL DEFAULT '',
                  hometext text NOT NULL,
                  homeimgfile varchar(255) DEFAULT '',
                  homeimgalt varchar(255) DEFAULT '',
                  inhome tinyint(1) unsigned NOT NULL DEFAULT '0',
                  allowed_comm varchar(255) DEFAULT '',
                  allowed_rating tinyint(1) unsigned NOT NULL DEFAULT '0',
                  external_link tinyint(1) unsigned NOT NULL DEFAULT '0',
                  instant_active tinyint(1) NOT NULL DEFAULT '0',
                  instant_template varchar(100) NOT NULL DEFAULT '',
                  instant_creatauto tinyint(1) NOT NULL DEFAULT '0',
                  titlesite varchar(255) NOT NULL DEFAULT '',
                  description text NOT NULL,
                  bodyhtml longtext NOT NULL,
                  keywords varchar(255) default '',
                  sourcetext varchar(255) default '',
                  files TEXT NULL DEFAULT NULL,
                  tags TEXT NULL DEFAULT NULL,
                  internal_authors VARCHAR(255) NOT NULL DEFAULT '',
                  imgposition tinyint(1) NOT NULL default '1',
                  layout_func varchar(100) DEFAULT '',
                  copyright tinyint(1) NOT NULL default '0',
                  allowed_send tinyint(1) NOT NULL default '0',
                  allowed_print tinyint(1) NOT NULL default '0',
                  allowed_save tinyint(1) NOT NULL default '0',
                  changed_fields text NOT NULL COMMENT 'Các field thay đổi',
                  PRIMARY KEY (id),
                  KEY new_id (new_id),
                  KEY historytime (historytime),
                  KEY admin_id (admin_id)
                ) ENGINE=MyISAM COMMENT 'Lịch sử bài viết';");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            // Bổ sung dữ liệu bảng log module news để thống kê
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_logs ADD log_key varchar(60) NOT NULL DEFAULT '' COMMENT 'Khóa loại log, tùy vào lập trình' AFTER userid, ADD INDEX log_key (log_key);");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_logs ADD INDEX status (status);");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_logs CHANGE note note varchar(255) NOT NULL DEFAULT '';");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
        }
    }
    return $return;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_sys4502()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Phương thức xác thực API
    try {
        $db->query("ALTER TABLE " . NV_AUTHORS_GLOBALTABLE . "_api_credential ADD auth_method ENUM('none','password_verify') NOT NULL DEFAULT 'password_verify' COMMENT 'Phương thức xác thực' AFTER credential_ips;");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Fix Lỗi không thể tạo tài khoản tường lửa
    try {
        $db->query("ALTER TABLE " . NV_AUTHORS_GLOBALTABLE . "_config CHANGE COLUMN mask mask TINYINT(4) NOT NULL DEFAULT '0' AFTER keyname;");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Thêm thiết lập an ninh: Lọc các mã HTML nguy hiểm
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'XSSsanitize', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'admin_XSSsanitize', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Mở rộng trường admins bảng module
    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    foreach ($array_sitelangs as $lang) {
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules CHANGE admins admins VARCHAR(4000) NOT NULL DEFAULT '';");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }
    }

    // Mở rộng trường lưu kích thước file upload
    try {
        $db->query("ALTER TABLE " . NV_UPLOAD_GLOBALTABLE . "_file CHANGE filesize filesize DOUBLE NOT NULL DEFAULT '0';");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Xóa file thừa
    nv_deletefile(NV_ROOTDIR . '/' . NV_ASSETS_DIR . '/editors/ckeditor/plugins/flash', true);
    nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/info_pl.php');
    nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/setting.php');
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/info_pl.tpl');
    nv_deletefile(NV_ROOTDIR . '/themes/default/blocks/global.QR_code.ini');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/blocks/global.QR_code.ini');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/modules/users/openid_administrator.tpl');
    nv_deletefile(NV_ROOTDIR . '/vendor/endroid', true);
    nv_deletefile(NV_ROOTDIR . '/vendor/symfony/options-resolver', true);

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

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Cập nhật phiên bản
    $array_modules = [
        'banners',
        'comment',
        'contact',
        'feeds',
        'freecontent',
        'menu',
        'news',
        'page',
        'seek',
        'statistics',
        'users',
        'voting',
        'two-step-verification'
    ];
    $array_themes = [
        'default',
        'mobile_default'
    ];

    try {
        $db->query("INSERT IGNORE INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ogp_image', '')");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    $db->query('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query('UPDATE ' . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . ' ' . $nv_update_config['release_date'] . "' WHERE type='module' AND basename IN ('" . implode("', '", $array_modules) . "')");
    $db->query('UPDATE ' . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . ' ' . $nv_update_config['release_date'] . "' WHERE type='theme' AND basename IN ('" . implode("', '", $array_themes) . "')");

    // Tao lai config_global.php
    nv_save_file_config_global();

    // Chay lai .htaccess
    $array_config_rewrite = [
        'rewrite_enable' => $global_config['rewrite_enable'],
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
        'ssl_https' => $global_config['ssl_https']
    ];
    $rewrite = nv_rewrite_change($array_config_rewrite);
    return $return;
}
