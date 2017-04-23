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

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/voting` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/voting.js` thì đối chiếu với file `themes/default/js/voting.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/banners/theme.php` thì đối chiếu với file `modules/voting/theme.php` để sửa đổi.

#### Cập nhật global.voting.tpl

Mở themes/ten-giao-dien/modules/voting/global.voting.tpl:

Tìm:

```html
			<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}');" />
			<input class="btn btn-primary btn-sm" value="{VOTING.langresult}" type="button" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '');" />
```

Thay lại thànhL

```html
			<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}', '{VOTING.active_captcha}');" />
			<input class="btn btn-primary btn-sm" value="{VOTING.langresult}" type="button" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '', '{VOTING.active_captcha}');" />
```

Tìm:


```html
<!-- END: main -->
```

Thêm lên trên:

```html
<!-- BEGIN: has_captcha -->
<div id="voting-modal-{VOTING.vid}" class="hidden">
    <div class="clearfix">
        <!-- BEGIN: basic -->
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
        </div>
        <!-- END: basic -->
        <!-- BEGIN: recaptcha -->
        <div class="m-bottom text-center">
            <strong>{N_CAPTCHA}</strong>
        </div>
        <div class="margin-bottom clearfix">
            <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div></div>
            <script type="text/javascript">
            nv_recaptcha_elements.push({
                id: "{RECAPTCHA_ELEMENT}",
                btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent()),
                pnum: 3,
                btnselector: '[name="submit"]'
            })
            </script>
        </div>
        <!-- END: recaptcha -->
        <input type="button" name="submit" class="btn btn-primary btn-block" value="{VOTING.langsubmit}" onclick="nv_sendvoting_captcha(this, {VOTING.vid}, '{LANG.enter_captcha_error}');"/>
    </div>
</div>
<!-- END: has_captcha -->
```

#### Cập nhật main.tpl

Mở themes/ten-giao-dien/modules/voting/main.tpl:

Tìm:

```html
        			<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}');" />
                    <input class="btn btn-primary btn-sm" type="button" value="{VOTING.langresult}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '');"/>
```

Thay lại thành:

```html
        			<input class="btn btn-success btn-sm" type="button" value="{VOTING.langsubmit}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', '{VOTING.accept}', '{VOTING.checkss}', '{VOTING.errsm}', '{VOTING.active_captcha}');" />
                    <input class="btn btn-primary btn-sm" type="button" value="{VOTING.langresult}" onclick="nv_sendvoting(this.form, '{VOTING.vid}', 0, '{VOTING.checkss}', '', '{VOTING.active_captcha}');"/>

```

Tìm:

```html
<!-- END: loop -->
```

Thêm lên trên:

```html
<!-- BEGIN: has_captcha -->
<div id="voting-modal-{VOTING.vid}" class="hidden">
    <div class="clearfix">
        <!-- BEGIN: basic -->
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
        </div>
        <!-- END: basic -->
        <!-- BEGIN: recaptcha -->
        <div class="m-bottom text-center">
            <strong>{N_CAPTCHA}</strong>
        </div>
        <div class="margin-bottom clearfix">
            <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div></div>
            <script type="text/javascript">
            nv_recaptcha_elements.push({
                id: "{RECAPTCHA_ELEMENT}",
                btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent()),
                pnum: 3,
                btnselector: '[name="submit"]'
            })
            </script>
        </div>
        <!-- END: recaptcha -->
        <input type="button" name="submit" class="btn btn-primary btn-block" value="{VOTING.langsubmit}" onclick="nv_sendvoting_captcha(this, {VOTING.vid}, '{LANG.enter_captcha_error}');"/>
    </div>
</div>
<!-- END: has_captcha -->
```


### Cập nhật giao diện module news

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/news` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/news.js` thì đối chiếu với file `themes/default/js/news.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/news/theme.php` thì đối chiếu với file `modules/news/theme.php` để sửa đổi.

#### Cập nhật block_groups.tpl

Mở themes/ten-giao-dien/modules/news/block_groups.tpl:

Tìm:

```html
		<a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
```

Thay lại thành:

```html
		<a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} ><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail pull-left"/></a>
```

Tìm:

```html
		<a {TITLE} class="show" href="{ROW.link}" data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="block_tooltip">{ROW.title_clean}</a>
```

Thay lại thành:

```html
		<a {TITLE} class="show" href="{ROW.link}" {ROW.target_blank} data-content="{ROW.hometext_clean}" data-img="{ROW.thumb}" data-rel="block_tooltip">{ROW.title_clean}</a>
```

#### Cập nhật block_headline.tpl

Mở themes/ten-giao-dien/modules/news/block_headline.tpl:

Tìm:

```html
					<a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}"><img class="img-responsive" id="slImg{HOTSNEWS.imgID}" src="{PIX_IMG}" alt="{HOTSNEWS.image_alt}" /></a><h3><a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}">{HOTSNEWS.title}</a></h3>
```

Thay lại thành

```html
					<a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}" {HOTSNEWS.target_blank}><img class="img-responsive" id="slImg{HOTSNEWS.imgID}" src="{PIX_IMG}" alt="{HOTSNEWS.image_alt}" /></a><h3><a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}" {HOTSNEWS.target_blank}>{HOTSNEWS.title}</a></h3>
```

Tìm:

```html
						<a {TITLE} class="show" href="{LASTEST.link}" data-content="{LASTEST.hometext_clean}" data-img="{LASTEST.homeimgfile}" data-rel="block_headline_tooltip">{LASTEST.title}</a>
```

Thay lại thành:

```html
						<a {TITLE} class="show" href="{LASTEST.link}" {LASTEST.target_blank} data-content="{LASTEST.hometext_clean}" data-img="{LASTEST.homeimgfile}" data-rel="block_headline_tooltip">{LASTEST.title}</a>
```

#### Cập nhật block_news.tpl

Mở themes/ten-giao-dien/modules/news/block_news.tpl:

Tìm:

```html
		<a title="{blocknews.title}" href="{blocknews.link}"><img src="{blocknews.imgurl}" alt="{blocknews.title}" width="{blocknews.width}" class="img-thumbnail pull-left"/></a>
```

Thay lại thành

```html
		<a title="{blocknews.title}" href="{blocknews.link}" {blocknews.target_blank}><img src="{blocknews.imgurl}" alt="{blocknews.title}" width="{blocknews.width}" class="img-thumbnail pull-left"/></a>
```

Tìm:

```html
		<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Thay lại thành:

```html
		<a {TITLE} class="show" href="{blocknews.link}" {blocknews.target_blank} data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

#### Cập nhật block_newscenter.tpl

Mở themes/ten-giao-dien/modules/news/block_newscenter.tpl:

Tìm:

```html
                    <div class="margin-bottom text-center"><a href="{main.link}"><img src="{main.imgsource}" alt="{main.title}" width="{main.width}" class="img-thumbnail"/></a></div>
                    <h2 class="margin-bottom-sm"><a href="{main.link}" title="{main.title}">{main.titleclean60}</a></h2>
```

Thay lại thành:

```html
                    <div class="margin-bottom text-center"><a href="{main.link}" title="{main.link}" {main.target_blank}><img src="{main.imgsource}" alt="{main.title}" width="{main.width}" class="img-thumbnail"/></a></div>
                    <h2 class="margin-bottom-sm"><a href="{main.link}" title="{main.title}" {main.target_blank}>{main.titleclean60}</a></h2>
```

Tìm:

```html
                            <a class="show black h4" href="{othernews.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext_clean}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip --> title="{othernews.title}" ><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.titleclean60}</a>
```

Thay lại thành

```html
                            <a class="show black h4" href="{othernews.link}" {othernews.target_blank} <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{othernews.hometext_clean}" data-img="{othernews.imgsource}" data-rel="tooltip"<!-- END: tooltip --> title="{othernews.title}" ><img src="{othernews.imgsource}" alt="{othernews.title}" class="img-thumbnail pull-right margin-left-sm" style="width:65px;"/>{othernews.titleclean60}</a>
```

#### Cập nhật block_tophits.tpl

Mở themes/ten-giao-dien/modules/news/block_tophits.tpl:

Tìm:

```html
		<a title="{blocknews.title}" href="{blocknews.link}"><img src="{blocknews.imgurl}" alt="{blocknews.title}" width="{blocknews.width}" class="img-thumbnail pull-left"/></a>
		<!-- END: imgblock -->
		<a {TITLE} class="show" href="{blocknews.link}" data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

Thay lại thành:

```html
		<a title="{blocknews.title}" href="{blocknews.link}" {blocknews.target_blank}><img src="{blocknews.imgurl}" alt="{blocknews.title}" width="{blocknews.width}" class="img-thumbnail pull-left"/></a>
		<!-- END: imgblock -->
		<a {TITLE} class="show" href="{blocknews.link}" {blocknews.target_blank} data-content="{blocknews.hometext_clean}" data-img="{blocknews.imgurl}" data-rel="block_news_tooltip">{blocknews.title}</a>
```

#### Cập nhật content.tpl

Mở themes/ten-giao-dien/modules/news/content.tpl:

Tìm:

```html
	<div class="form-group">
		<label class="col-sm-4 control-label">{LANG.captcha} <span class="txtrequired">(*)</span></label>
```

Thêm lên trên

```html
    <!-- BEGIN: captcha -->
```

Tìm:

```html
            <img alt="{CAPTCHA_REFRESH}" src="{CAPTCHA_REFR_SRC}" width="16" height="16" class="refresh" onclick="change_captcha('#fcode_iavim');" />
		</div>
	</div>
```

Thêm xuống dưới:

```html
    <!-- END: captcha -->
    
    <!-- BEGIN: recaptcha -->
    <div class="form-group">
        <label class="col-sm-4 control-label">{N_CAPTCHA} <span class="txtrequired">(*)</span></label>
        <div class="col-sm-20">
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

#### Cập nhật detail.tpl

Mở themes/ten-giao-dien/modules/news/detail.tpl:

Tìm:

```html
            			<a href="{TOPIC.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{TOPIC.hometext_clean}" data-img="{TOPIC.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{TOPIC.title}">{TOPIC.title}</a>
```

Thay lại thành:

```html
            			<a href="{TOPIC.link}" {TOPIC.target_blank} <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{TOPIC.hometext_clean}" data-img="{TOPIC.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{TOPIC.title}"><h4>{TOPIC.title}</h4></a>
```

Tìm:

```html
        			<a href="{RELATED_NEW.link}" <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{RELATED_NEW.hometext_clean}" data-img="{RELATED_NEW.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED_NEW.title}">{RELATED_NEW.title}</a>
```

Thay lại thành:

```html
        			<a href="{RELATED_NEW.link}" {RELATED_NEW.target_blank} <!-- BEGIN: tooltip -->data-placement="{TOOLTIP_POSITION}" data-content="{RELATED_NEW.hometext_clean}" data-img="{RELATED_NEW.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED_NEW.title}"><h4>{RELATED_NEW.title}</h4></a>
```

Tìm:

```html
        			<a class="list-inline" href="{RELATED.link}"<!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{RELATED.hometext_clean}" data-img="{RELATED.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED.title}">{RELATED.title}</a>
```

Thay lại thành:

```html
        			<a href="{RELATED.link}" {RELATED.target_blank} <!-- BEGIN: tooltip --> data-placement="{TOOLTIP_POSITION}" data-content="{RELATED.hometext_clean}" data-img="{RELATED.imghome}" data-rel="tooltip"<!-- END: tooltip --> title="{RELATED.title}"><h4>{RELATED.title}</h4></a>
```

#### Cập nhật search.tpl

Mở themes/ten-giao-dien/modules/news/search.tpl:

Tìm:

```html
			<h3><a href="{LINK}">{TITLEROW}</a></h3>
```

Thay lại thành:

```html
			<h3><a href="{LINK}" title="{TITLEROW}" {TARGET_BLANK}>{TITLEROW}</a></h3>
```

#### Cập nhật sendmail.tpl

Mở themes/ten-giao-dien/modules/news/sendmail.tpl:

Tìm:

```html
					<!-- END: captcha -->
```

Thêm xuống dưới:

```html
                    
                    <!-- BEGIN: recaptcha -->
                    <div class="form-group">
                        <label for="semail" class="col-sm-4 control-label">{N_CAPTCHA}<em>*</em></label>
                        <div class="col-sm-20">
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

#### Cập nhật topic.tpl

Mở themes/ten-giao-dien/modules/news/topic.tpl:

Tìm:

```html
		<a href="{TOPIC.link}" title="{TOPIC.title}"><img alt="{TOPIC.alt}" src="{TOPIC.src}" width="{TOPIC.width}" class="img-thumbnail pull-left imghome" /></a>
		<!-- END: homethumb -->
		<h3><a href="{TOPIC.link}" title="{TOPIC.title}">{TOPIC.title}</a></h3>
```

Thay lại thành:

```html
		<a href="{TOPIC.link}" title="{TOPIC.title}" {TOPIC.target_blank}><img alt="{TOPIC.alt}" src="{TOPIC.src}" width="{TOPIC.width}" class="img-thumbnail pull-left imghome" /></a>
		<!-- END: homethumb -->
		<h3><a href="{TOPIC.link}" title="{TOPIC.title}" {TOPIC.target_blank}>{TOPIC.title}</a></h3>
```

Tìm:

```html
		<a title="{TOPIC_OTHER.title}" href="{TOPIC_OTHER.link}">{TOPIC_OTHER.title}</a>
```

Thay lại thành:

```html
		<a title="{TOPIC_OTHER.title}" href="{TOPIC_OTHER.link}" {TOPIC_OTHER.target_blank}>{TOPIC_OTHER.title}</a>
```

#### Cập nhật viewcat_grid.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_grid.tpl:

Tìm:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}"><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="150px" class="img-thumbnail pull-left imghome" /></a>
```

Thay lại thành

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="150px" class="img-thumbnail pull-left imghome" /></a>
```

Tìm:

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
		<a title="{CONTENT.title}" href="{CONTENT.link}"><img alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail"/></a>
```

Thay lại thành:

```html
		<a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}><img alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail"/></a>
```

Tìm:

```html
			<h4><a class="show" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a></h4>
```

Thay lại thành:

```html
			<h4><a class="show" href="{CONTENT.link}" {CONTENT.target_blank} <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a></h4>
```

#### Cập nhật viewcat_list.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_list.tpl:

Tìm:

```html
	<a class="show h4" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">
```

Thay lại thành:

```html
	<a class="show h4" href="{CONTENT.link}" {CONTENT.target_blank} <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">
```

#### Cập nhật viewcat_main_bottom.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_main_bottom.tpl:

Tìm:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}"><img alt="{HOMEIMGALT}" src="{HOMEIMG}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Thay lại thành:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img alt="{HOMEIMGALT}" src="{HOMEIMG}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Tìm:

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
					<a class="show h4" href="{OTHER.link}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

Thay lại thành:

```html
					<a class="show h4" href="{OTHER.link}" {OTHER.target_blank} <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

#### Cập nhật viewcat_main_left.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_main_left.tpl:

Tìm:

```html
							<a class="show h4" href="{OTHER.link}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

Thay lại thành:

```html
							<a class="show h4" href="{OTHER.link}" {OTHER.target_blank} <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{OTHER.title}">{OTHER.title}</a>
```

Tìm:

```html
					<a title="{CONTENT.title}" href="{CONTENT.link}"><img src="{HOMEIMG}" alt="{HOMEIMGALT}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Thay lại thành:

```html
					<a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}><img src="{HOMEIMG}" alt="{HOMEIMGALT}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Tìm:

```html
						<a title="{CONTENT.title}" href="{CONTENT.link}">{CONTENT.title}</a>
```

Thay lại thành:

```html
						<a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

#### Cập nhật viewcat_main_right.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_main_right.tpl:

Tìm:

```html
					<a title="{CONTENT.title}" href="{CONTENT.link}"><img src="{HOMEIMG}" alt="{HOMEIMGALT}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Thay lại thành:

```html
					<a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}><img src="{HOMEIMG}" alt="{HOMEIMGALT}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Tìm:

```html
						<a title="{CONTENT.title}" href="{CONTENT.link}">{CONTENT.title}</a>
```

Thay lại thành:

```html
						<a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
							<a class="show h4" href="{OTHER.link}" title="{OTHER.title}" <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip -->>{OTHER.title}</a>
```

Thay lại thành:

```html
							<a class="show h4" href="{OTHER.link}" title="{OTHER.title}" {OTHER.target_blank} <!-- BEGIN: tooltip -->data-content="{OTHER.hometext_clean}" data-img="{OTHER.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> >{OTHER.title}</a>
```

#### Cập nhật viewcat_page.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_page.tpl:

Tìm:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}"><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail pull-left imghome" /></a>
			<!-- END: image -->
			<h2>
				<a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail pull-left imghome" /></a>
			<!-- END: image -->
			<h2>
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}"><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail pull-left imghome" /></a>
			<!-- END: image -->
			<h3>
				<a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
			<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img  alt="{HOMEIMGALT1}" src="{HOMEIMG1}" width="{IMGWIDTH1}" class="img-thumbnail pull-left imghome" /></a>
			<!-- END: image -->
			<h3>
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
		<em class="fa fa-angle-right">&nbsp;</em><a href="{RELATED.link}" title="{RELATED.title}">{RELATED.title} <em>({RELATED.publtime}) </em></a>
```

Thay lại thành:

```html
		<em class="fa fa-angle-right">&nbsp;</em><a href="{RELATED.link}" title="{RELATED.title}" {EXTLINK}>{RELATED.title} <em>({RELATED.publtime}) </em></a>
```

#### Cập nhật viewcat_top.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_top.tpl:

Tìm:

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}"><img id="imghome" alt="{HOMEIMGALT0}" src="{HOMEIMG0}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
				<!-- END: image -->
				<h2>
					<a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
				<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img id="imghome" alt="{HOMEIMGALT0}" src="{HOMEIMG0}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
				<!-- END: image -->
				<h2>
					<a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
					<em class="fa fa-angle-right">&nbsp;</em><a title="{CONTENT.title}" href="{CONTENT.link}">{CONTENT.title}</a>
```

Thay lại thành:

```html
					<em class="fa fa-angle-right">&nbsp;</em><a title="{CONTENT.title}" href="{CONTENT.link}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

#### Cập nhật viewcat_two_column.tpl

Mở themes/ten-giao-dien/modules/news/viewcat_two_column.tpl:

Tìm:

```html
            <a href="{NEWSTOP.link}" title="{NEWSTOP.title}"><img alt="{HOMEIMGALT0}" src="{HOMEIMG0}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
            <!-- END: image -->
            <h3>
                <a href="{NEWSTOP.link}" title="{NEWSTOP.title}">{NEWSTOP.title}</a>
```

Thay lại thành:

```html
            <a href="{NEWSTOP.link}" title="{NEWSTOP.title}" {NEWSTOP.target_blank}><img alt="{HOMEIMGALT0}" src="{HOMEIMG0}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
            <!-- END: image -->
            <h3>
                <a href="{NEWSTOP.link}" title="{NEWSTOP.title}" {NEWSTOP.target_blank}>{NEWSTOP.title}</a>
```

Tìm:

```html
                <a class="show h4" href="{NEWSTOP.link}" <!-- BEGIN: tooltip -->data-content="{NEWSTOP.hometext_clean}" data-img="{NEWSTOP.imghome}" data-placement="{TOOLTIP_POSITION}" data-rel="tooltip"<!-- END: tooltip --> title="{NEWSTOP.title}">{NEWSTOP.title}</a>
```

Thay lại thành:

```html
                <a class="show h4" href="{NEWSTOP.link}" {NEWSTOP.target_blank} <!-- BEGIN: tooltip -->data-content="{NEWSTOP.hometext_clean}" data-img="{NEWSTOP.imghome}" data-placement="{TOOLTIP_POSITION}" data-rel="tooltip"<!-- END: tooltip --> title="{NEWSTOP.title}">{NEWSTOP.title}</a>
```

Tìm:

```html
                    <a href="{CONTENT.link}" title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
                    <a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title}</a>
```

Tìm:

```html
                <a href="{CONTENT.link}" title="{CONTENT.title}"><img alt="{HOMEIMGALT01}" src="{HOMEIMG01}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
```

Thay lại thành:

```html
                <a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}><img alt="{HOMEIMGALT01}" src="{HOMEIMG01}" width="{IMGWIDTH0}" class="img-thumbnail pull-left imghome" /></a>
```

Tìm:

```html
                        <a class="show h4" href="{CONTENT.link}" <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a>
```

Thay lại thành:

```html
                        <a class="show h4" href="{CONTENT.link}" {CONTENT.target_blank} <!-- BEGIN: tooltip -->data-content="{CONTENT.hometext_clean}" data-img="{CONTENT.imghome}" data-rel="tooltip" data-placement="{TOOLTIP_POSITION}"<!-- END: tooltip --> title="{CONTENT.title}">{CONTENT.title}</a>
```

### Cập nhật giao diện module seek

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/seek` thì thực hiện các bước dưới đây:

#### Cập nhật form.tpl

Mở themes/ten-giao-dien/modules/seek/form.tpl:

Tìm:

```html
        	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
```

Thay lại thành:

```html
        	<script src="//www.google.com/jsapi" type="text/javascript"></script>
```

Tìm:

```html
        	<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
```

Thay lại thành:

```html
        	<link rel="stylesheet" href="//www.google.com/cse/style/look/default.css" type="text/css" />
```

### Cập nhật giao diện module users

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/users` thì thực hiện các bước dưới đây:

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/js/users.js` thì đối chiếu với file `themes/default/js/users.js` để sửa đổi.

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/users/theme.php` thì đối chiếu với file `modules/users/theme.php` để sửa đổi.

#### Cập nhật avatar.tpl

Mở themes/ten-giao-dien/modules/users/avatar.tpl:

Tìm:

```html
<script src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery/jquery.Jcrop.min.js" type="text/javascript"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
```

Thay lại thành:

```html
<link  type="text/css"href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/cropper/cropper.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/cropper/cropper.min.js"></script>
```

Tìm:

```html
        <input type="hidden" id="x1" name="x1"/>
        <input type="hidden" id="y1" name="y1"/>
        <input type="hidden" id="x2" name="x2"/>
        <input type="hidden" id="y2" name="y2"/>
        <input type="hidden" id="w" name="w"/>
        <input type="hidden" id="h" name="h"/>
```

Thay lại thành:

```html
        <input type="hidden" id="crop_x" name="crop_x"/>
        <input type="hidden" id="crop_y" name="crop_y"/>
        <input type="hidden" id="crop_width" name="crop_width"/>
        <input type="hidden" id="crop_height" name="crop_height"/>
```

#### Cập nhật block.login.tpl

Mở themes/ten-giao-dien/modules/users/block.login.tpl:

```html
	<button type="button" class="login btn btn-success btn-sm" onclick="modalShowByObj('#guestLogin_{BLOCKID}')">
```

Thay lại thành

```html
	<button type="button" class="login btn btn-success btn-sm" onclick="modalShowByObj('#guestLogin_{BLOCKID}', 'recaptchareset')">
```

Tìm:

```html
	<button type="button" class="register btn btn-primary btn-sm" onclick="modalShowByObj('#guestReg_{BLOCKID}')">
```

Thay lại thành:

```html
	<button type="button" class="register btn btn-primary btn-sm" onclick="modalShowByObj('#guestReg_{BLOCKID}', 'recaptchareset')">
```

#### Cập nhật block.user_button.tpl

Mở themes/ten-giao-dien/modules/users/block.user_button.tpl:

Tìm:

```html
<span><a title="{GLANG.signin} - {GLANG.register}" class="pa pointer button" data-toggle="tip" data-target="#guestBlock_{BLOCKID}" data-click="y"><em class="fa fa-user fa-lg"></em><span class="hidden">{GLANG.signin}</span></a></span>
```

Thay lại thành:

```html
<span><a title="{GLANG.signin} - {GLANG.register}" class="pa pointer button" data-toggle="tip" data-target="#guestBlock_{BLOCKID}" data-click="y" data-callback="recaptchareset"><em class="fa fa-user fa-lg"></em><span class="hidden">{GLANG.signin}</span></a></span>
```

#### Cập nhật confirm.tpl

Mở themes/ten-giao-dien/modules/users/confirm.tpl:

Tìm:

```html
				<!-- END: captcha -->
```

Thêm xuống dưới:

```html
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

#### Cập nhật login_form.tpl

Mở themes/ten-giao-dien/modules/users/login_form.tpl:

Tìm:

```html
        <!-- END: captcha -->
        
```

Thêm xuống dưới:

```html
        <!-- BEGIN: recaptcha -->
        <div class="form-group loginCaptcha">
            <div class="middle text-center clearfix">
                <!-- BEGIN: default --><div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div></div><!-- END: default -->
                <!-- BEGIN: compact --><div class="nv-recaptcha-compact"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div></div><!-- END: compact -->
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    <!-- BEGIN: smallbtn -->size: "compact",<!-- END: smallbtn -->
                    btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent()),
                    pnum: 4,
                    btnselector: '[type="submit"]'
                })
                </script>
            </div>
        </div>
        <!-- END: recaptcha -->
        
```

#### Cập nhật lostactivelink.tpl

Mở themes/ten-giao-dien/modules/users/lostactivelink.tpl:

Tìm:

```html
                <div class="form-group">
                    <div class="middle text-right clearfix">
                        <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" /><em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.bsec');"></em><input type="text" style="width:100px;" class="bsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
                    </div>
                </div>
```

Thêm lên trên:

```html
                <!-- BEGIN: captcha -->
```

Thêm xuống dưới:

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

#### Cập nhật lostpass_form.tpl

Mở themes/ten-giao-dien/modules/users/lostpass_form.tpl:

Tìm:

```html
            <div class="form-group">
                <div class="middle text-right clearfix">
                    <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" /><em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.bsec');"></em><input type="text" style="width:100px;" class="bsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
                </div>
            </div>
```

Thêm lên trên:

```html
            <!-- BEGIN: captcha -->
```

Thêm xuống dưới

```html
            <!-- END: captcha -->
            
            <!-- BEGIN: recaptcha -->
            <div class="form-group">
                <div class="middle text-right clearfix">
                    <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}"></div></div>
                    <script type="text/javascript">
                    nv_recaptcha_elements.push({
                        id: "{RECAPTCHA_ELEMENT}",
                        btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent().parent())
                    })
                    </script>
                </div>
            </div>
            <!-- END: recaptcha -->
```

#### Cập nhật openid_login.tpl

Mở themes/ten-giao-dien/modules/users/openid_login.tpl:

Tìm:

```html
				<!-- END: captcha -->
```

Thêm xuống dưới:

```html
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

#### Cập nhật register_form.tpl

Mở themes/ten-giao-dien/modules/users/register_form.tpl:

Tìm:

```html
    	<!-- BEGIN: agreecheck -->
        <div>
            <div>
                <div class="form-group text-center check-box required" data-mess="">
                    <input type="checkbox" name="agreecheck" value="1" class="fix-box" onclick="validErrorHidden(this,3);"/>{LANG.accept2} <a onclick="usageTermsShow('{LANG.usage_terms}');" href="javascript:void(0);"><span class="btn btn-default btn-xs">{LANG.usage_terms}</span></a>
                </div>
            </div>
        </div>
        <!-- END: agreecheck -->
```

Di chuyển lên trên thành phần:

```html
    	<!-- BEGIN:reg_captcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" />
				<em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.rsec');"></em>
				<input type="text" style="width:100px;" class="rsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
            </div>
        </div>
    	<!-- END: reg_captcha -->
```

Tìm:

```html
    	<!-- END: reg_captcha -->
```

Thêm xuống dưới:

```html
        <!-- BEGIN: reg_recaptcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha"></div></div>
                <script type="text/javascript">
                nv_recaptcha_elements.push({
                    id: "{RECAPTCHA_ELEMENT}",
                    btn: $('[type="submit"]', $('#{RECAPTCHA_ELEMENT}').parent().parent().parent().parent()),
                    pnum: 4,
                    btnselector: '[type="submit"]'
                })
                </script>
            </div>
        </div>
        <!-- END: reg_recaptcha -->
```
