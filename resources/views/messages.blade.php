@foreach(['success', 'error'] as $type)
    @if(session()->has($type))
        <div class="messages" onclick="this.remove()">
            <div class="message message--{{ $type }}">
                {{ session($type) }}
            </div>
        </div>
    @endif
@endforeach