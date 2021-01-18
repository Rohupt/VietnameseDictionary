//TODO: sửa lại phản ứng của form: cho viền đỏ (màu warning) và hiện thông báo lên.
//Chừng nào tất cả các trường đều hợp lệ thì mới cho phép submit, còn không thì preventDefault()

$(function () {
    $('#email').on('input focusout', () => {
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($('#email').val())) {
            $('#emailcheck').text('Email hợp lệ');
            //TODO: 
        } else {
            $('#emailcheck').text('Email không hợp lệ');
        }
    });
    
    $('#password').on('input focusout', () => {
        if ($('#password').val == '') {
            $('#passwordcheck').text('Bạn cần nhập mật khẩu');
        } else if (/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test($('#password').val())) {
            $('#passwordcheck').text('Mật khẩu hợp lệ');
        } else {
            $('#passwordcheck').text('Mật khẩu không hợp lệ');
        }
    });

    $('#password-confirm').on('input focusout', () => {
        if ($('#password').val() === $('#password-confirm').val()) {
            $('#passwordRecheck').text('Hợp lệ');
        } else {
            $('#passwordRecheck').text('nhập lại không đúng');
        }
    })
})