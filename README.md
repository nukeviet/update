# Hướng dẫn cập nhật từ NukeViet 4 RC2 (4.0.27) lên NukeViet 4 RC3 (4.0.28)

## Nâng cấp hệ thống:
### Bước 1: Thực hiện cập nhật:
Download gói cập nhật tại: https://github.com/nukeviet/update/archive/to-4.0.28.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 2: Xử lý sau cập nhật:
Sau khi cập nhật xong, cần làm các thao tác:
- Xóa cache của hệ thống. 
- Nếu có kích hoạt block global.login.php cần xóa block và thêm lại.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:
Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.0 RC2 cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.0 RC3:

### Cập nhật giao diện module contact
Nếu giao diện của bạn có thư mục themes/ten-theme/modules/contact. Mở themes/ten-theme/modules/contact/sendcontact.tpl
Xóa 

```html
<a href="{URL_VIEW}" title="" target="_blank">{LANG.view_website}</a>
```

### Cập nhật giao diện module news
Nếu giao diện của bạn có thư mục themes/ten-theme/modules/news thì trong thư mục đó
Mở content.tpl
Tìm
```html
<em class="fa fa-refresh pull-right" style="cursor: pointer; vertical-align: middle; margin: 9px 0 0 4px" onclick="get_alias();" alt="Click">&nbsp;</em>
```
Trong đó thay `get_alias();` thành `get_alias('{OP}');`

Mở viewcat_main_bottom.tpl
Tìm 

```html
<div class="panel-body">
	<!-- BEGIN: image -->
	<a href="{CONTENT.link}" title="{CONTENT.title}"><img alt="{HOMEIMGALT}" src="{HOMEIMG}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
	<!-- END: image -->
```

Thêm lên trên

```html
<!-- BEGIN: block_topcat -->
<div class="block-top clear">
	{BLOCK_TOPCAT}
</div>
<!-- END: block_topcat -->
```

Tìm đến đoạn
```html
</div>
<!-- END: listcat -->
<!-- END: main -->
```

Thêm lên trên đoạn sau:
```html
	<!-- BEGIN: block_bottomcat -->
	<div class="bottom-cat clear">
		{BLOCK_BOTTOMCAT}
	</div>
	<!-- END: block_bottomcat -->
```


Mở viewcat_main_left.tpl

Tìm 
```html
<div class="panel-body">
	<div class="row">
		<!-- BEGIN: related -->
		<div class="col-md-8">
```

Thêm lên trên

```html
<!-- BEGIN: block_topcat -->
<div class="block-top clear">
	{BLOCK_TOPCAT}
</div>
<!-- END: block_topcat -->
```

Tìm đến đoạn
```html
</div>
<!-- END: listcat -->
<!-- END: main -->
```

Thêm lên trên đoạn sau:
```html
	<!-- BEGIN: block_bottomcat -->
	<div class="bottom-cat clear">
		{BLOCK_BOTTOMCAT}
	</div>
	<!-- END: block_bottomcat -->
```


Mở viewcat_main_right.tpl

Tìm 

```html
<div class="panel-body">
	<div class="row">
		<div class="{WCT}">
			<!-- BEGIN: image -->
			<a title="{CONTENT.title}" href="{CONTENT.link}"><img src="{HOMEIMG}" alt="{HOMEIMGALT}" width="{IMGWIDTH}" class="img-thumbnail pull-left imghome" /></a>
```

Thêm lên trên

```html
<!-- BEGIN: block_topcat -->
<div class="block-top clear">
	{BLOCK_TOPCAT}
</div>
<!-- END: block_topcat -->
```
Tìm đến đoạn
```html
</div>
<!-- END: listcat -->
<!-- END: main -->
```

Thêm lên trên đoạn sau:
```html
	<!-- BEGIN: block_bottomcat -->
	<div class="bottom-cat clear">
		{BLOCK_BOTTOMCAT}
	</div>
	<!-- END: block_bottomcat -->
```
### Cập nhật giao diện module users
Nếu giao diện của bạn có thư mục themes/ten-theme/modules/users cần đối chiếu block block.login.tpl để cập nhật vì block này có nhiều thay đổi lớn
Mở themes/ten-theme/modules/users/login_form.tpl 

Tìm

```html
<!-- BEGIN: openid -->
```

Thêm lên trên

```html
<!-- BEGIN: allowuserreg2_form -->
<div class="form-group">
    <div class="text-right clearfix">
        <a href="#" onclick="modalShowByObj('#guestReg_{BLOCKID}')">{GLANG.register}</a>
    </div>
</div>
<!-- END: allowuserreg2_form -->

<!-- BEGIN: allowuserreg_linkform -->
<div class="form-group">
    <div class="text-right clearfix">
        <a href="{USER_REGISTER}">{GLANG.register}</a>
    </div>
</div>
<!-- END: allowuserreg_linkform -->
``` 

Mở themes/ten-theme/modules/users/register_form.tpl

Tìm 

```html
<input type="text" class="required form-control" placeholder="{LANG.account}" value="" name="username" maxlength="{NICK_MAXLENGTH}" data-pattern="/^(.){{NICK_MINLENGTH},{NICK_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.username_empty}">
```

Trong đó thay `data-mess="{GLANG.username_empty}"` thành `data-mess="{USERNAME_RULE}"`

Tìm 

```html
<input type="password" class="password required form-control" placeholder="{LANG.password}" value="" name="password" maxlength="{PASS_MAXLENGTH}" data-pattern="/^(.){{PASS_MINLENGTH},{PASS_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.password_empty}">
```

Trong đó thay `data-mess="{GLANG.password_empty}"` thành `data-mess="{PASSWORD_RULE}"`
