<?php
define( 'NV_SYSTEM', true );
require str_replace( DIRECTORY_SEPARATOR, '/', dirname( __file__ ) ) . '/mainfile.php';

$fixthemes = 'default10';
if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes ) )
{
	// Di chuuyển các file
	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.banners.tpl' ) )
	{
		rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.banners.tpl', NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/banners/global.banners.tpl' );
	}

	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.counter.tpl' ) )
	{
		rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.counter.tpl', NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/statistics/global.counter.tpl' );
	}

	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.rss.tpl' ) )
	{
		mkdir( NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/feeds' );
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/feeds/index.html', '' );
		rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/blocks/global.rss.tpl', NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/feeds/global.rss.tpl' );
	}

	// fixcol
	function dir_tree_pack_tpl( $dir )
	{
		$path = array( );
		$res = array( );
		$stack[] = $dir;
		while( $stack )
		{
			$thisdir = array_pop( $stack );
			if( $dircont = scandir( $thisdir ) )
			{
				$i = 0;
				while( isset( $dircont[$i] ) )
				{
					if( $dircont[$i] !== '.' && $dircont[$i] !== '..' )
					{
						$current_file = $thisdir . "/" . $dircont[$i];
						if( is_file( $current_file ) )
						{
							if( preg_match( '/\.tpl$/', $dircont[$i] ) )
							{
								$res[] = str_replace( $dir, "", $thisdir . "/" . $dircont[$i] );
							}
						}
						elseif( is_dir( $current_file ) and $current_file != NV_SOURCE . '/editors/ckeditor' )
						{
							$stack[] = $current_file;
						}
					}

					$i++;
				}
			}
		}
		return $res;
	}



	$content_bootstrap = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.css' );
	if( strpos($content_bootstrap, '.col-xs-12') > 0 AND strpos($content_bootstrap, '.col-xs-24') === false )
	{
		$files = dir_tree_pack_tpl( NV_ROOTDIR . '/themes/' . $fixthemes );
		foreach( $files as $file_i )
		{
			$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
			$content = $content_old;
			for( $i = 12; $i > 0; $i-- )
			{
				$content = preg_replace( '/([\\s|\'\"])col\-xs\-' . $i . '([\\s|\'\"])/', "\\1col-xs-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-sm\-' . $i . '([\\s|\'\"])/', "\\1col-sm-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-md\-' . $i . '([\\s|\'\"])/', "\\1col-md-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-lg\-' . $i . '([\\s|\'\"])/', "\\1col-lg-" . ($i * 2) . "\\2", $content );

				$content = preg_replace( '/([\\s|\'\"])col\-xs\-push\-' . $i . '([\\s|\'\"])/', "\\1col-xs-push-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-sm\-push\-' . $i . '([\\s|\'\"])/', "\\1col-sm-push-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-md\-push\-' . $i . '([\\s|\'\"])/', "\\1col-md-push-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-lg\-push\-' . $i . '([\\s|\'\"])/', "\\1col-lg-push-" . ($i * 2) . "\\2", $content );

				$content = preg_replace( '/([\\s|\'\"])col\-xs\-pull\-' . $i . '([\\s|\'\"])/', "\\1col-xs-pull-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-sm\-pull\-' . $i . '([\\s|\'\"])/', "\\1col-sm-pull-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-md\-pull\-' . $i . '([\\s|\'\"])/', "\\1col-md-pull-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-lg\-pull\-' . $i . '([\\s|\'\"])/', "\\1col-lg-pull-" . ($i * 2) . "\\2", $content );

				$content = preg_replace( '/([\\s|\'\"])col\-xs\-offset\-' . $i . '([\\s|\'\"])/', "\\1col-xs-offset-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-sm\-offset\-' . $i . '([\\s|\'\"])/', "\\1col-sm-offset-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-md\-offset\-' . $i . '([\\s|\'\"])/', "\\1col-md-offset-" . ($i * 2) . "\\2", $content );
				$content = preg_replace( '/([\\s|\'\"])col\-lg\-offset\-' . $i . '([\\s|\'\"])/', "\\1col-lg-offset-" . ($i * 2) . "\\2", $content );

			}
			$content = rtrim( $content );
			if( $content != $content_old )
			{
				file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $content, LOCK_EX );
				echo 'ok:fix col---' . $file_i . '<br>';
			}
		}

		// Thay thế thư viện bootstrap lên 24 cột
		if( !file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/config.json' ) )
		{
			nv_copyfile( NV_ROOTDIR . '/themes/default/config.json', NV_ROOTDIR . '/themes/' . $fixthemes . '/config.json' );

			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.css.' . NV_CURRENTTIME );
			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.min.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.min.css.' . NV_CURRENTTIME );
			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.css.' . NV_CURRENTTIME );
			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.min.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.min.css.' . NV_CURRENTTIME );

			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.js', NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.js.' . NV_CURRENTTIME );
			rename( NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.min.js', NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.min.js.' . NV_CURRENTTIME );

			copy( NV_ROOTDIR . '/themes/default/css/bootstrap-theme.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.css' );
			copy( NV_ROOTDIR . '/themes/default/css/bootstrap-theme.min.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap-theme.min.css' );
			copy( NV_ROOTDIR . '/themes/default/css/bootstrap.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.css' );
			copy( NV_ROOTDIR . '/themes/default/css/bootstrap.min.css', NV_ROOTDIR . '/themes/' . $fixthemes . '/css/bootstrap.min.css' );

			copy( NV_ROOTDIR . '/themes/default/js/bootstrap.js', NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.js' );
			copy( NV_ROOTDIR . '/themes/default/js/bootstrap.min.js', NV_ROOTDIR . '/themes/' . $fixthemes . '/js/bootstrap.min.js' );
		}
	}

	// Xoa va copy them cac file anh
	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/images/users/myopenid.gif' ) )
	{
		unlink( NV_ROOTDIR . '/themes/' . $fixthemes . '/images/users/myopenid.gif' );
		copy( NV_ROOTDIR . '/themes/default/images/users/single-sign-on.gif', NV_ROOTDIR . '/themes/' . $fixthemes . '/images/users/single-sign-on.gif' );
	}

	// copy them file tpl cua module page
	if( !file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/page/block.page_list.tpl' ) )
	{
		copy( NV_ROOTDIR . '/themes/default/modules/page/block.page_list.tpl', NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/page/block.page_list.tpl' );
	}

	// copy them file tpl cua module page
	if( !file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/comment/block_new_comment.tpl' ) )
	{
		copy( NV_ROOTDIR . '/themes/default/modules/comment/block_new_comment.tpl', NV_ROOTDIR . '/themes/' . $fixthemes . '/modules/comment/block_new_comment.tpl' );
	}

	// hàm fix
	function toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews )
	{
		$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
		$a = preg_match( '#' . $begin . '(.*)' . $end . '#s', $content_old, $arr );
		$content_replace = str_replace( $arr[1], $contentnews, $content_old );
		if( $content_replace != $content_old )
		{
			file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $content_replace, LOCK_EX );
			return TRUE;
		}
		return FALSE;
	}

	//
	//module banner
	// file:modules\banners\addads.tpl
	$file_i = "modules/banners/addads.tpl";
	$begin = '<!-- BEGIN: management -->';
	$end = '<!-- END: management -->';
	$contentnews = '
	<ul class="nav nav-tabs m-bottom">
		<li><a href="{MANAGEMENT.main}">{LANG.plan_info}</a></li>
		<li><a href="{MANAGEMENT.link}">{LANG.client_info}</a></li>
		<li class="active"><a href="{MANAGEMENT.addads}">{LANG.client_addads}</a></li>
		<li><a href="{MANAGEMENT.stats}">{LANG.client_stats}</a></li>
		<li><a href="{MANAGEMENT.logout}">{GLANG.logout}</a></li>
	</ul>
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );

	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//file:modules\banners\clinfo.tpl
	$file_i = "modules/banners/clinfo.tpl";
	$begin = '<!-- BEGIN: management -->';
	$end = '<!-- END: management -->';
	$contentnews = '
	<ul class="nav nav-tabs m-bottom">
		<li><a href="{MANAGEMENT.main}">{LANG.plan_info}</a></li>
		<li class="active"><a href="{MANAGEMENT.link}">{LANG.client_info}</a></li>
		<li><a href="{MANAGEMENT.addads}">{LANG.client_addads}</a></li>
		<li><a href="{MANAGEMENT.stats}">{LANG.client_stats}</a></li>
		<li><a href="{MANAGEMENT.logout}">{GLANG.logout}</a></li>
	</ul>
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );
	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	// file: modules\banners\home.tpl
	$file_i = "modules/banners/home.tpl";
	$begin = '<!-- BEGIN: management -->';
	$end = '<!-- END: management -->';
	$contentnews = '
	<ul class="nav nav-tabs m-bottom">
		<li class="active"><a href="{MANAGEMENT.main}">{LANG.plan_info}</a></li>
		<li><a href="{MANAGEMENT.link}">{LANG.client_info}</a></li>
		<li><a href="{MANAGEMENT.addads}">{LANG.client_addads}</a></li>
		<li><a href="{MANAGEMENT.stats}">{LANG.client_stats}</a></li>
		<li><a href="{MANAGEMENT.logout}">{GLANG.logout}</a></li>
	</ul>
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );
	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//file:modules\banners\stats.tpl
	$file_i = "modules/banners/stats.tpl";
	$begin = '<!-- BEGIN: management -->';
	$end = '<!-- END: management -->';
	$contentnews = '
	<ul class="nav nav-tabs m-bottom">
		<li><a href="{MANAGEMENT.main}">{LANG.plan_info}</a></li>
		<li class="active"><a href="{MANAGEMENT.link}">{LANG.client_info}</a></li>
		<li><a href="{MANAGEMENT.addads}">{LANG.client_addads}</a></li>
		<li class="active"><a href="{MANAGEMENT.stats}">{LANG.client_stats}</a></li>
		<li><a href="{MANAGEMENT.logout}">{GLANG.logout}</a></li>
	</ul>
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );

	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//module contact
	//file:modules\contact\block.department.tpl

	$file_i = "modules/contact/block.department.tpl";
	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i ) )
	{
		$begin = '<!-- BEGIN: yahoo -->';
		$end = '<!-- END: yahoo -->';
		$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
		if( preg_match( '#' . $begin . '(.*)' . $end . '#s', $content_old, $arr ) )
		{
			$clangyahoo = str_replace( '{LANG.skype}', '{LANG.yahoo}', $arr[1] );
			$content_replace = str_replace( $arr[1], $clangyahoo, $content_old );
			if( $content_replace != $content_old )
			{
				file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $content_replace, LOCK_EX );
				echo "ok---" . $file_i . '<br>';
			}
		}
	}

	//module download
	//file:/modules/download/viewfile.tpl
	$file_i = "modules/download/viewfile.tpl";
	$begin = '<!-- BEGIN: comment -->';
	$end = '<!-- END: comment -->';
	$contentnews = '
	{CONTENT_COMMENT}
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );
	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//module menu
	//file:modules\menu\global.bootstrap.tpl

	$file_i = "modules/menu/global.bootstrap.tpl";
	$add = '<!-- BEGIN: submenu -->
	<ul class="dropdown-menu">
	<!-- BEGIN: loop -->
	<li <!-- BEGIN: submenu -->class="dropdown-submenu"<!-- END: submenu -->>
	<!-- BEGIN: icon -->
	<img src="{SUBMENU.icon}" />&nbsp;
	<!-- END: icon -->
	<a href="{SUBMENU.link}" title="{SUBMENU.note}"
	{SUBMENU.target}>{SUBMENU.title_trim}</a>
	<!-- BEGIN: item -->
	{SUB}
	<!-- END: item -->
	</li>
	<!-- END: loop -->
	</ul>
	<!-- END: submenu -->
	<!-- BEGIN: main -->';
	$begin = '<!-- BEGIN: sub -->';
	$end = '<!-- END: sub -->';
	$contentnews = '
	{SUB}
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );
	if( $e )
	{
		$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
		$new = preg_replace( '#<!-- BEGIN: main -->#s', $add, $content_old );
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $new, LOCK_EX );
		echo "ok---" . $file_i . '<br>';
	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//module news
	//File:modules/news/detail.tpl
	$file_i = "modules/news/detail.tpl";

	$begin = '<!-- BEGIN: comment -->';
	$end = '<!-- END: comment -->';
	$contentnews = '
	{CONTENT_COMMENT}
	';
	$e = toolfix_change( $fixthemes, $file_i, $begin, $end, $contentnews );
	if( $e )
	{
		echo "ok---" . $file_i . '<br>';

	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//File:modules/news/viewcat_list.tpl
	$file_i = "modules/news/viewcat_list.tpl";
	$search = '<a class="show" href="{OTHER.link}" data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip">{CONTENT.title}';
	$add = '
	<a class="show" href="{CONTENT.link}" data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip">
	';
	$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
	$new = preg_replace( '#' . $search . '#s', $add, $content_old );
	if( $new != $content_old )
	{
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $new, LOCK_EX );
		echo "ok---" . $file_i . '<br>';
	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	// module page
	//file:modules/page/main_list.tpl
	$file_i = "modules/page/main_list.tpl";
	$search = '<!-- END: loop -->';
	$add = '<!-- END: loop -->
	<div class="text-center">{GENERATE_PAGE}</div>';
	$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
	$new = preg_replace( '#' . $search . '#s', $add, $content_old );

	if( $new != $content_old )
	{
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $new, LOCK_EX );
		echo "ok---" . $file_i . '<br>';
	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//module user
	//file:modules\users\info.tpl
	$file_i = "modules/users/info.tpl";
	$search = '<div class="form-group">
	<label for="full_name" class="col-sm-6 control-label">{LANG.name}:</label>
	<div class="col-sm-18">
	<input type="text" class="form-control required" name="full_name" value="{DATA.full_name}" id="full_name" maxlength="100"  placeholder="{LANG.name}"/>
	</div>
	</div>';
	$add = '
	<div class="form-group">
	<label for="first_name" class="col-sm-6 control-label">{LANG.first_name}:</label>
	<div class="col-sm-18">
	<input type="text" class="form-control required" name="first_name" value="{DATA.first_name}" id="first_name" maxlength="100"  placeholder="{LANG.first_name}"/>
	</div>
	</div>
	<div class="form-group">
	<label for="last_name" class="col-sm-6 control-label">{LANG.last_name}:</label>
	<div class="col-sm-18">
	<input type="text" class="form-control required" name="last_name" value="{DATA.last_name}" id="last_name" maxlength="100"  placeholder="{LANG.last_name}"/>
	</div>
	</div>

	';
	$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
	$new = preg_replace( '#' . $search . '#s', $add, $content_old );

	if( $new != $content_old )
	{
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $new, LOCK_EX );
		echo "ok---" . $file_i . '<br>';
	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//file:\modules\users\register.tpl
	$file_i = "modules/users/register.tpl";
	$search = '<div class="form-group">
	<label for="full_name" class="col-sm-8 control-label">{LANG.name}:</label>
	<div class="col-sm-16">
	<input type="text" class="form-control" id="full_name" name="full_name" value="{DATA.full_name}" maxlength="255" />
	</div>
	</div>
	';
	$add = '
	<div class="form-group">
	<label for="first_name" class="col-sm-8 control-label">{LANG.first_name}:</label>
	<div class="col-sm-16">
	<input type="text" class="form-control" id="first_name" name="first_name" value="{DATA.first_name}" maxlength="255" />
	</div>
	</div>
	<div class="form-group">
	<label for="last_name" class="col-sm-8 control-label">{LANG.last_name}:</label>
	<div class="col-sm-16">
	<input type="text" class="form-control" id="last_name" name="last_name" value="{DATA.last_name}" maxlength="255" />
	</div>
	</div>
	';
	$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
	$new = preg_replace( '#' . $search . '#s', $add, $content_old );

	if( $new != $content_old )
	{
		file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $new, LOCK_EX );
		echo "ok---" . $file_i . '<br>';
	}
	else
	{
		echo("Lỗi " . $file_i . "<br>");
	}

	//file:modules\users\openid_administrator.tpl
	$file_i = "modules/users/openid_administrator.tpl";
	if( file_exists( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i ) )
	{
		$begin = '<!-- BEGIN: openid_list -->';
		$end = '<!-- END: openid_list -->';

		$content_old = file_get_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i );
		if( preg_match( '#' . $begin . '(.*)' . $end . '#s', $content_old, $arr ) )
		{
			$openid_i = str_replace( '{OPENID_LIST.server}', '{OPENID_LIST.openid}', $arr[1] );
			$openid_i = str_replace( '<a href="javascript:void(0);" title="{OPENID_LIST.openid}">{OPENID_LIST.openid}</a>', '{OPENID_LIST.openid}', $openid_i );
			$content_replace = str_replace( $arr[1], $openid_i, $content_old );

			if( $content_replace != $content_old )
			{
				file_put_contents( NV_ROOTDIR . '/themes/' . $fixthemes . '/' . $file_i, $content_replace, LOCK_EX );
				echo "ok---" . $file_i . '<br>';
			}
			else
			{
				echo("Lỗi " . $file_i . "<br>");
			}
		}
	}
	die( "Success" );
}
else
{
	die( "Error: not found theme: " . $fixthemes );
}