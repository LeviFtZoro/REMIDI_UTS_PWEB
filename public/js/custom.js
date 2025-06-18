$(document).ready(function () {
    $('#showPassword').on('change', function () {
        const type = $(this).is(':checked') ? 'text' : 'password';
        $('#password, #password_confirmation').attr('type', type);
    });
});
