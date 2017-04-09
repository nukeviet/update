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
$nv_update_config['packageID'] = 'NVUD4101';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1491757200;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.1.01';
$nv_update_config['to_version'] = '4.1.01';
$nv_update_config['allow_old_version'] = array('4.1.00');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_delunusefiles'] = 'Xóa các file thừa';
$nv_update_config['lang']['vi']['nv_up_modnews'] = 'Cập nhật module news';
$nv_update_config['lang']['vi']['nv_up_modusers'] = 'Cập nhật module users';
$nv_update_config['lang']['vi']['nv_up_modbanners'] = 'Cập nhật module banners';
$nv_update_config['lang']['vi']['nv_up_modpage'] = 'Cập nhật module page';
$nv_update_config['lang']['vi']['nv_up_modcontact'] = 'Cập nhật module contact';
$nv_update_config['lang']['vi']['nv_up_modmenu'] = 'Cập nhật module menu';
$nv_update_config['lang']['vi']['nv_up_systemcfg'] = 'Cập nhật các cấu hình hệ thống';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.1.01';
// English
$nv_update_config['lang']['en']['nv_up_delunusefiles'] = 'Delete unused files';
$nv_update_config['lang']['en']['nv_up_modnews'] = 'Update module news';
$nv_update_config['lang']['en']['nv_up_modusers'] = 'Update module users';
$nv_update_config['lang']['en']['nv_up_modbanners'] = 'Update module banners';
$nv_update_config['lang']['en']['nv_up_modpage'] = 'Update module page';
$nv_update_config['lang']['en']['nv_up_modcontact'] = 'Update module contact';
$nv_update_config['lang']['en']['nv_up_modmenu'] = 'Update module menu';
$nv_update_config['lang']['en']['nv_up_systemcfg'] = 'Update system config';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.1.01';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_delunusefiles',
    'f' => 'nv_up_delunusefiles'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modnews',
    'f' => 'nv_up_modnews'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modusers',
    'f' => 'nv_up_modusers'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modbanners',
    'f' => 'nv_up_modbanners'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modpage',
    'f' => 'nv_up_modpage'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modcontact',
    'f' => 'nv_up_modcontact'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 1,
    'l' => 'nv_up_modmenu',
    'f' => 'nv_up_modmenu'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 2,
    'l' => 'nv_up_systemcfg',
    'f' => 'nv_up_systemcfg'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.1.01',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_delunusefiles()
 *
 * @return
 *
 */
function nv_up_delunusefiles()
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

    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.watermarker.js');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/Jcrop.gif');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.Jcrop.min.css');
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.Jcrop.min.js');
    nv_deletefile(NV_ROOTDIR . '/themes/default/css/jquery.Jcrop.min.css');
    nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/css/jquery.Jcrop.min.css');

    return $return;
}

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
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Facebook Instant Articles
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_modfuncs (
                    func_id, func_name, alias, func_custom_name, in_module, show_func, in_submenu, subweight, setting
                ) VALUES (NULL, 'instant-rss', 'instant-rss', 'Instant Articles RSS', '" . $mod . "', '0', '0', '0', '');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_active', '0');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_template', 'default');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_httpauth', '0');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_username', '');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_password', '');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_livetime', '60');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_gettime', '120');");
                $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $mod . "', 'instant_articles_auto', '1');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows 
                ADD external_link TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0' AFTER allowed_rating ,
                ADD instant_active TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER click_rating ,
                ADD instant_template VARCHAR( 100 ) NOT NULL DEFAULT '' AFTER instant_active, 
                ADD instant_creatauto TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER instant_template ;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX instant_active (instant_active);");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX edittime (edittime);");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD INDEX instant_creatauto (instant_creatauto);");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Lấy tất cả các chủ đề
            $sql = "SELECT catid FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat";
            $result = $db->query($sql);
            while ($row = $result->fetch()) {
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " 
                    ADD external_link TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0' AFTER allowed_rating ,
                    ADD instant_active TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER click_rating ,
                    ADD instant_template VARCHAR( 100 ) NOT NULL DEFAULT '' AFTER instant_active, 
                    ADD instant_creatauto TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER instant_template ;");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
                try {
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX instant_active (instant_active);");
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX edittime (edittime);");
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_" . $row['catid'] . " ADD INDEX instant_creatauto (instant_creatauto);");
                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
            }
            // Thêm bảng tmp
            try {
                $db->query("CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_tmp (
                  id mediumint(8) UNSIGNED NOT NULL,
                  admin_id int(11) NOT NULL DEFAULT '0',
                  time_edit int(11) NOT NULL,
                  time_late int(11) NOT NULL,
                  ip varchar(50) NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
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

    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Ghi log đăng nhập của thành viên
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('active_user_logs', '1', " . NV_CURRENTTIME . ")");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Cập nhật độ dài trường pass
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . " CHANGE password password VARCHAR(150) NOT NULL DEFAULT '';");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_reg CHANGE password password VARCHAR(150) NOT NULL DEFAULT '';");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modbanners()
 *
 * @return
 *
 */
function nv_up_modbanners()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'banners'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Cấu hình khối quảng cáo có yêu cầu sử dụng ảnh không.
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_plans CHANGE description description TEXT;");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_plans ADD require_image tinyint(1) unsigned NOT NULL DEFAULT '1' AFTER act;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Lỗi không đủ ký tự cho trường PASS
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_clients CHANGE  pass  pass VARCHAR( 200 ) NOT NULL ;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Thêm trình soạn thảo HTML vào QC
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_rows ADD bannerhtml MEDIUMTEXT NOT NULL AFTER target;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modpage()
 *
 * @return
 *
 */
function nv_up_modpage()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "  ADD hitstotal MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0'  AFTER status;");
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "  ADD hot_post TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'  AFTER hitstotal;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modcontact()
 *
 * @return
 *
 */
function nv_up_modcontact()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'contact'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_send ADD sender_address VARCHAR(250) NOT NULL AFTER sender_name;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            try {
                $db->query("CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_supporter (
                  id smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
                  departmentid smallint(5) UNSIGNED NOT NULL,
                  full_name varchar(255) NOT NULL,
                  image varchar(255) NOT NULL DEFAULT '',
                  phone varchar(255) NOT NULL,
                  email varchar(100) NOT NULL,
                  others text NOT NULL,
                  act tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
                  weight smallint(5) NOT NULL,
                  PRIMARY KEY (id)
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modmenu()
 *
 * @return
 *
 */
function nv_up_modmenu()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'menu'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_rows ADD image VARCHAR(255) NULL DEFAULT '' AFTER icon;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_systemcfg()
 *
 * @return
 *
 */
function nv_up_systemcfg()
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

    // Recaptcha
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_sitekey', '')");
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_secretkey', '')");
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'recaptcha_type', 'image')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Duyệt tất cả các ngôn ngữ
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list ($lang) = $language_query->fetch(3)) {
        // Cho phép mỗi module ảo dùng 1 giao diện module riêng (Cùng theme)
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules ADD module_theme VARCHAR(50) NOT NULL DEFAULT '' AFTER module_upload;");
            $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_modules SET module_theme=module_file");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thêm trường cho bảng module và các function của module
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules CHANGE admin_title admin_title VARCHAR(255) NOT NULL DEFAULT '';");
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules ADD site_title VARCHAR(255) NOT NULL DEFAULT '' AFTER custom_title;");
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modfuncs ADD func_site_title VARCHAR(255) NOT NULL DEFAULT '' AFTER func_custom_name;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thay đổi độ dài trường
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modfuncs CHANGE in_module in_module VARCHAR(50) NOT NULL;");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        
        // Thay đổi độ dài trường
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_modules CHANGE title title VARCHAR(50) NOT NULL, CHANGE module_file module_file VARCHAR(50) NOT NULL DEFAULT '', CHANGE module_data module_data VARCHAR(50) NOT NULL DEFAULT '', CHANGE module_upload module_upload VARCHAR(50) NOT NULL DEFAULT '';");
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
    }
    
    // Thêm cấu hình googleMapsAPI
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'googleMapsAPI', '')"); 
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Mở thiết lập google+ đối với điều hành chung
    try {
        $db->query("UPDATE " . $db_config['prefix'] . "_authors_module SET act_2 = '1' WHERE module = 'seotools';"); 
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi luật rewrite
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'rewrite_enable', '1')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi cấu hình cho module users
    try {
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET  module='site' WHERE lang = 'sys' AND module='global' AND config_name IN ('site_phone', 'nv_upass_type', 'nv_unick_type', 'allowmailchange', 'allowuserpublic', 'allowquestion', 'allowloginchange', 'allowuserlogin', 'allowuserloginmulti', 'allowuserreg', 'is_user_forum', 'openid_servers', 'openid_processing', 'user_check_pass_time', 'auto_login_after_reg', 'whoviewuser')");
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET  module='site' WHERE lang = 'sys' AND module='define' AND config_name IN ('dir_forum','nv_unickmin','nv_unickmax','nv_upassmin','nv_upassmax')");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    // Thay đổi mã hóa
    if (!empty($global_config['ftp_user_pass']) or !empty($global_config['smtp_password'])) {
        global $crypt;
        
        if (!empty($global_config['ftp_user_pass'])) {
            $ftp_user_pass = $crypt->aes_decrypt(nv_base64_decode($global_config['ftp_user_pass']));
            $ftp_user_pass = nv_tmp_encrypt($ftp_user_pass);
            
            try {
                $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=" . $db->quote($ftp_user_pass) . " WHERE lang='sys' AND module='global' AND config_name='ftp_user_pass'");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
        
        if (!empty($global_config['smtp_password'])) {
            $smtp_password = $crypt->aes_decrypt(nv_base64_decode($global_config['smtp_password']));
            $smtp_password = nv_tmp_encrypt($smtp_password);
            
            try {
                $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value=" . $db->quote($smtp_password) . " WHERE lang='sys' AND module='site' AND config_name='smtp_password'");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    // Cập nhật độ dài bảng authors_module
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_authors_module CHANGE module module VARCHAR(50) NOT NULL;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    // Cập nhật độ dài bảng config
    try {
        $db->query("ALTER TABLE " . NV_CONFIG_GLOBALTABLE . " CHANGE module module VARCHAR(50) NOT NULL DEFAULT 'global';");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    // Cập nhật độ dài bảng logs
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_logs CHANGE module_name module_name VARCHAR(50) NOT NULL;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    
    return $return;
}

/**
 * nv_tmp_encrypt()
 * 
 * @param mixed $data
 * @return
 */
function nv_tmp_encrypt($data)
{
    global $global_config;

    $key = sha1($global_config['sitekey']);
    if (isset($key{64})) {
        $key = pack('H32', $key);
    }
    if (! isset($key{63})) {
        $key = str_pad($key, 64, chr(0));
    }
    $ipad = substr($key, 0, 64) ^ str_repeat(chr(0x36), 64);
    $opad = substr($key, 0, 64) ^ str_repeat(chr(0x5C), 64);
    
    $iv = substr($key, 0, 16);
    
    $data = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return strtr($data, '+/=', '-_,');
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
    
    $array_config_rewrite = array(
        'rewrite_enable' => 1,
        'rewrite_optional' => $global_config['rewrite_optional'],
        'rewrite_endurl' => $global_config['rewrite_endurl'],
        'rewrite_exturl' => $global_config['rewrite_exturl'],
        'rewrite_op_mod' => $global_config['rewrite_op_mod'],
        'ssl_https' => $global_config['ssl_https']
    );
    try {
        $rewrite = nv_rewrite_change_tmp($array_config_rewrite);
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    if (empty($rewrite[0])) {
        trigger_error('Error write file: ' . $rewrite[1]);
    }
    
    try {
        nv_save_file_config_global_tmp();
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    return $return;
}

/**
 * nv_rewrite_change_tmp()
 *
 * @param mixed $rewrite_optional
 * @return
 */
function nv_rewrite_change_tmp($array_config_global)
{
    global $sys_info;
    $rewrite_rule = $filename = '';
    $endurl = ($array_config_global['rewrite_endurl'] == $array_config_global['rewrite_exturl']) ? nv_preg_quote($array_config_global['rewrite_endurl']) : nv_preg_quote($array_config_global['rewrite_endurl']) . '|' . nv_preg_quote($array_config_global['rewrite_exturl']);

    if ($sys_info['supports_rewrite'] == 'rewrite_mode_iis') {
        $filename = NV_ROOTDIR . '/web.config';
        $rulename = 0;
        $rewrite_rule .= "\n";
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " <match url=\"^\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " <conditions>\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" pattern=\"/robots.txt$\" />\n";
        $rewrite_rule .= " </conditions>\n";
        $rewrite_rule .= " <action type=\"Rewrite\" url=\"robots.php?action={HTTP_HOST}\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_NAME_VARIABLE . "=SitemapIndex\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\-([a-z]{2})\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_LANG_VARIABLE . "={R:2}&amp;" . NV_NAME_VARIABLE . "=SitemapIndex\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule .= " <rule name=\"nv_rule_" . ++$rulename . "\">\n";
        $rewrite_rule .= " \t<match url=\"^(.*?)sitemap\-([a-z]{2})\.([a-zA-Z0-9-]+)\.xml$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Rewrite\" url=\"index.php?" . NV_LANG_VARIABLE . "={R:2}&amp;" . NV_NAME_VARIABLE . "={R:3}&amp;" . NV_OP_VARIABLE . "=sitemap\" appendQueryString=\"false\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule .= " <rule name=\"nv_rule_rewrite\">\n";
        $rewrite_rule .= " 	<match url=\"(.*)(" . $endurl . ")$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " 	<conditions logicalGrouping=\"MatchAll\">\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" matchType=\"IsFile\" ignoreCase=\"false\" negate=\"true\" />\n";
        $rewrite_rule .= " 		<add input=\"{REQUEST_FILENAME}\" matchType=\"IsDirectory\" ignoreCase=\"false\" negate=\"true\" />\n";
        $rewrite_rule .= " 	</conditions>\n";
        $rewrite_rule .= " 	<action type=\"Rewrite\" url=\"index.php\" />\n";
        $rewrite_rule .= " </rule>\n";
		
        $rewrite_rule .= " <rule name=\"nv_rule_rewrite_tag\">\n";
        $rewrite_rule .= " 	<match url=\"(.*)tag\/([^?]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " 	<action type=\"Rewrite\" url=\"index.php\" />\n";
        $rewrite_rule .= " </rule>\n";
		
        $rewrite_rule .= " <rule name=\"nv_rule_" . ++ $rulename . "\" stopProcessing=\"true\">\n";
        $rewrite_rule .= " \t<match url=\"^([a-zA-Z0-9-\/]+)\/([a-zA-Z0-9-]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Redirect\" redirectType=\"Permanent\" url=\"" . NV_BASE_SITEURL . "{R:1}/{R:2}/\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule .= " <rule name=\"nv_rule_" . ++ $rulename . "\" stopProcessing=\"true\">\n";
        $rewrite_rule .= " \t<match url=\"^([a-zA-Z0-9-]+)$\" ignoreCase=\"false\" />\n";
        $rewrite_rule .= " \t<action type=\"Redirect\" redirectType=\"Permanent\" url=\"" . NV_BASE_SITEURL . "{R:1}/\" />\n";
        $rewrite_rule .= " </rule>\n";

        $rewrite_rule = nv_rewrite_rule_iis7_tmp($rewrite_rule);
    } elseif ($sys_info['supports_rewrite'] == 'rewrite_mode_apache') {
        $filename = NV_ROOTDIR . '/.htaccess';
        $htaccess = '';

        $rewrite_rule = "##################################################################################\n";
        $rewrite_rule .= "#nukeviet_rewrite_start //Please do not change the contents of the following lines\n";
        $rewrite_rule .= "##################################################################################\n\n";
        $rewrite_rule .= "#Options +FollowSymLinks\n\n";
        $rewrite_rule .= "<IfModule mod_rewrite.c>\n";
        $rewrite_rule .= "RewriteEngine On\n";
        $rewrite_rule .= "#RewriteBase " . NV_BASE_SITEURL . "\n";

        if ($array_config_global['ssl_https'] == 1) {
            $rewrite_rule .= "RewriteCond %{SERVER_PORT} !^443$\n";
            $rewrite_rule .= "RewriteRule (.*)  https://%{SERVER_NAME}%{REQUEST_URI} [L,R]\n";
        }

        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} /robots.txt$ [NC]\n";
        $rewrite_rule .= "RewriteRule ^ robots.php?action=%{HTTP_HOST} [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\.xml$ index.php?" . NV_NAME_VARIABLE . "=SitemapIndex [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\-([a-z]{2})\.xml$ index.php?" . NV_LANG_VARIABLE . "=$2&" . NV_NAME_VARIABLE . "=SitemapIndex [L]\n";
        $rewrite_rule .= "RewriteRule ^(.*?)sitemap\-([a-z]{2})\.([a-zA-Z0-9-]+)\.xml$ index.php?" . NV_LANG_VARIABLE . "=$2&" . NV_NAME_VARIABLE . "=$3&" . NV_OP_VARIABLE . "=sitemap [L]\n";
        
        // Rewrite for other module's rule
        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} !-f\n";
        $rewrite_rule .= "RewriteCond %{REQUEST_FILENAME} !-d\n";
        $rewrite_rule .= "RewriteRule (.*)(" . $endurl . ")\$ index.php\n";
        $rewrite_rule .= "RewriteRule (.*)tag\/([^?]+)$ index.php\n";

        $rewrite_rule .= "RewriteRule ^([a-zA-Z0-9-\/]+)\/([a-zA-Z0-9-]+)$ " . NV_BASE_SITEURL . "$1/$2/ [L,R=301]\n";
        $rewrite_rule .= "RewriteRule ^([a-zA-Z0-9-]+)$ " . NV_BASE_SITEURL . "$1/ [L,R=301]\n";
        $rewrite_rule .= "</IfModule>\n\n";
        $rewrite_rule .= "#nukeviet_rewrite_end\n";
        $rewrite_rule .= "##################################################################################\n\n";

        if (file_exists($filename)) {
            $htaccess = @file_get_contents($filename);
            if (! empty($htaccess)) {
                $htaccess = preg_replace("/[\n\s]*[\#]+[\n\s]+\#nukeviet\_rewrite\_start(.*)\#nukeviet\_rewrite\_end[\n\s]+[\#]+[\n\s]*/s", "\n", $htaccess);
                $htaccess = trim($htaccess);
            }
        }
        $htaccess .= "\n\n" . $rewrite_rule;
        $rewrite_rule = $htaccess;
    }
    $return = true;
    if (! empty($filename) and ! empty($rewrite_rule)) {
        try {
            $filesize = file_put_contents($filename, $rewrite_rule, LOCK_EX);
            if (empty($filesize)) {
                $return = false;
            }
        } catch (exception $e) {
            $return = false;
        }
    }
    return array( $return, NV_BASE_SITEURL . basename($filename) );
}


/**
 * nv_rewrite_rule_iis7_tmp()
 *
 * @param mixed $rewrite_rule
 * @return
 */
function nv_rewrite_rule_iis7_tmp($rewrite_rule = '')
{
    $filename = NV_ROOTDIR . '/web.config';
    if (! class_exists('DOMDocument')) {
        return false;
    }

    // If configuration file does not exist then we create one.
    if (! file_exists($filename)) {
        $fp = fopen($filename, 'w');
        fwrite($fp, '<configuration/>');
        fclose($fp);
    }

    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;

    if ($doc->load($filename) === false) {
        return false;
    }

    $xpath = new DOMXPath($doc);

    // Check the XPath to the rewrite rule and create XML nodes if they do not exist
    $xmlnodes = $xpath->query('/configuration/system.webServer/rewrite/rules');
    if ($xmlnodes->length > 0) {
        $child = $xmlnodes->item(0);
        $parent = $child->parentNode;
        $parent->removeChild($child);
    }
    if (! empty($rewrite_rule)) {
        $rules_node = $doc->createElement('rules');

        $xmlnodes = $xpath->query('/configuration/system.webServer/rewrite');
        if ($xmlnodes->length > 0) {
            $rewrite_node = $xmlnodes->item(0);
            $rewrite_node->appendChild($rules_node);
        } else {
            $rewrite_node = $doc->createElement('rewrite');
            $rewrite_node->appendChild($rules_node);

            $xmlnodes = $xpath->query('/configuration/system.webServer');
            if ($xmlnodes->length > 0) {
                $system_webServer_node = $xmlnodes->item(0);
                $system_webServer_node->appendChild($rewrite_node);
            } else {
                $system_webServer_node = $doc->createElement('system.webServer');
                $system_webServer_node->appendChild($rewrite_node);

                $xmlnodes = $xpath->query('/configuration');
                if ($xmlnodes->length > 0) {
                    $config_node = $xmlnodes->item(0);
                    $config_node->appendChild($system_webServer_node);
                } else {
                    $config_node = $doc->createElement('configuration');
                    $doc->appendChild($config_node);
                    $config_node->appendChild($system_webServer_node);
                }
            }
        }
        $rule_fragment = $doc->createDocumentFragment();
        $rule_fragment->appendXML($rewrite_rule);
        $rules_node->appendChild($rule_fragment);
    }
    $doc->formatOutput = true;
    return $doc->saveXML();
}


/**
 * nv_save_file_config_global_tmp()
 *
 * @return
 */
function nv_save_file_config_global_tmp()
{
    global $nv_Cache, $db, $sys_info, $global_config, $db_config;

    if ($global_config['idsite']) {
        return false;
    }

    $content_config = "<?php" . "\n\n";
    $content_config .= NV_FILEHEAD . "\n\n";
    $content_config .= "if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );\n\n";

    //disable_classes
    $sys_info['disable_classes'] = (($disable_classes = ini_get('disable_classes')) != '' and $disable_classes != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_classes)) : array();
    if (! empty($sys_info['disable_classes'])) {
        $disable_classes = "'" . implode("','", $sys_info['disable_classes']) . "'";
    } else {
        $disable_classes = '';
    }
    $content_config .= "\$sys_info['disable_classes']=array(" . $disable_classes . ");\n";

    //disable_functions
    $sys_info['disable_functions'] = (($disable_functions = ini_get('disable_functions')) != '' and $disable_functions != false) ? array_map('trim', preg_split("/[\s,]+/", $disable_functions)) : array();

    if (extension_loaded('suhosin')) {
        $sys_info['disable_functions'] = array_merge($sys_info['disable_functions'], array_map('trim', preg_split("/[\s,]+/", ini_get('suhosin.executor.func.blacklist'))));
    }
    if (! empty($sys_info['disable_functions'])) {
        $disable_functions = "'" . implode("','", $sys_info['disable_functions']) . "'";
    } else {
        $disable_functions = '';
    }
    $content_config .= "\$sys_info['disable_functions']=array(" . $disable_functions . ");\n";

    //ini_set_support
    $sys_info['ini_set_support'] = (function_exists('ini_set') and ! in_array('ini_set', $sys_info['disable_functions'])) ? true : false;
    $ini_set_support = ($sys_info['ini_set_support']) ? 'true' : 'false';
    $content_config .= "\$sys_info['ini_set_support']= " . $ini_set_support . ";\n";
    //Kiem tra ho tro rewrite
	$iis_info = explode( '/', $_SERVER['SERVER_SOFTWARE']);
    if (function_exists('apache_get_modules')) {
        $apache_modules = apache_get_modules();
        if (in_array('mod_rewrite', $apache_modules)) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_apache';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    } elseif (strpos($iis_info[0], 'Microsoft-IIS') !== false AND $iis_info[1] >= 7) {
        if (isset($_SERVER['IIS_UrlRewriteModule']) and class_exists('DOMDocument')) {
            $sys_info['supports_rewrite'] = 'rewrite_mode_iis';
        } else {
            $sys_info['supports_rewrite'] = false;
        }
    }

    if ($sys_info['supports_rewrite'] == 'rewrite_mode_iis' or $sys_info['supports_rewrite'] == 'rewrite_mode_apache') {
        $content_config .= "\$sys_info['supports_rewrite']='" . $sys_info['supports_rewrite'] . "';\n";
    } else {
        $content_config .= "\$sys_info['supports_rewrite']=false;\n";
    }
    $content_config .= "\n";

    $config_variable = array();
    $allowed_html_tags = '';
    $sql = "SELECT module, config_name, config_value FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang='sys' AND (module='global' OR module='define') ORDER BY config_name ASC";
    $result = $db->query($sql);

    while (list($c_module, $c_config_name, $c_config_value) = $result->fetch(3)) {
        if ($c_module == 'define') {
            if (preg_match('/^\d+$/', $c_config_value)) {
                $content_config .= "define('" . strtoupper($c_config_name) . "', " . $c_config_value . ");\n";
            } else {
                $content_config .= "define('" . strtoupper($c_config_name) . "', '" . $c_config_value . "');\n";
            }
            if ($c_config_name == 'nv_allowed_html_tags') {
                $allowed_html_tags = $c_config_value;
            }
        } else {
            $config_variable[$c_config_name] = $c_config_value;
        }
    }

    $nv_eol = strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ? '"\r\n"' : (strtoupper(substr(PHP_OS, 0, 3) == 'MAC') ? '"\r"' : '"\n"');
    $upload_max_filesize = min(nv_converttoBytes(ini_get('upload_max_filesize')), nv_converttoBytes(ini_get('post_max_size')), $config_variable['nv_max_size']);

    $content_config .= "define('NV_EOL', " . $nv_eol . ");\n";
    $content_config .= "define('NV_UPLOAD_MAX_FILESIZE', " . floatval($upload_max_filesize) . ");\n";

    $my_domains = array_map('trim', explode(',', $config_variable['my_domains']));
    $my_domains[] = NV_SERVER_NAME;
    $config_variable['my_domains'] = implode(',', array_unique($my_domains));

    $config_variable['check_rewrite_file'] = nv_check_rewrite_file();
    $config_variable['allow_request_mods'] = NV_ALLOW_REQUEST_MODS != '' ? NV_ALLOW_REQUEST_MODS : "request";
    $config_variable['request_default_mode'] = NV_REQUEST_DEFAULT_MODE != '' ? trim(NV_REQUEST_DEFAULT_MODE) : 'request';

    $config_variable['log_errors_list'] = NV_LOG_ERRORS_LIST;
    $config_variable['display_errors_list'] = NV_DISPLAY_ERRORS_LIST;
    $config_variable['send_errors_list'] = NV_SEND_ERRORS_LIST;
    $config_variable['error_log_path'] = NV_LOGS_DIR . '/error_logs';
    $config_variable['error_log_filename'] = NV_ERRORLOGS_FILENAME;
    $config_variable['error_log_fileext'] = NV_LOGS_EXT;
    $config_variable['error_send_email'] = $config_variable['error_send_email'];

    $config_name_array = array( 'file_allowed_ext', 'forbid_extensions', 'forbid_mimes', 'allow_sitelangs', 'openid_servers', 'allow_request_mods', 'config_sso' );

    foreach ($config_variable as $c_config_name => $c_config_value) {
        if ($c_config_name == 'config_sso') {
            $config_sso = empty($c_config_value) ? '' : nv_var_export(unserialize($c_config_value));
            $content_config .= "\$global_config['" . $c_config_name . "']=" . $config_sso . ";\n";
        } elseif (in_array($c_config_name, $config_name_array)) {
            if (! empty($c_config_value)) {
                $c_config_value = "'" . implode("','", array_map('trim', explode(',', $c_config_value))) . "'";
            } else {
                $c_config_value = '';
            }
            $content_config .= "\$global_config['" . $c_config_name . "']=array(" . $c_config_value . ");\n";
        } else {
            if (preg_match('/^\d+$/', $c_config_value) and $c_config_name != 'facebook_client_id') {
                $content_config .= "\$global_config['" . $c_config_name . "']=" . $c_config_value . ";\n";
            } else {
                $c_config_value = nv_unhtmlspecialchars($c_config_value);
                if (! preg_match("/^[a-z0-9\-\_\.\,\;\:\@\/\\s]+$/i", $c_config_value) and $c_config_name != 'my_domains') {
                    $c_config_value = nv_htmlspecialchars($c_config_value);
                }
                $content_config .= "\$global_config['" . $c_config_name . "']='" . $c_config_value . "';\n";
            }
        }
    }

    //allowed_html_tags
    if (! empty($allowed_html_tags)) {
        $allowed_html_tags = "'" . implode("','", array_map('trim', explode(',', $allowed_html_tags))) . "'";
    } else {
        $allowed_html_tags = '';
    }
    $content_config .= "\$global_config['allowed_html_tags']=array(" . $allowed_html_tags . ");\n";

    //Xac dinh cac search_engine
    $engine_allowed = (file_exists(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) ? nv_object2array(simplexml_load_file(NV_ROOTDIR . '/' . NV_DATADIR . '/search_engine.xml')) : array();
    $content_config .= "\$global_config['engine_allowed']=" . nv_var_export($engine_allowed) . ";\n";
    $content_config .= "\n";

    $language_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/langs.ini', true);
    $tmp_array = array();
    $lang_array_exit = nv_scandir(NV_ROOTDIR . '/includes/language', "/^[a-z]{2}+$/");
    foreach ($lang_array_exit as $lang) {
        $tmp_array[$lang] = $language_array[$lang];
    }
    unset($language_array);
    $content_config .= "\$language_array=" . nv_var_export($tmp_array) . ";\n";

    $tmp_array = nv_parse_ini_file(NV_ROOTDIR . '/includes/ini/timezone.ini', true);
    $content_config .= "\$nv_parse_ini_timezone=" . nv_var_export($tmp_array) . ";\n";

    $global_config['rewrite_optional'] = $config_variable['rewrite_optional'];
    $global_config['rewrite_op_mod'] = $config_variable['rewrite_op_mod'];

    $global_config['rewrite_endurl'] = $config_variable['rewrite_endurl'];
    $global_config['rewrite_exturl'] = $config_variable['rewrite_exturl'];

    $content_config .= "\n";

    $nv_plugin_area = array();
    $_sql = 'SELECT * FROM ' . $db_config['prefix'] . '_plugin ORDER BY plugin_area ASC, weight ASC';
    $_query = $db->query($_sql);
    while ($row = $_query->fetch()) {
        $nv_plugin_area[$row['plugin_area']][] = $row['plugin_file'];
    }
    $content_config .= "\$nv_plugin_area=" . nv_var_export($nv_plugin_area) . ";\n\n";

    $return = file_put_contents(NV_ROOTDIR . "/" . NV_DATADIR . "/config_global.php", trim($content_config), LOCK_EX);
    $nv_Cache->delAll();

    //Resets the contents of the opcode cache
    if (function_exists('opcache_reset')) {
        opcache_reset();
    }
    return $return;
}
