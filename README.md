# Hướng dẫn cập nhật từ NukeViet 4 Official (4.0.29) lên NukeViet 4.1 Beta (4.1.00)

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.0.29 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.0.29 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:
Chú ý: cần thực hiện việc backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.

### Bước 1: Chuẩn bị trước khi cập nhật:

Mở `config.php` (file này có thể khác tùy theo thiết lập của quản lý site), thêm sau dòng `$global_config['cached'] = 'files';`:

```php
$global_config['session_handler'] = 'files';
```

### Bước 2: Thực hiện cập nhật:

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.1.00/update-to-4.1.00.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần làm các thao tác:
- Nếu site sử dụng giao diện không phải mặc định, cần cập nhật giao diện theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.0 Official cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.1 Beta:

### Chỉnh sửa tương thích Jquery 3

Kiểm tra lại javascript của giao diện để tương thích với Jquery 3. Hiện tại chúng tôi kiểm tra với NukeViet cơ bản cần phải tìm các đoạn có dạng

```js
$(window).load(function () {
```

Thay lại thành

```js
$(window).on('load', function() {
```

### Bổ sung giao diện module xác thực hai bước (two-step-verification)

Nếu bạn cần chỉnh sửa giao diện module two-step-verification theo phong cách riêng hãy bổ sung giao diện này vào giao diện bạn sử dụng.

### Chỉnh sửa theme.php

Mở themes/ten-theme/theme.php tìm 

```php
global $home, $array_mod_title, $lang_global, $language_array
````

Trong dòng đó thêm vào cuối trước dấu `;`

```php
, $rewrite_keys
```

Tìm 

```php
$xtpl->assign('THEME_SEARCH_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek&q=');
```

Thay lại thành

```php

if (empty($rewrite_keys)) {
    $xtpl->assign('THEME_SEARCH_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek&amp;q=');
} else {
    $xtpl->assign('THEME_SEARCH_URL', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek', true) . '?q=');
}
```

### Chỉnh sửa giao diện module voting

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/voting` mở `themes/ten-theme/modules/voting/main.tpl` tìm

```html
<!-- END: loop -->
<!-- END: main -->
```

Thêm lên trên

```html
<!-- BEGIN: captcha -->
<div id="voting-modal-{VOTING.vid}" class="hidden">
    <div class="m-bottom">
        <strong>{LANG.enter_captcha}</strong>
    </div>
    <div class="clearfix">
        <div class="margin-bottom">
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" class="form-control rsec" value="" name="captcha" maxlength="{GFX_MAXLENGTH}"/>
                </div>
                <div class="col-xs-12">
                    <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" height="32" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" />
    				<em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.rsec');"></em>
                </div>
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary btn-block" value="{VOTING.langsubmit}" onclick="nv_sendvoting_captcha(this, {VOTING.vid}, '{LANG.enter_captcha_error}');"/>
    </div>
</div>
<!-- END: captcha -->
```

Mục đích hiển thị mã xác nhận khi bình chọn

Mở `themes/ten-theme/modules/voting/global.voting.tpl` tìm 


```html
<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}');" />
<input class="btn btn-primary btn-sm" value="{VOTING.langresult}" type="button" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '');" />
```

Thay lại thành

```html
<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}', '{VOTING.active_captcha}');" />
<input class="btn btn-primary btn-sm" value="{VOTING.langresult}" type="button" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '', '{VOTING.active_captcha}');" />
```

Tìm 


```html
<!-- END: main -->
```

Thêm lên trên

```html
<!-- BEGIN: captcha -->
<div id="voting-modal-{VOTING.vid}" class="hidden">
    <div class="m-bottom">
        <strong>{LANG.enter_captcha}</strong>
    </div>
    <div class="clearfix">
        <div class="margin-bottom">
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" class="form-control rsec" value="" name="captcha" maxlength="{GFX_MAXLENGTH}"/>
                </div>
                <div class="col-xs-12">
                    <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" height="32" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" />
    				<em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.rsec');"></em>
                </div>
            </div>
        </div>
        <input type="button" name="submit" class="btn btn-primary btn-block" value="{VOTING.langsubmit}" onclick="nv_sendvoting_captcha(this, {VOTING.vid}, '{LANG.enter_captcha_error}');"/>
    </div>
</div>
<!-- END: captcha -->
````

Nếu giao diện của bạn tồn tại `themes/ten-theme/js/voting.js` cần đối chiếu với `themes/default/js/voting.js` để chỉnh sửa phù hợp với chức năng mới (thêm captcha)

### Chỉnh sửa giao diện module voting

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/news`:

Mở `themes/ten-theme/modules/news/block_groups.tpl` tìm 

```html
<a {TITLE} class="show" href="{ROW.link}" data-content="{ROW.hometext}" data-img="{ROW.thumb}" data-rel="block_tooltip">{ROW.title}</a>
```

Thay lại thành

```html
<a {TITLE} class="show" href="{ROW.link}" data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="block_tooltip">{ROW.title_clean}</a>
```

Mở `themes/ten-theme/modules/news/block_headline.tpl` tìm 

```html
<a {TITLE} class="show" href="{LASTEST.link}" data-content="{LASTEST.hometext}" data-img="{LASTEST.homeimgfile}" data-rel="block_headline_tooltip">{LASTEST.title}</a>
```

Thay lại thành

```html
<a {TITLE} class="show" href="{LASTEST.link}" data-content="{LASTEST.hometext_clean}" data-img="{LASTEST.homeimgfile}" data-rel="block_headline_tooltip">{LASTEST.title}</a>
```

Mở `themes/ten-theme/modules/news/block_news.tpl` tìm 

```html
<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Thay lại thành

```html
<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Mở `themes/ten-theme/modules/news/block_newscenter.tpl` tìm 

```html
<a class="show black h4" href="{othernews.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip --> title="{othernews.title}" ><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.titleclean60}</a>
```

Thay lại thành

```html
<a class="show black h4" href="{othernews.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext_clean}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip --> title="{othernews.title}" ><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.titleclean60}</a>
```

Mở `themes/ten-theme/modules/news/block_tophits.tpl` tìm 

```html
<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Thay lại thành

```html
<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Mở `themes/ten-theme/modules/news/detail.tpl` tìm 

```html
data-content="{TOPIC.hometext}"
```

Thay lại thành

```html
data-content="{TOPIC.hometext_clean}"
```

Tìm

```html
data-content="{RELATED_NEW.hometext}"
```

Thay lại thành

```html
data-content="{RELATED_NEW.hometext_clean}"
```

Tìm

```html
data-content="{RELATED.hometext}"
```

Thay lại thành

```html
data-content="{RELATED.hometext_clean}"
```

Mở `themes/ten-theme/modules/news/detail.tpl` tìm 

```html
data-content="{CONTENT.hometext}"
```

Thay lại thành

```html
data-content="{CONTENT.hometext_clean}"
```

