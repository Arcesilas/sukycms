<div class="card w-full">
    <div class="card-title flex flex-row justify-between items-center">
        <span>{{ $title }}</span>

        <div class="actions">
            <form class="search-form">
                <input type="text" name="q" placeholder="{{ __('forms.search') }}..." class="form-input" value="{{ request('q') }}">
            </form>
        </div>
    </div>
    <div class="card-body">

        <table class="table-hover">
            <thead>
                {!! $thead !!}
            </thead>
            <tbody>
                {!! $tbody !!}
            </tbody>
        </table>

        <div class="flex justify-between items-center mt-8 mb-2">
            {!! $items->appends(['q' => request('q')])->links() !!}
            <p class="text-right">{{ __('pagination.table', [
                    'showing' => ($items->currentpage() -1) * $items->perpage() +1,
                    'to' => $items->currentpage() * $items->perpage(),
                    'of' => $items->total()
                ]) }}</p>
        </div>
    </div>
</div>
