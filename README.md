# Hướng dẫn cập nhật từ NukeViet 4 Official (4.0.29) lên NukeViet 4.1 Beta (4.0.00)

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.0.29 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.0.29 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:
Chú ý: cần thực hiện việc backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.

### Bước 1: Chuẩn bị trước khi cập nhật:

Mở `config.php` (file này có thể khác tùy theo thiết lập của quản lý site), thêm sau dòng `$global_config['cached'] = 'files';`:

```php
$global_config['session_handler'] = 'files';
```

### Bước 1: Thực hiện cập nhật:

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.1.00/update-to-4.1.00.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 2: Xử lý sau cập nhật:

Sau khi cập nhật xong, cần làm các thao tác:
- Nếu site đang ở bản RC2 có kích hoạt block global.login.php cần xóa block và thêm lại.
- Nếu site sử dụng giao diện không phải mặc định, cần cập nhật giao diện theo hướng dẫn bên dưới.

## Hướng dẫn cập nhật các giao diện không phải là giao diện mặc định:

Các giao diện khác giao diện mặc định đã được làm cho NukeViet 4.0 Official cần sửa thêm như sau để có thể sử dụng cho NukeViet 4.1 Beta:
