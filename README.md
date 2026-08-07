# Hướng dẫn cập nhật từ NukeViet 4.6.00 lên NukeViet 4.6.01

- Nếu phiên bản NukeViet của bạn nhỏ hơn 4.6.00 bạn cần tìm [hướng dẫn cập nhật](https://github.com/nukeviet/update/branches/all) lên tối thiểu phiên bản 4.6.00 trước khi tiến hành các bước tiếp theo.
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
 - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Kho code cập nhật NukeViet](https://github.com/nukeviet/update/issues).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.6.01/update-to-4.6.01.zip
Giải nén và upload các tệp tin/thư mục trong gói cập nhật đúng cấu trúc của NukeViet: trong gói cập nhật tải về sẽ có một thư mục install, bạn hãy chép đè nó vào chính thư mục install trên máy chủ. Trong trường hợp bạn đã xóa thư mục install trên máy chủ, hãy upload nó lại từ gói cài đặt. Sau khi upload, bạn đăng nhập vào quản trị bằng tài khoản quản trị tối cao để nhận được thông báo cập nhật và tiến hành cập nhật.

Nếu đăng nhập quản trị bằng tài khoản tối cao xong bạn vẫn không thấy thông báo cập nhật, hãy kiểm tra lần lượt các trường hợp sau:
- Module được chọn làm trang chính trong quản trị không phải là "Thông tin" (siteinfo). Trường hợp này hãy vào `/admin/index.php?language=vi&nv=siteinfo`
- Bạn upload gói cập nhật lên không đúng vị trí. Trường hợp này hãy kiểm tra lại cẩn thận đã upload lên đúng chưa.
- Bạn chỉnh sửa giao diện mặc định hoặc chọn một giao diện khác thiếu tính năng thông báo cập nhật. Trường hợp này hãy thử trả lại code gốc của giao diện admin_default và chọn admin_default làm giao diện trong quản trị.

### Bước 3: Cấu hình lại site.

- Nếu site có sử dụng các thư viện bên ngoài như `phpoffice/phpspreadsheet` thông qua composer, bạn cần khai báo để composer cập nhật lại
- Theo dõi các [thông báo phát hành](https://nukeviet.vn/vi/news/phat-hanh/), file [CHANGELOG.txt](https://github.com/nukeviet/nukeviet/blob/nukeviet4.6/CHANGELOG.txt) để biết thêm các tính năng mới.
