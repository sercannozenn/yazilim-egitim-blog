@extends("layouts.admin")
@section("title")
    Kategori Listeleme
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
    <x-bootstrap.card>
        <x-slot:header>
            <h2>Kategori Listesi</h2>
        </x-slot:header>

        <x-slot:body>
            <form action="">
                <div class="row">
                    <div class="col-3 my-2">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ request()->get("name") }}">
                    </div>
                    <div class="col-3 my-2">
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ request()->get("slug") }}">
                    </div>
                    <div class="col-3 my-2">
                        <input type="text" class="form-control" placeholder="Description" name="description" value="{{ request()->get("description") }}">
                    </div>
                    <div class="col-3 my-2">
                        <input type="text" class="form-control" placeholder="Order" name="order" value="{{ request()->get("order") }}">
                    </div>
                    <div class="col-3 my-2">
                        <select class="js-states form-control" tabindex="-1" id="selectParentCategory" name="parent_id" style="display: none; width: 100%">
                            <option value="{{ null }}">Üst Kategori Seçin</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}" {{ request()->get("parent_id") == $parent->id ? "selected" : "" }}>{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 my-2">
                        <select class="form-select" name="user_id">
                            <option value="{{ null }}">Users</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ request()->get("user_id") == $user->id ? "selected" : "" }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 my-2">
                        <select class="form-select" name="status" aria-label="Status">
                            <option value="{{ null }}">Status</option>
                            <option value="0" {{ request()->get("status") === "0" ? "selected" : "" }}>Pasif</option>
                            <option value="1" {{ request()->get("status") === "1" ? "selected" : "" }}>Aktif</option>
                        </select>
                    </div>
                    <div class="col-3 my-2">
                        <select class="form-select" name="feature_status" aria-label="Feature Status">
                            <option value="{{ null }}">Feature Status</option>
                            <option value="0" {{ request()->get("feature_status") === "0" ? "selected" : "" }}>Pasif</option>
                            <option value="1" {{ request()->get("feature_status") === "1" ? "selected" : "" }}>Aktif</option>
                        </select>
                    </div>
                    <hr>
                    <div class="col-6 mb-2 d-flex">
                        <button class="btn btn-primary w-50 me-4" type="submit">Filtrele</button>
                        <button class="btn btn-warning w-50" type="button">Filtreyi Temizle</button>
                    </div>
                    <hr>
                </div>

            </form>
            <x-bootstrap.table
            :class="'table-striped table-hover table-responsive'"
            :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Feature Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Order</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>

                <x-slot:rows>
                    @foreach($list as $category)
                        <tr>
                            <th scope="row">{{ $category->name }}</th>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->status)
                                    <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-success btn-sm btnChangeStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-danger btn-sm btnChangeStatus">Pasif</a>
                                @endif
                            </td>
                            <td>
                                @if($category->feature_status)
                                    <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-success btn-sm btnChangeFeatureStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-danger btn-sm btnChangeFeatureStatus">Pasif</a>
                                @endif
                            </td>
                            <td title="{{ $category->description }}">{{ substr($category->description, 0, 20) }}</td>
                            <td>{{ $category->order }}</td>
                            <td>{{ $category->parentCategory?->name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="material-icons ms-0">edit</i>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger btn-sm btnDelete"
                                       data-name="{{ $category->name }}"
                                       data-id="{{ $category->id }}">
                                        <i class="material-icons ms-0">delete</i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-bootstrap.table>
            <div class="d-flex justify-content-center">
{{--                {{ $list->onEachside(0)->links("vendor.pagination.bootstrap-5") }}--}}
{{--                {{ $list->onEachside(2)->links() }}--}}
{{--                @php--}}
{{--                    $filterArray = ['name' => request()->get("name"), "description" => request()->get("description")];--}}
{{--                @endphp --}}
{{--                {{ $list->appends($filterArray)->onEachside(2)->links() }}--}}
                {{ $list->appends(request()->all())->onEachside(2)->links() }}
{{--                {{ $list->appends($_GET)->onEachside(2)->links() }}--}}
            </div>
        </x-slot:body>
    </x-bootstrap.card>
    <form action="" method="POST" id="statusChangeForm">
        @csrf
        <input type="hidden" name="id" id="inputStatus" value="">
    </form>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("assets/js/pages/select2.js") }}"></script>
    <script>
        $(document).ready(function ()
        {
            $('.btnChangeStatus').click(function () {
               let categoryID = $(this).data('id');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: 'Status değiştirmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $('#statusChangeForm').attr("action", "{{ route('categories.changeStatus') }}");
                        $('#statusChangeForm').submit();
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });

            $('.btnChangeFeatureStatus').click(function () {
               let categoryID = $(this).data('id');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: 'Feature Status değiştirmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $('#statusChangeForm').attr("action", "{{ route('categories.changeFeatureStatus') }}");
                        $('#statusChangeForm').submit();
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });

            $('.btnDelete').click(function () {
               let categoryID = $(this).data('id');
               let categoryName = $(this).data('name');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: categoryName + ' i Silmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed)
                    {
                        $('#statusChangeForm').attr("action", "{{ route('categories.delete') }}");
                        $('#statusChangeForm').submit();
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });

            $('#selectParentCategory').select2();


        });
    </script>
@endsection
