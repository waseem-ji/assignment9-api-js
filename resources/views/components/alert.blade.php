<div>
    @if(session()->has('success'))
    <p class="text-muted">
        {{session()->get('success')}}
    </p>

    @elseif($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
</div>
