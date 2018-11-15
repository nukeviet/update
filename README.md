# Hướng dẫn cập nhật từ 4.3.00, 4.3.01, 4.3.02, 4.3.03 lên NukeViet 4.3.04

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.3.00 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.3.00 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau nâng cấp tiến hành cấu hình trở lại.
- Nếu bạn có cấu hình FTP trong quản trị, vui lòng kiểm tra lại các thông số cho đúng hoặc xóa cấu hình, nếu cấu hình sai sẽ dẫn tới cập nhật thất bại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau nâng cấp, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
> - Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
> - Thực hiện cập nhật bằng một trong các cách bên dưới.
> - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Diễn đàn NukeViet.Vn](https://nukeviet.vn/vi/forum/Nang-cap/).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

Nếu trong quá trình cập nhật bị đẩy ra, bạn đăng nhập lại quản trị để làm theo hướng dẫn (Hệ thống báo Xóa gói cập nhật do không tương thích, Bạn hãy xóa để tiếp tục vânh hành site)

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.3.04/update-to-4.3.04.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

> Lưu ý: Trong quá trình cập nhật, sau khi thực hiện xong bước di chuyển các file và thư mục, bạn sẽ bị đẩy ra khỏi tài khoản quản trị. Khi đó bạn hãy thực hiện đăng nhập lại quản trị và tiến hành di chuyển tới khu vực cập nhật lần nữa để hệ thống tiếp tục tiến trình.

### Bước 3: Điều chỉnh giao diện

Nếu site của bạn hiện ở phiên bản nhỏ hơn 4.3.02 và sử dụng giao diện không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau

> Các hướng dẫn dưới đây bạn có thể không cần thực hiện nếu cảm thấy khó khăn. Việc không cập nhật giao diện website của bạn vẫn hoạt động bình thường.

**Tìm trong file: themes/my_theme/js/main.js:**

```html
window.location.href = location.reload()
```

Nếu có thay bằng

```html
location.reload()
```

**Nếu giao diện của bạn tồn tại themes/my_theme/modules/contact/form.tpl**

Mở form.tpl tìm

```html
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
```

Thêm lên trên

```html
        <!-- BEGIN: sendcopy -->
```

Thêm xuống dưới

```html
        <!-- END: sendcopy -->
```

### Bước 4: Cấu hình lại site.
- Tìm file config.php Tìm cấu hình sitekey đổi giá trị sitekey (Việc này cần thực hiện để đảm bảo an toàn).
- Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
- Vào phần: **Cấu hình -> Cấu hình chung** Lưu thay đổi để hệ thống ghi lại một số thiết lập.
- Vào phần: **Cấu hình -> Thiết lập an ninh ** Chọn tab **Cấu hình hiển thị captcha** để chọn Loại captcha là reCAPTCHA sau đó khai báo các thông số Site key, Secret key bằng cách đăng ký tài khỏan captcha tại https://www.google.com/recaptcha/admin#list (Ghi chú: Nếu website của bạn chạy trên mạng nội bộ không có Internet cấu hình  Loại captcha là Captcha mặc định)
- Nếu site có sử dụng các thư viện bên ngoài như phpoffice/phpspreadsheet thông qua composer, bạcn cần khai báo để composer cập nhật lại
 

