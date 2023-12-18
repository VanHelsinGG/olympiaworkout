$('html').hide();

$(window).on("load", function () {
    $('html').show();
});

$(document).ready(function () {
    showCookiesModal();

    $('#acceptCookie').click(function () {
        acceptCookies();
    });

    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (prefersDarkMode || localStorage.getItem('darkThemePreference')) {
        toggleDarkTheme();
    }
});
