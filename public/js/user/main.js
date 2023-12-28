$(document).ready(function () {
    const $toasts = $('.toast');

    $toasts.each(function () {
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

    function reactPost(postID, type, token) {
        $.ajax({
            url: `post/${postID}/react/${type}`,
            type: 'POST',
            data: {
                _token: token,
            },
            success: function (response) {
                if (response.success) {
                    toast('success', response.success);
                } else {
                    toast('danger', response.error);
                }
            },
            error: function (xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toast('danger', xhr.responseJSON.error);
                } else {
                    console.error(error);
                }
            }
        });
    }

    function deletePost(postID, token) {
        $.ajax({
            url: `post/${postID}`,
            type: 'DELETE',
            data: {
                _token: token
            },
            success: function(response) {
                if (response.success) {
                    toast('success', response.success);
                } else {
                    toast('danger', response.error);
                }
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toast('danger', xhr.responseJSON.error);
                } else {
                    console.error(error);
                }
            }
        });
    }

    function editPost(postID, newContent,csrfToken){
        $.ajax({
            url: `post/${postID}`,
            type: 'PATCH',
            data: {
                newContent: newContent,
                _token: csrfToken
            },
            success: function(response) {
                if (response.success) {
                    toast('success', response.success);
                } else {
                    toast('danger', response.error);
                }
                $('.modal').modal('hide');

                $(`#${postID}`).find('#content').text(newContent);
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toast('danger', xhr.responseJSON.error);
                } else {
                    console.error(error);
                }
                $('.modal').modal('hide');
            },
        });
    }

    function reportPost(postID, generalReason, specificReason, csrfToken){
        $.ajax({
            url: `post/${postID}/report`,
            type: 'POST',
            data: {
                generalReason: generalReason,
                specificReason: specificReason,
                _token: csrfToken
            },
            success: function(response) {
                if (response.success) {
                    toast('success', response.success);
                } else {
                    toast('danger', response.error);
                }
                $('.modal').modal('hide');
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toast('danger', xhr.responseJSON.error);
                } else {
                    console.error(error);
                }
                $('.modal').modal('hide');
            },
        });
    }

    function enablePostEdit($post, csrfToken) {
        const $contentInput = $post.find('#content').text();
        const $modal = $('#modal');
        const $modalBody = $modal.find('.modal-body');

        $modalBody.html([
            $('<textarea class="form-control h-100" name="content" style="resize:none;min-height:9rem;">').text($contentInput),
            $("<small class='text-secondary mt-1'></small>").text($contentInput.length + '/255'),
        ]);

        $modalBody.find('textarea').on('input', function() {
            const length = $(this).val().trim().length;
            const isLengthExceeded = length > 255 || length < 2;

            $modalBody.find('small').toggleClass('text-danger', isLengthExceeded);
            $modal.find('#apply-button').toggleClass('disabled', isLengthExceeded);

            $modalBody.find('small').text(length + '/255');
        });

        $modal.find('#apply-button').click(function (){
            editPost($post.attr('id'),$modalBody.find('textarea').val(),csrfToken);
        });

        new bootstrap.Modal($modal).show();
    }

    function enablePostReport($post, csrfToken) {
        const $modal = $('#modal');
        const $modalBody = $modal.find('.modal-body');

        $modal.find('.modal-title').text('Denunciar Publicação');

        $modalBody.html([
            $('<span class="font-weight-bold">Motivo da Denuncia</span>'),
            $('<div class="form-check"><input class="form-check-input" type="radio" name="generalReason" id="f" checked><label class="form-check-label" for="f">Flood: Publicação excessiva e repetitiva.</label></div>'),
            $('<div class="form-check"><input class="form-check-input" type="radio" name="generalReason" id="s"><label class="form-check-label" for="s">Scam: Conteúdo enganoso ou fraudulento.</label></div>'),
            $('<div class="form-check"><input class="form-check-input" type="radio" name="generalReason" id="c"><label class="form-check-label" for="c">Conteúdo impróprio: Publicação ofensiva ou inapropriada.</label></div>'),
            $('<span class="font-weight-bold">Detalhes Específicos (caso aplicável):</span>'),
            $('<textarea class="form-control h-100" name="specificReason" style="resize:none;min-height:9rem;">'),
            $("<small class='text-secondary mt-1'>0/255</small>"),
        ]);

        $modalBody.find('textarea').on('input', function() {
            const length = $(this).val().trim().length;
            const isLengthExceeded = length > 255;

            $modalBody.find('small').toggleClass('text-danger', isLengthExceeded);
            $modal.find('#apply-button').toggleClass('disabled', isLengthExceeded);

            $modalBody.find('small').text(length + '/255');
        });

        $modal.find('#apply-button').click(function (){
            var generalReason = $('input[name="generalReason"]:checked').attr('id');

            reportPost($post.attr('id'),generalReason,$modalBody.find('textarea').val(),csrfToken);
        });

        new bootstrap.Modal($modal).show();
    }
    
    function changeReaction(element) {
        const $actionBtnGroup = $(element).closest('.action-btn-group');
        const $elementIcon = $(element).find('i');
        const $elementSpan = $(element).find('span');
        const currentValue = parseInt($elementSpan.text());

        if ($elementIcon.hasClass('bi-hand-thumbs-up')) {
            $elementIcon.toggleClass("bi-hand-thumbs-up bi-hand-thumbs-up-fill").css('animation', 'react-anim 0.3s');
            $elementSpan.text(currentValue + 1);

            // Dislike is selected
            const $dislikeBtn = $actionBtnGroup.find('.post-dislike-button');
            const $dislikeIcon = $dislikeBtn.find('i');
            if ($dislikeIcon.hasClass('bi-hand-thumbs-down-fill')) {
                $dislikeIcon.toggleClass("bi-hand-thumbs-down bi-hand-thumbs-down-fill");
                $dislikeBtn.find('span').text(parseInt($dislikeBtn.find('span').text()) - 1);
            }
        } else if ($elementIcon.hasClass('bi-hand-thumbs-up-fill')) {
            $elementIcon.toggleClass("bi-hand-thumbs-up bi-hand-thumbs-up-fill").css('animation', 'react-anim 0.3s');
            $elementSpan.text(currentValue - 1);
        } else if ($elementIcon.hasClass('bi-hand-thumbs-down')) {
            $elementIcon.toggleClass("bi-hand-thumbs-down bi-hand-thumbs-down-fill").css('animation', 'react-anim 0.3s');
            $elementSpan.text(currentValue + 1);

            // Like is selected
            const $likeBtn = $actionBtnGroup.find('.post-like-button');
            const $likeIcon = $likeBtn.find('i');
            if ($likeIcon.hasClass('bi-hand-thumbs-up-fill')) {
                $likeIcon.toggleClass("bi-hand-thumbs-up bi-hand-thumbs-up-fill");
                $likeBtn.find('span').text(parseInt($likeBtn.find('span').text()) - 1);
            }
        } else {
            $elementIcon.toggleClass("bi-hand-thumbs-down bi-hand-thumbs-down-fill").css('animation', 'react-anim 0.3s');
            $elementSpan.text(currentValue - 1);
        }

        setTimeout(() => {
            $elementIcon.css('animation', 'none');
        }, 300);
    }

    $('.post-like-button, .post-dislike-button').click(function () {
        const $post = $(this).closest('.post');
        const csrfToken = $post.find("input[name='_token']").val();

        const reaction = ($(this).hasClass('post-dislike-button')) ? 'dislike' : 'like';

        reactPost($post.attr('id'), reaction, csrfToken);

        changeReaction($(this));
    })

    $('.post-delete-button').click(function (){
        const $post = $(this).closest('.post');
        const csrfToken = $post.find("input[name='_token']").val();

        deletePost($post.attr('id'),csrfToken);

        $post.remove();
    });

    $('.post-edit-button').click(function (){
        const $post = $(this).closest('.post');
        const csrfToken = $post.find("input[name='_token']").val()

        enablePostEdit($post,csrfToken);
    });

    $('.post-report-button').click(function (){
        const $post = $(this).closest('.post');
        const csrfToken = $post.find("input[name='_token']").val()

        enablePostReport($post,csrfToken);
    });

})