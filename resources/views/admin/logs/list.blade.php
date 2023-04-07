@extends("layouts.admin")
@section("title")
    Log Listeleme
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/select2/css/select2.min.css") }}">

    <style>
        .table-hover > tbody > tr:hover {
            --bs-table-hover-bg: transparent;
            background: #363638;
            color: #fff;
        }
    </style>

@endsection

@section("content")
    <div class="row">
        <div class="col">
            <x-bootstrap.card>
                <x-slot:header>
                    <h2>Log Listesi</h2>
                </x-slot:header>

                <x-slot:body>
                    <form action="" method="GET" id="formFilter">
                        <div class="row">

                            <div class="col-3 my-2">
                                <input type="text" class="form-control" placeholder="Data, Created Date" name="search_text" value="{{ request()->get("search_text") }}">
                            </div>
                            <div class="col-3 my-2">
                                <input type="text" class="form-control" placeholder="User Name, Username, Email" name="user_search_text" value="{{ request()->get("user_search_text") }}">
                            </div>
                            <div class="col-3 my-2">
                                <select name="model" id="models" class="js-states form-control w-100 d-none">
                                    <option value="{{ null }}">Model Seçebilirsiniz</option>
                                    @foreach($models as $model)
                                        <option {{ request()->get("model") == $model ? 'selected' : '' }}>{{ $model }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3 my-2">
                                <select name="action" id="actions" class="js-states form-control w-100 d-none">
                                    <option value="{{ null }}">Action Seçebilirsiniz</option>
                                    @foreach($actions as $model)
                                        <option {{ request()->get("action") == $model ? 'selected' : '' }}>{{ $model }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="col-6 mb-2 d-flex">
                                <button class="btn btn-primary w-50 me-4" type="submit">Filtrele</button>
                                <button class="btn btn-warning w-50 " type="button" id="btnClearFilter">Filtreyi Temizle</button>
                            </div>
                            <hr>
                        </div>

                    </form>
                    <x-bootstrap.table
                        :class="'table-striped table-hover table-responsive'"
                        :is-responsive="1"
                    >
                        <x-slot:columns>
                            <th scope="col">Action</th>
                            <th scope="col">Model</th>
                            <th scope="col">Model View</th>
                            <th scope="col">User</th>
                            <th scope="col">Data</th>
                            <th scope="col">Created At</th>
                        </x-slot:columns>

                        <x-slot:rows>
                            @foreach($list as $log)
                                <tr id="row-{{ $log->id }}">
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->loggable_type }}</td>
                                    <td>
                                        <a href="javascript:void(0)"
                                           class="btn btn-info btn-sm btnModelLogDetail"
                                           data-bs-toggle="modal" data-bs-target="#contentViewModal"
                                           data-id="{{ $log->id }}"
                                        >
                                            <i class="material-icons ms-0">visibility</i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $log->user->name }}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                           class="btn btn-primary btn-sm btnDataDetail"
                                           data-bs-toggle="modal"
                                           data-bs-target="#contentViewModal"
                                           data-id="{{ $log->id }}"
                                        >
                                            <i class="material-icons ms-0">visibility</i>
                                        </a>
                                    </td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                        </x-slot:rows>
                    </x-bootstrap.table>
                    <div class="d-flex justify-content-center">
                        {{ $list->appends(request()->all())->onEachside(2)->links() }}
                    </div>
                </x-slot:body>
            </x-bootstrap.card>
        </div>
    </div>

    <div class="modal fade" id="contentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Detayı</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <pre><code class="language-json" id="jsonData"></code></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script src="{{ asset("assets/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("assets/js/pages/select2.js") }}"></script>
{{--    <script src="{{ asset("assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>--}}
    <script>
        $(document).ready(function ()
        {
            $('.btnModelLogDetail').click(function () {
                let logID = $(this).data('id');
                let self = $(this);
                let route = "{{ route("dblogs.getLog", ['id' => ":id"]) }}";
                route= route.replace(":id", logID);
                console.log(route);
                $.ajax({
                    method: "get",
                    url:  route,
                    async:false,
                    success: function (data) {
                        $('#modalBody').html(data);
                    },
                    error: function (){
                        console.log("hata geldi");
                    }
                })


            });

            $('.btnDataDetail').click(function () {
                let logID = $(this).data('id');
                let self = $(this);
                let route = "{{ route("dblogs.getLog", ['id' => ":id"]) }}";
                route= route.replace(":id", logID);
                console.log(route);
                $.ajax({
                    method: "get",
                    url:  route,
                    async:false,
                    data: {
                        data_type: "data"
                    },
                    success: function (data) {
                        $('#jsonData').html(JSON.stringify(data, null, 2));

                        document.querySelectorAll('#jsonData').forEach((block) => {
                            hljs.highlightElement(block)
                        })
                    },
                    error: function (){
                        console.log("hata geldi");
                    }
                })
            });

            $('#models').select2();
            $('#actions').select2();
        });
    </script>
@endsection

@push("javascript")
    <script src="{{ asset("assets/front/js/highlight.min.js") }}"></script>
    <script>
        hljs.highlightAll();
    </script>
@endpush
@push("style")
    <link rel="stylesheet" href="{{ asset('assets/plugins/highlight/styles/androidstudio.css') }}">
@endpush
