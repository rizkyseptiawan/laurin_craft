@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($alert = Session::get('alert'))
<div class="alert alert-{{ $alert['type'] ?? '' }}" role="alert">
    {{ $alert['message'] ?? '' }}
</div>
@endif
