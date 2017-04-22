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
