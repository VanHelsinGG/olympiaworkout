$(document).ready(function (){
    if(window.innerWidth <= 770){
        $('form').addClass('bg-dark-2 rounded-3 shadow');
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