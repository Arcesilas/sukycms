<div class="card w-full">
    <div class="card-title flex flex-row justify-between items-center">
        <span>{{ $title }}</span>

        @if (! isset($actions))
            <div class="actions">
                <form class="search-form">
                    <input type="text" name="q" placeholder="{{ __('forms.search') }}..." class="form-input" value="{{ request('q') }}">
                </form>
            </div>
        @else
            {!! $actions !!}
        @endif
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table-hover">
                <thead>
                    {!! $thead !!}
                </thead>
                <tbody>
                    {!! $tbody !!}
                </tbody>
            </table>

            @if (method_exists($items, 'links'))
                <div class="flex justify-between items-center mt-8 mb-2">
                    {!! $items->appends(['q' => request('q')])->links() !!}
                    <p class="text-right">{{ __('pagination.table', [
                            'showing' => ($items->currentpage() -1) * $items->perpage() +1,
                            'to' => $items->currentpage() * $items->perpage(),
                            'of' => $items->total()
                        ]) }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
