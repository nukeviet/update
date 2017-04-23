# Hướng dẫn cập nhật từ NukeViet 4 Official (4.0.29), 4.1 Beta 1 (4.1.00), 4.1 Beta 2 (4.1.01) lên NukeViet 4.1 Official (4.1.02)

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.0.29 bạn cần tìm hướng dẫn nâng cấp tối thiểu lên phiên bản 4.0.29 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:
Chú ý: cần thực hiện việc backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.

### Bước 1: Chuẩn bị trước khi cập nhật:

> Nếu bạn đang sử dụng bản 4.0.29 cần làm bước này, nếu bạn đang dùng bản 4.1.00 hoặc 4.1.01 hãy bỏ qua bước này.

Mở `config.php` (file này có thể khác tùy theo thiết lập của quản lý site), thêm sau dòng `$global_config['cached'] = 'files';`:

```php
$global_config['session_handler'] = 'files';
```

### Bước 2: Thực hiện cập nhật:

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.1.02/update-to-4.1.02.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần chú ý:

**Nếu bạn đang dùng bản 4.0.29:**

- Truy cập vào khu vực cấu hình => Cấu hình chung nhấp lưu lại để hệ thống cập nhật các thông số mới cho chức năng tìm kiếm.
- Truy cập khu vực Cấu hình => Ngôn ngữ để sắp xếp các ngôn ngữ nếu bạn sử dụng nhiều hơn một ngôn ngữ.
- Có thể thêm mã xác nhận cho các bình chọn ở module voting.
- Truy cập khu vực Cấu hình => Thiết lập an ninh để tùy chỉnh chức năng xác thực hai bước và chặn đăng nhập sai nhiều lần nếu cần thiết.

**Nếu bạn đang dùng bản 4.1.00 hoặc nhỏ hơn:**

- Nếu website có sử dụng module news hoặc module ảo của nó, vào cấu hình module thiết lập chức năng bài viết tức thời của Facebook nếu cần thiết.
- Vào phần cấu hình => Thiết lập an ninh để tùy chỉnh loại captcha nếu cần thiết.
- Nếu sử dụng giao diện mặc định và có block global.company_info.php thì cần xóa block và thêm lại.

**Nếu bạn đang dùng bản 4.1.01 hoặc nhỏ hơn:**

- Nếu website có sử dụng module news hoặc module ảo của nó, vào cấu hình module để bật chức năng cho phép copy bài viết nếu cần thiết.
- Nếu website có sử dụng module page hoặc module ảo của nó, vào cấu hình module để bật chức năng cho phép copy bài viết nếu cần thiết.

**Cuối cùng cần:**

- Kiểm tra lại tương thích của các module không phải mặc định của hệ thống.
- Nếu site sử dụng giao diện không phải mặc định, cần cập nhật giao diện theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

> - **Các giao diện bản 4.1.01 có thể chạy trên bản 4.1.02 mà không cần cập nhật**
> - **Nếu site đang ở bản 4.1.00 hãy nâng cấp theo hướng dẫn tại: https://github.com/nukeviet/update/wiki/Hướng-dẫn-nâng-cấp-giao-diện-tương-thích-từ-NukeViet-4.1-Beta-1-(4.1.00)-lên-NukeViet-4.1-Beta-2-(4.1.01)**
> - **Nếu site đang ở bản 4.0.29 hãy cập nhật giao diện lên 4.1.02 theo hướng dẫn dưới đây**

### Chỉnh sửa tương thích Jquery 3

Kiểm tra lại javascript của giao diện để tương thích với Jquery 3. Hiện tại chúng tôi kiểm tra với NukeViet cơ bản cần phải tìm các đoạn có dạng

```js
$(window).load(function () {
```

Thay lại thành

```js
$(window).on('load', function() {
```

Nếu giao diện sử dụng Bootstrap riêng cần cập nhật tối thiểu lên bản 3.3.6 để tương thích với Jquery 3.

### Bổ sung giao diện module xác thực hai bước (two-step-verification)

Nếu bạn cần chỉnh sửa giao diện module two-step-verification theo phong cách riêng hãy bổ sung giao diện này vào giao diện bạn sử dụng.

### Chỉnh sửa theme.php

Mở themes/ten-theme/theme.php tìm 

Tìm 

```php
$xtpl->assign('THEME_SEARCH_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek&q=');
```

Thay lại thành

```php

        if (!$global_config['rewrite_enable']) {
            $xtpl->assign('THEME_SEARCH_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek&amp;q=');
        } else {
            $xtpl->assign('THEME_SEARCH_URL', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=seek', true) . '?q=');
        }
```

### JS của giao diện chính

Tìm file xử lý javascript chính của giao diện (ví dụ `themes/ten-giao-dien/js/main.js`) cập nhật theo hướng sau:

Bổ sung thêm biến `reCapIDs = [];`

Ví dụ thêm vào đầu file dòng:

```js
var reCapIDs = [];
```

Thêm giá trị `callback` cho hàm `tipShow` ví dụ:

```js
function tipShow(a, b) {
```

Thay lại thành:

```js
function tipShow(a, b, callback) {
```

Trong hàm `tipShow` thay:

```js
    $("#tip").attr("data-content", b).show("fast");
    tip_active = !0
```

Thành:

```js
    if (typeof callback != "undefined") {
        $("#tip").attr("data-content", b).show("fast", function() {
            if (callback == "recaptchareset" && typeof nv_is_recaptcha != "undefined" && nv_is_recaptcha) {
                $('[data-toggle="recaptcha"]', $(this)).each(function() {
                    var parent = $(this).parent();
                    var oldID = $(this).attr('id');
                    var id = "recaptcha" + (new Date().getTime()) + nv_randomPassword(8);
                    var ele;
                    var btn = false, pnum = 0, btnselector = '';
                    
                    $(this).remove();
                    parent.append('<div id="' + id + '" data-toggle="recaptcha"></div>');
                    
                    for (i = 0, j = nv_recaptcha_elements.length; i < j; i++) {
                        ele = nv_recaptcha_elements[i];
                        if (typeof ele.pnum != "undefined" && typeof ele.btnselector != "undefined" && ele.pnum && ele.btnselector != "" && ele.id == oldID) {
                            pnum = ele.pnum;
                            btnselector = ele.btnselector;
                            btn = $('#' + id);
                            for (k = 1; k <= ele.pnum; k ++) {
                                btn = btn.parent();
                            }
                            btn = $(ele.btnselector, btn);
                            break;
                        }
                    }
                    var newEle = {};
                    newEle.id = id;
                    if (btn != false) {
                        newEle.btn = btn;
                        newEle.pnum = pnum;
                        newEle.btnselector = btnselector;
                    }
                    nv_recaptcha_elements.push(newEle);
                });
                reCaptchaLoadCallback();
            }
        });
    } else {
        $("#tip").attr("data-content", b).show("fast");
    }
    tip_active = 1;
```

Thực hiện tương tự cho hàm `ftipShow`

Thay đổi hàm `change_captcha` để hỗ trợ reload ReCAPTCHA ví dụ:

```js
function change_captcha(a) {
    if (typeof nv_is_recaptcha != "undefined" && nv_is_recaptcha) {
        for (i = 0, j = reCapIDs.length; i < j; i++) {
            var ele = reCapIDs[i];
            var btn = nv_recaptcha_elements[ele[0]];
            if ($('#' + btn.id).length) {
                if (typeof btn.btn != "undefined" && btn.btn != "") {
                    btn.btn.prop('disabled', true);
                }
                grecaptcha.reset(ele[1]);
            }
        }
        reCaptchaLoadCallback();
    } else {
        $("img.captchaImg").attr("src", nv_base_siteurl + "index.php?scaptcha=captcha&nocache=" + nv_randomPassword(10));
        "undefined" != typeof a && "" != a && $(a).val("");
    }
    return !1
}
```

Thêm giá trị `callback` cho hàm `modalShow` và `modalShowByObj`: Đối chiếu với giao diện default để sửa.

Bổ sung hai hàm `reCaptchaLoadCallback` và `reCaptchaResCallback` :

```js

var reCaptchaLoadCallback = function() {
    for (i = 0, j = nv_recaptcha_elements.length; i < j; i++) {
        var ele = nv_recaptcha_elements[i];
        if ($('#' + ele.id).length && typeof reCapIDs[i] == "undefined") {
            var size = '';
            if (typeof ele.btn != "undefined" && ele.btn != "") {
                ele.btn.prop('disabled', true);
            }
            if (typeof ele.size != "undefined" && ele.size == "compact") {
                size = 'compact';
            }
            reCapIDs.push([
                i, grecaptcha.render(ele.id, {
                    'sitekey': nv_recaptcha_sitekey,
                    'type': nv_recaptcha_type,
                    'size': size,
                    'callback': reCaptchaResCallback
                })
            ]);
        }
    }
}

var reCaptchaResCallback = function() {
    for (i = 0, j = reCapIDs.length; i < j; i++) {
        var ele = reCapIDs[i];
        var btn = nv_recaptcha_elements[ele[0]];
        if ($('#' + btn.id).length) {
            var res = grecaptcha.getResponse(ele[1]);
            if (res != "") {
                if (typeof btn.btn != "undefined" && btn.btn != "") {
                    btn.btn.prop('disabled', false);
                }
            }
        }
    }
}
```

Thay đổi cách xử lý khi hiển thị tip top và tip bottom ví dụ:

Thay:

```js
    $("[data-toggle=tip], [data-toggle=ftip]").click(function() {
        var a = $(this).attr("data-target"),
            d = $(a).html(),
            b = $(this).attr("data-toggle"),
            c = "tip" == b ? $("#tip").attr("data-content") : $("#ftip").attr("data-content");
        a != c ? ("" != c && $('[data-target="' + c + '"]').attr("data-click", "y"), "tip" == b ? ($("#tip .bg").html(d), tipShow(this, a)) : ($("#ftip .bg").html(d), ftipShow(this, a))) : "n" == $(this).attr("data-click") ? "tip" == b ? tipHide() : ftipHide() : "tip" == b ? tipShow(this, a) : ftipShow(this, a);
        return !1
    });
```

Thành:

```js
    $("[data-toggle=tip], [data-toggle=ftip]").click(function() {
        var a = $(this).attr("data-target"),
            d = $(a).html(),
            b = $(this).attr("data-toggle"),
            c = "tip" == b ? $("#tip").attr("data-content") : $("#ftip").attr("data-content");
        var callback = $(this).data("callback");
        a != c ? ("" != c && $('[data-target="' + c + '"]').attr("data-click", "y"), "tip" == b ? ($("#tip .bg").html(d), tipShow(this, a, callback)) : ($("#ftip .bg").html(d), ftipShow(this, a, callback))) : "n" == $(this).attr("data-click") ? "tip" == b ? tipHide() : ftipHide() : "tip" == b ? tipShow(this, a, callback) : ftipShow(this, a, callback);
        return !1
    });
```

Bổ sung thao tác xử lý sau khi load:

```js
    if (typeof nv_is_recaptcha != "undefined" && nv_is_recaptcha && nv_recaptcha_elements.length > 0) {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://www.google.com/recaptcha/api.js?hl=" + nv_lang_interface + "&onload=reCaptchaLoadCallback&render=explicit";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b);
    }
```    

### Cập nhật giao diện module banners

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/banners` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/banners.js` thì đối chiếu với file `themes/default/js/banners.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/banners/theme.php` thì đối chiếu với file `modules/banners/theme.php` để sửa đổi.

#### Cập nhật global.banners.tpl

Mở themes/ten-giao-dien/modules/banners/global.banners.tpl:

Tìm:

```html
    <!-- END: type_image -->
```

Thêm xuống dưới:

```html
    <!-- BEGIN: bannerhtml -->
    <div class="clearfix text-left">
        {DATA.bannerhtml}
    </div>
    <!-- END: bannerhtml -->
```

#### Cập nhật logininfo.tpl

Mở themes/ten-giao-dien/modules/banners/logininfo.tpl:

Tìm:

```html
		<!-- END: captcha -->
```

Thêm xuống dưới:

```html
        <!-- BEGIN: recaptcha -->
        <div class="form-group">
            <label class="col-sm-6 control-label">{N_CAPTCHA}:</label>
            <div class="col-xs-24">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    btn: $('[type="button"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent().parent())
                })
                </script>
            </div>
        </div>
        <!-- END: recaptcha -->
```

### Cập nhật giao diện module comment

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/comment` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/comment.js` thì đối chiếu với file `themes/default/js/comment.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/comment/theme.php` thì đối chiếu với file `modules/comment/theme.php` để sửa đổi.

#### Cập nhật main.tpl

Mở themes/ten-giao-dien/modules/comment/main.tpl:

Tìm:

```html
			<!-- END: captcha -->
```

Thêm xuống dưới:

```html
            <!-- BEGIN: recaptcha -->
            <div class="form-group clearfix">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    btn: $("#buttoncontent", $('#{RECAPTCHA_ELEMENT}').parent().parent().parent())
                })
                </script>
            </div>
            <!-- END: recaptcha -->
```

Tìm:

```html
				<input id="buttoncontent" type="button" value="{LANG.comment_submit}" onclick="sendcommment('{MODULE_COMM}', '{MODULE_DATA}_commentcontent', '{AREA_COMM}', '{ID_COMM}', '{ALLOWED_COMM}', '{CHECKSS_COMM}', {GFX_NUM});" class="btn btn-primary" />
```

Thay lại thành:

```html
				<input id="buttoncontent" type="button" value="{LANG.comment_submit}" onclick="sendcommment(this, '{MODULE_COMM}', '{MODULE_DATA}_commentcontent', '{AREA_COMM}', '{ID_COMM}', '{ALLOWED_COMM}', '{CHECKSS_COMM}', {GFX_NUM});" class="btn btn-primary" />
```

### Cập nhật giao diện module contact

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/contact` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/contact.js` thì đối chiếu với file `themes/default/js/contact.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/contact/theme.php` thì đối chiếu với file `modules/contact/theme.php` để sửa đổi.

#### Bổ sung giao diện block.supporter.tpl

Sao chép file `themes/default/modules/contact/block.supporter.tpl` sang `themes/ten-giao-dien/modules/contact/block.supporter.tpl` và chỉnh sửa lại cho hợp lý.

#### Cập nhật form.tpl

Mở themes/ten-giao-dien/modules/contact/form.tpl:

Tìm:

```html
                <input type="text" maxlength="60" value="{CONTENT.fphone}" name="fphone" class="form-control" placeholder="{LANG.phone}" />
            </div>
        </div>
```

Thêm xuống dưới:

```html
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-home fa-lg fa-horizon"></em>
				</span>
                <input type="text" maxlength="60" value="{CONTENT.faddress}" name="faddress" class="form-control" placeholder="{LANG.address}" />
            </div>
        </div>
```

Tìm:

```html
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
```

Thêm xuống dưới:

```html
        <!-- BEGIN: captcha -->
```

Tìm:

```html
                <input type="text" placeholder="{LANG.captcha}" maxlength="{NV_GFX_NUM}" value="" name="fcode" class="fcode required form-control display-inline-block" style="width:100px;" data-pattern="/^(.){{NV_GFX_NUM},{NV_GFX_NUM}}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_captcha}"/>
            </div>
		</div>
```

Thêm xuống dưới

```html
        <!-- END: captcha -->
        <!-- BEGIN: recaptcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent())
                })
                </script>
            </div>
        </div>
        <!-- END: recaptcha -->
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

### Chỉnh sửa giao diện module news

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

Mở `themes/ten-theme/modules/news/viewcat_list.tpl` tìm 

```html
data-content="{CONTENT.hometext}"
```

Thay lại thành

```html
data-content="{CONTENT.hometext_clean}"
```

Mở `themes/ten-theme/modules/news/viewcat_main_bottom.tpl` tìm 

```html
data-content="{OTHER.hometext}"
```

Thay lại thành

```html
data-content="{OTHER.hometext_clean}"
```

Mở `themes/ten-theme/modules/news/viewcat_main_left.tpl` tìm 

```html
data-content="{OTHER.hometext}"
```

Thay lại thành

```html
data-content="{OTHER.hometext_clean}"
```

Mở `themes/ten-theme/modules/news/viewcat_main_right.tpl` tìm 

```html
data-content="{OTHER.hometext}"
```

Thay lại hành

```html
data-content="{OTHER.hometext_clean}"
```

Mở `themes/ten-theme/modules/news/viewcat_two_column.tpl` tìm 

```html
data-content="{CONTENT.hometext}"
```

Thay lại thành

```html
data-content="{CONTENT.hometext_clean}"
```

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/news/theme.php` mở nó

Tìm các đoạn có dạng (khoảng 2)

```php
$array_row_i['hometext'] = nv_clean60($array_row_i['hometext'], $module_config[$module_name]['tooltip_length'], true);
```

Thay lại thành

```php
$array_row_i['hometext_clean'] = nv_clean60(strip_tags($array_row_i['hometext']), $module_config[$module_name]['tooltip_length'], true);
```

Tìm

```php
$array_content_i['hometext'] = nv_clean60($array_content_i['hometext'], 200);
```

Thay lại thành

```php
$array_content_i['hometext'] = nv_clean60(strip_tags($array_content_i['hometext']), 200);
```

Tìm 

```php
if ($module_config[$module_name]['showtooltip']) {
    $xtpl->assign('TOOLTIP_POSITION', $module_config[$module_name]['tooltip_position']);
    $array_catpage_i['content'][$index]['hometext'] = nv_clean60($array_catpage_i['content'][$index]['hometext'], $module_config[$module_name]['tooltip_length'], true);
    $xtpl->parse('main.loopcat.other.tooltip');
}
```

Trong đoạn đó xóa

```php
$array_catpage_i['content'][$index]['hometext'] = nv_clean60($array_catpage_i['content'][$index]['hometext'], $module_config[$module_name]['tooltip_length'], true);
```

Thêm vào bên dưới đoạn đó

```php
$xtpl->assign('CONTENT', $array_catpage_i['content'][$index]);
```

Thêm lên trên đoạn đó

```

$array_catpage_i['content'][$index]['hometext_clean'] = nv_clean60(strip_tags($array_catpage_i['content'][$index]['hometext']), $module_config[$module_name]['tooltip_length'], true);
$xtpl->assign('CONTENT', $array_catpage_i['content'][$index]);
```

Tìm

```php
$related_new_array_i['hometext'] = nv_clean60($related_new_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true);
```

Thay lại thành

```php
$related_new_array_i['hometext_clean'] = nv_clean60(strip_tags($related_new_array_i['hometext']), $module_config[$module_name]['tooltip_length'], true);
```

Tìm

```php
$related_array_i['hometext'] = nv_clean60($related_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true);
```

Thanh lại thành

```php
$related_array_i['hometext_clean'] = nv_clean60(strip_tags($related_array_i['hometext']), $module_config[$module_name]['tooltip_length'], true);
```

Tìm 

```php
$topic_array_i['hometext'] = nv_clean60($topic_array_i['hometext'], $module_config[$module_name]['tooltip_length'], true);
```

Thay lại thành

```php
$topic_array_i['hometext_clean'] = nv_clean60(strip_tags($topic_array_i['hometext']), $module_config[$module_name]['tooltip_length'], true);
```

Tìm

```php
$xtpl->assign('CONTENT', BoldKeywordInStr($value['hometext'], $key) . "...");
```

Thay lại thành

```php
$xtpl->assign('CONTENT', BoldKeywordInStr(strip_tags($value['hometext']), $key) . "...");
```

### Chỉnh sửa giao diện module users

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/users`:

Mở `themes/ten-theme/modules/users/confirm.tpl` tìm 

```html
<input name="openid_account_confirm" value="1" type="hidden" />
```

Thêm vào sau

```html
<!-- BEGIN: redirect --><input name="nv_redirect" value="{REDIRECT}" type="hidden" /><!-- END: redirect -->
```

Mở `themes/ten-theme/modules/users/info.tpl` tìm 

```html
<!-- BEGIN: edit_password --><li class="{PASSWORD_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/password" href="#edit_password">{LANG.edit_password}</a></li><!-- END: edit_password -->
```

Thêm vào sau


```html
<!-- BEGIN: 2step --><li><a href="{URL_2STEP}">{LANG.2step_status}</a></li><!-- END: 2step -->
```

Mở `themes/ten-theme/modules/users/login_form.tpl` đối chiếu với `themes/default/modules/users/login_form.tpl` để chỉnh sửa phù hợp do có nhiều thay đổi.
Có thể tóm lược như sau:

Thêm vào thành phần chứa hai nút nhập mật khẩu và tên đăng nhập class `loginstep1` ví dụ

```html
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
        <input type="text" class="required form-control" placeholder="{GLANG.username_email}" value="" name="nv_login" maxlength="100" data-pattern="/^(.){3,}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.username_empty}">
    </div>
</div>
```

Thay lại thành

```html
<div class="form-group loginstep1">
    <div class="input-group">
        <span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
        <input type="text" class="required form-control" placeholder="{GLANG.username_email}" value="" name="nv_login" maxlength="100" data-pattern="/^(.){3,}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.username_empty}">
    </div>
</div>
```

Bên dưới thành phần chứa ô nhập tên đăng nhập và mật khẩu thêm vào thành phần xác thực hai bước

```html
<div class="form-group loginstep2 hidden">
    <label class="margin-bottom">{GLANG.2teplogin_totppin_label}</label>
    <div class="input-group margin-bottom">
        <span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
        <input type="text" class="required form-control" placeholder="{GLANG.2teplogin_totppin_placeholder}" value="" name="nv_totppin" maxlength="6" data-pattern="/^(.){6,}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.2teplogin_totppin_placeholder}">
    </div>
    <div class="text-center">
        <a href="#" onclick="login2step_change(this);">{GLANG.2teplogin_other_menthod}</a>
    </div>
</div>

<div class="form-group loginstep3 hidden">
    <label class="margin-bottom">{GLANG.2teplogin_code_label}</label>
    <div class="input-group margin-bottom">
        <span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
        <input type="text" class="required form-control" placeholder="{GLANG.2teplogin_code_placeholder}" value="" name="nv_backupcodepin" maxlength="8" data-pattern="/^(.){8,}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.2teplogin_code_placeholder}">
    </div>
    <div class="text-center">
        <a href="#" onclick="login2step_change(this);">{GLANG.2teplogin_other_menthod}</a>
    </div>
</div>
```

Thêm vào thành phần chứa mã xác nhận (captcha) class `loginCaptcha` ví dụ

```html
<div class="form-group">
    <div class="middle text-center clearfix">
        <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" /><em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.bsec');"></em><input type="text" style="width:100px;" class="bsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
    </div>
</div>
```

Thay lại thành

```html
<div class="form-group loginCaptcha">
    <div class="middle text-center clearfix">
        <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" /><em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.bsec');"></em><input type="text" style="width:100px;" class="bsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
    </div>
</div>
```

Mở `themes/ten-theme/modules/users/userinfo.tpl` tìm 

```html
<tr>
    <td>{LANG.st_login2}</td>
    <td>{USER.st_login}</td>
</tr>
```

Thêm vào bên dưới

```html
<tr>
    <td>{LANG.2step_status}</td>
    <td>{USER.active2step} (<a href="{URL_2STEP}">{LANG.2step_link}</a>)</td>
</tr>
```

Mở `themes/ten-theme/modules/users/viewdetailusers.tpl` tìm 

```html
<div class="table-responsive">
	<table class="table table-bordered table-striped">
```

Thêm lên trên

```html

<!-- BEGIN: for_admin -->
<div class="m-bottom clearfix">
    <div class="pull-right">
        {LANG.for_admin}: 
        <!-- BEGIN: edit --><a href="{USER.link_edit}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> {GLANG.edit}</a><!-- END: edit -->
        <!-- BEGIN: delete --><a href="#" class="btn btn-danger btn-xs" data-toggle="admindeluser" data-userid="{USER.userid}" data-link="{USER.link_delete}" data-back="{USER.link_delete_callback}"><i class="fa fa-trash-o"></i> {GLANG.delete}</a><!-- END: delete -->
    </div>
</div>
<!-- END: for_admin -->

```

Nếu giao diện của bạn tồn tại file `themes/ten-theme/js/users.js` cần đối chiếu với `themes/default/js/users.js` để chỉnh sửa phù hợp. Ví dụ:

Tìm 

```js
function login_validForm(a) {
```

Bên trong hàm đó, trong phần thực thi sau khi login thành công `success: function(d) {` thay toàn bộ giá trị thành

```js
success: function(d) {
    var b = $("[onclick*='change_captcha']", a);
    b && b.click();
    if (d.status == "error") {
        $("input,button", a).not("[type=submit]").prop("disabled", !1), 
        $(".tooltip-current", a).removeClass("tooltip-current"), 
        "" != d.input ? $(a).find("[name=\"" + d.input + "\"]").each(function() {
            $(this).addClass("tooltip-current").attr("data-current-mess", d.mess);
            validErrorShow(this)
        }) : $(".nv-info", a).html(d.mess).addClass("error").show(), setTimeout(function() {
            $("[type=submit]", a).prop("disabled", !1)
        }, 1E3)
    } else if (d.status == "ok") {
        $(".nv-info", a).html(d.mess + '<span class="load-bar"></span>').removeClass("error").addClass("success").show(), 
        $(".form-detail", a).hide(), $("#other_form").hide(), setTimeout(function() {
            if( "undefined" != typeof d.redirect && "" != d.redirect){
                 window.location.href = d.redirect;
            }else{
                 $('#sitemodal').modal('hide');
                 window.location.href = window.location.href;
            }
        }, 3E3)
    } else if (d.status == "2steprequire") {
        $(".form-detail", a).hide(), $("#other_form").hide();
        $(".nv-info", a).html("<a href=\"" + d.input + "\">" + d.mess + "</a>").removeClass("error").removeClass("success").addClass("info").show();
    } else {
        $("input,button", a).prop("disabled", !1);
        $('.loginstep1, .loginstep2, .loginCaptcha', a).toggleClass('hidden');
    }
}
```

Mổ sung thêm hàm

```js
function login2step_change(ele) {
    var ele = $(ele), form = ele, i = 0;
    while (!form.is('form')) {
        if (i++ > 10) {
            break;
        }
        form = form.parent();
    }
    if (form.is('form')) {
        $('.loginstep2 input,.loginstep3 input', form).val('');
        $('.loginstep2,.loginstep3', form).toggleClass('hidden');
    }
    return false;
}
```

Bổ sung thêm lệnh xử lý cho admin

```js
$(document).ready(function() {
    // Delete user handler
    $('[data-toggle="admindeluser"]').click(function(e) {
        e.preventDefault();
        var data = $(this).data();
        if (confirm(nv_is_del_confirm[0])) {
            $.post(data.link, 'userid=' + data.userid, function(res) {
                if (res == 'OK') {
                    window.location.href = data.back;
                } else {
                    var r_split = res.split("_");
                    if (r_split[0] == 'ERROR') {
                        alert(r_split[1]);
                    } else {
                        alert(nv_is_del_confirm[2]);
                    }
                }
            });
        }
    });
});
```

Nếu giao diện của bạn tồn tại `themes/ten-theme/modules/users.php`, mở nó:

Tìm

```php
$xtpl = new XTemplate('register.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
```

Bên dưới xác định và xóa

```php
$xtpl->assign('USER_REGISTER', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=register');
```

Tìm  

```php
if ($group_id != 0) {
	$xtpl->assign('USER_REGISTER', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=register/' . $group_id);
}
```

Thêm vào sau đó

```php
 else {
    $xtpl->assign('USER_REGISTER', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=register');
    $xtpl->parse('main.agreecheck');
}
```

Tìm

```php
    $xtpl->parse('main.edit_password');
    $xtpl->parse('main.tab_edit_password');
}
```

Thêm vào sau

```php

if (in_array('2step', $types)) {
    $xtpl->assign('URL_2STEP', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=two-step-verification', true));
    $xtpl->parse('main.2step');
}
```

Tìm và xóa (Chú ý có hai đoạn như thế, nếu có 2 doạn thì xóa đi một đoạn)

```php
if (in_array('avatar', $types)) {
	$xtpl->parse('main.edit_avatar');
    $xtpl->parse('main.tab_edit_avatar');
}
```

Tìm thấy hàm

```php
function user_welcome()
```

Bên dưới xác định

```php
$xtpl->assign('URL_GROUPS', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=groups', true));
```

Thêm xuống dưới

```php
$xtpl->assign('URL_2STEP', nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=two-step-verification', true));
```

Tìm

```php
$_user_info['st_login'] = ! empty($user_info['st_login']) ? $lang_module['yes'] : $lang_module['no'];
```

Thêm xuống dưới

```php
$_user_info['active2step'] = ! empty($user_info['active2step']) ? $lang_global['on'] : $lang_global['off'];
```

Tìm

```php
function openid_account_confirm($gfx_chk, $attribs)
```

Thay lại thành

```php
function openid_account_confirm($gfx_chk, $attribs, $user)
```

Tìm

```php
$xtpl = new XTemplate('confirm.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
```

Thêm xuống dưới

```php

$lang_module['openid_confirm_info'] = sprintf($lang_module['openid_confirm_info'], $attribs['contact/email'], $user['username']);

```

Vẫn trong hàm `openid_account_confirm` tìm

```php
$xtpl->parse('main');
return $xtpl->text('main');
```

Thêm lên trên

```php
if (!empty($nv_redirect)) {
    $xtpl->assign('REDIRECT', $nv_redirect);
    $xtpl->parse('main.redirect');
}
```

Tìm 

```php
function nv_memberslist_detail_theme($item, $array_field_config, $custom_fields)
```

Thêm xuống dưới `$xtpl->assign('LANG', $lang_module);`

```php
$xtpl->assign('GLANG', $lang_global);
```

Bên dưới tìm

```php
$xtpl->assign('USER', $item);
```

Thêm xuống dưới

```php

if ($item['is_admin']) {
    if ($item['allow_edit']) {
        $xtpl->assign('LINK_EDIT', $item['link_edit']);
        $xtpl->parse('main.for_admin.edit');
    }
    if ($item['allow_delete']) {
        $xtpl->parse('main.for_admin.delete');
    }
    $xtpl->parse('main.for_admin');
}
```
