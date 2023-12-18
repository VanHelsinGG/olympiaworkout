$(document).ready(function () {
    if(window.innerWidth <= 770){
        $('form').addClass('bg-dark-2 rounded-3 shadow');
    }

    $('.togglePassword').click(function () {
        changePasswordVisibility($(this));
    });

    $('#register').click(function (event) {
        const $name = $('#name');
        const $email = $('#email');
        const $password = $('#password');
        const $passwordConfirmation = $('#password-confirmation');
        let invalidInputs = 0;

        invalidInputs += validateInput($name, $name.val().length < 4 || $name.val().length > 39, 'O nome deve conter entre 4 e 40 caracteres.');
        invalidInputs += validateInput($email, $email.val().length < 10 || !verifyEmail($email.val()), 'O email inserido está em um formato inválido.');
        invalidInputs += validateInput($password, $password.val().trim().length < 6 || $password.val().indexOf(' ') !== -1, 'A senha deve conter pelo menos 6 caracteres.');
        invalidInputs += validateInput($passwordConfirmation, $passwordConfirmation.val().trim().length < 6 || $passwordConfirmation.val().indexOf(' ') !== -1 || $passwordConfirmation.val().trim() === '', 'A senha deve conter pelo menos 6 caracteres.');

        if(invalidInputs) return 1;

        if ($password.val() !== $passwordConfirmation.val()) {
            invalidInputs += 2;
            handleValidation($password, false, 'As senhas inseridas não são iguais.');
            handleValidation($passwordConfirmation, false, '');
        } else {
            handleValidation($password, true);
            handleValidation($passwordConfirmation, true);
        }

        if(invalidInputs){
            event.preventDefault();
        }
    });
});
