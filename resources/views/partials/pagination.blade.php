@if ($paginator->hasPages())
<nav aria-label="...">
    <ul class="pagination justify-content-end mb-0">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">@lang('pagination.previous')</span>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">@lang('pagination.previous')</span>
            </a>
        </li>
        @endif
        <li class="page-item active">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
@endif
