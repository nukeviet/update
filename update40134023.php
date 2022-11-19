<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 31/05/2010, 00:36
 */

register_shutdown_function("fatal_handler");
function fatal_handler()
{
    $error = error_get_last();
    if ($error !== NULL) {
        echo('<pre><code>' . print_r($error, true) . '</code></pre>');
    }
}

define('NV_ROOTDIR', str_replace(DIRECTORY_SEPARATOR, '/', realpath(pathinfo(__file__, PATHINFO_DIRNAME))));
define('NV_MAINFILE', true);

require NV_ROOTDIR . '/config.php';
$db_config['charset'] = 'utf8';

$site_timezone = 'Asia/Ho_Chi_Minh';
date_default_timezone_set($site_timezone);

define('NV_START_TIME', microtime(true));
define('NV_CURRENTTIME', time());
set_time_limit(0);

$_time_zone_db = preg_replace('/^([\+|\-]{1}\d{2})(\d{2})$/', '$1:$2', date('O'));
$driver_options = array(
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_PERSISTENT => $db_config['persistent'],
    PDO::ATTR_CASE => PDO::CASE_LOWER,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = $db_config['dbtype'] . ':dbname=' . $db_config['dbname'] . ';host=' . $db_config['dbhost'] . ';charset=' . $db_config['charset'];
if (!empty($db_config['dbport'])) {
    $dsn .= ';port=' . $db_config['dbport'];
}
$driver_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
try {
    $db = new PDO($dsn, $db_config['dbuname'], $db_config['dbpass'], $driver_options);
    $db->exec("SET SESSION time_zone='" . $_time_zone_db . "'");
} catch (PDOException $e) {
    echo '<pre><code>';
    echo htmlspecialchars(print_r($e, true));
    die('</code></pre>');
}

echo "<pre><code>";

// Global
$array_config_insert = [
    'allowuserloginmulti' => '0',
    'openid_processing' => '0',
    'user_check_pass_time' => '1800',
    'error_set_logs' => '1',
];
foreach ($array_config_insert as $config_name => $config_value) {
    echo "Bổ sung cấu hình sys:global " . $config_name . ": ";
    try {
        $db->query("INSERT INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', '" . $config_name . "', '" . $config_value . "')");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Xóa một số cấu hình
$array_config_delete = [
    'allow_adminlangs',
    'openid_mode',
    'optActive',
    'mudim_displaymode',
    'mudim_method',
    'mudim_showpanel',
    'mudim_active',
];
foreach ($array_config_delete as $config_name) {
    echo "Xóa cấu hình sys global " . $config_name . ": ";
    try {
        $db->query("DELETE FROM `" . $db_config['prefix'] . "_config` WHERE config_name='" . $config_name . "' AND lang='sys' AND module='global'");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Cập nhật cấu hình define
$array = [
    'nv_allowed_html_tags' => 'embed, object, param, a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, sub, sup, table, tbody, td, th, tr, u, ul, ol, iframe, figure, figcaption, video, audio, source, track, code, pre',
];
foreach ($array as $config_name => $config_value) {
    echo "Cập nhật cấu hình sys:define " . $config_name . ": ";
    try {
        $db->query("UPDATE `" . $db_config['prefix'] . "_config` SET config_value=" . $db->quote($config_value) . "
        WHERE config_name='" . $config_name . "' AND lang='sys' AND module='define'");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

echo "Cập nhật phiên bản: ";
try {
    $db->query("UPDATE `" . $db_config['prefix'] . "_config` SET config_value='4.0.23' WHERE config_name='version' AND lang='sys' AND module='global'");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Cập nhật bảng thống kê
echo "Cập nhật bảng couter: ";
try {
    $db->query("INSERT IGNORE INTO `" . $db_config['prefix'] . "_counter` (`c_type`, `c_val`, `last_update`, `c_count`, `vi_count`) VALUES
    ('bot', 'googlebot', 0, 0, 0),
    ('bot', 'msnbot', 0, 0, 0),
    ('bot', 'bingbot', 0, 0, 0),
    ('bot', 'yahooslurp', 0, 0, 0),
    ('bot', 'w3cvalidator', 0, 0, 0),
    ('browser', 'opera', 0, 0, 0),
    ('browser', 'operamini', 0, 0, 0),
    ('browser', 'webtv', 0, 0, 0),
    ('browser', 'explorer', 0, 0, 0),
    ('browser', 'edge', 0, 0, 0),
    ('browser', 'pocket', 0, 0, 0),
    ('browser', 'konqueror', 0, 0, 0),
    ('browser', 'icab', 0, 0, 0),
    ('browser', 'omniweb', 0, 0, 0),
    ('browser', 'firebird', 0, 0, 0),
    ('browser', 'firefox', 0, 0, 0),
    ('browser', 'iceweasel', 0, 0, 0),
    ('browser', 'shiretoko', 0, 0, 0),
    ('browser', 'mozilla', 0, 0, 0),
    ('browser', 'amaya', 0, 0, 0),
    ('browser', 'lynx', 0, 0, 0),
    ('browser', 'safari', 0, 0, 0),
    ('browser', 'iphone', 0, 0, 0),
    ('browser', 'ipod', 0, 0, 0),
    ('browser', 'ipad', 0, 0, 0),
    ('browser', 'chrome', 0, 0, 0),
    ('browser', 'android', 0, 0, 0),
    ('browser', 'googlebot', 0, 0, 0),
    ('browser', 'yahooslurp', 0, 0, 0),
    ('browser', 'w3cvalidator', 0, 0, 0),
    ('browser', 'blackberry', 0, 0, 0),
    ('browser', 'icecat', 0, 0, 0),
    ('browser', 'nokias60', 0, 0, 0),
    ('browser', 'nokia', 0, 0, 0),
    ('browser', 'msn', 0, 0, 0),
    ('browser', 'msnbot', 0, 0, 0),
    ('browser', 'bingbot', 0, 0, 0),
    ('browser', 'netscape', 0, 0, 0),
    ('browser', 'galeon', 0, 0, 0),
    ('browser', 'netpositive', 0, 0, 0),
    ('browser', 'phoenix', 0, 0, 0),
    ('browser', 'Mobile', 0, 0, 0),
    ('browser', 'bots', 0, 0, 0),
    ('browser', 'Unknown', 0, 0, 0),
    ('browser', 'Unspecified', 0, 0, 0),
    ('os', 'unknown', 0, 0, 0),
    ('os', 'win', 0, 0, 0),
    ('os', 'win10', 0, 0, 0),
    ('os', 'win8', 0, 0, 0),
    ('os', 'win7', 0, 0, 0),
    ('os', 'win2003', 0, 0, 0),
    ('os', 'winvista', 0, 0, 0),
    ('os', 'wince', 0, 0, 0),
    ('os', 'winxp', 0, 0, 0),
    ('os', 'win2000', 0, 0, 0),
    ('os', 'apple', 0, 0, 0),
    ('os', 'linux', 0, 0, 0),
    ('os', 'os2', 0, 0, 0),
    ('os', 'beos', 0, 0, 0),
    ('os', 'iphone', 0, 0, 0),
    ('os', 'ipod', 0, 0, 0),
    ('os', 'ipad', 0, 0, 0),
    ('os', 'blackberry', 0, 0, 0),
    ('os', 'nokia', 0, 0, 0),
    ('os', 'freebsd', 0, 0, 0),
    ('os', 'openbsd', 0, 0, 0),
    ('os', 'netbsd', 0, 0, 0),
    ('os', 'sunos', 0, 0, 0),
    ('os', 'opensolaris', 0, 0, 0),
    ('os', 'android', 0, 0, 0),
    ('os', 'irix', 0, 0, 0),
    ('os', 'palm', 0, 0, 0),
    ('os', 'Unspecified', 0, 0, 0);");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Thêm trường description vào bảng groups: ";
try {
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_groups ADD `description` text DEFAULT NULL AFTER title;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Cập nhật trường description ở bảng groups: ";
try {
    $db->query("UPDATE " . $db_config['prefix'] . "_groups SET `description` = title;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Thêm trường obid vào bảng notification: ";
try {
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_notification ADD `obid` int(11) UNSIGNED NOT NULL DEFAULT 0 AFTER module;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Thêm trường safemode vào bảng users: ";
try {
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_users ADD `safemode` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 AFTER idsite;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Thêm trường safekey vào bảng users: ";
try {
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_users ADD `safekey` varchar(40) DEFAULT '' AFTER safemode;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "Xóa trường openid_info ở bảng users_reg: ";
try {
    $db->query("ALTER TABLE " . $db_config['prefix'] . "_users_reg DROP IF EXISTS openid_info;");
    echo "OK\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n";

$language_query = $db->query('SELECT lang FROM ' . $db_config['prefix'] . '_setup_language WHERE setup = 1');
while (list ($lang) = $language_query->fetch(3)) {
    echo "Cập nhật cho ngôn ngữ: " . $lang . ":\n";

    // Cập nhật cấu hình global theo ngôn ngữ
    $array = [
        'mobile_theme' => 'mobile_default',
    ];
    foreach ($array as $config_name => $config_value) {
        echo "Cập nhật cấu hình " . $lang . ":global " . $config_name . ": ";
        try {
            $db->query("UPDATE `" . $db_config['prefix'] . "_config` SET config_value=" . $db->quote($config_value) . "
        WHERE config_name='" . $config_name . "' AND lang='" . $lang . "' AND module='global'");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    // Thêm cấu hình global theo ngôn ngữ
    $array = [
        'ssl_https_modules' => '',
    ];
    foreach ($array as $config_name => $config_value) {
        echo "Bổ sung cấu hình " . $lang . ":global " . $config_name . ": ";
        try {
            $db->query("INSERT INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('" . $lang . "', 'global', '" . $config_name . "', '" . $config_value . "')");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    echo "Đổi trường active bảng blocks_groups: ";
    try {
        $db->query("ALTER TABLE `" . $db_config['prefix'] . "_" . $lang . "_blocks_groups` CHANGE active `active` varchar(10) DEFAULT '1'");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    echo "Đổi tên bảng comments thành comment: ";
    try {
        $db->query("RENAME TABLE `" . $db_config['prefix'] . "_" . $lang . "_comments` TO `" . $db_config['prefix'] . "_" . $lang . "_comment`;");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    echo "Xóa url_comment bảng comment: ";
    try {
        $db->query("ALTER TABLE `" . $db_config['prefix'] . "_" . $lang . "_comment` DROP url_comment;");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    echo "Thêm module_upload bảng modules: ";
    try {
        $db->query("ALTER TABLE `" . $db_config['prefix'] . "_" . $lang . "_modules` ADD `module_upload` varchar(55) NOT NULL DEFAULT '' AFTER module_data;");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    echo "Cập nhật module_upload bảng modules bằng title: ";
    try {
        $db->query("UPDATE `" . $db_config['prefix'] . "_" . $lang . "_modules` SET `module_upload` = title;");
        echo "OK\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    // Lấy tất cả các module và module ảo của contact
    $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'contact'");
    while (list ($mod, $mod_data) = $mquery->fetch(3)) {
        echo "Cập nhật cho module: " . $mod . "\n";

        echo "Bổ sung config bodytext: ";
        try {
            $config_value = 'Để không ngừng nâng cao chất lượng dịch vụ và đáp ứng tốt hơn nữa các yêu cầu của Quý khách, chúng tôi mong muốn nhận được các thông tin phản hồi. Nếu Quý khách có bất kỳ thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông tin dưới đây. Chúng tôi sẽ phản hồi lại Quý khách trong thời gian sớm nhất.';
            $db->query("INSERT IGNORE INTO `" . $db_config['prefix'] . "_config` (`lang`, `module`, `config_name`, `config_value`) VALUES ('" . $lang . "', '" . $mod . "', 'bodytext', " . $db->quote($config_value) . ")");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Xóa yahoo bảng department: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department DROP yahoo");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Xóa skype bảng department: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department DROP skype");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Thêm others bảng department: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD `others` text NOT NULL AFTER note");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Thêm cats bảng department: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD `cats` text NOT NULL AFTER others");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Thêm is_default bảng department: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD `is_default` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 AFTER weight");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Thêm cat bảng send: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_send ADD `cat` varchar(255) NOT NULL AFTER cid");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "Đổi trường sender_phone bảng send: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_send CHANGE sender_phone `sender_phone` varchar(20) DEFAULT ''");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "\n";
    }

    // Lấy tất cả các module và module ảo của news
    $mquery = $db->query("SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'");
    while (list ($mod, $mod_data) = $mquery->fetch(3)) {
        echo "Cập nhật cho module: " . $mod . "\n";

        echo "Thêm featured bảng cat: ";
        try {
            $db->query("ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_cat ADD `featured` int(11) NOT NULL DEFAULT 0 AFTER newday");
            echo "OK\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }

        echo "\n";
    }

    echo "\n";
}

echo "Xong!\n";
echo "</code></pre>";
