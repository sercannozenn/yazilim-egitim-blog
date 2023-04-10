@extends("layouts.admin")
@section("title")
    Email Aktif Tema Listesi
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/flatpickr/flatpickr.min.css") }}">

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
            <h2>Email Aktif Tema Listesi</h2>
        </x-slot:header>

        <x-slot:body>
            <x-bootstrap.table
                :class="'table-striped table-hover table-responsive'"
                :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Tema Adı</th>
                    <th scope="col">Mail Türü</th>
                    <th scope="col">İçerik</th>
                    <th scope="col">Oluşturan</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>

                <x-slot:rows>
                    @foreach($list as $email)
                        <tr id="row-{{ $email->theme_type_id }}">

                            <td>{{ $email->theme->name }}</td>
                            <td>{{ $process[$email->process_id] }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                   class="btn btn-info btn-sm btnShowMailContent"
                                   data-bs-toggle="modal" data-bs-target="#contentViewModal"
                                   data-id="{{ $email->theme->id }}"
                                >
                                    <i class="material-icons ms-0">visibility</i>
                                </a>
                            </td>
                            <td>{{ $email->user->name }}</td>
                            <td>{{ $email->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger btn-sm btnDelete"
                                       data-name="{{ $email->theme->name }}"
                                       data-id="{{ $email->theme_type_id }}">
                                        <i class="material-icons ms-0">delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-bootstrap.table>
        </x-slot:body>
    </x-bootstrap.card>

    <div class="modal fade" id="contentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Şablon İçeriği</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
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
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("assets/js/pages/datepickers.js") }}"></script>
    <script src="{{ asset("assets/admin/plugins/bootstrap/js/popper.min.js") }}"></script>
    <script>
        $(document).ready(function ()
        {
            $('.btnShowMailContent').click(function () {
                let themeID = $(this).data('id');
                let self = $(this);

                $.ajax({
                    method: "get",
                    url: "{{ route('admin.email-themes.assign.show.email') }}",
                    data: {
                        themeID : themeID
                    },
                    async:false,
                    success: function (data) {
                        $('#modalBody').html(data);
                    },
                    error: function (){
                        console.log("hata geldi");
                    }
                })

            });

            $('.btnDelete').click(function () {
                let id = $(this).data('id');
                let categoryName = $(this).data('name');

                Swal.fire({
                    title: categoryName + ' i Silmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: "İptal"
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('admin.email-themes.assign.delete') }}",
                            data: {
                                "_method": "DELETE",
                                id : id
                            },
                            async:false,
                            success: function (data) {

                                $('#row-' + id).remove();
                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Atama Silindi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function (){
                                console.log("hata geldi");
                            }
                        })

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

            $('.btnModelThemeDetail').click(function () {
               let content = $(this).data("content");
               let themeType = $(this).data("theme-type");
               if (themeType== 1)
               {
                   $('#jsonData').html(content.replace('"', '').replace('"', ''));
                   console.log(content);
               }
               else
               {
                   $('#jsonData').html(JSON.stringify(content, null, 2));
                   document.querySelectorAll('#jsonData').forEach((block) => {
                       hljs.highlightElement(block)
                   })
               }

            });

            $('#theme_type').select2();
            $('#process').select2();
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
