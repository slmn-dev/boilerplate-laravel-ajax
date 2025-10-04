<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog {{ $size ?? 'modal-lg' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}">{{ $title }}</h5>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @isset( $footer)
            <div class="modal-footer">
                {{ $footer }}
            </div>
            @endisset
        </div>
    </div>
</div>