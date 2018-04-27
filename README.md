# Hướng dẫn cập nhật từ 4.3.00, 4.3.01 lên NukeViet 4.3.02

Nếu phiên bản NukeViet 4 của bạn nhỏ hơn 4.3.00 bạn cần tìm hướng dẫn nâng cấp lên phiên bản 4.3.00 trước khi tiến hành các bước tiếp theo.

## Nâng cấp hệ thống:

### Bước 1: Chuẩn bị trước khi cập nhật:

- Backup toàn bộ CSDL và các file code, tránh tình trạng có vấn đề phát sinh site không hoạt động được sau update.
- Nếu site của bạn đã tùy biến các thư mục bằng cách sửa file includes/constants.php hãy đưa về mặc định, sau nâng cấp tiến hành cấu hình trở lại.

### Bước 2: Thực hiện cập nhật:

> Chú ý: Để đảm bảo dễ dàng xử lý trong trường hợp xảy ra sự số trong và sau nâng cấp, ngoài các công việc được khuyến nghị ở bước 1, bạn nên thực hiện thêm các thao tác sau nếu có thể:
> - Thực hiện dọn dẹp hệ thống để xóa các file log. Bạn có thể thực hiện việc này bằng thao tác: Tại khu vực quản trị chọn **Công cụ web => Dọn dẹp hệ thống**, nhấp vào ô check ở dòng **Xóa các thông báo lỗi** sau đó nhấp **Thực hiện**
> - Thực hiện cập nhật bằng một trong các cách bên dưới.
> - Nếu trong quá trình cập nhật hoặc sau khi cập nhật website xảy ra sự cố hãy sao chép nội dung trong file có dạng **dd-mm-yyyy_error_log.log** ở thư mục **data/logs/error_logs/** để gửi hỗ trợ tại [Diễn đàn NukeViet.Vn](https://nukeviet.vn/vi/forum/Nang-cap/).

#### Cập nhật tự động:

Đăng nhập quản trị site dưới quyền admin tối cao, di chuyển vào khu vực *Công cụ web => Kiểm tra phiên bản*, tại đây nhận thông báo cập nhật và làm theo các bước hệ thống hướng dẫn.

Nếu thất bại hãy thử cách cập nhật thủ công bên dưới.

#### Cập nhật thủ công:

Download gói cập nhật tại: https://github.com/nukeviet/update/releases/download/to-4.3.02/update-to-4.3.02.zip
Giải nén và Upload các file trong gói cập nhật với cấu trúc của NukeViet, sau đó vào admin để tiến hành cập nhật.

### Bước 3: Điều chỉnh giao diện

Nếu website của bạn sử dụng giao diện không phải mặc định thì thực hiện cập nhật theo hướng dẫn sau

> Các hướng dẫn dưới đây bạn có thể không cần thực hiện nếu cảm thấy khó khăn. Việc không cập nhật giao diện website của bạn vẫn hoạt động bình thường.

**Tìm trong file: themes/my_theme/js/main.js:**

```html
window.location.href = location.reload()
```

Nếu có thay bằng

```html
location.reload();
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
