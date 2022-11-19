# Hướng dẫn cập nhật từ NukeViet 4.0.13 lên NukeViet 4.0.23

> Lưu ý: Đây là hướng dẫn thủ công hoàn toàn. Bạn cần có khả năng lập trình mới có thể làm được. Nếu không am hiểu hãy nhờ trợ giúp.

Trước khi cập nhật hãy chắc chắn bạn đã sao lưu toàn bộ code và CSDL của site.

- Vào quản lý giao diện, xóa thiết các thiết lập của giao diện modern, mobile_nukeviet và các giao diện của bạn nếu có. Kích hoạt sử dụng giao diện default
- Xóa bằng tay các giao diện của bạn nếu có + modern + mobile_nukeviet. Vì giao diện sau nâng cấp buộc làm lại 100%
- Vào phần mở rộng, tải về các module không phải module hệ thống. Lưu ý: vào thư mục modules kiểm tra cho đầy đủ danh sách
- Chạy https://domain.com/update40134023.php
- Xóa thư mục admin, cache, editors, images, includes, install, js, language, logs, modules, sess, tmp, themes
- Xóa file .htaccess, CJzip.php, index.php, mainfile.php
- Copy cất các file data/bpl_xxx.xml, data/config_global.php
- Mở file config.php thêm xuống cuối `$global_config['hashprefix'] = '{SSHA}';`
- Chép toàn bộ code NukeViet 4.0.23 từ bản cài đặt đè lên. Chú ý không đè file config.php
- Chép đè lại file config_global.php và các file bpl_xxx.xml khi nãy vào thư mục data/config
- Trong thư mục files xóa .htaccess sau đó di chuyển hết nội dung trong đó vào thư mục assets. Sau đó xóa thư mục files
- Giải nén các module đã tải xuống lúc này. Xong nhớ xóa config.ini
- Vào thư mục data/cache xóa hết các thư mục con trong đây nếu có
- Nếu có module download mở siteinfo.php của nó lên sửa _comments thành _comment nếu không vào admin bị trang trắng.
- Thử đăng nhập admin, nếu bị trang trắng thì mở file admin/index.php thêm lên đầu đoạn này

```php
register_shutdown_function("fatal_handler");
function fatal_handler()
{
    $error = error_get_last();
    if ($error !== NULL) {
        echo('<pre><code>' . print_r($error, true) . '</code></pre>');
    }
}
```

Sau đó F5 lại xem lỗi gì, gửi lên nhóm để được trợ giúp
- Dọn dẹp hệ thống
- Vào cấu hình chung lưu lại 1 cái để hệ thống ghi file config_global

