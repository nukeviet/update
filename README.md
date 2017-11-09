# Hướng dẫn cập nhật từ 4.2.01, 4.2.02, 4.2.03 lên NukeViet 4.3.00

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.2.01 bạn cần tìm hướng dẫn nâng cấp tối thiểu lên phiên bản 4.2.01 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau nâng cấp tiến hành cấu hình trở lại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau nâng cấp, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
> - Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
> - Thực hiện cập nhật bằng một trong các cách bên dưới.
> - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Diễn đàn NukeViet.Vn](https://nukeviet.vn/vi/forum/Nang-cap/).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.3.00/update-to-4.3.00.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần chú ý:

- Có thể cấu hình module mặc định tại trang chính trong quản trị cho từng quản trị viên tại khu vực **Tài khoản => Quản trị => Sửa tài khoản**.
- Module news có thể đính kèm file vào bài viết, có thể đình chỉ hoạt động của chuyên mục.
- Module bình luận có thể cấu hình cho phép đính kèm file vào bình luận, cho phép sử dụng trình soạn thảo.
- Kiểm tra lại tương thích của các module không phải là module mặc định có sẵn trong hệ thống.
- Nếu site của bạn dùng giao diện không phải mặc định cần cập nhật theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

### Cập nhật theme.php

Mở `themes/ten-theme/theme.php` lên chỉnh sửa như sau:

Thêm vào dòng gọi global biến `$nv_plugin_area`. Ví dụ tìm:

```php
    global $home, $array_mod_title, $lang_global, $global_config, $site_mods, $module_name, $module_info, $op_file, $mod_title, $my_head, $my_footer, $client_info, $module_config, $op;
```

Thay lại thành:

```php
    global $home, $array_mod_title, $lang_global, $global_config, $site_mods, $module_name, $module_info, $op_file, $mod_title, $my_head, $my_footer, $client_info, $module_config, $op, $nv_plugin_area;
```

Tìm:

```php
    $xtpl = new XTemplate($layout_file, NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/layout');
```

Thêm lên trên:

```php
    if (isset($nv_plugin_area[4])) {
        // Kết nối với các plugin sau khi xây dựng nội dung module
        foreach ($nv_plugin_area[4] as $_fplugin) {
            include NV_ROOTDIR . '/includes/plugin/' . $_fplugin;
        }
    }

```

### Cập nhật các block giao diện có cấu hình block

Lúc trước khi xuất ra HTML, phần cấu hình block thường viết dạng

```html
<tr>
    <td>Phần tiêu đề</td>
    <td>Phần input</td>
</tr>
...
```

Cần sửa lại thành:

```html
<div class="form-group">
    <label class="control-label col-sm-6">Phần tiêu đề:</label>
    <div class="col-sm-18">Phần input</div>
</div>
...
```

### Cập nhật các block giao diện lấy dữ liệu từ module news

Nếu giao diện của bạn có các block lấy dữ liệu từ module news cần tìm kiếm những đoạn truy vấn vào bảng chuyên mục (_cat) ví dụ:

```php
$sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, inhome, keywords, groups_view FROM ' . NV_PREFIXLANG . '_' . $mod_data . '_cat ORDER BY sort ASC';
```

Thay lại thành:

```php
$sql = 'SELECT catid, parentid, title, alias, viewcat, subcatid, numlinks, description, keywords, groups_view, status FROM ' . NV_PREFIXLANG . '_' . $mod_data . '_cat ORDER BY sort ASC';
```

Tức thay trường `inhome` thành `status`. Nếu sử dụng trường `inhome` ở bảng cat cần chú ý đổi thành `status` với:
- inhome = 1 => status = 1;
- inhome = 0 => status = 2;

### Cập nhật giao diện module users

Nếu giao diện của bạn tồn tại thư mục `themes/ten-theme/modules/users/` thì thực hiện các công việc dưới đây:

#### Cập nhật JS

Nếu giao diện của bạn tồn tại file `themes/ten-theme/js/users.js` thì mở nó ra sửa:

```js
$(a).css("z-index", "1000").datepicker('show');
```

Thành:

```js
$(a).css("z-index", "9998").datepicker('show');
```

#### Cập nhật CSS

Nếu giao diện của bạn tồn tại file `themes/ten-theme/css/users.css` thì mở nó ra thêm xuống dưới cùng

```css

.openid-btns {
    border-top: 1px #fff solid;
    padding-top: 15px;
}

.openid-btns .btn-group {
    display: flex;
    width: 100%;
}

.openid-btns .btn-group button.btn {
    width: 40px;
    text-align: center;
}

.openid-btns .btn-group a.btn {
    flex-grow: 1;
    text-align: left;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.openid-google {
    color: #ffffff !important;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.openid-google:focus {
    color: #ffffff;
    background-color: #c9302c;
    border-color: #761c19;
}

.openid-google:hover {
    color: #ffffff;
    background-color: #c9302c;
    border-color: #ac2925;
}

.openid-google:active {
    color: #ffffff;
    background-color: #c9302c;
    border-color: #ac2925;
}

.openid-google:active:hover,
.openid-google:active:focus {
    color: #ffffff;
    background-color: #ac2925;
    border-color: #761c19;
}

.openid-google:active {
    background-image: none;
}

.openid-google.disabled:hover,
.openid-google[disabled]:hover,
fieldset[disabled] .openid-google:hover,
.openid-google.disabled:focus,
.openid-google[disabled]:focus,
fieldset[disabled] .openid-google:focus {
    background-color: #d9534f;
    border-color: #d43f3a;
    cursor: inherit;
}

.openid-facebook {
    color: #ffffff !important;
    background-color: #428bca;
    border-color: #357ebd;
}

.openid-facebook:focus {
    color: #ffffff;
    background-color: #3071a9;
    border-color: #193c5a;
}

.openid-facebook:hover {
    color: #ffffff;
    background-color: #3071a9;
    border-color: #285e8e;
}

.openid-facebook:active {
    color: #ffffff;
    background-color: #3071a9;
    border-color: #285e8e;
}

.openid-facebook:active:hover,
.openid-facebook:active:focus {
    color: #ffffff;
    background-color: #285e8e;
    border-color: #193c5a;
}

.openid-facebook:active {
    background-image: none;
}

.openid-facebook.disabled:hover,
.openid-facebook[disabled]:hover,
.openid-facebook.disabled:focus,
.openid-facebook[disabled]:focus,
fieldset[disabled] .openid-facebook:focus {
    background-color: #428bca;
    border-color: #357ebd;
    cursor: inherit;
}

.openid-single-sign-on {
    color: #ffffff !important;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.openid-single-sign-on:focus {
    color: #ffffff;
    background-color: #449d44;
    border-color: #255625;
}

.openid-single-sign-on:hover {
    color: #ffffff;
    background-color: #449d44;
    border-color: #398439;
}

.openid-single-sign-on:active {
    color: #ffffff;
    background-color: #449d44;
    border-color: #398439;
}

.openid-single-sign-on:active:hover,
.openid-single-sign-on:active:focus {
    color: #ffffff;
    background-color: #398439;
    border-color: #255625;
}

.openid-single-sign-on:active {
    background-image: none;
}

.openid-single-sign-on.disabled:hover,
.openid-single-sign-on[disabled]:hover,
.openid-single-sign-on.disabled:focus,
.openid-single-sign-on[disabled]:focus,
fieldset[disabled] .openid-single-sign-on:focus {
    background-color: #5cb85c;
    border-color: #4cae4c;
    cursor: inherit;
}

```

#### Cập nhật theme.php

Nếu giao diện của bạn tồn tại file `themes/ten-theme/modules/users/theme.php` thì mở nó ra chỉnh sửa như sau:

Tìm:

```php
            // Các trường hệ thống xuất độc lập
            if (!empty($row['system'])) {
                if ($row['field'] == 'birthday') {
                    $row['value'] = (empty($row['value'])) ? '' : date('d/m/Y', $row['value']);
```

Thêm xuống dưới:

```php
                    $datepicker = true;
```

Tìm:

```php
    $xtpl->assign('USER_LOSTPASS', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=lostpass');
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
```

Thêm xuống dưới:

```php
    $xtpl->assign('TEMPLATE', $module_info['template']);
```

Tìm:

```php
    if (defined('NV_OPENID_ALLOWED')) {
        $assigns = array();
```

Thêm xuống dưới:

```php
        $icons = array(
            'single-sign-on' => 'lock',
            'google' => 'google-plus',
            'facebook' => 'facebook'
        );
```

Tìm:

```php
            $assigns['server'] = $server;
            $assigns['title'] = ucfirst($server);
            $assigns['img_src'] = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_info['module_theme'] . '/' . $server . '.png';
            $assigns['img_width'] = $assigns['img_height'] = 24;
```

Thay lại thành:

```php
            $assigns['server'] = $server;
            $assigns['title'] = ucfirst($server);
            $assigns['icon'] = $icons[$server];
```

#### Cập nhật ajax_login.tpl

Mở file `themes/ten-theme/modules/users/ajax_login.tpl` chỉnh sửa như sau:

Tìm:

```html
<link type="text/css" href="{NV_BASE_SITEURL}themes/default/css/users.css" rel="stylesheet" />
<script src="{NV_BASE_SITEURL}themes/default/js/users.js"></script>
```

Thay lại thành

```html
<link type="text/css" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/users.css" rel="stylesheet" />
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/users.js"></script>
```

#### Cập nhật block.login.tpl

Mở file `themes/ten-theme/modules/users/block.login.tpl` chỉnh sửa như sau:

Tìm:

```html
<script src="{NV_BASE_SITEURL}themes/default/js/users.js"></script>
```

Thay lại thành:

```html
<script src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/users.js"></script>
```

Tìm:

```html
<script src="{NV_BASE_SITEURL}themes/default/js/users.js"></script>
```

Thay lại thành:

```html
<script src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/users.js"></script>
```

#### Cập nhật block.user_button.tpl

Mở file `themes/ten-theme/modules/users/block.user_button.tpl` chỉnh sửa như sau:

Tìm:

```html
<script src="{NV_BASE_SITEURL}themes/default/js/users.js"></script>
```

Thay lại thành:

```html
<script src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/users.js"></script>
```

#### Cập nhật login_form.tpl

Mở file `themes/ten-theme/modules/users/login_form.tpl` chỉnh sửa như sau:

Tìm:

```html
<a href="#" onclick="modalShowByObj('#guestReg_{BLOCKID}')">{GLANG.register}</a>
```

Thay lại thành:

```html
<a href="#" onclick="modalShowByObj('#guestReg_{BLOCKID}', 'recaptchareset')">{GLANG.register}</a>
```

Tìm:

```html
       	<hr />
       	<div class="text-center">
      		<!-- BEGIN: server -->
      		<a title="{LANG.login_with} {OPENID.title}" href="{OPENID.href}" class="openid margin-right" onclick="return openID_load(this);"><img alt="{OPENID.title}" title="{OPENID.title}" src="{OPENID.img_src}" width="{OPENID.img_width}" height="{OPENID.img_height}" /></a>
      		<!-- END: server -->
```

Thay lại thành

```html
       	<div class="text-center openid-btns">
      		<!-- BEGIN: server -->
            <div class="btn-group m-bottom btn-group-justified">
                <button class="btn openid-{OPENID.server} disabled" type="button" tabindex="-1"><i class="fa fa-fw fa-{OPENID.icon}"></i></button>
                <a class="btn openid-{OPENID.server}" href="{OPENID.href}" onclick="return openID_load(this);">{LANG.login_with} {OPENID.title}</a>
            </div>
            <!-- END: server -->
```

### Cập nhật giao diện module news

Nếu giao diện của bạn tồn tại thư mục `themes/ten-theme/modules/news/` thì thực hiện các công việc dưới đây:

#### Cập nhật CSS

Nếu giao diện của bạn tồn tại file `themes/ten-theme/css/news.css` thì mở nó ra thêm xuống dưới cùng

```css

.news-download-file {
    margin-top: -6px;
}

.news-download-file .list-group-item:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.news-download-file .list-group-item .badge {
    float: right;
    display: inline-block;
    width: 22px;
    height: 22px;
    font-size: 12px;
    font-weight: 700;
    line-height: 22px;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #5cb85c;
    border-radius: 15px;
}

.news-download-file .list-group-item .badge a {
    color: #fff;
}

h3.newh3 {
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-bottom-color: #CCCCCC;
    font-size: 20px;
    line-height: 25px;
    padding-bottom: 10px;
    margin-bottom: 5px;
    padding-top: 10px;
    margin-top: 0px;
    color: #02659d;
}
```

### Cập nhật JS

Nếu giao diện của bạn tồn tại file `themes/ten-theme/js/news.js` thì mở nó ra thêm xuống dưới cùng

```js
$(function() {
    $('[data-toggle="collapsepdf"]').each(function() {
        $('#' + $(this).attr('id')).on('shown.bs.collapse', function() {
            $(this).find('iframe').attr('src', $(this).data('src'));
        });
    });
    $('[data-toggle="newsattachimage"]').click(function(e) {
        e.preventDefault();
        modalShow('', '<div class="text-center"><img src="' + $(this).data('src') + '" style="max-width:auto;"/></div>');
    });
});
```

#### Cập nhật theme.php

Nếu giao diện của bạn tồn tại file `themes/ten-theme/modules/news/theme.php` thì mở nó ra chỉnh sửa như sau:

Thêm vào cuối file:

```php

/**
 * nv_theme_viewpdf()
 *
 * @param mixed $file_url
 * @return
 */
function nv_theme_viewpdf($file_url)
{
    global $lang_module, $lang_global;
    $xtpl = new XTemplate('viewer.tpl', NV_ROOTDIR . '/' . NV_ASSETS_DIR . '/js/pdf.js');
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('PDF_JS_DIR', NV_BASE_SITEURL . NV_ASSETS_DIR . '/js/pdf.js/');
    $xtpl->assign('PDF_URL', $file_url);
    $xtpl->parse('main');
    return $xtpl->text('main');
}
```

Tìm:

```php
                    if ($global_array_cat[$catid_i]['inhome'] == 1) {
```

Thay lại thành:

```php
                    if ($global_array_cat[$catid_i]['status'] == 1) {
```

Tìm:

```php
    if (! empty($news_contents['post_name'])) {
        $xtpl->parse('main.post_name');
    }

```

Thêm xuống dưới:

```php
    if (!empty($news_contents['files'])) {
        foreach ($news_contents['files'] as $file) {
            $xtpl->assign('FILE', $file);

            if ($file['ext'] == 'pdf') {
                $xtpl->parse('main.files.loop.show_quick_viewpdf');
                $xtpl->parse('main.files.loop.content_quick_viewpdf');
            } elseif (preg_match('/^png|jpe|jpeg|jpg|gif|bmp|ico|tiff|tif|svg|svgz$/', $file['ext'])) {
                $xtpl->parse('main.files.loop.show_quick_viewimg');
            } else {
                $xtpl->parse('main.files.loop.show_quick_viewpdf');
                $xtpl->parse('main.files.loop.content_quick_viewdoc');
            }
            $xtpl->parse('main.files.loop');
        }
        $xtpl->parse('main.files');
    }

```

#### Cập nhật content.tpl

Mở file `themes/ten-theme/modules/news/content.tpl` chỉnh sửa như sau:

Tìm

```html
	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.alias}</label>
		<div class="col-sm-20">
			<input type="text" class="form-control pull-left" name="alias" id="idalias" value="{DATA.alias}" maxlength="255" style="width: 94%;" />
			<em class="fa fa-refresh pull-right" style="cursor: pointer; vertical-align: middle; margin: 9px 0 0 4px" onclick="get_alias('{OP}');" alt="Click">&nbsp;</em>
		</div>
	</div>
```

Thêm lên trên:

```html
    <!-- BEGIN: alias -->
```

Thêm xuống dưới:

```html
    <!-- END: alias -->
```

Tìm:

```html
	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.content_homeimg}</label>
```

Thêm lên trên:

```html

    <!-- BEGIN: layout_func -->
	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.pick_layout}</label>
		<div class="col-sm-20">
			<select name="layout_func" class="form-control">
				<option value="">{LANG.default_layout}</option>
				<!-- BEGIN: loop -->
				<option value="{LAYOUT_FUNC.key}"{LAYOUT_FUNC.selected}>{LAYOUT_FUNC.key}</option>
				<!-- END: loop -->
			</select>
		</div>
	</div>
    <!-- END: layout_func -->
```

Tìm và xóa đoạn:

```html
	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.imgposition}</label>
		<div class="col-sm-20">
			<select name="imgposition" class="form-control">
				<!-- BEGIN: imgposition -->
				<option value="{DATAIMGOP.value}"{DATAIMGOP.selected}>{DATAIMGOP.title}</option>
				<!-- END: imgposition -->
			</select>
		</div>
	</div>
```

Tìm:

```html
			<input maxlength="255" value="{DATA.author}" name="author" type="text" class="form-control" />
		</div>
	</div>
```

Thêm xuống dưới:

```html

	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.content_keywords}</label>
		<div class="col-sm-20">
			<input maxlength="255" value="{DATA.keywords}" name="keywords" type="text" class="form-control" />
		</div>
	</div>
```

#### Cập nhật detail.tpl

Mở file `themes/ten-theme/modules/news/detail.tpl` chỉnh sửa như sau:

Tìm:

```html
			{DETAIL.bodyhtml}
		</div>
```

Thêm xuống dưới:

```html
		<!-- BEGIN: files -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-download fa-fw"></i><strong>{LANG.files}</strong>
            </div>
    		<div class="list-group news-download-file">
    		    <!-- BEGIN: loop -->
    		    <div class="list-group-item">
    		        <!-- BEGIN: show_quick_viewpdf -->
                    <span class="badge">
                        <a role="button" data-toggle="collapse" href="#pdf{FILE.key}" aria-expanded="false" aria-controls="pdf{FILE.key}">
                            <i class="fa fa-file-pdf-o" data-rel="tooltip" data-content="{LANG.quick_view_pdf}"></i>
                        </a>
                    </span>
                    <!-- END: show_quick_viewpdf -->
    		        <!-- BEGIN: show_quick_viewimg -->
                    <span class="badge">
                        <a href="javascript:void(0)" data-src="{FILE.src}" data-toggle="newsattachimage">
                            <i class="fa fa-file-image-o" data-rel="tooltip" data-content="{LANG.quick_view_pdf}"></i>
                        </a>
                    </span>
                    <!-- END: show_quick_viewimg -->
    		        <a href="{FILE.url}" title="{FILE.titledown}{FILE.title}">{FILE.titledown}: <strong>{FILE.title}</strong></a>
    		        <!-- BEGIN: content_quick_viewpdf -->
    		        <div class="clearfix"></div>
    		        <div class="collapse" id="pdf{FILE.key}" data-src="{FILE.urlpdf}" data-toggle="collapsepdf">
    		            <div class="well margin-top">
    		                <iframe frameborder="0" height="600" scrolling="yes" src="" width="100%"></iframe>
    		            </div>
    		        </div>
    		        <!-- END: content_quick_viewpdf -->
    		        <!-- BEGIN: content_quick_viewdoc -->
    		        <div class="clearfix"></div>
    		        <div class="collapse" id="pdf{FILE.key}" data-src="{FILE.urldoc}" data-toggle="collapsepdf">
    		            <div class="well margin-top">
    		                <iframe frameborder="0" height="600" scrolling="yes" src="" width="100%"></iframe>
    		            </div>
    		        </div>
    		        <!-- END: content_quick_viewdoc -->
    		    </div>
    		    <!-- END: loop -->
    		</div>
        </div>
		<!-- END: files -->
```

### Cập nhật giao diện module page

Nếu giao diện của bạn tồn tại thư mục `themes/ten-theme/modules/page/` thì thực hiện các công việc dưới đây:

#### Cập nhật theme.php

Nếu giao diện của bạn tồn tại file `themes/ten-theme/modules/page/theme.php` thì mở nó ra chỉnh sửa như sau:

Tìm:

```php
    global $module_name, $lang_global, $module_info, $meta_property, $client_info, $page_config;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
```

Thay lại thành:

```php
    global $module_name, $lang_module, $lang_global, $module_info, $meta_property, $client_info, $page_config;

    $xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
```

Tìm:

```php
        $xtpl->parse('main.adminlink');
    }
```

Thay lại thành:

```php
        $xtpl->parse('main.adminlink');

        // Hiển thị cảnh báo cho người quản trị nếu bài ngưng hoạt động
        if (!$row['status']) {
            $xtpl->parse('main.warning');
        }
    } elseif (!$row['status']) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }
```

#### Cập nhật main.tpl

Mở file `themes/ten-theme/modules/page/main.tpl` chỉnh sửa như sau:

Tìm:

```html
<!-- BEGIN: main -->
```

Thêm xuống dưới:

```html

<!-- BEGIN: warning -->
<div class="alert alert-danger">{LANG.warning}</div>
<!-- END: warning -->

```

### Cập nhật giao diện module comment

Module này hiện chúng tôi ghi nhận hầu như chưa có trường hợp chỉnh sửa giao diện, nếu giao diện của bạn tồn tại thư mục `themes/ten-theme/modules/comment/` thì:

- Nếu chắc chắn bạn đã có tùy biến giao diện hãy đối chiếu với giao diện mặc định để sửa các file sau:

```
- themes/ten-theme/js/comment.js
- themes/ten-theme/modules/comment/comment.tpl
- themes/ten-theme/modules/comment/main.tpl
```

- Nếu vô tình bạn xây dựng giao diện và copy từ giao diện mặc định mà không tùy biến gì hãy xóa các file và thư mục sau:

```
File:
- themes/ten-theme/js/comment.js
- themes/ten-theme/css/comment.css
Thư mục:
- themes/ten-theme/modules/comment/
```

### Cập nhật giao diện module statistics

Module này hiện chúng tôi ghi nhận hầu như chưa có trường hợp chỉnh sửa giao diện, nếu giao diện của bạn tồn tại thư mục `themes/ten-theme/modules/statistics/` hãy đối chiếu với giao diện mặc định để sửa.