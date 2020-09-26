{{-- Change to `true` to enable breadcrumb --}}
@if (false)
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            @foreach ($data as $link => $label)
                @if($loop->last)
                    <li class="active">{{ $label }}</li>
                @else
                    <li><a href="{{ $link }}">{{ $label }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
@endif
