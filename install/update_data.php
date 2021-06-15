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

die('Đang cập nhật, vui lòng chưa thử nghiệm');

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
$nv_update_config['allow_old_version'] = ['4.5.00', '4.5.00'];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_modusers4500'] = 'Cập nhật module users lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_sys4500'] = 'Cập nhật hệ thống lên 4.5.00';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản 4.5.00';

// English
$nv_update_config['lang']['en']['nv_up_modusers4500'] = 'Update module users to 4.5.00';
$nv_update_config['lang']['en']['nv_up_sys4500'] = 'Update system to 4.5.00';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version 4.5.00';

$nv_update_config['tasklist'] = [];
$nv_update_config['tasklist'][] = [
    'r' => '4.5.00',
    'rq' => 2,
    'l' => 'nv_up_modusers4500',
    'f' => 'nv_up_modusers4500'
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
 * @return number[]|string[]
 */
function nv_up_modusers4500()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config;

    // Lấy tất cả ngôn ngữ đã cài đặt
    $sql = "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup=1 ORDER BY weight ASC";
    $array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Duyệt tất cả các ngôn ngữ
    foreach ($array_sitelangs as $lang) {
        // Lấy tất cả các module và module ảo của nó
        $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file='users'");
        while (list ($mod, $mod_data) = $mquery->fetch(3)) {

        }
    }

    return $return;
}

/**
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

    $db->query("UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value='" . $nv_update_config['to_version'] . "' WHERE lang='sys' AND module='global' AND config_name='version'");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='module' AND basename IN ('" . implode("', '", $array_modules) . "')");
    $db->query("UPDATE " . $db_config['prefix'] . "_setup_extensions SET  version='" . $nv_update_config['to_version'] . " " . $nv_update_config['release_date'] . "' WHERE type='theme' AND basename IN ('" . implode("', '", $array_themes) . "')");

    nv_save_file_config_global();

    return $return;
}
