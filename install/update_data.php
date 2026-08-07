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
$nv_update_config['packageID'] = 'NVUD4601';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = '';

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1786698000;
$nv_update_config['author'] = 'VINADES.,JSC <contact@vinades.vn>';
$nv_update_config['support_website'] = 'https://github.com/nukeviet/update/tree/to-4.6.01';
$nv_update_config['to_version'] = '4.6.01';
$nv_update_config['allow_old_version'] = [
    '4.6.00',
    '4.6.01',
];

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = [];
$nv_update_config['lang']['vi'] = [];
$nv_update_config['lang']['en'] = [];

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_sys4601'] = 'Cập nhật hệ thống lên phiên bản 4.6.01';

$nv_update_config['lang']['vi']['nv_up_finish'] = 'Cập nhật CSDL lên phiên bản ' . $nv_update_config['to_version'];

// English
$nv_update_config['lang']['en']['nv_up_sys4601'] = 'Update system to 4.6.01';

$nv_update_config['lang']['en']['nv_up_finish'] = 'Update to new version ' . $nv_update_config['to_version'];

// $nv_update_config['note_move_file'] = [
//     'vi' => '',
//     'en' => '',
// ];

$nv_update_config['tasklist'] = [];

$nv_update_config['tasklist'][] = [
    'r' => '4.6.01',
    'rq' => 2,
    'l' => 'nv_up_sys4601',
    'f' => 'nv_up_sys4601'
];

$nv_update_config['tasklist'][] = [
    'r' => $nv_update_config['to_version'],
    'rq' => 2,
    'l' => 'nv_up_finish',
    'f' => 'nv_up_finish'
];

// Lấy tất cả ngôn ngữ đã cài đặt
$sql = 'SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup=1 ORDER BY weight ASC';
$array_sitelangs = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);

/**
 * @return array
 */
function nv_up_sys4601()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config, $array_sitelangs;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Xóa cấu hình chặn máy tính dùng proxy
    try {
        $sql = "DELETE FROM " . NV_CONFIG_GLOBALTABLE . " WHERE lang = 'sys' AND module = 'global' AND config_name = 'proxy_blocker'";
        $db->query($sql);
    } catch (Throwable $e) {
        trigger_error(print_r($e, true));
    }
    // Thêm cấu hình trusted_proxy_enable
    try {
        $sql = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'trusted_proxy_enable', '1')";
        $db->query($sql);
    } catch (Throwable $e) {
        trigger_error(print_r($e, true));
    }
    // Thêm cấu hình trusted_proxy_enable
    try {
        $sql = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'trusted_proxies', '[\"127.0.0.0/8\",\"::1\",\"10.0.0.0/8\",\"172.16.0.0/12\",\"192.168.0.0/16\",\"fc00::/7\",\"173.245.48.0/20\",\"103.21.244.0/22\",\"103.22.200.0/22\",\"103.31.4.0/22\",\"141.101.64.0/18\",\"108.162.192.0/18\",\"190.93.240.0/20\",\"188.114.96.0/20\",\"197.234.240.0/22\",\"198.41.128.0/17\",\"162.158.0.0/15\",\"104.16.0.0/13\",\"104.24.0.0/14\",\"172.64.0.0/13\",\"131.0.72.0/22\",\"2400:cb00::/32\",\"2606:4700::/32\",\"2803:f800::/32\",\"2405:b500::/32\",\"2405:8100::/32\",\"2a06:98c0::/29\",\"2c0f:f248::/32\"]')";
        $db->query($sql);
    } catch (Throwable $e) {
        trigger_error(print_r($e, true));
    }

    return $return;
}

/**
 * @return array
 */
function nv_up_finish()
{
    global $nv_update_baseurl, $db, $db_config, $nv_Cache, $global_config, $nv_update_config, $array_sitelangs;

    $return = [
        'status' => 1,
        'complete' => 1,
        'next' => 1,
        'link' => 'NO',
        'lang' => 'NO',
        'message' => ''
    ];

    // Xóa tệp thừa
    // Không có

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
