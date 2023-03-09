@extends("layouts.admin")
@section("title")
    Makale Listeleme
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
            <h2>Makale Listesi</h2>
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
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Body</th>
                    <th scope="col">Tags</th>
                    <th scope="col">View Count</th>
                    <th scope="col">Like Count</th>
                    <th scope="col">Category</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">User</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>

                <x-slot:rows>

                </x-slot:rows>
            </x-bootstrap.table>
            <div class="d-flex justify-content-center">
                {{ $list->appends(request()->all())->onEachside(2)->links() }}
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
