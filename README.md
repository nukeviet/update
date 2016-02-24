# Hướng dẫn cập nhật từ NukeViet 4.0.24, 4.0.25, 4.0.26 lên NukeViet 4 RC2 (4.0.27)
## Hướng dẫn cập nhật tự động cho bản NukeViet mặc định:
### Bước 1: Chuẩn bị.
Thêm vào cuối file config.php ở thư mục gốc của site dòng sau:
```
$global_config['extension_setup'] = 3;//0: No, 1: Upload, 2: NukeViet Store, 3: Upload + NukeViet Store
```

(Mục đích để site sau khi làm xong, có thể cấu hình không cho cài đặt extension, muốn cài đặt extension phải vào hosting sửa lại file cấu hình)

### Bước 2: Cài đặt
Download gói cập nhật tại: https://github.com/nukeviet/update/archive/to-4.0.27.zip

Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Xử lý sau cập nhật:
Sau khi cập nhật xong, cần làm các thao tác:
- Xóa cache của hệ thống. 
- Kiểm tra lại từng nhóm thành viên, hiện tại đã bổ sung thêm các loại nhóm thành viên cần trưởng nhóm xác nhận.
- Truy cập ACP/Quản lý module, click vào tên module users để cập nhật func mới
- Nếu đang kích hoạt block_newscenter của module news, tiến hành xóa block và thêm lại.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:
Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.0 RC1 cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.0 RC2:
### Module contact: Sửa lỗi hiển thị thông tin người gửi
Mở **themes/ten-theme/modules/contact/sendcontact.tpl**

Tìm
```html
<ul>
<li>{LANG.fullname}: {FULLNAME}</li>
<li>{LANG.email}: {EMAIL}</li>
<!-- BEGIN: phone -->
<li>{LANG.phone}: {PHONE}</li>
<!-- END: phone -->
<li>IP: {IP}</li>
<!-- BEGIN: cat -->
<li>{LANG.cat}: {CAT}</li>
<!-- END: cat -->
<!-- BEGIN: part -->
<li>{LANG.part}: {PART}</li>
<!-- END: part -->
</ul>
```

Thay bằng
```html
<ul>
    <!-- BEGIN: cat -->
    <li>{LANG.cat}: {CAT}</li>
    <!-- END: cat -->
    <li>{LANG.part}: {PART}</li>
    <li>{LANG.fullname}: {FULLNAME}</li>
    <li>{LANG.email}: {EMAIL}</li>
    <!-- BEGIN: phone -->
    <li>{LANG.phone}: {PHONE}</li>
    <!-- END: phone -->
    <li>IP: {IP}</li>
</ul>
<a href="{URL_VIEW}" title="" target="_blank">{LANG.view_website}</a>
```

### Module contact: Thêm tùy chọn gửi bản sao vào mail người gửi
Mở **themes/ten-theme/modules/contact/form.tpl**

Tìm
```html
		<div class="form-group">
            <div>
    			<textarea cols="8" name="fcon" class="form-control required" maxlength="1000" placeholder="{LANG.content}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_content}"></textarea>
            </div>
		</div>
```
Thêm xuống dưới
```html
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
```

Mở **themes/ten-theme/modules/contact/sendcontact.tpl**

Tìm
```
{CONTENT}<br /><br />
```
Thêm xuống dưới
```
<!-- BEGIN: sendinfo -->
```
Tìm
```
<!-- END: main -->
```
Thêm lên trên
```
<!-- END: sendinfo -->
```

Nếu tồn tại **themes/ten-theme/modules/contact/theme.php**
Thêm xuống cuối file
```
function contact_sendcontact($row_id, $fcat, $ftitle, $fname, $femail, $fphone, $fcon, $fpart, $sendinfo = true)
{
    global $global_config, $module_name, $module_file, $lang_global, $lang_module, $module_info, $array_department, $client_info;

    $xtpl = new XTemplate('sendcontact.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('SITE_NAME', $global_config['site_name']);
    $xtpl->assign('SITE_URL', $global_config['site_url']);
    $xtpl->assign('FULLNAME', $fname);
    $xtpl->assign('EMAIL', $femail);
	$xtpl->assign('PART', $array_department[$fpart]['full_name']);
    $xtpl->assign('IP', $client_info['ip']);
    $xtpl->assign('TITLE', $ftitle);
    $xtpl->assign('CONTENT', nv_htmlspecialchars($fcon));
    $xtpl->assign('URL_VIEW', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=view&amp;id=' . $row_id);

	if ($sendinfo) {
		if (!empty($fcat)) {
			$xtpl->assign('CAT', $fcat);
			$xtpl->parse('main.sendinfo.cat');
		}

		if (!empty($fphone)) {
			$xtpl->assign('PHONE', $fphone);
			$xtpl->parse('main.sendinfo.phone');
		}
		$xtpl->parse('main.sendinfo');
	}

    $xtpl->parse('main');
    return $xtpl->text('main');
}
```


## Module news: Thêm cấu hình giới hạn ký tự tiêu đề của tin khác cho block_newscenter
Mở **theme/ten-theme/modules/news/block_newscenter.tpl**

Tìm
```
<a href="{main.link}" title="{main.title}">{main.title}</a>
```
Thay bằng
```
<a href="{main.link}" title="{main.title}">{main.titleclean60}</a>
```
Tìm
```
{othernews.title}</a>
```
Thay bằng
```
{othernews.titleclean60}</a>
```


## Module page: Thêm phương án hiển thị ảnh minh họa
Mở **themes/ten-theme/modules/page/main.tpl**

Tìm
```
        <!-- BEGIN: description -->
        <div class="hometext margin-bottom-lg">{CONTENT.description}</div>
        <!-- END: description -->
    	<!-- BEGIN: image -->
        <figure class="article center pointer" onclick="modalShowByObj(this);">
    			<p class="text-center"><img alt="{CONTENT.title}" src="{CONTENT.image}" width="{CONTENT.imageWidth}" class="img-thumbnail" /></p>
    			<!-- BEGIN: alt --><figcaption>{CONTENT.imagealt}</figcaption><!-- END: alt -->
   		</figure>
    	<!-- END: image -->
```
Thay bằng
```
        <!-- BEGIN: imageleft -->
        <figure class="article left noncaption pointer" style="width:100px" onclick="modalShow('', '<img src={CONTENT.image} />');">
                <img alt="{CONTENT.title}" src="{CONTENT.image}" width="{CONTENT.imageWidth}" class="img-thumbnail" />
                <!-- BEGIN: alt --><figcaption>{CONTENT.imagealt}</figcaption><!-- END: alt -->
        </figure>
        <!-- END: imageleft -->

        <!-- BEGIN: description -->
        <div class="hometext margin-bottom-lg">{CONTENT.description}</div>
        <!-- END: description -->

    	<!-- BEGIN: imagecenter -->
        <figure class="article center pointer" onclick="modalShowByObj(this);">
    			<p class="text-center"><img alt="{CONTENT.title}" src="{CONTENT.image}" width="{CONTENT.imageWidth}" class="img-thumbnail" /></p>
    			<!-- BEGIN: alt --><figcaption>{CONTENT.imagealt}</figcaption><!-- END: alt -->
   		</figure>
    	<!-- END: imagecenter -->

    	<div class="clear"></div>
```

Nếu tồn tại **themes/ten-theme/modules/page/theme.php**

Tìm
```
    if (! empty($row['image'])) {
        if (! empty($row['imagealt'])) {
            $xtpl->parse('main.image.alt');
        }
        $xtpl->parse('main.image');
    }
```
Thay bằng
```
    if (! empty($row['image'])) {
    	if ($row['imageposition'] > 0) {
    		if ($row['imageposition'] == 1) {
		        if (! empty($row['imagealt'])) {
		            $xtpl->parse('main.imageleft.alt');
		        }
    			$xtpl->parse('main.imageleft');
    		} else {
		        if (! empty($row['imagealt'])) {
		            $xtpl->parse('main.imagecenter.alt');
		        }
    			$xtpl->parse('main.imagecenter');
    		}
    	}
    }
```

## Module Users

Do giao diện của module Users sửa các file của chức năng nhóm thành viên rất nhiều.

Nếu tồn tại thư mục: themes/ten-theme/modules/users, cần xóa thư mục này, sau đó copy lại từ thư mục themes/default/modules/users

Nếu tồn tại file: themes/ten-theme/js/users.js, cần xóa file mục này, sau đó copy lại từ thư mục themes/default/js/users.js

Tương tự với giao diện mobile của module users.
