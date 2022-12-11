# Hướng dẫn cập nhật từ NukeViet 4.5.00, 4.5.01, 4.5.02 lên NukeViet 4.5.03

- Nếu phiên bản NukeViet của bạn nhỏ hơn 4.5.00 bạn cần tìm hướng dẫn cập nhật lên tối thiểu phiên bản 4.5.00 trước khi tiến hành các bước tiếp theo.
- Bạn nên cập nhật thử nghiệm trên máy tính cá nhân và kiểm tra kỹ trước khi cập nhật trên website.

## Cập nhật hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau cập nhật tiến hành cấu hình trở lại.
- Nếu bạn có cấu hình FTP trong quản trị, vui lòng kiểm tra lại các thông số cho đúng hoặc xóa cấu hình. Nếu cấu hình sai sẽ dẫn tới cập nhật thất bại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau cập nhật, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
 - Thực hiện dọn dẹp hệ thống để xóa các cache, file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Làm sạch cache** và **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
 - Thực hiện cập nhật bằng một trong các cách bên dưới.
 - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Kho code cập nhật NukeViet 4.5](https://github.com/nukeviet/update/issues).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

Nếu trong quá trình cập nhật bị đẩy ra, bạn đăng nhập lại quản trị để làm theo hướng dẫn (Hệ thống báo Xóa gói cập nhật do không tương thích, Bạn hãy xóa để tiếp tục vânh hành site)

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.5.03/update-to-4.5.03.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Cấu hình lại site.

- Nếu site có sử dụng các thư viện bên ngoài như `phpoffice/phpspreadsheet` thông qua composer, bạn cần khai báo để composer cập nhật lại
- Nếu sử dụng module tin tức hoặc các module ảo của nó, có thể vào cấu hình để bật chức năng lưu lịch sử bài viết nếu có nhu cầu. Bạn cũng có thể sử dụng thêm tính năng thêm audio đọc báo ở module news

### Bước 4: Cập nhật giao diện

Nếu bạn có sử dụng giao diện không phải mặc định, đọc các lưu ý và làm theo hướng dẫn sau:

[Hướng dẫn nâng cấp giao diện tương thích từ NukeViet 4.5.00 lên các phiên bản 4.5 cao hơn](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-giao-di%E1%BB%87n-t%C6%B0%C6%A1ng-th%C3%ADch-t%E1%BB%AB-NukeViet-4.5.00-l%C3%AAn-c%C3%A1c-phi%C3%AAn-b%E1%BA%A3n-4.5-cao-h%C6%A1n)

> Lưu ý: Bước này không bắt buộc, nếu có thể bạn nên làm. Nếu không bạn cũng có thể bỏ qua

### Bước 5: Cập nhật module

**Nếu site của bạn sử dụng module không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau:**

[Hướng dẫn nâng cấp module từ NukeViet 4.5.00 lên các bản 4.5 cao hơn](https://github.com/nukeviet/update/wiki/H%C6%B0%E1%BB%9Bng-d%E1%BA%ABn-n%C3%A2ng-c%E1%BA%A5p-module-t%E1%BB%AB-NukeViet-4.5.00-l%C3%AAn-c%C3%A1c-b%E1%BA%A3n-4.5-cao-h%C6%A1n)

> Lưu ý: Bước này không bắt buộc, nếu có thể bạn nên làm. Nếu không bạn cũng có thể bỏ qua
