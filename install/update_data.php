<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC.
 * All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (!defined('NV_IS_UPDATE')) die('Stop!!!');

$nv_update_config = array();

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4029';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1463504400;
$nv_update_config['author'] = 'VINADES.,JSC (contact@vinades.vn)';
$nv_update_config['support_website'] = 'http://nukeviet.vn';
$nv_update_config['to_version'] = '4.0.29';
$nv_update_config['allow_old_version'] = array('4.0.27', '4.0.28');

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modnews'] = 'Cập nhật module news lên 4.0.28';
$nv_update_config['lang']['vi']['nv_up_modusers'] = 'Cập nhật module users lên 4.0.28';
$nv_update_config['lang']['vi']['nv_up_delunuse_files'] = 'Xóa các file thừa bản 4.0.27';
$nv_update_config['lang']['vi']['nv_up_modnews29'] = 'Cập nhật module news lên 4.0.29';
$nv_update_config['lang']['vi']['nv_up_delunuse_files29'] = 'Xóa các file thừa bản 4.0.28';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.0.28';
// English
$nv_update_config['lang']['en']['nv_up_modnews'] = 'Update module news to 4.0.28';
$nv_update_config['lang']['en']['nv_up_modusers'] = 'Update module users to 4.0.28';
$nv_update_config['lang']['en']['nv_up_delunuse_files'] = 'Delete unuse files 4.0.27';
$nv_update_config['lang']['en']['nv_up_modnews29'] = 'Update module news to 4.0.29';
$nv_update_config['lang']['en']['nv_up_delunuse_files29'] = 'Delete unuse files 4.0.28';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version 4.0.28';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 2,
    'l' => 'nv_up_modnews',
    'f' => 'nv_up_modnews'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 2,
    'l' => 'nv_up_modusers',
    'f' => 'nv_up_modusers'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.28',
    'rq' => 1,
    'l' => 'nv_up_delunuse_files',
    'f' => 'nv_up_delunuse_files'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.29',
    'rq' => 2,
    'l' => 'nv_up_modnews29',
    'f' => 'nv_up_modnews29'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.29',
    'rq' => 1,
    'l' => 'nv_up_delunuse_files29',
    'f' => 'nv_up_delunuse_files29'
);
$nv_update_config['tasklist'][] = array(
    'r' => '4.0.29',
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
);

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
    while (list($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
            try {
                $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat ADD ad_block_cat varchar(250) NOT NULL default '' AFTER featured");
            } catch (PDOException $e) {
                $return['status'] = $return['complete'] = 0;
                $return['message'] = $e->getMessage();
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
    
    try {
        $db->query("RENAME TABLE " . $db_config['prefix'] . "_groups TO " . $db_config['prefix'] . "_users_groups");
        $db->query("RENAME TABLE " . $db_config['prefix'] . "_groups_users TO " . $db_config['prefix'] . "_users_groups_users");
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_users_groups ADD email varchar(100) DEFAULT '' AFTER title");
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_users_groups ADD config varchar(250) DEFAULT '' AFTER siteus");      
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }
    
    try {
        $db->query("ALTER TABLE " . $db_config['prefix'] . "_setup_extensions CHANGE virtual is_virtual TINYINT(1) NOT NULL DEFAULT '0'");
        $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET is_virtual = '1' WHERE type = 'module' AND title = 'users'");
    } catch (PDOException $e) {
        $return['status'] = $return['complete'] = 0;
        $return['message'] = $e->getMessage();
    }

    return $return;
}

/**
 * nv_up_delunuse_files()
 *
 * @return
 *
 */
function nv_up_delunuse_files()
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
    
    nv_deletefile(NV_ROOTDIR . '/admin/seotools/siteDiagnostic.php', false);
    nv_deletefile(NV_ROOTDIR . '/includes/cronjobs/siteDiagnostic_update.php', false);
    nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/seotools/siteDiagnostic.tpl', false);
    nv_deletefile(NV_ROOTDIR . '/themes/default/system/dump.tpl', false);
    nv_deletefile(NV_ROOTDIR . '/assets/js/jquery/jquery.lazyload.js', false);
    nv_deletefile(NV_ROOTDIR . '/assets/js/ui', true);

    return $return;
}


/**
 * nv_up_modnews29()
 *
 * @return
 *
 */
function nv_up_modnews29()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Request;
    
    $return = array(
        'status' => 1, // Trạng thái hoàn thành 1 lần chạy
        'complete' => 1, // Trạng thái hoàn thành cả công việc
        'next' => 1, // Qua bước tiếp theo hay tiếp tục bước này
        'link' => 'NO', // Link tiếp tục nếu có
        'lang' => 'NO', // Ngôn ngữ có vấn đề
        'message' => '' // Vấn đề cụ thể
    );
    
    // Tất cả các bảng cần update
    $array_tbprefix_update = array();
    
    $language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
    while (list($lang) = $language_query->fetch(3)) {
        // Lấy tất cả các module và module ảo của news
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
        while (list($mod, $mod_data) = $mquery->fetch(3)) {
            $array_tbprefix_update[] = $db_config['prefix'] . "_" . $lang . "_" . $mod_data;
        }
    }
    
    // Kết thúc nếu không có module news
    if (empty($array_tbprefix_update)) {
        return $return;
    }
    
    $request = array();
    $request['umodkey'] = $nv_Request->get_int('umodkey', 'get,post', 0); // Cập nhật cho module nào
    $request['ustep'] = $nv_Request->get_int('ustep', 'get,post', 0); // Bước 0: RENAME, 1: COPY AND DELETE TABLE, 2: DELETE bodytext
    
    // Kết thúc quá trình nếu hết bảng update
    if (!isset($array_tbprefix_update[$request['umodkey']])) {
        return $return;
    }
    
    $return['complete'] = 0;
    $return['next'] = 0;
    
    // Rename bảng bodyhtml_1
    if ($request['ustep'] == 0) {
        try {
            $db->query("RENAME TABLE " . $array_tbprefix_update[$request['umodkey']] . "_bodyhtml_1 TO " . $array_tbprefix_update[$request['umodkey']] . "_detail");
        } catch (PDOException $e) {
            // Xem như bảng detail đã tồn tại
        }
        
        // Chuyển sang bước 2
        $request['ustep'] ++;
        $return['link'] = $nv_update_baseurl . '&umodkey=' . $request['umodkey'] . '&ustep=' . $request['ustep'];
    } elseif ($request['ustep'] == 1) {
        $result = $db->query('SHOW TABLE STATUS LIKE ' . $db->quote($array_tbprefix_update[$request['umodkey']] . '_bodyhtml_%'));
        $html_table = "";
        while ($item = $result->fetch()) {
            if (preg_match("/^" . preg_quote($array_tbprefix_update[$request['umodkey']]) . "\_bodyhtml\_([0-9]+)$/", $item['name']) and $item['name'] != ($array_tbprefix_update[$request['umodkey']] . '_bodyhtml_1')) {
                $html_table = $item['name'];
                break;
            }
        }

        // Hết bảng HTML thì chuyển bước tiếp
        if (empty($html_table)) {
            $request['ustep'] ++;
            $return['link'] = $nv_update_baseurl . '&umodkey=' . $request['umodkey'] . '&ustep=' . $request['ustep'];
            return $return;
        }
        
        $limit_row = 1; // Số tin thực hiện 1 lần chạy
        
        $db->sqlreset()->select("*")->from($html_table)->order("id ASC")->limit($limit_row)->offset(0);
        $sql = $db->sql();
        $result = $db->query($sql);
        $num_row = $result->rowCount();
        $last_id = 0;
        
        while ($row = $result->fetch()) {
            $last_id = $row['id'];
            
            try {
                $sql = "INSERT INTO " . $array_tbprefix_update[$request['umodkey']] . "_detail (
                    id, bodyhtml, sourcetext, imgposition, copyright, allowed_send, allowed_print, allowed_save, gid
                ) VALUES (
                    " . $row['id'] . ", " . $db->quote($row['bodyhtml']) . ", " . $db->quote($row['sourcetext']) . ", 
                    " . $row['imgposition'] . ", " . $row['copyright'] . ", " . $row['allowed_send'] . ", " . $row['allowed_print'] . ", " . $row['allowed_save'] . ", " . $row['gid'] . " 
                )";
                $db->query($sql);
            } catch (PDOException $e) {
                $return['status'] = 0;
                $return['message'] = $e->getMessage();
                return $return;
            }
        }
        
        // Xóa các bài viết
        if ($last_id > 0) {
            $db->query("DELETE FROM " . $html_table . " WHERE id<=" . $last_id);
        }
        
        // Hết dữ liệu của bảng thì xóa bảng
        if ($num_row < $limit_row) {
            try {
                $db->query("DROP TABLE " . $html_table);
            } catch (PDOException $e) {
                $return['status'] = 0;
                $return['message'] = $e->getMessage();
                return $return;
            }
        }
        
        // Tiếp tục lặp lại bước này
        $return['link'] = $nv_update_baseurl . '&umodkey=' . $request['umodkey'] . '&ustep=' . $request['ustep'];
        return $return;
    } else {
        try {
            $db->query("DROP TABLE " . $array_tbprefix_update[$request['umodkey']] . "_bodytext");
        } catch (PDOException $e) {
            // Nothing
        }
        
        $request['umodkey'] ++;
        $request['ustep'] = 0;
        $return['link'] = $nv_update_baseurl . '&umodkey=' . $request['umodkey'] . '&ustep=' . $request['ustep'];
    }

    return $return;
}

/**
 * nv_up_delunuse_files29()
 *
 * @return
 *
 */
function nv_up_delunuse_files29()
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
    
    // Chỗ này sẽ cập nhật sau
    //nv_deletefile(NV_ROOTDIR . '/admin/seotools/siteDiagnostic.php', false);

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
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config;
    $return = array(
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    );
    
    if ($global_config['whoviewuser'] == 0) {
        $global_config['whoviewuser'] = '6';
    } elseif ($global_config['whoviewuser'] == 1) {
        $global_config['whoviewuser'] = '4';
    } else {
        $global_config['whoviewuser'] = '2';
    }
    
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $global_config['whoviewuser'] . "' WHERE lang='sys' AND module='global' AND config_name='whoviewuser'");
    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='4.0.29' WHERE lang='sys' AND module='global' AND config_name='version'");
    
    $nv_Cache->delAll();
    nv_save_file_config_global();
    
    return $return;
}
