<div class="pagination justify-content-center">
    <ul class="pagination">
        {{-- Botón "Anterior" --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Anterior</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">Anterior</a>
            </li>
        @endif

        {{-- Enlaces a las páginas --}}
        @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
        @endfor

        {{-- Botón "Siguiente" --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">Siguiente</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Siguiente</span>
            </li>
        @endif
    </ul>
</div>
