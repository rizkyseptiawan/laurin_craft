<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/">Beranda</a></li>
        @foreach ($data as $link => $label)
            @if($loop->last)
                <li class="active">{{ $label }}</li>
            @else
                <li><a href="{{ $link }}">{{ $label }}</a></li>
            @endif
        @endforeach
    </ol>
</div>
