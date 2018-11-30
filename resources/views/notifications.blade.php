@if (count($errors) > 0)
<div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

@if(session()->has('message'))
<div class="notification is-success">
    <ul>
        <li>{{ session('message') }}</li>
    </ul>
</div>
@endif
