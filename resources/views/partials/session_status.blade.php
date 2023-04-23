<div>
    @if (session('Status'))
        <small style="color: green"> {{ session('Status') }} </small>
    @else
        @isset($Status)
            <small style="color: green"> {{ $Status }} </small>
        @endisset
    @endif
    @if ($error)
        <small style="color: red"> {{ session('error') }} </small>
    @endif
</div>
