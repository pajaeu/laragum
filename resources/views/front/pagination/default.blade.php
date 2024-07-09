@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="pagination__item{{ ($paginator->currentPage() == 1) ? ' pagination__item--disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="pagination__link">Previous</a>
        </li>
        <li class="pagination__item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' pagination__item--disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="pagination__link">Next</a>
        </li>
    </ul>
@endif