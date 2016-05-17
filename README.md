# Hướng dẫn cập nhật từ NukeViet 4 RC2 (4.0.27), NukeViet 4 RC3 (4.0.28) lên NukeViet 4 Official (4.0.29)

## Nâng cấp hệ thống:
### Bước 1: Thực hiện cập nhật:
Download gói cập nhật tại: https://github.com/nukeviet/update/archive/to-4.0.29.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

Chú ý: cần thực hiện việc backup CSDL và các file thay đổi theo yêu cầu tại trang nâng cấp, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.

### Bước 2: Xử lý sau cập nhật:
Sau khi cập nhật xong, cần làm các thao tác:
- Nếu site đang ở bản RC2 có kích hoạt block global.login.php cần xóa block và thêm lại.
- Nếu site sử dụng giao diện không phải mặc định, cần cập nhật giao diện theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:
Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.0 RC2 hoặc NukeViet 4.0 RC3 cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.0 Official:

Nếu giao diện hiện tại đang sử dụng cho NukeViet 4.0 RC2 cần:

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

Tiếp tục với hướng dẫn bên dưới đây.

Nếu giao diện hiện tại đang sử dụng cho NukeViet 4.0 RC3 cần:

### Cập nhật giao diện chính
Mở themes/ten-theme/theme.php tìm

```php
// Change theme types
$mobile_theme = empty($module_info['mobile']) ? $global_config['mobile_theme'] : $module_info['mobile'];
```

Nếu có thay bằng

```php
// Change theme types
$mobile_theme = empty($module_info['mobile']) ? $global_config['mobile_theme'] : (($module_info['mobile'] != ':pcmod' and $module_info['mobile'] != ':pcsite') ? $module_info['mobile'] : '');
```

### Cập nhật giao diện module news

Sửa file /themes/ten-theme/modules/news/detail.tpl
Tìm đến dòng

```html
{DETAIL.bodytext}
```
Thay bằng

```html
{DETAIL.bodyhtml}
```

### Cập nhật giao diện module users
Nếu giao diện của bạn có themes/ten-theme/modules/users/register_form.tpl mở register_form.tpl tìm

```html
        <div>
            <div>
                <div class="form-group text-center check-box required" data-mess="">
                    <input type="checkbox" name="agreecheck" value="1" class="fix-box" onclick="validErrorHidden(this,3);"/>{LANG.accept2} <a onclick="usageTermsShow('{LANG.usage_terms}');" href="javascript:void(0);"><span class="btn btn-default btn-xs">{LANG.usage_terms}</span></a>
                </div>
            </div>
        </div>
```

Thêm lên trên 

```html
    	<!-- BEGIN: agreecheck -->
```

Thêm xuống dưới

```html
        <!-- END: agreecheck -->
```

Mở themes/ten-theme/modules/users/info.tpl nếu có 

Tìm

```html
<li class="{AVATAR_ACTIVE}"><a data-toggle="tab" href="#edit_avatar" data-location="{EDITINFO_FORM}/avatar">{LANG.edit_avatar}</a></li>
```

Thêm ra trước

```html
<!-- BEGIN: edit_avatar -->
```

Thêm vào sau

```html
<!-- END: edit_avatar -->
```

Tìm 

```html
        <li class="{PASSWORD_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/password" href="#edit_password">{LANG.edit_password}</a></li>
        <li class="{QUESTION_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/question" href="#edit_question">{LANG.edit_question}</a></li>
```

Sửa thành

```html
        <!-- BEGIN: edit_password --><li class="{PASSWORD_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/password" href="#edit_password">{LANG.edit_password}</a></li><!-- END: edit_password -->
        <!-- BEGIN: edit_question --><li class="{QUESTION_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/question" href="#edit_question">{LANG.edit_question}</a></li><!-- END: edit_question -->
```

Tìm

```html
        <li class="{SAFEMODE_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/safemode" href="#edit_safemode">{LANG.safe_mode}</a></li>
```

Sửa thành

```html
        <!-- BEGIN: edit_safemode --><li class="{SAFEMODE_ACTIVE}"><a data-toggle="tab" data-location="{EDITINFO_FORM}/safemode" href="#edit_safemode">{LANG.safe_mode}</a></li><!-- END: edit_safemode -->
```

Nếu có file themes/ten-theme/modules/users/groups.tpl cần kiểm tra thay thế lại do có rất nhiều thay đổi

Nếu giao diện của bạn có file themes/ten-theme/modules/users/theme.php, mở

Tìm

```php
function user_register($gfx_chk, $checkss, $data_questions, $array_field_config, $custom_fields)
```

Sửa lại thành

```
function user_register($gfx_chk, $checkss, $data_questions, $array_field_config, $custom_fields, $group_id)
```

Tìm

```php
    $username_rule = empty($global_config['nv_unick_type']) ? sprintf($lang_global['username_rule_nolimit'], NV_UNICKMIN, NV_UNICKMAX) : sprintf($lang_global['username_rule_limit'], $lang_global['unick_type_' . $global_config['nv_unick_type']], NV_UNICKMIN, NV_UNICKMAX);
    $password_rule = empty($global_config['nv_upass_type']) ? sprintf($lang_global['password_rule_nolimit'], NV_UPASSMIN, NV_UPASSMAX) : sprintf($lang_global['password_rule_limit'], $lang_global['upass_type_' . $global_config['nv_upass_type']], NV_UPASSMIN, NV_UPASSMAX);
```

Thêm lên trên

```php
	if ($group_id != 0) {
		$xtpl->assign('USER_REGISTER', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=register/' . $group_id);
	}
	
```

Tìm

```php
    if ($global_config['allowuserreg'] == 2) {
        $xtpl->assign('LOSTACTIVELINK_SRC', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=lostactivelink');
        $xtpl->parse('main.lostactivelink');
    }
```

Thêm xuống dưới

```php
	
	if (defined('NV_IS_USER') and !defined('ACCESS_ADDUS')) {
	    $xtpl->parse('main.agreecheck');
	}
```

Tìm

```php
    $xtpl->assign('EDITINFO_FORM', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=editinfo');
```

Thay lại thành

```php
    if (defined('ACCESS_EDITUS')) {
    	$xtpl->assign('EDITINFO_FORM', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=editinfo/' . $data['group_id'] . '/' . $data['userid']);
    }
	else {
		$xtpl->assign('EDITINFO_FORM', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=editinfo');
	}
	
```

Tìm

```php
    if ($pass_empty) {
        $xtpl->assign('FORM_HIDDEN', ' hidden');
        $xtpl->parse('main.question_empty_pass');
        $xtpl->parse('main.safemode_empty_pass');
    } else {
        $xtpl->parse('main.is_old_pass');
    }
```

Thay lại thành

```php
	if ($pass_empty) {
        $xtpl->assign('FORM_HIDDEN', ' hidden');
    }
```

Tìm

```php
    if (in_array('email', $types)) {
        if ($pass_empty) {
            $xtpl->parse('main.tab_edit_email.email_empty_pass');
        }
```

Thêm lên trên

```php
	if (in_array('password', $types)) {
        if (! $pass_empty and ! defined('ACCESS_PASSUS')) {
           $xtpl->parse('main.tab_edit_password.is_old_pass');
        }
        $xtpl->parse('main.edit_password');
        $xtpl->parse('main.tab_edit_password');
    }
```

Tìm

```php
        $xtpl->parse('main.edit_others');
        $xtpl->parse('main.tab_edit_others');
    }
```

Thêm xuống dưới

```php

	if (in_array('avatar', $types)) {
		$xtpl->parse('main.edit_avatar');
        $xtpl->parse('main.tab_edit_avatar');
	}

	if (in_array('question', $types)) {
		if ($pass_empty) {
	        $xtpl->parse('main.question_empty_pass');
        }
		
		$xtpl->parse('main.edit_question');
        $xtpl->parse('main.tab_edit_question');
	}
	
	if (in_array('avatar', $types)) {
		$xtpl->parse('main.edit_avatar');
        $xtpl->parse('main.tab_edit_avatar');
	}
	
	if (in_array('safemode', $types)) {
		if ($pass_empty) {
			$xtpl->parse('main.safemode_empty_pass');
        }
		$xtpl->parse('main.edit_safemode');
        $xtpl->parse('main.tab_edit_safemode');
	}
```
