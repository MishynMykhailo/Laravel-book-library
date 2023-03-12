<form class="{{$class}}"id="{{$id}}"method="{{ $method }}" action="{{ $action }}" enctype="{{ $encType }}">
    @csrf
    @if(isset($book) || isset($author))
            @method('PUT')
    @elseif(mb_strtolower($delete) == 'delete')
        @method('DELETE')
    @endif
    {{ $slot }}
</form>
