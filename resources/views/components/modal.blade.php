<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="{{ $dismissable }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-color">
            <div class="modal-header bg-variant-1">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer bg-variant-1">
                <button type="button" class="btn btn-{{ $dismissBtnColor }}" data-bs-dismiss="modal">
                    {{ $dismissBtnText }}
                </button>
                <button type="button" id="apply-button" class="btn btn-{{ $applyBtnColor }}">
                    {{ $applyBtnText }}
                </button>
            </div>
        </div>
    </div>
</div>