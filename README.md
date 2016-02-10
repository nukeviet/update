# Hướng dẫn Nâng cấp từ NukeViet 4.0.24, 4.0.25 lên NukeViet 4 RC2

Download gói nâng cấp tại: https://github.com/nukeviet/update/archive/to-4.0.26.zip

Giải nén và Upload các file trong gói nâng cấp với cấu trúc của NukeViet, sau đó vào admin để tiến hành nâng cấp.

## Sau khi nâng cấp xong, 

Xóa cache của hệ thống. và sửa thêm như sau: Kiểm tra lại nhóm thành viên, hiện tại đã bổ sung thêm các loai nhóm thành viên cần trưởng nhóm xác nhận.

# Với các giao diện không phải là giao diện mặc định, cần sửa thêm như sau:
### Module contact: Sửa lỗi hiển thị thông tin người gửi
Mở **themes/ten-theme/modules/contact/sendcontact.tpl**

Tìm
```html
<ul>
<li>{LANG.fullname}: {FULLNAME}</li>
<li>{LANG.email}: {EMAIL}</li>
<!-- BEGIN: phone -->
<li>{LANG.phone}: {PHONE}</li>
<!-- END: phone -->
<li>IP: {IP}</li>
<!-- BEGIN: cat -->
<li>{LANG.cat}: {CAT}</li>
<!-- END: cat -->
<!-- BEGIN: part -->
<li>{LANG.part}: {PART}</li>
<!-- END: part -->
</ul>
```

Thay bằng
```html
<ul>
    <!-- BEGIN: cat -->
    <li>{LANG.cat}: {CAT}</li>
    <!-- END: cat -->
    <li>{LANG.part}: {PART}</li>
    <li>{LANG.fullname}: {FULLNAME}</li>
    <li>{LANG.email}: {EMAIL}</li>
    <!-- BEGIN: phone -->
    <li>{LANG.phone}: {PHONE}</li>
    <!-- END: phone -->
    <li>IP: {IP}</li>
</ul>
<a href="{URL_VIEW}" title="" target="_blank">{LANG.view_website}</a>
```

### Module contact: Thêm tùy chọn gửi bản sao vào mail người gửi
Mở **themes/ten-theme/modules/contact/form.tpl**

Tìm
```html
		<div class="form-group">
            <div>
    			<textarea cols="8" name="fcon" class="form-control required" maxlength="1000" placeholder="{LANG.content}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_content}"></textarea>
            </div>
		</div>
```
Thêm xuống dưới
```html
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
```

Mở **themes/ten-theme/modules/contact/sendcontact.tpl**

Tìm
```
{CONTENT}<br /><br />
```
Thêm xuống dưới
```
<!-- BEGIN: sendinfo -->
```
Tìm
```
<!-- END: main -->
```
Thêm lên trên
```
<!-- END: sendinfo -->
```

Nếu tồn tại **themes/ten-theme/modules/contact/theme.php**
Thêm xuống cuối file
```
function contact_sendcontact($row_id, $fcat, $ftitle, $fname, $femail, $fphone, $fcon, $fpart, $sendinfo = true)
{
    global $global_config, $module_name, $module_file, $lang_global, $lang_module, $module_info, $array_department, $client_info;

    $xtpl = new XTemplate('sendcontact.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('SITE_NAME', $global_config['site_name']);
    $xtpl->assign('SITE_URL', $global_config['site_url']);
    $xtpl->assign('FULLNAME', $fname);
    $xtpl->assign('EMAIL', $femail);
	$xtpl->assign('PART', $array_department[$fpart]['full_name']);
    $xtpl->assign('IP', $client_info['ip']);
    $xtpl->assign('TITLE', $ftitle);
    $xtpl->assign('CONTENT', nv_htmlspecialchars($fcon));
    $xtpl->assign('URL_VIEW', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=view&amp;id=' . $row_id);

	if ($sendinfo) {
		if (!empty($fcat)) {
			$xtpl->assign('CAT', $fcat);
			$xtpl->parse('main.sendinfo.cat');
		}

		if (!empty($fphone)) {
			$xtpl->assign('PHONE', $fphone);
			$xtpl->parse('main.sendinfo.phone');
		}
		$xtpl->parse('main.sendinfo');
	}

    $xtpl->parse('main');
    return $xtpl->text('main');
}
```

### Cập nhật danh sách nhóm thành viên
Mở **theme/ten-theme/modules/users/info.tpl**

Tìm
```
{GROUP_LIST.title}
```
Thêm sau
```
<em class="show text-success">{GROUP_LIST.group_type}</em>
```
Tìm
```
<td class="text-uppercase text-center">{LANG.group_userr}</td>
```
Thêm dưới
```
<td class="text-uppercase"></td>
```
Tìm
```
<td class="text-right">{GROUP_LIST.numbers}</td>
```
Thêm dưới
```
<td class="text-center">{GROUP_LIST.status}</td>
```

Nếu tồn tại **theme/ten-theme/modules/users/theme.php**

Trong hàm **user_info**

Tìm
```
foreach ($groups as $group) {
```
Thêm dưới
```
$group['status'] = $lang_module['group_status_' . $group['status']];
$group['group_type'] = $lang_module['group_type_' . $group['group_type']];
```
