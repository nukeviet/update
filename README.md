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