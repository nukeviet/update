> Chú ý: Hướng dẫn nâng cấp này chỉ áp dụng đối với các site đang sử dụng bản [NukeViet 4.0.10](https://github.com/nukeviet/nukeviet/releases/tag/4.0.10) và chỉ nâng cấp hệ thống cùng với các module hệ thống.

# Bước 1

Backup toàn bộ site và CSDL.

Đăng nhập admin, vào cấu hình => cấu hình chung, tại chỗ kích hoạt chức năng tối ưu site chọn "không kích hoạt".

# Bước 2
Kiểm tra thư mục install trên website có tồn tại không, nếu không tồn tại, upload lại thư mục này từ bản cài đặt NukeViet 4.0.13.

# Bước 3
Download file thư mục install về giải nén và upload các thư mục giải nén được lên website.

# Bước 4
Đăng nhập admin, nhận được thông báo nâng cấp, nhấp vào link nâng cấp và thực hiện tiếp tục các công việc tại trang nâng cấp.

# Bước 5

Sửa dòng $fixthemes = 'default10'; ứng với theme của bạn để chương trình fix tự động các thay đổi giao diện

Upload file toolfix_change.php

Chạy file http://domain.my/toolfix_change.php

# Bước 6
Kiểm tra và chỉnh sửa giao diện:
Copy lại hai file sau trong giao diện mặc định chuyển sang giao diện của bạn

themes/default/modules/users/info.tpl

themes/default/modules/users/register.tpl

# Bước 7

Thay lại đoạn code Breadcrumbs trong file /install/update/themes/default/theme.php thành đoạn code như sau
```
		// Breadcrumbs
		if( $home != 1 )
		{
			if( $global_config['rewrite_op_mod'] != $module_name )
			{
				$arr_cat_title_i = array(
					'catid' => 0,
					'title' => $module_info['custom_title'],
					'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name
				);
				array_unshift( $array_mod_title, $arr_cat_title_i );
			}
			if( ! empty( $array_mod_title ) )
			{
				foreach( $array_mod_title as $arr_cat_title_i )
				{
					$xtpl->assign( 'BREADCRUMBS', $arr_cat_title_i );
					$xtpl->parse( 'main.breadcrumbs.loop' );
				}
				$xtpl->parse( 'main.breadcrumbs' );
			}
		}
```

Kiểm tra và ửa lại giao diện cho tương thích.

Các lỗi trong quá trình nâng cấp vui lòng thảo luận tại diễn đàn NukeViet: http://forum.nukeviet.vn/viewtopic.php?f=171&t=35166
