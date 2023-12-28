$('html').hide();

$(document).ready(function () {
    showCookiesModal();

    $('#acceptCookie').click(function () {
        acceptCookies();
    });

    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (prefersDarkMode || localStorage.getItem('darkThemePreference')) {
        toggleDarkTheme();
    }

    setTimeout(function (){
        $('html').show();
    },100);

    $('.toast').each(function () {
        const $progress = $(this).find('.progress');
        const $progressBar = $progress.find('.progress-bar');
        let valueNow = parseInt($progress.attr('aria-valuenow'));

        const progressBarTimer = setInterval(() => {
            if (valueNow === 100) {
                clearInterval(progressBarTimer);
                $(this).remove();
            }

            valueNow += 1;

            $progress.attr('aria-valuenow', valueNow);
            $progressBar.css('width', valueNow + '%');
        }, 100);

        $(this).show();
    });
});
