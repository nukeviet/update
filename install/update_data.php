<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
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
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.2.01';
$nv_update_config['to_version'] = '4.2.01';
$nv_update_config['allow_old_version'] = array('4.1.02', '4.2.00');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4200'] = 'Cập nhật module users lên 4.2.00';
$nv_update_config['lang']['vi']['nv_up_systemcfg4200'] = 'Cập nhật các cấu hình hệ thống bản 4.2.00';
$nv_update_config['lang']['vi']['nv_up_modbanners4201'] = 'Cập nhật module banners lên 4.2.01';
$nv_update_config['lang']['vi']['nv_up_modusers4201'] = 'Cập nhật module users lên 4.2.01';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.2.00';

// English
$nv_update_config['lang']['en']['nv_up_modusers4200'] = 'Update module users to 4.2.00';
$nv_update_config['lang']['en']['nv_up_systemcfg4200'] = 'Update system config to 4.2.00';
$nv_update_config['lang']['en']['nv_up_modbanners4201'] = 'Update module banners to 4.2.01';
$nv_update_config['lang']['en']['nv_up_modusers4201'] = 'Update module users to 4.2.01';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.2.00';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.2.00',
    'rq' => 2,
    'l' => 'nv_up_modusers4200',
    'f' => 'nv_up_modusers4200'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.2.00',
    'rq' => 2,
    'l' => 'nv_up_systemcfg4200',
    'f' => 'nv_up_systemcfg4200'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.2.01',
    'rq' => 2,
    'l' => 'nv_up_modbanners4201',
    'f' => 'nv_up_modbanners4201'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.2.01',
    'rq' => 2,
    'l' => 'nv_up_modusers4201',
    'f' => 'nv_up_modusers4201'
);

$nv_update_config['tasklist'][] = array(
    'r' => '4.2.01',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

/**
 * nv_up_modusers4200()
 *
 * @return
 *
 */
function nv_up_modusers4200()
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
        // Lấy ngôn ngữ
        $lang_module = array();
        $lang_translator = array();

        // Lấy từ thư mục update
        if (file_exists(NV_ROOTDIR . '/install/update/modules/users/language/' . $lang . '.php')) {
            include NV_ROOTDIR . '/install/update/modules/users/language/' . $lang . '.php';
        }

        // Lấy từ thư mục module
        if (empty($lang_module)) {
            if (file_exists(NV_ROOTDIR . '/install/update/modules/users/language/en.php')) {
                include NV_ROOTDIR . '/install/update/modules/users/language/en.php';
            } elseif (file_exists(NV_ROOTDIR . '/install/update/modules/users/language/vi.php')) {
                include NV_ROOTDIR . '/install/update/modules/users/language/vi.php';
            } elseif (file_exists(NV_ROOTDIR . '/modules/users/language/' . $lang . '.php')) {
                include NV_ROOTDIR . '/modules/users/language/' . $lang . '.php';
            } elseif (file_exists(NV_ROOTDIR . '/modules/users/language/en.php')) {
                include NV_ROOTDIR . '/modules/users/language/en.php';
            } else {
                include NV_ROOTDIR . '/modules/users/language/vi.php';
            }
        }

        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {
            // Thêm cấu hình tuổi để đăng ký
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('min_old_user', '16', '" . NV_CURRENTTIME . "');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            // Cấu hình thời gian thành viên chờ để active
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('register_active_time', '86400', '" . NV_CURRENTTIME . "');");
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

            // Đổi ID các trường dữ liệu hiện có nếu từ 1 - 7
            try {
                $maxFID = $db->query("SELECT MAX(fid) FROM " . $db_config['prefix'] . "_" . $mod_data . "_field")->fetchColumn();
                if ($maxFID === null) {
                    $maxFID = 0;
                }
                if ($maxFID > 0) {
                    $sql = "SELECT fid FROM " . $db_config['prefix'] . "_" . $mod_data . "_field WHERE fid<=7 ORDER BY fid ASC";
                    $result = $db->query($sql);
                    while ($row = $result->fetch()) {
                        $fid = (++$maxFID) + 7;
                        $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET fid=" . $fid . " WHERE fid=" . $row['fid']);
                    }
                    $maxFID + 8;
                    $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_field AUTO_INCREMENT=" . $maxFID);
                }
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Đổi tên các trường trùng với trường SYS
            $array_sys_field = array('first_name', 'last_name', 'gender', 'birthday', 'sig', 'question', 'answer');
            $array_custom_field = $array_infotable_field = array();
            $array_field_afterchanged = array();

            try {
                $sql = "SELECT fid, field FROM " . $db_config['prefix'] . "_" . $mod_data . "_field";
                $result = $db->query($sql);
                while ($row = $result->fetch()) {
                    $array_custom_field[$row['fid']] = $row['field'];
                }
                $sql = "SHOW FULL COLUMNS FROM " . $db_config['prefix'] . "_" . $mod_data . "_info";
                $result = $db->query($sql);
                while ($row = $result->fetch()) {
                    $array_infotable_field[$row['field']] = array(
                        'type' => $row['type'],
                        'collation' => $row['collation'],
                        'field' => $row['field'],
                        'null' => $row['null'],
                        'default' => $row['default']
                    );
                }

                $ascii_offset = 97; // Prefix ký tự từ A-Z chắc không có chuyện vượt qua ngoài này mà vẫn trùng
                $prefix_set = 'cus%s_';

                foreach ($array_custom_field as $custom_field_fid => $custom_field) {
                    $i = 0;
                    $is_change = false;
                    $new_field_name = $custom_field;
                    while (in_array($new_field_name, $array_sys_field) or in_array($new_field_name, $array_field_afterchanged)) {
                        $is_change = true;
                        $new_field_name = sprintf($prefix_set, chr($ascii_offset + $i)) . $new_field_name;
                        $i++;
                    }
                    if ($is_change) {
                        $array_field_afterchanged[] = $new_field_name;
                        $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET field='" . $new_field_name . "' WHERE fid=" . $custom_field_fid);

                        if (isset($array_infotable_field[$custom_field])) {
                            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_info CHANGE
                            " . $custom_field . " " . $new_field_name . " " . $array_infotable_field[$custom_field]['type'] . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
                            " . ($array_infotable_field[$custom_field]['null'] == 'NO' ? "NOT NULL" : "") . (strpos($array_infotable_field[$custom_field]['type'], 'varchar') === false ? '' : " DEFAULT '" . $array_infotable_field[$custom_field]['default'] . "'" ));
                        }
                    }
                }
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Cập nhật thứ tự tăng lên 7
            try {
                $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET weight=weight+7 WHERE fid>7");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Chèn các field mặc định vào
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_field (fid, field, weight, field_type, field_choices, sql_choices, match_type, match_regex, func_callback, min_length, max_length, required, show_register, user_editable, show_profile, class, language, default_value, system) VALUES
                    (1, 'first_name', 1, 'textbox', '', '', 'none', '', '', 0, 100, 1, 1, 1, 1, 'input', '', '', 1),
                    (2, 'last_name', 2, 'textbox', '', '', 'none', '', '', 0, 100, 0, 1, 1, 1, 'input', '', '', 1),
                    (3, 'gender', 3, 'select', 'a:3:{s:1:\"N\";s:0:\"\";s:1:\"M\";s:0:\"\";s:1:\"F\";s:0:\"\";}', '', 'none', '', '', 0, 1, 0, 1, 1, 1, 'input', '', '2', 1),
                    (4, 'birthday', 4, 'date', 'a:1:{s:12:\"current_date\";i:0;}', '', 'none', '', '', 0, 0, 1, 1, 1, 1, 'input', '', '0', 1),
                    (5, 'sig', 5, 'textarea', '', '', 'none', '', '', 0, 1000, 0, 1, 1, 1, 'input', '', '', 1),
                    (6, 'question', 6, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', '', '', 1),
                    (7, 'answer', 7, 'textbox', '', '', 'none', '', '', 3, 255, 1, 1, 1, 1, 'input', '', '', 1)
                ;");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Fix lại weight chuẩn
            try {
                $sql = "SELECT fid FROM " . $db_config['prefix'] . "_" . $mod_data . "_field ORDER BY weight ASC";
                $result = $db->query($sql);

                $weight = 0;
                while ($row = $result->fetch()) {
                    $weight++;
                    $db->query("UPDATE " . $db_config['prefix'] . "_" . $mod_data . "_field SET weight=" . $weight . " WHERE fid=" . $row['fid']);
                }
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }

            // Cập nhật lang cho các field
            try {
                $sql = "SELECT fid, field, language, system FROM " . $db_config['prefix'] . "_" . $mod_data . "_field";
                $_result = $db->query($sql);
                while ($_row = $_result->fetch()) {
                    $_row['language'] = $_row['language'] ? unserialize($_row['language']) : array();
                    if (!isset($_row['language'][$lang])) {
                        if (!empty($_row['system'])) {
                            $_row['language'][$lang] = array(0 => $lang_module[$_row['field']], 1 => '');
                        } elseif (!empty($_row['language'])) {
                            $_copy_lang = current($_row['language']);
                            $_row['language'][$lang] = array(0 => ucfirst(nv_EncString($_copy_lang[0])), 1 => ucfirst(nv_EncString($_copy_lang[1])));
                        }
                        $db->query('UPDATE ' . $db_config['prefix'] . '_' . $mod_data . '_field SET language=' . $db->quote(serialize($_row['language'])) . ' WHERE fid=' . $_row['fid']);
                    }
                }
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
        }
    }
    return $return;
}

/**
 * nv_up_systemcfg4200()
 *
 * @return
 *
 */
function nv_up_systemcfg4200()
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
 * nv_up_modbanners4201()
 *
 * @return
 *
 */
function nv_up_modbanners4201()
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

    // Nếu site có banner clients mới tác động đến fields
    $sql = "SELECT * FROM " . NV_BANNERS_GLOBALTABLE . "_clients";
    $array_banner_clients = $db->query($sql)->fetchAll();

    if (!empty($array_banner_clients)) {
        $sql = 'SELECT * FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1';
        $array_langsetup = $db->query($sql)->fetchAll();

        // Chuẩn bị các trường dữ liệu
        $array_bannercl_fields = array(
            'website' => array('url'),
            'location' => array('none'),
            'yim' => array('none'),
            'phone' => array('none'),
            'fax' => array('none'),
            'mobile' => array('none')
        );
        $custom_fields = array();

        $sql = 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . '_field';
        $result = $db->query($sql);

        while ($row = $result->fetch()) {
            $custom_fields[$row['field']] = $row;
        }

        // Chuẩn bị các trường dữ liệu
        $weight = sizeof($custom_fields);
        foreach ($array_bannercl_fields as $field => $field_data) {
            if (!isset($custom_fields[$field])) {
                $weight++;

                $language = array();
                foreach ($array_langsetup as $lang) {
                    $language[$lang['lang']] = array(
                        0 => nv_get_banner_language($lang['lang'], $field),
                        1 => ''
                    );
                }

                $array = array();
                $array['field'] = $field;
                $array['weight'] = $weight;
                $array['field_type'] = 'textbox';
                $array['field_choices'] = '';
                $array['sql_choices'] = '';
                $array['match_type'] = $field_data[0];
                $array['match_regex'] = '';
                $array['func_callback'] = '';
                $array['min_length'] = 0;
                $array['max_length'] = 255;
                $array['required'] = 0;
                $array['show_register'] = 0;
                $array['user_editable'] = 1;
                $array['show_profile'] = 0;
                $array['class'] = '';
                $array['language'] = serialize($language);
                $array['default_value'] = '';

                $sql = 'INSERT INTO ' . NV_USERS_GLOBALTABLE . '_field (
                    field, weight, field_type, field_choices, sql_choices, match_type, match_regex, func_callback, min_length, max_length, required,
                    show_register, user_editable, show_profile, class, language, default_value
                ) VALUES (
                    :field, :weight, :field_type, :field_choices, :sql_choices, :match_type, :match_regex, :func_callback, :min_length, :max_length, :required,
                    :show_register, :user_editable, :show_profile, :class, :language, :default_value
                )';

                $fid = $db->insert_id($sql, 'fid', $array);

                if ($fid) {
                    try {
                        $db->exec('ALTER TABLE ' . NV_USERS_GLOBALTABLE . '_info ADD ' . $field . ' VARCHAR(255) NOT NULL DEFAULT \'\'');
                    } catch (PDOException $e) {
                        trigger_error($e->getMessage());
                    }
                }
            }
        }

        // Bắt đầu lưu client vào
        foreach ($array_banner_clients as $client) {
            // Xác định trùng email
            $sql = 'SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE email=:email';
            $sth = $db->prepare($sql);
            $sth->bindParam(':email', $client['email'], PDO::PARAM_STR);
            $sth->execute();
            $user = $sth->fetch();
            if (empty($user)) {
                // Xác định tên đăng nhập không bị trùng
                $username = $client['login'];
                $offset = 0;
                while ($db->query('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE username=' . $db->quote($username))->rowCount()) {
                    $offset++;
                    $username = $username . $offset;
                }
                // Thêm tài khoản
                $sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . " (
                    group_id, username, md5username, password, email, first_name, last_name, gender, birthday, sig, regdate,
                    question, answer, passlostkey, view_mail,
                    remember, in_groups, active, checknum, last_login, last_ip, last_agent, last_openid, idsite
                ) VALUES (
                    4,
                    :username,
                    :md5_username,
                    :password,
                    :email,
                    :first_name,
                    :last_name,
                    '', 0, '', " . $client['reg_time'] . ", '', '',
                    '', 0, 1, '4', " . $client['act'] . ", '', 0, '', '', '', " . $global_config['idsite'] . "
                )";

                $data_insert = array();
                $data_insert['username'] = $username;
                $data_insert['md5_username'] = nv_md5safe($username);
                $data_insert['password'] = $client['pass'];
                $data_insert['email'] = $client['email'];
                $data_insert['first_name'] = '';
                $data_insert['last_name'] = $client['full_name'];

                $userid = $db->insert_id($sql, 'userid', $data_insert);

                if ($userid) {
                    try {
                        $db->exec('INSERT INTO ' . NV_USERS_GLOBALTABLE . '_info (userid) VALUES (' . $userid . ')');
                    } catch (PDOException $e) {
                        trigger_error($e->getMessage());
                    }
                    $user = array('userid' => $userid);
                }
            }

            if (!empty($user)) {
                $array_info = array();
                foreach ($array_bannercl_fields as $fkey => $fval) {
                    if (!empty($client[$fkey])) {
                        $array_info[$fkey] = $db->quote($client[$fkey]);
                    }
                }

                if (!empty($array_info)) {
                    $sql = array();
                    foreach ($array_info as $fkey => $fval) {
                        $sql[] = $fkey . '=' . $fval;
                    }
                    $sql = 'UPDATE ' . NV_USERS_GLOBALTABLE . '_info SET ' . implode(', ', $sql) . ' WHERE userid=' . $user['userid'];
                    try {
                        $db->query($sql);
                    } catch (PDOException $e) {
                        trigger_error($e->getMessage());
                    }
                }

                // Cập nhật các quảng cáo
                $db->query('UPDATE ' . NV_BANNERS_GLOBALTABLE . '_rows SET clid=' . $user['userid'] . ' WHERE clid=' . $client['id']);
            }
        }
    }

    // Xóa bảng clients
    try {
        $db->query("DROP TABLE " . NV_BANNERS_GLOBALTABLE . "_clients");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    // Xóa các file thừa
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/add_client.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/banners_client.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/change_act_client.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/cl_list.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/client_list.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/del_client.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/edit_client.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/info_cl.php');
    @nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/info_client.php');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/add_client.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/banners_client.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/cl_list.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/client_list.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/edit_client.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/info_cl.tpl');
    @nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/info_client.tpl');

    // Thêm trường bảng plans
    try {
        $db->query("ALTER TABLE " . NV_BANNERS_GLOBALTABLE . "_plans ADD uploadtype VARCHAR(255) NOT NULL DEFAULT '' AFTER require_image;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("ALTER TABLE " . NV_BANNERS_GLOBALTABLE . "_plans ADD uploadgroup VARCHAR(255) NOT NULL DEFAULT '' AFTER uploadtype;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("ALTER TABLE " . NV_BANNERS_GLOBALTABLE . "_plans ADD exp_time INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER uploadgroup;");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }
    try {
        $db->query("UPDATE " . NV_BANNERS_GLOBALTABLE . "_plans SET uploadtype='images,flash'");
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
    }

    return $return;
}

/**
 * nv_up_modusers4201()
 *
 * @return
 *
 */
function nv_up_modusers4201()
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
            // Thêm trường cho các site cài mới bị thiếu
            try {
                $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $mod_data . "_config (config, content, edit_time) VALUES ('active_user_logs', '1', '" . NV_CURRENTTIME . "');");
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
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

/**
 * nv_get_banner_language()
 *
 * @param mixed $lang
 * @param mixed $langkey
 * @return
 */
function nv_get_banner_language($lang, $langkey)
{
    $langreturn = nv_ucfirst($langkey);
    $keyfound = false;
    $lang_module = $lang_translator = array();

    if (file_exists(NV_ROOTDIR . '/modules/banners/language/' . $lang . '.php')) {
        include NV_ROOTDIR . '/modules/banners/language/' . $lang . '.php';
        if (isset($lang_module[$langkey])) {
            $langreturn = $lang_module[$langkey];
            $keyfound = true;
        }
    }

    if (!$keyfound and file_exists(NV_ROOTDIR . '/modules/banners/language/en.php')) {
        include NV_ROOTDIR . '/modules/banners/language/en.php';
        if (isset($lang_module[$langkey])) {
            $langreturn = $lang_module[$langkey];
        }
    }

    return $langreturn;
}
