@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="pr-1">
            <a class="btn btn-primary {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $paginator->url(1) }}">Previous</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="pr-1">
                <a class="btn btn-primary {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="pr-1">
            <a class="btn btn-primary {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
        </li>
    </ul>
@endif
