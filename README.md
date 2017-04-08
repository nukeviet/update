# Hướng dẫn cập nhật từ NukeViet 4.1 Beta 1 (4.1.00) lên NukeViet 4.1 Beta 2 (4.1.01)

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.1.00 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.1.00 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:
Chú ý: cần thực hiện việc backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.

### Bước 1: Thực hiện cập nhật:

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.1.01/update-to-4.1.01.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 2: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần chú ý:
- ...
- Kiểm tra lại tương thích của các module không phải mặc định của hệ thống.
- Nếu site sử dụng giao diện không phải mặc định, cần cập nhật giao diện theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.1.00 cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.1 Beta 2:

### Cập nhật giao diện module banners

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/banners` thì thực hiện các bước dưới đây:

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

### Cập nhật giao diện module news

Nếu giao diện của bạn có tồn tại `themes/ten-giao-dien/modules/news` thì thực hiện các bước dưới đây:

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

### Cập nhật giao diện module seek

### Cập nhật giao diện module users

### Cập nhật giao diện module voting
