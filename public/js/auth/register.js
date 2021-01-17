//TODO: sửa lại phản ứng của form: cho viền đỏ (màu warning) và hiện thông báo lên.
//Chừng nào tất cả các trường đều hợp lệ thì mới cho phép submit, còn không thì preventDefault()

$(function () {
    $('#email').on('input', () => {
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($('#email').val())) {
            $('#emailcheck').text('Valid email');
            //TODO: 
        } else {
            $('#emailcheck').text('Not a valid email');
        }
    });
    
    $('#password').on('input', () => {
        if (/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test($('#password').val())) {
            $('#passwordcheck').text('Valid pass');
        } else {
            $('#passwordcheck').text('Not a valid pass');
        }
    });

    $('#password-confirm').on('input', () => {
        if ($('#password').val() === $('#password-confirm').val()) {
            $('#passwordRecheck').text('Passwords matched.');
        } else {
            $('#passwordRecheck').text('Passwords mismatch.');
        }
    })
})