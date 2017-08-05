# Hướng dẫn cập nhật từ NukeViet 4.1 Official (4.1.02), NukeViet 4.2 Beta (4.2.00) lên NukeViet 4.2.01

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.1.02 bạn cần tìm hướng dẫn nâng cấp tối thiểu lên phiên bản 4.1.02 trước khi tiến hành các bước tiếp theo.

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

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.2.01/update-to-4.2.01.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần chú ý:

- Có thể cấu hình ẩn, thay đổi tên các trường hệ thống khi đăng ký thành viên tại phần **Tài khoản => Tùy biến dữ liệu**
- Thiết lập lại số tuổi ít nhất có thể đăng ký tài khoản (mặc định là 16) tại **Tài khoản => Cấu hình module**
- Có thể tắt/bật sitemap của các module tại phần Quản lý modules.
- Có thể kích hoạt xác thực hai bước cho từng nhóm thành viên.
- Kiểm tra lại module quảng cáo nếu có tài khoản khách hàng, sau khi cập nhật các tài khoản đó sẽ trở thành tài khoản thành viên. Cần đưa các tài khoản này vào một nhóm sau đó cấu hình nhóm thành viên được đăng quảng cáo theo từng khối quảng cáo cho phù hợp.
- Kiểm tra lại tương thích của các module không phải là module mặc định có sẵn trong hệ thống.
- Nếu site của bạn dùng giao diện không phải mặc định cần cập nhật theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

### Cập nhật theme.php

Nếu cần tùy chỉnh giao diện báo lỗi (lỗi 404, lỗi 403, 500...) bạn có thể tùy chỉnh như sau (không bắt buộc):

Mở file `themes/ten-theme/theme.php` thêm vào cuối file:

```php
/**
 *  nv_error_theme()
 *
 * @param string $title
 * @param string $content
 * @param integer $code
 */
function nv_error_theme($title, $content, $code)
{
    nv_info_die($title, $title, $content, $code);
}
```

> Thay dòng `nv_info_die($title, $title, $content, $code);` bằng code để thiết lập giao diện.

Để tùy chỉnh giao diện gửi email đi bạn có thể thực hiện như sau (không bắt buộc)

Thêm vào file theme.php:

```php
/**
 *  nv_mailHTML()
 *
 * @param string $title
 * @param string $content
 * @param string $footer
 */
function nv_mailHTML($title, $content, $footer='')
{
    global $global_config, $lang_global;
    $xtpl = new XTemplate('mail.tpl', NV_ROOTDIR . '/themes/default/system');
    $xtpl->assign('SITE_URL', NV_MY_DOMAIN);
    $xtpl->assign('GCONFIG', $global_config);
    $xtpl->assign('LANG', $lang_global);
    $xtpl->assign('MESSAGE_TITLE', $title);
    $xtpl->assign('MESSAGE_CONTENT', $content);
    $xtpl->assign('MESSAGE_FOOTER', $footer);
    $xtpl->parse('main');
    return $xtpl->text('main');
}
```

Copy file `themes/default/system/mail.tpl` sang giao diện của bạn: `themes/ten-theme/system/mail.tpl`

### Cập nhật các block của giao diện:

Kiểm tra lại giao diện của bạn có sử dụng các block riêng (Các block trong themes/ten-theme/blocks) lấy dữ liệu từ module banners không, nếu có cần chú ý thay đổi lại link khi click vào quảng cáo như sau:

Phiên bản trước link có dạng:

```php
$banners['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=banners&amp;' . NV_OP_VARIABLE . '=click&amp;id=' . $banners['id'];
```

Phiên bản này link có dạng:

```php
$banners['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=banners&amp;' . NV_OP_VARIABLE . '=click&amp;id=' . $banners['id'] . '&amp;s=' . md5($banners['id'] . NV_CHECK_SESSION);
```

### Cập nhật info_die.tpl

Nếu giao diện của bạn tồn tại file `themes/ten-theme/system/info_die.tpl` mở lên kiểm tra nếu có thì xóa đoạn code sau:

```html
		<!--[if lt IE 9]>
		<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/html5shiv.js"></script>
		<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/respond.min.js"></script>
		<![endif]-->
```

### Cập nhật module banners

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/banners` thì cập nhật như sau:

Trong thư mục themes/ten-theme/modules/banners xóa các file thừa cledit.tpl, clientinfo.tpl, clinfo.tpl, logininfo.tpl.
Đối chiếu với giao diện mặc định để sửa các file: home.tpl, addads.tpl, stats.tpl do có nhiều thay đổi.

> Chú ý: Banners là một module rất ít tùy biến do đó bạn có thể chép đè các file home.tpl, addads.tpl, stats.tpl từ giao diện mặc định sang rồi sửa giao diện nếu thấy chưa hợp lý.

### Cập nhật module news

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/news` thì cập nhật như sau:

Mở `themes/ten-theme/modules/news/viewcat_grid.tpl` tìm:

```html
$(window).load(function(){
```

Nếu có sửa lại thành:

```html
$(window).on('load', function() {
```

### Cập nhật module two-step-verification

Mở `themes/ten-theme/modules/two-step-verification/main.tpl`:

Tìm:

```html
                <a href="{LINK_TURNOFF}" class="btn btn-danger">{LANG.turnoff2step}</a>
```

Nếu có thay lại thành:

```html
                <input class="btn btn-danger" type="button" value="{LANG.turnoff2step}" data-toggle="turnoff2step" data-tokend="{NV_CHECK_SESSION}"/>
```

Tìm:

```html
                <a href="{LINK_CREATCODE}" class="btn btn-info">{LANG.creat_other_code}</a>
```

Nếu có thay lại thành:

```html
                <input class="btn btn-info" type="button" value="{LANG.creat_other_code}" data-toggle="changecode2step" data-tokend="{NV_CHECK_SESSION}"/>
```

Tìm:

```html
        <!-- END: backupcode -->
```

Thêm lên trên:

```html
        <!-- BEGIN: autoshowcode -->
        <script type="text/javascript">
        $(function() {
            $('[data-toggle="viewcode"]').click();
        });
        </script>
        <!-- END: autoshowcode -->
```

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/two-step-verification` thì cập nhật như sau:

Nếu giao diện của bạn tồn tại file `themes/ten-theme/js/two-step-verification.js` thì đối chiếu với giao diện default để sửa hoặc xóa đi (nếu không tùy chỉnh vào js) để hệ thống lấy từ giao diện mặc định.

### Cập nhật module users

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/users` thì cập nhật như sau:

Đối chiếu với giao diện mặc định để sửa các file sau do có rất nhiều thay đổi: info.tpl, register_form.tpl

> Khuyến nghị: Chụp lại ảnh giao diện của các phần tương ứng sau đó chép đè các file trên từ giao diện mặc định sau đó chỉnh lại giao diện cho giống ban đầu.

Mở file `themes/ten-theme/modules/users/lostpass_form.tpl`

Tìm:

```php
                    <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
```

Thay lại thành:

```php
                    <div class="nv-recaptcha-default">
                        <div id="{RECAPTCHA_ELEMENT}"></div>
                        <input type="hidden" value="" name="gcaptcha_session"/>
                    </div>
```

Nếu giao diện của bạn tồn tại file `themes/ten-theme/js/users.js` thì đối chiếu với giao diện default để sửa hoặc xóa đi (nếu không tùy chỉnh vào js) để hệ thống lấy từ giao diện mặc định.
