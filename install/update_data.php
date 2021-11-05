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
$nv_update_config['packageID'] = 'NVUD4501';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1636189200;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.5.01';
$nv_update_config['to_version'] = '4.5.01';
$nv_update_config['allow_old_version'] = [
    '4.4.02',
    '4.4.03',
    '4.4.04',
    '4.5.00',
    '4.5.01'
];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_sys4403'] = 'Cập nhật hệ thống lên 4.4.03';
$nv_update_config['lang']['vi']['nv_up_sys4404'] = 'Cập nhật hệ thống lên 4.4.04';
$nv_update_config['lang']['vi']['nv_up_modbanners4500'] = 'Cập nhật module Banners lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modcontact4500'] = 'Cập nhật module Contact lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modnews4500'] = 'Cập nhật module News lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modpage4500'] = 'Cập nhật module Page lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modusers4500'] = 'Cập nhật module Users lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modvoting4500'] = 'Cập nhật module Voting lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_sys4500'] = 'Cập nhật hệ thống lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modusers4501'] = 'Cập nhật module Users lên 4.5.01';
$nv_update_config['lang']['vi']['nv_up_sys4501'] = 'Cập nhật hệ thống lên 4.5.01';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.5.01';

// English
$nv_update_config['lang']['en']['nv_up_sys4403'] = 'Update system to 4.4.03';
$nv_update_config['lang']['en']['nv_up_sys4404'] = 'Update system to 4.4.04';
$nv_update_config['lang']['en']['nv_up_modbanners4500'] = 'Update module Banners lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modcontact4500'] = 'Update module Contact lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modnews4500'] = 'Update module News lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modpage4500'] = 'Update module Page lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modusers4500'] = 'Update module Users to 4.5.00';
$nv_update_config['lang']['en']['nv_up_modvoting4500'] = 'Update module Voting to 4.5.00';
$nv_update_config['lang']['en']['nv_up_sys4500'] = 'Update system to 4.5.00';
$nv_update_config['lang']['en']['nv_up_modusers4501'] = 'Update module Users to 4.5.01';
$nv_update_config['lang']['en']['nv_up_sys4501'] = 'Update system to 4.5.01';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.5.01';

$nv_update_config['tasklist'] = [];

$nv_update_config['tasklist'][] = [
    'r' => '4.4.03',
    'rq' => 2,
    'l' => 'nv_up_sys4403',
    'f' => 'nv_up_sys4403'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.4.04',
    'rq' => 2,
    'l' => 'nv_up_sys4404',
    'f' => 'nv_up_sys4404'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modbanners4500',
    'f' => 'nv_up_modbanners4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modcontact4500',
    'f' => 'nv_up_modcontact4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modnews4500',
    'f' => 'nv_up_modnews4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modpage4500',
    'f' => 'nv_up_modpage4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modusers4500',
    'f' => 'nv_up_modusers4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modvoting4500',
    'f' => 'nv_up_modvoting4500'
];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_sys4500',
    'f' => 'nv_up_sys4500'
];
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
function nv_up_sys4403()
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

    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'allow_null_origin', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'ip_allow_null_origin', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp', 'script-src &#039;self&#039; *.google.com *.google-analytics.com *.googletagmanager.com *.gstatic.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me *.zaloapp.com &#039;unsafe-inline&#039; &#039;unsafe-eval&#039;;style-src &#039;self&#039; *.google.com &#039;unsafe-inline&#039;;frame-src &#039;self&#039; *.google.com *.youtube.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me;base-uri &#039;self&#039;;');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp', 'no-referrer-when-downgrade, strict-origin-when-cross-origin');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_SameSite', 'Lax');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Duyệt tất cả các ngôn ngữ của modusers
    // Lấy tất cả ngôn ngữ đã cài đặt
    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    $_module_users = [];
    foreach ($array_sitelangs as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file='users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            if (!in_array($mod_data, $_module_users)) {
                // mỗi module ảo chỉ chạy 1 lần
                $_module_users[] = $mod_data;

                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_field CHANGE COLUMN match_type match_type ENUM('none','alphanumeric','unicodename','email','url','regex','callback') NOT NULL DEFAULT 'none' AFTER sql_choices;");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                /**
                 * @deprecated không ép cấu hình họ tên về tên người
                 try {
                 $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET match_type='unicodename' WHERE  field IN ('first_name','last_name');");
                 } catch (PDOException $e) {
                 trigger_error(print_r($e, true));
                 }
                 */
                try {
                    $db->query('INSERT IGNORE INTO ' . $db_config['prefix'] . '_' . $mod_data . "_config (config, content, edit_time) VALUES ('auto_assign_oauthuser', '0', " . NV_CURRENTTIME . ')');
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
            }
        }
    }

    //API
    try {
        $db->query("CREATE TABLE " . $db_config['prefix'] . "_authors_api_role (
            role_id smallint(4) NOT NULL AUTO_INCREMENT,
            role_title varchar(250) NOT NULL DEFAULT '',
            role_description text NOT NULL,
            role_data text NOT NULL,
            addtime int(11) NOT NULL DEFAULT '0',
            edittime int(11) NOT NULL DEFAULT '0',
            PRIMARY KEY (role_id)
        ) ENGINE = MYISAM COMMENT 'Bảng lưu quyền truy cập API'");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("CREATE TABLE " . $db_config['prefix'] . "_authors_api_credential (
            admin_id int(11) UNSIGNED NOT NULL,
            credential_title varchar(255) NOT NULL DEFAULT '',
            credential_ident varchar(50) NOT NULL DEFAULT '',
            credential_secret varchar(250) NOT NULL DEFAULT '',
            credential_ips varchar(255) NOT NULL DEFAULT '',
            api_roles varchar(255) NOT NULL DEFAULT '',
            addtime int(11) NOT NULL DEFAULT '0',
            edittime int(11) NOT NULL DEFAULT '0',
            last_access int(11) NOT NULL DEFAULT '0',
            UNIQUE KEY credential_ident (credential_ident),
            UNIQUE KEY credential_secret (credential_secret),
            KEY admin_id (admin_id)
        ) ENGINE = MYISAM COMMENT 'Bảng lưu key API của quản trị'");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("INSERT INTO " . $db_config['prefix'] . "_config (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_access', '0')");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("INSERT INTO " . $db_config['prefix'] . "_config (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_log', '1')");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
}

/**
 *
 * @return number[]|string[]
 */
function nv_up_sys4404()
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

    $sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    foreach ($array_sitelangs as $lang) {
        // Gỡ cấu hình các block QR-Code
        try {
            $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_blocks_groups SET config='' WHERE file_name='global.QR_code.php';");
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
        }
    }

    return $return;
}

/**
 * nv_up_modbanners4500()
 *
 * @return
 *
 */
function nv_up_modbanners4500()
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

    // Cấu hình captcha banners
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'banners', 'captcha_type', '" . nv_get_captchaconfig() . "');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
}

/**
 * nv_up_modcontact4500()
 *
 * @return
 *
 */
function nv_up_modcontact4500()
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
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file = 'contact'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Thêm trường từ khóa
            try {
                $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_send ADD is_processed TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER is_reply, ADD processed_by INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER is_processed, ADD processed_time INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER processed_by;");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            // Captcha của module liên hệ
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
        }
    }
    return $return;
}

/**
 * nv_up_modnews4500()
 *
 * @return
 *
 */
function nv_up_modnews4500()
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
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'mobile_indexfile', 'viewcat_page_new');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'ucaptcha_type', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'scaptcha_type', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type_comm', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'allowed_rating', '1');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET config_name='captcha_area_comm' WHERE  lang='" . $lang . "' AND module='" . $mod . "' AND config_name='captcha'");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_tags ADD title VARCHAR(250) NOT NULL DEFAULT '' AFTER numnews");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_author (
                    id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
                    uid INT(11) UNSIGNED NOT NULL,
                    alias VARCHAR(100) NOT NULL DEFAULT '',
                    pseudonym VARCHAR(100) NOT NULL DEFAULT '',
                    image VARCHAR(255) NULL DEFAULT '',
                    description TEXT NULL DEFAULT NULL,
                    add_time INT(11) UNSIGNED NOT NULL DEFAULT '0',
                    edit_time INT(11) UNSIGNED NOT NULL DEFAULT '0',
                    active TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
                    numnews MEDIUMINT(8) NOT NULL DEFAULT '0',
                    PRIMARY KEY (id),
                    UNIQUE KEY uid (uid),
                    UNIQUE KEY alias (alias)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_authorlist (
                    id INT(11) NOT NULL,
                    aid MEDIUMINT(8) NOT NULL,
                    alias VARCHAR(100) NOT NULL DEFAULT '',
                    pseudonym VARCHAR(100) NOT NULL DEFAULT '',
                    UNIQUE KEY id_aid (id, aid),
                    KEY aid (aid),
                    KEY alias (alias)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
        }
    }
    return $return;
}

/**
 * nv_up_modpage4500()
 *
 * @return
 *
 */
function nv_up_modpage4500()
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
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query('INSERT INTO ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_config (config_name, config_value) VALUES ('socialbutton', 'facebook,twitter')");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET config_name='captcha_area_comm' WHERE  lang='" . $lang . "' AND module='" . $mod . "' AND config_name='captcha'");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type_comm', '" . nv_get_captchaconfig() . "');");
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
function nv_up_modusers4500()
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
                    $db->query('CREATE TABLE ' . $db_config['prefix'] . '_' . $mod_data . "_groups_detail (
                        group_id SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
                        lang CHAR(2) NOT NULL DEFAULT '',
                        title VARCHAR(240) NOT NULL,
                        description VARCHAR(240) NOT NULL DEFAULT '',
                        content TEXT,
                        UNIQUE INDEX group_id_lang (lang, group_id)
                    ) ENGINE=MyISAM;");

                    $_query = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $mod_data . '_groups');
                    while ($_row = $_query->fetch()) {
                        foreach ($array_sitelangs as $_lang) {
                            $db->query('INSERT INTO ' . $db_config['prefix'] . '_' . $mod_data . "_groups_detail
                                (lang, group_id, title, description, content) VALUES
                                ('" . $_lang . "', " . $_row['group_id'] . ', ' . $db->quote($_row['title']) . ', ' . $db->quote($_row['description']) . ', ' . $db->quote($_row['content']) . ');');
                        }
                    }
                    $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $mod_data . '_groups ADD COLUMN alias VARCHAR(240) NOT NULL AFTER group_id');
                    $db->query('UPDATE ' . $db_config['prefix'] . '_' . $mod_data . "_groups SET alias = REPLACE(title, ' ', '-');");
                    $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $mod_data . '_groups DROP COLUMN description, DROP COLUMN content, DROP INDEX ktitle, ADD UNIQUE INDEX kalias (alias, idsite);');
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
            }
        }
    }

    return $return;
}

/**
 * nv_up_modvoting4500()
 *
 * @return
 *
 */
function nv_up_modvoting4500()
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
        $mquery = $db->query('SELECT title, module_data FROM ' . $db_config['prefix'] . '_' . $lang . "_modules WHERE module_file = 'voting'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query('CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . '_voted (vid SMALLINT(5) UNSIGNED NOT NULL, voted TEXT, UNIQUE KEY vid (vid)) ENGINE=MyISAM;');
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . " ADD vote_one TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 cho phép vote nhiều lần 1 cho phép vote 1 lần' AFTER act;");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }

            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type', '" . nv_get_captchaconfig() . "');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'difftimeout', '3600');");
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
function nv_up_sys4500()
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

    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'define', 'nv_mobile_mode_img', '480');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'nv_static_url', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_ver', '2');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_notice_popup', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'googleAnalytics4ID', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'site_reopening_time', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'zaloOfficialAccountID', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    // Xác định khu vực captcha module users
    $ucaptcha_area = 'r,m,p';
    $data = [
        0 => '', // Không hiển thị
        1 => 'a,m,p', // Khi admin đăng nhập
        2 => 'l,m,p', // Khi thành viên đăng nhập
        3 => 'r,m,p', // Khi khách đăng ký
        4 => 'l,r,m,p', // Khi thành viên đăng nhập hoặc khách đăng ký
        5 => 'a,l,m,p', // Khi admin hoặc thành viên đăng nhập
        6 => 'a,r,m,p', // Khi admin đăng nhập hoặc khách đăng ký
        7 => 'a,l,r,m,p', // Hiển thị trong mọi trường hợp
    ];
    if (isset($global_config['gfx_chk'])) {
        $ucaptcha_area = (isset($data[$global_config['gfx_chk']]) ? $data[$global_config['gfx_chk']] : $ucaptcha_area);
    }

    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ucaptcha_area', '" . $ucaptcha_area . "');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ucaptcha_type', '" . nv_get_captchaconfig() . "');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'dkim_included', 'sendmail,mail');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'smime_included', 'sendmail,mail');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ogp_image', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET module='global' WHERE lang='sys' AND module='site' AND config_name IN ('closed_site','site_reopening_time');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('DELETE FROM ' . NV_CONFIG_GLOBALTABLE . " WHERE  lang='sys' AND module='global' AND config_name IN ('captcha_type','gfx_chk');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
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

    nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.bundle.min.js');
    nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.min.css');
    nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/info_pl.php');
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/info_pl.tpl');
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/modules/change_custom_name_theme.tpl');
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/modules/change_site_title_theme.tpl');
    nv_deletefile(NV_ROOTDIR . '/themes/default/blocks/global.QR_code.ini');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/blocks/global.QR_code.ini');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/modules/users/openid_administrator.tpl');
    nv_deletefile(NV_ROOTDIR . '/vendor/endroid', true);
    nv_deletefile(NV_ROOTDIR . '/vendor/symfony/options-resolver', true);
    nv_deletefile(NV_ROOTDIR . '/assets/fonts/fontawesome-webfont.eot');
    nv_deletefile(NV_ROOTDIR . '/assets/fonts/FontAwesome.otf');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/texture.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed@2x.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded.png');
    nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded@2x.png');
    nv_deletefile(NV_ROOTDIR . '/themes/default/fonts/NukeVietIcons.eot');

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
