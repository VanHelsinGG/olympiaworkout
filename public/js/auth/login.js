$(document).ready(function (){
    if($('body').hasClass('dark-theme')){
        $('.bg-variant-2').removeClass('bg-variant-2');
    }

    $('.togglePassword').click(function () {
        changePasswordVisibility($(this));
    });

    $('#connect').click(function (event){
        const $email = $('#email');
        let invalidInput = validateInput($email, $email.val().length < 10 || !verifyEmail($email.val()), 'O email inserido está em um formato inválido.');

        if(invalidInput){
            event.preventDefault();
        }
    });
});