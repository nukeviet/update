<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2012 VINADES.,JSC. All rights reserved
 * @Createdate 12-06-2015 07:29
 */

if( ! defined( 'NV_IS_UPDATE' ) ) die( 'Stop!!!' );
 
$nv_update_config = array();

$nv_update_config['type'] = 1; // Kieu nang cap 1: Update; 2: Upgrade
$nv_update_config['packageID'] = 'NVUD3403'; // ID goi cap nhat
$nv_update_config['formodule'] = ""; // Cap nhat cho module nao, de trong neu la cap nhat NukeViet, ten thu muc module neu la cap nhat module

// Thong tin phien ban, tac gia, ho tro
$nv_update_config['release_date'] = 1434070180;
$nv_update_config['author'] = "VINADES.,JSC (contact@vinades.vn)";
$nv_update_config['support_website'] = "http://forum.nukeviet.vn/";
$nv_update_config['to_version'] = "3.4.03.r1930";
$nv_update_config['allow_old_version'] = array( "3.4.02.r1920", "3.4.02.r1929" );
$nv_update_config['update_auto_type'] = 1; // 0:Nang cap bang tay, 1:Nang cap tu dong, 2:Nang cap nua tu dong

$nv_update_config['lang'] = array();
$nv_update_config['lang']['vi'] = array();
$nv_update_config['lang']['en'] = array();

// Tiếng Việt
$nv_update_config['lang']['vi']['update_nukeviet_version'] = 'Nâng cấp phiên bản và Revision';

// English
$nv_update_config['lang']['en']['update_nukeviet_version'] = 'Update Version and Revision';

$nv_update_config['tasklist'] = array();
$nv_update_config['tasklist'][] = array( 'r' => 1930, 'rq' => 2, 'l' => 'update_nukeviet_version', 'f' => 'nv_up_finish' );

/**
 *
 * @return
 */
function nv_up_finish()
{
	global $nv_update_baseurl, $db, $db_config, $global_config;
	
	$return = array( 'status' => 1, 'complete' => 1, 'next' => 1, 'link' => 'NO', 'lang' => 'NO', 'message' => '', );
	
	// Update revision
	$db->sql_query( "REPLACE INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'version', '3.4.03')" );
	$db->sql_query( "REPLACE INTO `" . NV_CONFIG_GLOBALTABLE . "` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', 'revision', '1930')" );

	nv_save_file_config_global();
	
	return $return;
}

?>