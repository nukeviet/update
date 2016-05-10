# Hướng dẫn Nâng cấp từ NukeViet 4.0.23 lên NukeViet 4.0.24

NukeViet 4.0.24 chỉ chạy được từ PHP >5.4. (Nếu bạn có ép nó xuống chạy ở PHP 5.3 sẽ phát sinh rất nhiều lỗi, và cũng không dùng được).

## 1. Cập nhật file config.php
mở file config.php, tìm đến dòng
```
$db_config['collation'] = 'utf8_general_ci';
```
thêm xuống dưới
```
$db_config['charset'] = 'utf8';
$global_config['site_domain'] = '';
$global_config['name_show'] = 0;
$global_config['cached'] = 'files';
```

## 2. Upload file nâng cấp

Download gói nâng cấp tại: https://github.com/nukeviet/update/files/88516/NukeViet_4.0.23_4.0.24.zip

Upload các file trong gói nâng cấp, sau đó vào admin để tiến hành nâng cấp.



## 3. Cập nhật do thay đổi Autoload các class

Do cơ chế gọi Class đã thay đổi nên cần sưa lại các module và giao diện theo hướng dẫn sau:

Tìm kiếm và thay thế:
```
nv_get_cache  thành: $nv_Cache->getItem(
nv_set_cache  thành: $nv_Cache->setItem(
nv_delete_all_cache  thành: $nv_Cache->delAll(
nv_del_moduleCache  thành: $nv_Cache->delMod(
nv_db_cache  thành: $nv_Cache->db(
```
Nếu những chỗ nào dùng $nv_Cache trong function, thì càn global biến $nv_Cache

Chỗ gọi hàm $nv_Cache->db() bắt buộc phải truyền vào 3 tham số:(câu lệnh sql, key, tên module)
trong đó key có thể để trống, tên module dùng $module_name


Tìm kiếm để thay thế các đoạn gọi class của NukeViet
```
new download(   thành:     new NukeViet\Files\Download(
new image(    thành:   new NukeViet\Files\Image(
new upload(   thành:   new NukeViet\Files\Upload(
new UrlGetContents(   thành:  new NukeViet\Client\UrlGetContents(
new Diagnostic(   thành:  new NukeViet\Client\Diagnostic(
new Gfonts(     thành:    new NukeViet\Client\Gfonts(
new NV_Http(   thành:  new NukeViet\Http\Http(
new NVftp(    thành:   new NukeViet\Ftp\Ftp(
new PHPMailer;   thành:   new PHPMailer\PHPMailer\PHPMailer();
new PHPMailer();   thành:   new PHPMailer\PHPMailer\PHPMailer();
new Array2XML(    thành:  new NukeViet\Xml\Array2XML(
```
Các class sau mặc định không sử dung, nếu module, gia o diện của bạn còn sử dụng, cần viết lại các class này.
```
Minify_CSS_Compressor
CheckUrl
```

## 4. Nâng cấp files:
### 1.Add button Show/hide for drag_block

Thêm đoạn sau vào cuối file themes/my_theme/css/admin.css
```
.portlet .act0{
    opacity: 0.3;
}
```
### 2.Sửa module contact để hỗ trợ module ảo

Sửa file: themes/my_theme/modules/contact/block.contact_form.tpl thêm đoạn `data-module="{MODULE}"` vào nút bấm.

Ví dụ:
```
<button type="button" class="ctb btn btn-primary btn-sm"><em class="fa fa-pencil-square-o"></em>{GLANG.feedback}</button>
```

Sửa thành
```
<button type="button" class="ctb btn btn-primary btn-sm" data-module="{MODULE}"><em class="fa fa-pencil-square-o"></em>{GLANG.feedback}</button>
```

Sửa file /themes/my_theme/js/contact.js

Ví dụ:
```
url: nv_base_siteurl + "index.php?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=contact",

```

Sửa thành
```
url: nv_base_siteurl + "index.php?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" + b.attr( "data-module" ),
```
https://github.com/vuthao/nukeviet/commit/31ddf6843f77ca91f3b4e33fc6135547cd5db8ba[Xem chi tiết]

### 3.Sửa giao diện module news

Sửa file: themes/my_theme/modules/news/print.tpl

Tìm đến dòng sau
```
<h1>{CONTENT.title}</h1>
```

Thêm xuống dưới dòng sau:
```
		<!-- BEGIN: no_public -->
		<div class="alert alert-warning">
			{LANG.no_public}
		</div>
		<!-- END: no_public -->
```

**Nếu có file: modules/news/theme.php**

Tìm đến dòng sau trong function news_print
```
$xtpl->parse( 'main' );
```

Thêm lên trên đoạn sau:
```
	if( $result['status'] != 1 )
	{
		$xtpl->parse( 'main.no_public' );
	}
```
https://github.com/vuthao/nukeviet/commit/fb118d1830557f5ef160eb8c762928b9aa8732b6[Xem chi tiết]

### 3.Sửa bật tắt comment của module news
https://github.com/nukeviet/nukeviet/pull/1507/files

### 4.Module contact: Thêm trường address (địa chỉ) vào block bộ phận

Mở themes/my_theme/modules/contact/block.department.tpl

Tìm
```
<!-- END: phone -->
```
Thêm bên dưới
```
				<!-- BEGIN: address -->
				<tr>
					<td>{LANG.address}</td>
					<td>{DEPARTMENT.address}</td>
				</tr>
				<!-- END: address -->
```

### 5.Module news: Cập nhật block category, tách html ra khỏi php

Mở themes/my_theme/modules/news/block_category.tpl

Tìm
```
<!-- BEGIN: main -->
```
Thêm bên trên
```
<!-- BEGIN: subcat -->
<ul>
	<!-- BEGIN: loop -->
	<li>
		<a href="{SUBCAT.link}" title="{SUBCAT.title}">{SUBCAT.title0}</a>
		<!-- BEGIN: sub -->
		{SUB}
		<!-- END: sub -->
	</li>
	<!-- END: loop -->
</ul>
<!-- END: subcat -->
```
Tìm
```
{HTML_CONTENT}
```
Thay bằng
```
				<!-- BEGIN: cat -->
				<li>
					<a href="{CAT.link}" title="{CAT.title}">{CAT.title0}</a>
					<!-- BEGIN: subcat -->
					<span class="fa arrow expand">&nbsp;</span>
					{SUBCAT}
					<!-- END: subcat -->
				</li>
				<!-- END: cat -->
```

### 6.Module news: Sửa lỗi vị trí ảnh minh họa xem chi tiết bài viết

Mở themes/my_theme/modules/news/detail.tpl

Tìm và xóa
```
<div class="hometext">{DETAIL.hometext}</div>
```
Tìm
```
<!-- END: empty -->
```
Thêm bên dưới
```
<div class="hometext">{DETAIL.hometext}</div>
```
Tìm
```
<!-- BEGIN: imgfull -->
```
Thêm bên dưới
```
<div class="hometext m-bottom">{DETAIL.hometext}</div>
```

### 7.Module news: Sửa lỗi hiển thị tooltip (Tăt tooltip rồi vẫn hiện)

Mở **themes/my_theme/modules/news/block_newscenter.tpl**

Tìm
```
<a {TITLE} class="show black h4" href="{othernews.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip -->><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.title}</a>
```
Thay bằng
```
<a class="show black h4" href="{othernews.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip --> title="{othernews.title}" ><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.title}</a>
```

Mở **themes/my_theme/modules/news/detail.tpl**
Tìm
```
<a href="{TOPIC.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{TOPIC.hometext}" data-img="{TOPIC.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{TOPIC.title}">{TOPIC.title}</a>
```
Thay bằng
```
<a href="{TOPIC.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{TOPIC.hometext}" data-img="{TOPIC.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{TOPIC.title}">{TOPIC.title}</a>
```
Tìm
```
<a href="{RELATED_NEW.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{RELATED_NEW.hometext}" data-img="{RELATED_NEW.imghome}" data-rel="tooltip"<!-- END: tooltip -->>{RELATED_NEW.title}</a>
```
Thay bằng
```
<a href="{RELATED_NEW.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{RELATED_NEW.hometext}" data-img="{RELATED_NEW.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED_NEW.title}">{RELATED_NEW.title}</a>
```
Tìm
```
<a class="list-inline" href="{RELATED.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{RELATED.hometext}" data-img="{RELATED.imghome}" data-rel="tooltip"<!-- END: tooltip -->>{RELATED.title}</a>
```
Thay bằng
```
<a class="list-inline" href="{RELATED.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{RELATED.hometext}" data-img="{RELATED.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED.title}">{RELATED.title}</a>
```

Mở **themes/my_theme/modules/news/viewcat_grid.tpl**

Tìm
```
<h4><a class="show" href="{CONTENT.link}" data-content="{CONTENT.hometext_clean}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}" title="{CONTENT.title}">{CONTENT.title}</a></h4>
```
Thay bằng
```
<h4><a class="show" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a></h4>
```

Mở **themes/my_theme/modules/news/viewcat_list.tpl**

Tìm
```
<a class="show h4" href="{CONTENT.link}" data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}" title="{CONTENT.title}">
```
Thay bằng
```
<a class="show h4" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">
```

Mở **themes/my_theme/modules/news/viewcat_main_bottom.tpl**

Tìm
```
<a class="show h4" href="{OTHER.link}" data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}" title="{OTHER.title}">{OTHER.title}</a>
```
Thay bằng
```
<a class="show h4" href="{OTHER.link}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

Mở **themes/my_theme/modules/news/viewcat_main_left.tpl**

Tìm
```
<a class="show h4" href="{OTHER.link}" data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}" title="{OTHER.title}">{OTHER.title}</a>
```
Thay bằng
```
<a class="show h4" href="{OTHER.link}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

Mở **themes/my_theme/modules/news/viewcat_main_right.tpl**

Tìm
```
<a class="show h4" href="{OTHER.link}" title="{OTHER.title}" data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}">{OTHER.title}</a>
```
Thay bằng
```
<a class="show h4" href="{OTHER.link}" title="{OTHER.title}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip -->>{OTHER.title}</a>
```

Mở **themes/my_theme/modules/news/viewcat_two_column.tpl**

Tìm
```
<a class="show h4" href="{NEWSTOP.link}" data-content="{NEWSTOP.hometext}" data-img="{NEWSTOP.imghome}" data-placement="{TOOLTIP_POSITION}" data-rel="tooltip">{NEWSTOP.title}</a>
```
Thay bằng
```
<a class="show h4" href="{NEWSTOP.link}" <!-- BEGIN: tooltip -->data-content="{NEWSTOP.hometext}" data-img="{NEWSTOP.imghome}" data-placement="{TOOLTIP_POSITION}" data-rel="tooltip"<!-- END: tooltip --> title="{NEWSTOP.title}">{NEWSTOP.title}</a>
```
Tìm
```
<a class="show h4" href="{CONTENT.link}" data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}" title="{CONTENT.title}">{CONTENT.title}</a>
```
Thay bằng
```
<a class="show h4" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a>
```

Nếu tồn tại **themes/my_theme/modules/news/theme.php**

Tìm và xóa (tất cả)
```
$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['showtooltip'] ? $module_config[$module_name]['tooltip_position'] : '' );
```
Tìm
```
$array_row_i['hometext_clean'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
		if( $module_config[$module_name]['showtooltip'] )
		{
			$array_row_i['hometext_clean'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
		}
```
Tìm trong hàm **viewcat_grid_new**
```
if( defined( 'NV_IS_MODADMIN' ) )
```
Thêm lên trên
```
			if( $module_config[$module_name]['showtooltip'] )
			{
				$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
				$xtpl->parse( 'main.viewcatloop.tooltip' );
			}
```

Tìm trong hàm **viewcat_list_new**
```
$array_row_i['hometext'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
		if( $module_config[$module_name]['showtooltip'] )
		{
			$array_row_i['hometext'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
		}
```
Tìm trong hàm **viewcat_list_new**
```
$xtpl->assign( 'CONTENT', $array_row_i );
```
Thay bằng
```

		if( $module_config[$module_name]['showtooltip'] )
		{
			$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
			$xtpl->parse( 'main.viewcatloop.tooltip' );
		}
```
Tìm trong hàm **viewsubcat_main**
```
$array_row_i['hometext'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
					if( $module_config[$module_name]['showtooltip'] )
					{
						$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
						$array_row_i['hometext'] = nv_clean60( $array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
						$xtpl->parse( 'main.listcat.related.loop.tooltip' );
					}
```
Tìm trong hàm **viewcat_two_column**
```
$xtpl->parse( 'main.catcontent.other' );
```
Thêm bên trên
```

				if( $module_config[$module_name]['showtooltip'] )
				{
					$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
					$xtpl->parse( 'main.catcontent.other.tooltip' );
				}
```
Tìm trong hàm **viewcat_two_column**
```
$array_catpage_i['content'][$index]['hometext'] = nv_clean60( $array_catpage_i['content'][$index]['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
					if( $module_config[$module_name]['showtooltip'] )
					{
						$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
						$array_catpage_i['content'][$index]['hometext'] = nv_clean60( $array_catpage_i['content'][$index]['hometext'], $module_config[$module_name]['tooltip_length'], true );
						$xtpl->parse( 'main.loopcat.other.tooltip' );
					}
```
Tìm trong hàm **detail_theme**
```
$news_contents['addtime'] = nv_date( 'd/m/Y h:i:s', $news_contents['addtime'] );
```
Thêm bên trên
```
	if( $module_config[$module_name]['showtooltip'] )
	{
		$xtpl->assign( 'TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position'] );
	}
```
Tìm trong hàm **detail_theme**
```
$related_new_array_i['hometext'] = nv_clean60( $related_new_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
				if( $module_config[$module_name]['showtooltip'] )
				{
					$related_new_array_i['hometext'] = nv_clean60( $related_new_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
				}
```
Tìm trong hàm **detail_theme**
```
if( ! empty( $module_config[$module_name]['showtooltip'] ) ) $xtpl->parse( 'main.others.related_new.loop.tooltip' );
```
Thay bằng
```
				if( $module_config[$module_name]['showtooltip'] )
				{
					$xtpl->parse( 'main.others.related_new.loop.tooltip' );
				}
```
Tìm trong hàm **detail_theme**
```
$related_array_i['hometext'] = nv_clean60( $related_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
				if( $module_config[$module_name]['showtooltip'] )
				{
					$related_array_i['hometext'] = nv_clean60( $related_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
				}
```
Tìm trong hàm **detail_theme**
```
if( ! empty( $module_config[$module_name]['showtooltip'] ) ) $xtpl->parse( 'main.others.related.loop.tooltip' );
```
Thay bằng
```
if( $module_config[$module_name]['showtooltip'] ) $xtpl->parse( 'main.others.related.loop.tooltip' );
```
Tìm trong hàm **detail_theme**
```
$topic_array_i['hometext'] = nv_clean60( $topic_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
```
Thay bằng
```
				if( $module_config[$module_name]['showtooltip'] )
				{
					$topic_array_i['hometext'] = nv_clean60( $topic_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true );
				}
```
