# Hướng dẫn cập nhật từ NukeViet 4.3 (4.3.00 đến 4.3.08) lên NukeViet 4.4.00

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.3.00 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.3.00 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau nâng cấp tiến hành cấu hình trở lại.
- Nếu bạn có cấu hình FTP trong quản trị, vui lòng kiểm tra lại các thông số cho đúng hoặc xóa cấu hình. Nếu cấu hình sai sẽ dẫn tới cập nhật thất bại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau nâng cấp, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
> - Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
> - Thực hiện cập nhật bằng một trong các cách bên dưới.
> - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Diễn đàn NukeViet.Vn](https://nukeviet.vn/vi/forum/Nang-cap/).

**Lưu ý: Khi thực hiện cập nhật xong bước di chuyển các file và thư mục, nếu bị đẩy ra khỏi tài khoản quản trị (mất trạng thái đăng nhập, hệ thống báo website đang bị đình chỉ) bạn hãy thực hiện đăng nhập lại quản trị và tiến hành di chuyển tới khu vực cập nhật lần nữa để hệ thống tiếp tục tiến trình.**

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

Nếu trong quá trình cập nhật bị đẩy ra, bạn đăng nhập lại quản trị để làm theo hướng dẫn (Hệ thống báo Xóa gói cập nhật do không tương thích, Bạn hãy xóa để tiếp tục vânh hành site)

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.4.00/update-to-4.4.00.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Cấu hình lại site.

- Đăng nhập quản trị tối cao, vào khu vực **Công cụ SEO => Cấu hình Meta-Tags** xóa bỏ đi các Meta-Tags: robots, googlebot, msnbot (tại cột Tên Nhóm xóa nội dung trong các ô tương ứng và nhấp Thực hiện là có thể xóa được).
- Nếu site có sử dụng các thư viện bên ngoài như `phpoffice/phpspreadsheet` thông qua composer, bạn cần khai báo để composer cập nhật lại

Nếu site của bạn ở bản 4.3.03 về trước cần làm các bước sau (site đang ở bản 4.3.04 về sau thì không cần):

- Tìm file config.php Tìm cấu hình sitekey đổi giá trị sitekey (Việc này cần thực hiện để đảm bảo an toàn).
- Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
- Vào phần: **Cấu hình -> Cấu hình chung** Lưu thay đổi để hệ thống ghi lại một số thiết lập.
- Vào phần: **Cấu hình -> Thiết lập an ninh ** Chọn tab **Cấu hình hiển thị captcha** để chọn Loại captcha là reCAPTCHA sau đó khai báo các thông số Site key, Secret key bằng cách đăng ký tài khoản captcha tại https://www.google.com/recaptcha/admin#list (Ghi chú: Nếu website của bạn chạy trên mạng nội bộ không có Internet cấu hình Loại captcha là Captcha mặc định)
- Cấu hình lại các mật khẩu đã nhập vào hệ thống như: Tài khoản FTP, SMTP

### Bước 4: Điều chỉnh giao diện

**Nếu site của bạn sử dụng giao diện không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau:**

> Các hướng dẫn dưới đây bạn có thể không cần thực hiện nếu cảm thấy khó khăn. Việc không cập nhật giao diện website của bạn vẫn hoạt động bình thường.

#### Phần nên thực hiện:

Bạn nên thực hiện các hướng dẫn ở phần này để giúp website của bạn tối ưu SEO.

**Chuyển breadcrumb từ vocabulary sang schema.org**

Mở file themes/theme-cua-ban/layout/header_extended.tpl tìm:

```html
<ul class="temp-breadcrumbs hidden">
```

Thay thành:

```html
<ul class="temp-breadcrumbs hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
```

Trong thẻ ul đó tìm các thẻ li (có khoảng 2 thẻ), thay thế các thành phần sau:
Thay:

```
itemscope itemtype="http://data-vocabulary.org/Breadcrumb"
```

Thành

```
itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"
```

Thay `itemprop="url"` thành `itemprop="item"`.
Thay `itemprop="title"` thành `itemprop="name"`.

Trước khi đóng thẻ li thứ nhất thêm:

```html
<i class="hidden" itemprop="position" content="1"></i>
```

Trước khi đóng thẻ li thứ hai thêm:

```html
<i class="hidden" itemprop="position" content="{BREADCRUMBS.position}"></i>
```

Sau khi hoàn chỉnh kết quả sẽ như sau:

```html
<ul class="temp-breadcrumbs hidden" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="{THEME_SITE_HREF}" itemprop="item" title="{LANG.Home}"><span itemprop="name">{LANG.Home}</span></a><i class="hidden" itemprop="position" content="1"></i></li>
    <!-- BEGIN: loop --><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="{BREADCRUMBS.link}" itemprop="item" title="{BREADCRUMBS.title}"><span class="txt" itemprop="name">{BREADCRUMBS.title}</span></a><i class="hidden" itemprop="position" content="{BREADCRUMBS.position}"></i></li><!-- END: loop -->
</ul>
```

Mở file themes/default/theme.php tìm

```php
foreach ($array_mod_title_copy as $arr_cat_title_i) {
```

Thêm lên bên trên:

```php
$border = 2;
```

Thêm xuống dưới:

```php
$arr_cat_title_i['position'] = $border++;
```

**Sửa Review snippet module news**

Nếu giao diện của bạn tồn tại file themes/theme-cua-ban/modules/news/detail.tpl tìm đoạn code từ thẻ `<!-- BEGIN: data_rating -->` đến thẻ `<!-- END: data_rating -->` thay bằng đoạn code sau

```html
<span itemscope itemtype="https://schema.org/AggregateRating">
    <span class="hidden d-none hide" itemprop="itemReviewed" itemscope itemtype="https://schema.org/CreativeWorkSeries">
        <span class="hidden d-none hide" itemprop="name">{DETAIL.title}</span>
    </span>
    {LANG.rating_average}:
    <span id="numberrating" itemprop="ratingValue">{DETAIL.numberrating}</span> -
    <span id="click_rating" itemprop="ratingCount">{DETAIL.click_rating}</span> {LANG.rating_count}
    <span class="hidden d-none hide" itemprop="bestRating">5</span>
</span>
```

Ví dụ thay:

```html
<!-- BEGIN: data_rating -->
<span itemscope itemtype="http://data-vocabulary.org/Review-aggregate">{LANG.rating_average}:
    <span itemprop="rating" id="numberrating">{DETAIL.numberrating}</span> -
    <span itemprop="votes" id="click_rating">{DETAIL.click_rating}</span> {LANG.rating_count}
</span>
<!-- END: data_rating -->
```

Thành:

```html
<!-- BEGIN: data_rating -->
<span itemscope itemtype="https://schema.org/AggregateRating">
    <span class="hidden d-none hide" itemprop="itemReviewed" itemscope itemtype="https://schema.org/CreativeWorkSeries">
        <span class="hidden d-none hide" itemprop="name">{DETAIL.title}</span>
    </span>
    {LANG.rating_average}:
    <span id="numberrating" itemprop="ratingValue">{DETAIL.numberrating}</span> -
    <span id="click_rating" itemprop="ratingCount">{DETAIL.click_rating}</span> {LANG.rating_count}
    <span class="hidden d-none hide" itemprop="bestRating">5</span>
</span>
<!-- END: data_rating -->
```

#### Phần thực hiện thêm nếu muốn tối ưu hơn:

- Module page: Thêm cấu hình số ký tự tiêu đề, giới thiệu, hiển thị ảnh cho global.page.php

Việc sửa này không bắt buộc, nếu không sửa thì các cấu hình của block chỉ không hiển thị hình ảnh minh họa:

Sửa file (nếu có): themes/my_theme/modules/page/block.about.tpl tìm đến đoạn:

```html
<h3 class="margin-bottom"><a title="{TITLE}" href="{LINK}">{TITLE}</a></h3>
```

Sửa lại thành:

```html
<!-- BEGIN: image -->
<div class="image pull-left">
    <a href="{LINK}" title="{TITLE}"> <img src="{IMAGE}" alt="{TITLE}" class="img-responsive" /></a>
</div>
<!-- END: image -->
<h3 class="margin-bottom">
    <a title="{TITLE}" href="{LINK}">{TITLE}</a>
</h3>
```

- Sửa lỗi giao diện block global.login.php và global.user_button.php

Mở themes/ten-theme/modules/users/block.login.tpl (nếu có) và themes/ten-theme/modules/users/block.user_button.tpl (nếu có) tìm những đoạn

```
{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/users.js
```

Hoặc

```
{NV_BASE_SITEURL}themes/default/js/users.js
```

Thay lại thành

```
{NV_BASE_SITEURL}themes/{BLOCK_JS}/js/users.js
```

- Xóa google fonts khi thay đổi thiết lập giao diện

Mở themes/ten-themes/config.php tìm

```php
    $nv_Cache->delMod('settings');
```

Thêm xuống dưới

```php
    $gfonts = new NukeViet\Client\Gfonts();
    $gfonts->destroyAll();
```

- Xóa bỏ tích hợp web Google+ (Việc này cần làm do Google đã gỡ bỏ nền tảng Google Plus):

Tìm và xóa các đoạn tương tự như sau trong các file tpl của giao diện

```html
<div class="g-plusone" data-size="medium"></div>
```

Đối với giao diện mặc định chúng tôi kiểm tra nó có ở những file sau:

1. themes/my_theme/modules/news/detail.tpl
2. themes/my_theme/modules/page/main.tpl
3. themes/mobile_my_theme/modules/news/detail.tpl

Tìm và xóa các đoạn tương tự như sau trong js của giao diện

```js
0 < $(".g-plusone").length && (window.___gcfg = {
        lang: nv_lang_data
    }, function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "//apis.google.com/js/plusone.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b);
    }());
```

Đối với giao diện mặc định chúng tôi kiểm tra nó có ở những file sau:

1. themes/my_theme/js/main.js
2. themes/mobile_my_theme/js/main.js để xóa bỏ đoạn:

- Nếu website của bạn có tùy biến dữ liệu user với kiểu dữ liệu trình soạn thảo và đang bị lỗi không hiển thị trình soạn thảo, tồn tại file themes/ten_theme/js/users.js thì mở lên tìm

```js
function reg_validForm(a) {
```

Thêm xuống dưới

```js
    // Xử lý các trình soạn thảo
    if (typeof CKEDITOR != "undefined") {
        for (var instanceName in CKEDITOR.instances) {
            $('#' + instanceName).val(CKEDITOR.instances[instanceName].getData());
        }
    }
```

**Nếu site của bạn hiện ở phiên bản nhỏ hơn 4.3.02 và sử dụng giao diện không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau**

- Tìm trong file: themes/my_theme/js/main.js:

```html
window.location.href = location.reload()
```

Nếu có thay bằng

```html
location.reload()
```

- Nếu giao diện của bạn tồn tại themes/my_theme/modules/contact/form.tpl

Mở form.tpl tìm

```html
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
```

Thêm lên trên

```html
        <!-- BEGIN: sendcopy -->
```

Thêm xuống dưới

```html
        <!-- END: sendcopy -->
```
