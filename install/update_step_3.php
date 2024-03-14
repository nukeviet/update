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

// Xóa các file config.ini để build lại đúng rewrite
$files = nv_scandir(NV_ROOTDIR . '/' . NV_DATADIR, '/^config\_ini\.(.*)\.php$/i');
foreach ($files as $file) {
    nv_deletefile(NV_ROOTDIR . '/' . NV_DATADIR . '/' . $file);
}

// Chạy lại .htaccess
$array_config_rewrite = [
    'rewrite_enable' => $global_config['rewrite_enable'],
    'rewrite_optional' => $global_config['rewrite_optional'],
    'rewrite_endurl' => $global_config['rewrite_endurl'],
    'rewrite_exturl' => $global_config['rewrite_exturl'],
    'rewrite_op_mod' => $global_config['rewrite_op_mod'],
    'ssl_https' => $global_config['ssl_https']
];
nv_rewrite_change($array_config_rewrite);

// Xóa file thừa
nv_deletefile(NV_ROOTDIR . '/admin/authors/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/database/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/extensions/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/language/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/modules/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/seotools/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/settings/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/settings/cdn.php');
nv_deletefile(NV_ROOTDIR . '/admin/siteinfo/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/themes/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/themes/change_layout.php');
nv_deletefile(NV_ROOTDIR . '/admin/upload/.htaccess');
nv_deletefile(NV_ROOTDIR . '/admin/webtools/.htaccess');
nv_deletefile(NV_ROOTDIR . '/assets/.htaccess');
nv_deletefile(NV_ROOTDIR . '/assets/editors/.htaccess');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/autosave', true);
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/eqneditor/plugin.js');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/flash', true);
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/googledocs/plugin.js');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/video/images/icon.png');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/video/plugin.js');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/colorpanel.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/elementspath.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/index.html');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/mainui.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/menu.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/notification.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/panel.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/presets.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/richcombo.css');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/skins/moono/toolbar.css');
nv_deletefile(NV_ROOTDIR . '/assets/images/.htaccess');
nv_deletefile(NV_ROOTDIR . '/assets/js/.htaccess');
nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.bundle.min.js');
nv_deletefile(NV_ROOTDIR . '/assets/js/chart/Chart.min.css');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-next@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/findbarButton-previous@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/loading-small@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-documentProperties@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-firstPage@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-handTool@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-lastPage@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCcw@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-rotateCw@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/secondaryToolbarButton-selectTool@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/texture.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-bookmark@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-download@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-menuArrows@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-openFile@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageDown@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-pageUp@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-presentationMode@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-print@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-search@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-secondaryToolbarToggle@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-sidebarToggle@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewAttachments@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewOutline@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-viewThumbnail@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomIn@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/toolbarButton-zoomOut@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed-rtl@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-collapsed@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded.png');
nv_deletefile(NV_ROOTDIR . '/assets/js/pdf.js/images/treeitem-expanded@2x.png');
nv_deletefile(NV_ROOTDIR . '/assets/tpl/.htaccess');
nv_deletefile(NV_ROOTDIR . '/data/.htaccess');
nv_deletefile(NV_ROOTDIR . '/data/cache/.htaccess');
nv_deletefile(NV_ROOTDIR . '/data/ip/.htaccess');
nv_deletefile(NV_ROOTDIR . '/data/ip6/.htaccess');
nv_deletefile(NV_ROOTDIR . '/data/logs/.htaccess');
nv_deletefile(NV_ROOTDIR . '/includes/.htaccess');
nv_deletefile(NV_ROOTDIR . '/includes/utf8/.htaccess');
nv_deletefile(NV_ROOTDIR . '/modules/.htaccess');
nv_deletefile(NV_ROOTDIR . '/modules/banners/admin/info_pl.php');
nv_deletefile(NV_ROOTDIR . '/themes/.htaccess');
nv_deletefile(NV_ROOTDIR . '/themes/admin_default/modules/banners/info_pl.tpl');
nv_deletefile(NV_ROOTDIR . '/themes/default/blocks/global.QR_code.ini');
nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/blocks/global.QR_code.ini');
nv_deletefile(NV_ROOTDIR . '/themes/mobile_default/modules/users/openid_administrator.tpl');
nv_deletefile(NV_ROOTDIR . '/uploads/.htaccess');
nv_deletefile(NV_ROOTDIR . '/vendor/.htaccess');
nv_deletefile(NV_ROOTDIR . '/vendor/endroid', true);
nv_deletefile(NV_ROOTDIR . '/vendor/pclzip', true);
nv_deletefile(NV_ROOTDIR . '/vendor/symfony/options-resolver', true);

// File thừa bản 4.4.07 => 4.4.08
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/bender-runner.config.json');
nv_deletefile(NV_ROOTDIR . '/assets/editors/ckeditor/plugins/googledocs', true);

// Tự xóa chính nó
nv_deletefile(NV_ROOTDIR . '/install/update_step_3.php');

// Sau dòng này hệ thống tự build lại config_global.php
