$(function () {
    // $('#email').on('focusout', () => {
    //     if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($('#email').val())) {
    //         $('#emailcheck').text('Valid email');
    //     } else {
    //         $('#emailcheck').text('Not a valid email');
    //     }
    // });
    $('#email').on('focusout', () => {
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($('#email').val())) {
            $('#emailcheck').text('Valid email');
        } else {
            $('#emailcheck').text('Not a valid email');
        }
    });
    
    
})
$(function () {
    $('#password').on('focusout', () => {
        if (/^(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test($('#password').val())) {
            $('#passcheck').text('Valid pass');
        } else {
            $('#passcheck').text('Not a valid pass');
        }
    });
})