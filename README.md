# Hướng dẫn cập nhật từ NukeViet 4.4.02, 4.4.03, 4.4.04, 4.5.00 lên NukeViet 4.5.01

- Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.4.02 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.4.02 trước khi tiến hành các bước tiếp theo.
- Bạn cầm kiểm tra các module và giao diện của site xem đã có bản nâng cấp cho bản NukeViet 4.5
- Bạn nên nâng cấp thử nghiệm trên máy tính cá nhân và kiểm tra kỹ trước khi nâng cấp trên website.

## Nâng cấp hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau nâng cấp tiến hành cấu hình trở lại.
- Nếu bạn có cấu hình FTP trong quản trị, vui lòng kiểm tra lại các thông số cho đúng hoặc xóa cấu hình. Nếu cấu hình sai sẽ dẫn tới cập nhật thất bại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau nâng cấp, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
 - Thực hiện dọn dẹp hệ thống để xóa các cache, file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Làm sạch cache** và **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
 - Thực hiện cập nhật bằng một trong các cách bên dưới.
 - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Kho code nâng cấp NukeViet 4.5](https://github.com/nukeviet/update/issues).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

Nếu trong quá trình cập nhật bị đẩy ra, bạn đăng nhập lại quản trị để làm theo hướng dẫn (Hệ thống báo Xóa gói cập nhật do không tương thích, Bạn hãy xóa để tiếp tục vânh hành site)

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.5.01/update-to-4.5.01.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Cấu hình lại site.

- Nếu site có sử dụng các thư viện bên ngoài như `phpoffice/phpspreadsheet` thông qua composer, bạn cần khai báo để composer cập nhật lại
- Truy cập phần Cấu hình => Thiết lập an ninh để thiết lập chức năng **Cross-Site** và **Giới hạn tên miền** theo nhu cầu.
- Truy cập phần Cấu hình => Quản lý Modules click vào tên module News và tất các module ảo của nó để hệ thống nhận diện chức năng mới. Nếu có nhiều ngôn ngữ cần xử lý lần lượt các ngôn ngữ. Ví dụ admin/index.php?language=vi&nv=modules&op=show&mod=news
- Truy cập phần Cấu hình => Quản lý Modules click vào tên module Users và tất các module ảo của nó để hệ thống nhận diện chức năng mới. Nếu có nhiều ngôn ngữ cần xử lý lần lượt các ngôn ngữ. Ví dụ admin/index.php?language=vi&nv=modules&op=show&mod=users

### Bước 4: Điều chỉnh giao diện

1. Nếu bạn có sử dụng giao diện không phải mặc định, chưa cập nhật lên 4.5.00 thì cập nhật theo hướng dẫn này [Hướng dẫn nâng cấp giao diện từ NukeViet 4.4.02 lên NukeViet 4.5.00](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-giao-di%E1%BB%87n-t%E1%BB%AB-NukeViet-4.4.02-l%C3%AAn-NukeViet-4.5.00). Nếu dùng giao diện mặc định hoặc đã cập nhật lên 4.5.00 trước đó thì bỏ qua bước 4.1 này.
2. Nếu bạn có sử dụng giao diện không phải mặc định, chưa cập nhật lên 4.5.01 thì cập nhật theo hướng dẫn này [Hướng dẫn nâng cấp giao diện tương thích từ NukeViet 4.5.00 lên NukeViet 4.5.01](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-giao-di%E1%BB%87n-t%C6%B0%C6%A1ng-th%C3%ADch-t%E1%BB%AB-NukeViet-4.5.00-l%C3%AAn-NukeViet-4.5.01). Chú ý: Bước này cần thiết đối với giao diện của bạn có sử dụng block global.QR_code.php, trường hợp không sử dụng nó hoặc không có nó thì không cần thực hiện bước này.

**Nếu site của bạn sử dụng giao diện không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau:**

[Hướng dẫn nâng cấp giao diện từ NukeViet 4.4.02 lên NukeViet 4.5.00](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-giao-di%E1%BB%87n-t%E1%BB%AB-NukeViet-4.4.02-l%C3%AAn-NukeViet-4.5.00)

### Bước 5: Hướng dẫn nâng cấp module từ NukeViet 4.4.02 lên NukeViet 4.5.00

> Nếu bạn đã nâng cấp các module cài bên ngoài lên NukeViet 4.5.00 bỏ qua bước này.

**Nếu site của bạn sử dụng module không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau:**

[Hướng dẫn nâng cấp module từ NukeViet 4.4.02 lên NukeViet 4.5.00](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-module-t%E1%BB%AB-NukeViet-4.4.02-l%C3%AAn-NukeViet-4.5.00)
