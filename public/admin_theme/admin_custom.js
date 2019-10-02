function confirm_del(url) {
    var r = confirm("Bạn có chắc chắn muốn xóa?");
    if (r == true) {
        window.location.href = url;
    }
}