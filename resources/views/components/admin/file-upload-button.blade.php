<div class="file-uploader{{ $image ? ' file-uploader--has-file' : '' }}">
    <div class="file-uploader__placeholder">
        @if ($image)
            <img src="{{ asset('storage/' . $image) }}">
        @endif
    </div>
    <label>
        <input type="file" id="{{ $name }}" name="{{ $name }}" class="file-uploader__input" accept="{{ $accept }}">
        <span class="button" role="button">{{ $label }}</span>
    </label>
</div>
