@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="pagination__item{{ ($paginator->currentPage() == 1) ? ' pagination__item--disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="pagination__link">Previous</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="pagination__item{{ ($paginator->currentPage() == $i) ? ' pagination__item--active' : '' }}">
                <a href="{{ $paginator->url($i) }}" class="pagination__link">{{ $i }}</a>
            </li>
        @endfor
        <li class="pagination__item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' pagination__item--disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="pagination__link">Next</a>
        </li>
    </ul>
@endif