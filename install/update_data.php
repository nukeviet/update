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
$nv_update_config['packageID'] = 'NVUD4500';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1624352400;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.5.00';
$nv_update_config['to_version'] = '4.5.00';
$nv_update_config['allow_old_version'] = [
    '4.4.02',
    '4.5.00'
];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modbanners4500'] = 'Cập nhật module Banners lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modcontact4500'] = 'Cập nhật module Contact lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modnews4500'] = 'Cập nhật module News lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modpage4500'] = 'Cập nhật module Page lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modusers4500'] = 'Cập nhật module Users lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_modvoting4500'] = 'Cập nhật module Voting lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_sys4500'] = 'Cập nhật hệ thống lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.5.00';

// English
$nv_update_config['lang']['en']['nv_up_modbanners4500'] = 'Update module Banners lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modcontact4500'] = 'Update module Contact lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modnews4500'] = 'Update module News lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modpage4500'] = 'Update module Page lên 4.5.00';
$nv_update_config['lang']['en']['nv_up_modusers4500'] = 'Update module Users to 4.5.00';
$nv_update_config['lang']['en']['nv_up_modvoting4500'] = 'Update module Voting to 4.5.00';
$nv_update_config['lang']['en']['nv_up_sys4500'] = 'Update system to 4.5.00';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.5.00';

$nv_update_config['tasklist'] = [];

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
    'r' => $nv_update_config['to_version'],
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
];

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

    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'banners', 'captcha_type', 'captcha');");
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
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
            // Thêm trường từ khóa
            try {
                $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $mod_data . "_send ADD is_processed TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER is_reply, ADD processed_by INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER is_processed, ADD processed_time INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER processed_by;");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type', 'captcha');");
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
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'mobile_indexfile', 'viewcat_page_new');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'ucaptcha_type', 'captcha');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'scaptcha_type', 'captcha');");
            } catch (PDOException $e) {
                trigger_error(print_r($e, true));
            }
            try {
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type_comm', 'captcha');");
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
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
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
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type_comm', 'captcha');");
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
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
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
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_groups DROP title;");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                try {
                    $db->query('ALTER TABLE ' . $db_config['prefix'] . '_' . $mod_data . "_field CHANGE COLUMN match_type match_type ENUM('none','alphanumeric','unicodename','email','url','regex','callback') NOT NULL DEFAULT 'none' AFTER sql_choices;");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                try {
                    $db->query('UPDATE ' . $db_config['prefix'] . '_' . $mod_data . "_field SET match_type='unicodename' WHERE  field IN ('first_name','last_name');");
                } catch (PDOException $e) {
                    trigger_error(print_r($e, true));
                }
                try {
                    $db->query('INSERT IGNORE INTO ' . $db_config['prefix'] . '_' . $mod_data . "_config (config, content, edit_time) VALUES ('auto_assign_oauthuser', '0', " . NV_CURRENTTIME . ')');
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
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
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
                $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'captcha_type', 'captcha');");
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
        $db->query("CREATE TABLE nv4_authors_api_credential (
                        admin_id int(11) unsigned NOT NULL,
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
                    ) ENGINE=MyISAM;");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query("CREATE TABLE nv4_authors_api_role (
                        role_id smallint(4) NOT NULL AUTO_INCREMENT,
                        role_title varchar(250) NOT NULL DEFAULT '',
                        role_description text NOT NULL,
                        role_data text NOT NULL,
                        addtime int(11) NOT NULL DEFAULT '0',
                        edittime int(11) NOT NULL DEFAULT '0',
                        PRIMARY KEY (role_id)
                    ) ENGINE=MyISAM;");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }

    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'define', 'nv_mobile_mode_img', '480');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_access', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'remote_api_log', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'allow_null_origin', '0');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'ip_allow_null_origin', '');");
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
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_SameSite', 'Lax');");
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
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ucaptcha_area', 'r,m,p');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ucaptcha_type', 'captcha');");
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
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_csp', 'script-src &#039;self&#039; *.google.com *.google-analytics.com *.googletagmanager.com *.gstatic.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me *.zaloapp.com &#039;unsafe-inline&#039; &#039;unsafe-eval&#039;;style-src &#039;self&#039; *.google.com &#039;unsafe-inline&#039;;frame-src &#039;self&#039; *.google.com *.youtube.com *.facebook.com *.facebook.net *.twitter.com *.zalo.me;base-uri &#039;self&#039;;');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'ogp_image', '');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp_act', '1');");
    } catch (PDOException $e) {
        trigger_error(print_r($e, true));
    }
    try {
        $db->query('INSERT INTO ' . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'nv_rp', 'no-referrer-when-downgrade, strict-origin-when-cross-origin');");
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

    try {
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

    nv_deletefile(NV_ROOTDIR . 'assets/fonts/FontAwesome.otf');
    nv_deletefile(NV_ROOTDIR . 'assets/fonts/fontawesome-webfont.eot');
    nv_deletefile(NV_ROOTDIR . 'assets/js/chart/Chart.bundle.min.js');
    nv_deletefile(NV_ROOTDIR . 'assets/js/chart/Chart.min.css');
    nv_deletefile(NV_ROOTDIR . 'assets/js/chart/Chart.min.js');
    nv_deletefile(NV_ROOTDIR . 'themes/default/fonts/NukeVietIcons.eot');
    $pdfjs_del = 'findbarButton-next-rtl.png,findbarButton-next-rtl@2x.png,findbarButton-next.png,findbarButton-next@2x.png,findbarButton-previous-rtl.png,findbarButton-previous-rtl@2x.png,findbarButton-previous.png,findbarButton-previous@2x.png,loading-small.png,loading-small@2x.png,';
    $pdfjs_del .= 'secondaryToolbarButton-documentProperties.png,secondaryToolbarButton-documentProperties@2x.png,secondaryToolbarButton-firstPage.png,secondaryToolbarButton-firstPage@2x.png,secondaryToolbarButton-handTool.png,secondaryToolbarButton-handTool@2x.png,';
    $pdfjs_del .= 'secondaryToolbarButton-lastPage.png,secondaryToolbarButton-lastPage@2x.png,secondaryToolbarButton-rotateCcw.png,secondaryToolbarButton-rotateCcw@2x.png,secondaryToolbarButton-rotateCw.png,secondaryToolbarButton-rotateCw@2x.png,secondaryToolbarButton-selectTool.png,';
    $pdfjs_del .= 'secondaryToolbarButton-selectTool@2x.png,shadow.png,texture.png,toolbarButton-bookmark.png,toolbarButton-bookmark@2x.png,toolbarButton-download.png,toolbarButton-download@2x.png,toolbarButton-menuArrows.png,toolbarButton-menuArrows@2x.png,toolbarButton-openFile.png,';
    $pdfjs_del .= 'toolbarButton-openFile@2x.png,toolbarButton-pageDown-rtl.png,toolbarButton-pageDown-rtl@2x.png,toolbarButton-pageDown.png,toolbarButton-pageDown@2x.png,toolbarButton-pageUp-rtl.png,toolbarButton-pageUp-rtl@2x.png,toolbarButton-pageUp.png,toolbarButton-pageUp@2x.png,';
    $pdfjs_del .= 'toolbarButton-presentationMode.png,toolbarButton-presentationMode@2x.png,toolbarButton-print.png,toolbarButton-print@2x.png,toolbarButton-search.png,toolbarButton-search@2x.png,toolbarButton-secondaryToolbarToggle-rtl.png,toolbarButton-secondaryToolbarToggle-rtl@2x.png,';
    $pdfjs_del .= 'toolbarButton-secondaryToolbarToggle.png,toolbarButton-secondaryToolbarToggle@2x.png,toolbarButton-sidebarToggle-rtl.png,toolbarButton-sidebarToggle-rtl@2x.png,toolbarButton-sidebarToggle.png,toolbarButton-sidebarToggle@2x.png,toolbarButton-viewAttachments.png,toolbarButton-viewAttachments@2x.png,';
    $pdfjs_del .= 'toolbarButton-viewOutline-rtl.png,toolbarButton-viewOutline-rtl@2x.png,toolbarButton-viewOutline.png,toolbarButton-viewOutline@2x.png,toolbarButton-viewThumbnail.png,toolbarButton-viewThumbnail@2x.png,toolbarButton-zoomIn.png,toolbarButton-zoomIn@2x.png,toolbarButton-zoomOut.png,';
    $pdfjs_del .= 'toolbarButton-zoomOut@2x.png,treeitem-collapsed-rtl.png,treeitem-collapsed-rtl@2x.png,treeitem-collapsed.png,treeitem-collapsed@2x.png,treeitem-expanded.png,treeitem-expanded@2x.png';
    $pdfjs_del = array_map('trim', explode(',', $pdfjs_del));
    foreach ($pdfjs_del as $_delfile) {
        nv_deletefile(NV_ROOTDIR . 'assets/js/pdf.js/images/' . $_delfile);
    }
    nv_deletefile(NV_ROOTDIR . 'themes/admin_default/modules/modules/change_custom_name_theme.tpl');
    nv_deletefile(NV_ROOTDIR . 'themes/admin_default/modules/modules/change_site_title_theme.tpl');

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

    $db->query('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query('UPDATE ' . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . ' ' . $nv_update_config['release_date'] . "' WHERE type='module' AND basename IN ('" . implode("', '", $array_modules) . "')");
    $db->query('UPDATE ' . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . ' ' . $nv_update_config['release_date'] . "' WHERE type='theme' AND basename IN ('" . implode("', '", $array_themes) . "')");

    //Tao lai config_global.php
    nv_save_file_config_global();

    //Chay lai .htaccess
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
