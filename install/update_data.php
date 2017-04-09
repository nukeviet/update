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
$nv_update_config['lang']['vi']['nv_up_systemcfg'] = 'Cập nhật các cấu hình hệ thống';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.1.01';
// English
$nv_update_config['lang']['en']['nv_up_delunusefiles'] = 'Delete unused files';
$nv_update_config['lang']['en']['nv_up_modnews'] = 'Update module news';
$nv_update_config['lang']['en']['nv_up_modusers'] = 'Update module users';
$nv_update_config['lang']['en']['nv_up_modbanners'] = 'Update module banners';
$nv_update_config['lang']['en']['nv_up_modpage'] = 'Update module page';
$nv_update_config['lang']['en']['nv_up_modcontact'] = 'Update module contact';
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
                  id smallint(5) UNSIGNED NOT NULL,
                  departmentid smallint(5) UNSIGNED NOT NULL,
                  full_name varchar(255) NOT NULL,
                  image varchar(255) NOT NULL DEFAULT '',
                  phone varchar(255) NOT NULL,
                  email varchar(100) NOT NULL,
                  others text NOT NULL,
                  act tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
                  weight smallint(5) NOT NULL
                ) ENGINE=MyISAM;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }

    return $return;
}

/**
 * nv_up_modvoting()
 *
 * @return
 *
 */
function nv_up_modvoting()
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
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'voting'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . " ADD active_captcha tinyint(1) UNSIGNED NOT NULL DEFAULT '0' AFTER  acceptcm;");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
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
    }
    
    // Thêm cấu hình số điện thoại, googleMapsAPI
    try {
        $db->query("INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'site_phone', '')"); 
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
        $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET  module='site' WHERE lang = 'sys' AND module='global' AND config_name IN ('nv_upass_type', 'nv_unick_type', 'allowmailchange', 'allowuserpublic', 'allowquestion', 'allowloginchange', 'allowuserlogin', 'allowuserloginmulti', 'allowuserreg', 'is_user_forum', 'openid_servers', 'openid_processing', 'user_check_pass_time', 'auto_login_after_reg', 'whoviewuser')");
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
    
    $nv_Cache->delAll();
    
    nv_rewrite_change($global_config);
    nv_save_file_config_global();

    return $return;
}