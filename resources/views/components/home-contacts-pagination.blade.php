<div class="mt-3">
    <div class="pagination-area">
        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>
