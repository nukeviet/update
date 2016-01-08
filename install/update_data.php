<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */


if( !defined( 'NV_IS_UPDATE' ) ) die( 'Stop!!!' );

$nv_update_config = array();

// Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['type'] = 1;

// ID goi cap nhat
$nv_update_config['packageID'] = 'NVUD4013';

// Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module
$nv_update_config['formodule'] = "";

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1416814789;
$nv_update_config['author'] = "VINADES.,JSC (contact@vinades.vn)";
$nv_update_config['support_website'] = "http://forum.nukeviet.vn/";
$nv_update_config['to_version'] = "4.0.13";
$nv_update_config['allow_old_version'] = array( "4.0.10" );

// 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong
$nv_update_config['update_auto_type'] = 1;

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['nv_up_sysdb'] = 'Cập nhật CSDL hệ thống';
$nv_update_config['lang']['vi']['nv_up_bannerdb'] = 'Cập nhật CSDL module banner (nếu có)';
$nv_update_config['lang']['vi']['nv_up_pagedb'] = 'Cập nhật CSDL module page (nếu có)';
$nv_update_config['lang']['vi']['nv_up_newsdb'] = 'Cập nhật CSDL module news (nếu có)';
$nv_update_config['lang']['vi']['nv_up_users'] = 'Cập nhật CSDL module user (nếu có)';
$nv_update_config['lang']['vi']['nv_up_contact'] = 'Cập nhật CSDL module contact (nếu có)';
$nv_update_config['lang']['vi']['nv_up_comments'] = 'Cập nhật CSDL module comment (nếu có)';
$nv_update_config['lang']['vi']['nv_up_delfiles'] = 'Xóa các file thừa';
$nv_update_config['lang']['vi']['nv_up_finish'] = 'Đánh dấu phiên bản mới';

// English
$nv_update_config['lang']['en']['nv_up_sysdb'] = 'Update system database';
$nv_update_config['lang']['en']['nv_up_bannerdb'] = 'Update banner database (if there)';
$nv_update_config['lang']['en']['nv_up_pagedb'] = 'Update page database';
$nv_update_config['lang']['en']['nv_up_newsdb'] = 'Update news database';
$nv_update_config['lang']['en']['nv_up_users'] = 'Update user database (if there)';
$nv_update_config['lang']['en']['nv_up_contact'] = 'Update contact database (if there)';
$nv_update_config['lang']['en']['nv_up_comments'] = 'Update comment database (if there)';
$nv_update_config['lang']['en']['nv_up_delfiles'] = 'Delete files';
$nv_update_config['lang']['en']['nv_up_finish'] = 'Update new version';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_sysdb',
	'f' => 'nv_up_sysdb'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_bannerdb',
	'f' => 'nv_up_bannerdb'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_pagedb',
	'f' => 'nv_up_pagedb'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_newsdb',
	'f' => 'nv_up_newsdb'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_contact',
	'f' => 'nv_up_contact'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_comments',
	'f' => 'nv_up_comments'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_users',
	'f' => 'nv_up_users'
);

$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 0,
	'l' => 'nv_up_delfiles',
	'f' => 'nv_up_delfiles'
);
$nv_update_config['tasklist'][] = array(
	'r' => '4.0.13',
	'rq' => 1,
	'l' => 'nv_up_finish',
	'f' => 'nv_up_finish'
);

// Danh sach cac function
/*
 Chuan hoa tra ve:
 array(
 'status' =>
 'complete' =>
 'next' =>
 'link' =>
 'lang' =>
 'message' =>
 );

 status: Trang thai tien trinh dang chay
 - 0: That bai
 - 1: Thanh cong

 complete: Trang thai hoan thanh tat ca tien trinh
 - 0: Chua hoan thanh tien trinh nay
 - 1: Da hoan thanh tien trinh nay

 next:
 - 0: Tiep tuc ham nay voi "link"
 - 1: Chuyen sang ham tiep theo

 link:
 - NO
 - Url to next loading

 lang:
 - ALL: Tat ca ngon ngu
 - NO: Khong co ngon ngu loi
 - LangKey: Ngon ngu bi loi vi,en,fr ...

 message:
 - Any message

 Duoc ho tro boi bien $nv_update_baseurl de load lai nhieu lan mot function
 Kieu cap nhat module duoc ho tro boi bien $old_module_version
 */

/**
 * nv_up_sysdb()
 *
 * @return
 */
function nv_up_sysdb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);

	$sqls = array();

	// Các cập nhật cho hệ thống không liên quan tới ngôn ngữ
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES ('sys', 'global', 'ssl_https', '0')";
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES ('sys', 'global', 'notification_active', '1')";
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES ('sys', 'global', 'notification_autodel', '15')";
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES ('sys', 'global', 'google_client_id', NULL)";
	$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES ('sys', 'global', 'google_client_secret', NULL)";

	$sqls[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_cookies (
		  name varchar(50) NOT NULL DEFAULT '',
		  value mediumtext NOT NULL,
		  domain varchar(100) NOT NULL DEFAULT '',
		  path varchar(100) NOT NULL DEFAULT '',
		  expires int(11) NOT NULL DEFAULT '0',
		  secure tinyint(1) NOT NULL DEFAULT '0',
		  UNIQUE KEY cookiename (name,domain,path),
		  KEY name (name)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	$sqls[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_extension_files (
		  idfile mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
		  type varchar(10) NOT NULL DEFAULT 'other',
		  title varchar(55) NOT NULL DEFAULT '',
		  path varchar(255) NOT NULL DEFAULT '',
		  lastmodified int(11) unsigned NOT NULL DEFAULT '0',
		  duplicate smallint(4) unsigned NOT NULL DEFAULT '0',
		  PRIMARY KEY (idfile)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=495 ";

	$sqls[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_notification (
		  id int(11) unsigned NOT NULL AUTO_INCREMENT,
		  send_to mediumint(8) unsigned NOT NULL,
		  send_from mediumint(8) unsigned NOT NULL DEFAULT '0',
		  area tinyint(1) unsigned NOT NULL,
		  language char(3) NOT NULL,
		  module varchar(50) NOT NULL,
		  type varchar(255) NOT NULL,
		  content text NOT NULL,
		  add_time int(11) unsigned NOT NULL,
		  view tinyint(1) unsigned NOT NULL DEFAULT '0',
		  PRIMARY KEY (id)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";

	$sqls[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_setup_extensions (
		  id int(11) NOT NULL DEFAULT '0',
		  type varchar(10) NOT NULL DEFAULT 'other',
		  title varchar(55) NOT NULL,
		  is_sys tinyint(1) NOT NULL DEFAULT '0',
		  virtual tinyint(1) NOT NULL DEFAULT '0',
		  basename varchar(50) NOT NULL DEFAULT '',
		  table_prefix varchar(55) NOT NULL DEFAULT '',
		  version varchar(50) NOT NULL,
		  addtime int(11) NOT NULL DEFAULT '0',
		  author text NOT NULL,
		  note varchar(255) DEFAULT '',
		  UNIQUE KEY title (type,title),
		  KEY id (id),
		  KEY type (type)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Các cập nhật hệ thống liên quan đến ngôn ngữ
		$sqls[] = "UPDATE " . $db_config['prefix'] . "_" . $lang . "_modfuncs SET func_name = 'sitemap', alias = 'sitemap' WHERE func_name='Sitemap'";
		$sqls[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_modfuncs (func_id, func_name, alias, func_custom_name, in_module, show_func, in_submenu, subweight, setting) VALUES (Null, 'oauth', 'oauth', 'Oauth', 'users', '0', '0', '0', '')";
		$sqls[] = "UPDATE " . $db_config['prefix'] . "_" . $lang . "_modules SET groups_view = '2' WHERE title = 'statistics'";

		$sqls[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', 'global', 'name_show', '1')";
		$sqls[] = "INSERT INTO " . $db_config['prefix'] . "_cronjobs (id, start_time, inter_val, run_file, run_func, params, del, is_sys, act, last_time, last_result, " . $lang . "_cron_name) VALUES ('10', '0', '1440', 'notification_autodel.php', 'cron_notification_autodel', NULL, '0', '1', '1', '0', '1', 'Xóa thông báo cũ')";
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;
}

/**
 * nv_up_bannerdb()
 *
 * @return
 */

function nv_up_bannerdb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( !$language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Lấy tất cả các module banners và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'banners'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $mod_data . "_clients CHANGE pass pass VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;";
		}
	}
	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;

}

/**
 * nv_up_pagedb()
 *
 * @return
 */
function nv_up_pagedb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( !$language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Lấy tất cả các module page và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'page'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			$sqls[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_config VALUES  ('per_page', '5'), ('related_articles', '5')";
		}
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;
}

/**
 * nv_up_newsdb()
 *
 * @return
 */
function nv_up_newsdb()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		// Lấy tất cả các module page và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'news'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( PDO::FETCH_NUM ) )
		{
			$sql = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " VALUES  ('" . $lang . "', '" . $mod . "', 'alias_lower', '1')";
			try
			{
				$db->query( $sql );
			}
			catch( PDOException $e )
			{
				//$return['message'] = $e->getMessage();
			}	
			
			$sql = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_logs (
				 id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
				 sid mediumint(8) NOT NULL DEFAULT '0',
				 userid mediumint(8) unsigned NOT NULL DEFAULT '0',
				 status tinyint(4) NOT NULL DEFAULT '0',
				 note varchar(255) NOT NULL,
				 set_time int(11) unsigned NOT NULL DEFAULT '0',
				 PRIMARY KEY (id),
				 KEY sid (sid),
				 KEY userid (userid)
			) ENGINE=MyISAM";
			try
			{
				$db->query( $sql );
			}
			catch( PDOException $e )
			{
				//$return['message'] = $e->getMessage();
			}			
		}
	}

	return $return;
}

/**
 * nv_up_contact()
 *
 * @return
 */

function nv_up_contact()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( !$language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( 3 ) )
	{
		// Lấy tất cả các module contact và module ảo của nó
		$mquery = $db->query( "SELECT title, module_data FROM " . $db_config['prefix'] . "_" . $lang . "_modules WHERE module_file = 'contact'" );

		while( list( $mod, $mod_data ) = $mquery->fetch( 3 ) )
		{
			$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD alias VARCHAR(255) NOT NULL AFTER full_name;";
			$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ADD weight SMALLINT(5) NOT NULL AFTER act;";

			$weight = 0;
			$arr_alias = array();
			$cquery = $db->query( "SELECT id, full_name FROM " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department ORDER BY id ASC" );
			while( list( $id, $full_name ) = $cquery->fetch( PDO::FETCH_NUM ) )
			{
				++$weight;
				$alias = change_alias( $full_name );
				if( in_array( $alias, $arr_alias ) )
				{
					$alias .= '-' . $id;
				}
				$arr_alias[] = $alias;
				$sqls[] = "UPDATE  " . $db_config['prefix'] . "_" . $lang . "_" . $mod_data . "_department SET alias = '" . $alias . "', weight = " . $weight . " WHERE id = " . $id;
			}
		}
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;
}

/**
 * nv_up_comments()
 *
 * @return
 */
function nv_up_comments()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();

	// Lấy tất cả ngôn ngữ của site
	$language_query = $db->query( "SELECT lang FROM " . $db_config['prefix'] . "_setup_language WHERE setup = 1" );

	if( !$language_query )
	{
		$return['status'] = 0;
		$return['complete'] = 0;

		return $return;
	}

	// Duyệt tất cả các ngôn ngữ
	while( list( $lang ) = $language_query->fetch( PDO::FETCH_NUM ) )
	{
		$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_comments CHANGE area area INT(11) NOT NULL";
		$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_" . $lang . "_comments ADD url_comment VARCHAR(255) NOT NULL AFTER post_ip";
	}

	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;
}

/**
 * nv_up_users()
 *
 * @return
 */
function nv_up_users()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	$sqls = array();
	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users ADD first_name VARCHAR(100) NULL DEFAULT '' AFTER full_name";
	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users ADD last_name VARCHAR(100) NULL DEFAULT '' AFTER first_name";
	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users CHANGE `password` `password` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''";


	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users_reg ADD first_name VARCHAR(100) NULL DEFAULT '' AFTER full_name";
	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users_reg ADD last_name VARCHAR(100) NULL DEFAULT '' AFTER first_name";
	$sqls[] = "ALTER TABLE " . $db_config['prefix'] . "_users_reg CHANGE `password` `password` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''";

	$sqls[] = "UPDATE " . $db_config['prefix'] . "_users SET first_name=full_name where full_name!=''";
	$sqls[] = "UPDATE " . $db_config['prefix'] . "_users_reg SET first_name=full_name where full_name!=''";
	// Thực hiện truy vấn dữ liệu
	foreach( $sqls as $sql )
	{
		try
		{
			$db->query( $sql );
		}
		catch( PDOException $e )
		{
			//$return['message'] = $e->getMessage();
		}
	}

	return $return;
}

/**
 * nv_up_delfiles()
 *
 * @return
 */

function nv_up_delfiles()
{
	global $nv_update_baseurl;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);
	@nv_deletefile( NV_ROOTDIR . '/admin/modules/autoinstall.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/modules/getfile.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/modules/install_check.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/modules/install_module.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/modules/install_package.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/themes/deletetheme.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/themes/install_check.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/themes/install_theme.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/themes/package_theme.php' );
	@nv_deletefile( NV_ROOTDIR . '/admin/extensions/extensions.class.php ' );

	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/eqneditor/dialogs/lang/index.html' );
	@nv_deletefile( NV_ROOTDIR . '/editors/ckeditor/plugins/eqneditor/dialogs/lang/en.js' );

	@nv_deletefile( NV_ROOTDIR . '/includes/openid.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/seek/language/admin_en.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/seek/language/admin_vi.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/users/facebook.auth.class.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/users/admin/export.php' );
	@nv_deletefile( NV_ROOTDIR . '/modules/users/admin/import.php' );

	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/images/icons/note1.png' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/images/icons/note2.png' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/images/icons/note3.png' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/images/icons/note4.png' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/images/icons/note5.png' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/modules/autoinstall.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/modules/delmodule.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/modules/install_check.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/modules/install_module.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/modules/install_package.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/themes/install_check.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/themes/install_theme.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/themes/package_theme.tpl' );
	@nv_deletefile( NV_ROOTDIR . '/themes/admin_default/modules/users/import.tpl' );

	@nv_deletefile( NV_ROOTDIR . '/themes/default/images/users/myopenid.gif' );
	@nv_deletefile( NV_ROOTDIR . '/themes/modern/images/users/myopenid.gif' );
	
	@nv_deletefile( NV_ROOTDIR . '/js/jquery/jquery-1.11.1.min.map' );
	@nv_deletefile( NV_ROOTDIR . '/modules/news/admin/exptime.php' );
	
	return $return;
}

/**
 * nv_up_finish()
 *
 * @return
 */
function nv_up_finish()
{
	global $nv_update_baseurl, $db, $db_config;

	$return = array(
		'status' => 1,
		'complete' => 1,
		'next' => 1,
		'link' => 'NO',
		'lang' => 'NO',
		'message' => '',
	);

	$db->query( "UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '4.0.13' WHERE lang = 'sys' AND module = 'global' AND config_name = 'version'" );

	return $return;
}