@extends("layouts.admin")
@section("title")
    Kullanıcı {{ isset($user) ? "Güncelleme" : "Ekleme" }}
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/flatpickr/flatpickr.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-lite.min.css") }}">

@endsection

@section("content")
    <x-bootstrap.card>
        <x-slot:header>
            <h2 class="card-title">Kullanıcı {{ isset($user) ? "Güncelleme" : "Ekleme" }}</h2>
        </x-slot:header>

        <x-slot:body>
            <div class="example-container">
                <div class="example-content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ isset($user) ? route('user.edit', ['user' => $user->username]) : route('user.create') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          id="userForm">
                        @csrf
                        <label for="username" class="form-label">Kullanıcı Adı</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("username"))
                                    border-danger
                               @endif
                               "
                               placeholder="Kullanıcı Adı"
                               name="username"
                               id="username"
                               value="{{ isset($user) ? $user->username : "" }}"
                               required
                        >
                        @if($errors->has("username"))
                            {{ $errors->first("username") }}
                        @endif
                        <label for="password" class="form-label">Parola</label>
                        <input type="password"
                               class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("password"))
                                    border-danger
                               @endif
                               "
                               placeholder="Parola"
                               name="password"
                               id="password"
                               value=""
                               required
                        >
                        @if($errors->has("password"))
                            {{ $errors->first("password") }}
                        @endif

                        <label for="name" class="form-label">Kullanıcı Ad Soyad</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm"
                               placeholder="Kullanıcı Ad Soyad"
                               name="name"
                               id="name"
                               value="{{ isset($user) ? $user->name : "" }}"
                        >

                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control form-control-solid-bordered"
                               placeholder="Email"
                               name="email"
                               value="{{ isset($user) ? $user->email : "" }}"
                               id="email"
                        >



                        <label for="about" class="form-label">Hakkında Yazısı</label>
                        <textarea name="about" id="about" class="m-b-sm">{!! isset($user) ? $user->about : "" !!}</textarea>

                        <div class="row mt-5">
                            <div class="col-8">
                                <label for="image" class="form-label m-t-sm">Kullanıcı Görseli</label>
                                <select name="image" id="image" class="form-control">
                                    <option value="{{ null }}">Görsel Seçin</option>
                                    <option value="/assets/images/user-images/profile1.png">Profile 1</option>
                                    <option value="/assets/images/user-images/profile2.png">Profile 2</option>

                                </select>
                            </div>
                            <div class="col-4">
                                <img src="{{ isset($user) ? asset($user->image) : "" }}" alt="" class="img-fluid"
                                     style="max-height: 80px;" id="profileImage"
                                >
                            </div>
                        </div>






                        <div class="form-check mt-5">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ isset($user) && $user->status  ? "checked" : "" }}>
                            <label class="form-check-label" for="status">
                                Kullanıcı Aktif Olsun mu?
                            </label>
                        </div>

                        <hr>
                        <div class="col-6 mx-auto mt-2">
                            <button type="button" class="btn btn-success btn-rounded w-100" id="btnSave">
                                {{ isset($user) ? "Güncelle" : "Kaydet" }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("assets/js/pages/datepickers.js") }}"></script>
    <script src="{{ asset("assets/plugins/summernote/summernote-lite.min.js") }}"></script>
    <script src="{{ asset("assets/admin/js/pages/text-editor.js") }}"></script>
    <script>
        $("#publish_date").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>

    <script>
        let username = $('#username');
        let email = $('#email');
        let name = $('#name');


        $(document).ready(function ()
        {
            $('#btnSave').click(function () {
                if(username.val().trim() === "" || username.val().trim() == null)
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if(name.val().trim() === "" || name.val().trim() == null)
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı adı soyadı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if(email.val().trim() === "" || email.val().trim() == null)
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Kullanıcı email boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else
                {
                    $("#userForm").submit();
                }
            });

            $('#image').change(function () {
                $('#profileImage').attr("src", $(this).val());
            });
        });
    </script>

@endsection
