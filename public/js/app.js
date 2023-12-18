function copyright() {
    const dataElement = $("#date");

    if (dataElement) {
        dataElement.text(new Date().getFullYear());
    }
}

function goBack() { window.history.back() }

function saveCookiesPreference(preferencia) {
    localStorage.setItem('cookies', preferencia);
}

function showCookiesModal() {
    const preferencia = localStorage.getItem('cookies');

    if (preferencia === 'true') {
        $('#cookie-warning').hide();
    } else {
        $('#cookie-warning').show();
    }
}

function verifyEmail(email) {
    const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const isValid = validRegex.test(email);
    return isValid;
}

function acceptCookies() {
    saveCookiesPreference(true);
    $('#cookie-warning').hide();
}

function changePasswordVisibility(element) {
    const passInput = element.parent().find('input');
    if (passInput.attr("type") === "password") {
        passInput.attr("type", "text");
    } else {
        passInput.attr("type", "password");
    }
}

function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
}

function formatDate(date) {
    return (
        [
            date.getFullYear(),
            padTo2Digits(date.getMonth() + 1),
            padTo2Digits(date.getDate()),
        ].join('-') +
        ' ' +
        [
            padTo2Digits(date.getHours()),
            padTo2Digits(date.getMinutes()),
            padTo2Digits(date.getSeconds()),
        ].join(':')
    );
}

function getIPAddress(callback) {
    $.get('https://api.ipify.org?format=json', (response) => {
        const ipAddress = response.ip;
        callback(ipAddress);
    });
}

function data() {
    return formatDate(new Date());
}

function validateInput($element, condition, errorMessage) {
    handleValidation($element, !condition, errorMessage);
    return condition ? 1 : 0;
}

function handleValidation($element, isValid, errorMessage) {
    $element.removeClass('is-invalid is-valid');

    if (!isValid) {
        $element.addClass('is-invalid');
        $element.parent().find('.invalid-feedback').remove();
        $element.parent().append('<span class="invalid-feedback">' + errorMessage + '</span>');
    } else {
        $element.parent().find('.invalid-feedback').remove();
    }
}

function toggleDarkTheme(disable){
    $('body').toggleClass('dark-theme');

    localStorage.setItem('darkThemePreference', 'true');

    if (disable) {
        localStorage.removeItem('darkThemePreference');
    }
}