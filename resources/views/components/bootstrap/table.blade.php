@isset($isResponsive)
    <div class="table-responsive">
@endisset
        <table class="table {{ $class ?? '' }}">
            @isset($columns)
                <thead>
                <tr>
                    {!! $columns !!}
                </tr>
                </thead>
            @endisset
            <tbody>
            {!! $rows !!}
            </tbody>
        </table>
@isset($isResponsive)
    </div>
@endisset
