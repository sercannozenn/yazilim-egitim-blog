@extends("layouts.admin")
@section("css")
@endsection

@section("content")
    <x-bootstrap.card>
        <x-slot:header>
            <h2 class="card-title">Tema Atama/Belirleme</h2>
        </x-slot:header>

        <x-slot:body>
            <form action="" method="POST" enctype="multipart/form-data" id="formAssign">
                @csrf
            <div class="theme-select">
                <div class="row">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="col-md-6">
                        <select name="process_id" id="process" class="form-control">
                            @foreach($process as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-md-6" id="themes">

                        </div>
                </div>
            </div>

            <div class="content mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <button type="button" class="btn btn-success w-50" id="btnAssign" disabled="disabled">Atama Yap</button>
                    </div>
                </div>
            </div>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
    <script>
        $('#process').change(function () {
            $('#btnAssign').attr("disabled", "disabled");
            let id = $(this).val();
            $.ajax({
                method: "get",
                url:  "{{ route("admin.email-themes.assign.getTheme") }}",
                async:false,
                data: {
                    id: id
                },
                success: function (data) {
                    $('#themes').html("");
                    $('#themes').append(data);
                    $('#btnAssign').removeAttr("disabled");
                },
                error: function (){
                    console.log("hata geldi");
                }
            })

        });
        $('#btnAssign').click(function (){
            let themeTypeIsSelected = $("body #theme-type").val();
            if(themeTypeIsSelected !== undefined && themeTypeIsSelected != "undefined" && themeTypeIsSelected !== null && themeTypeIsSelected != "")
            {
                $("#formAssign").submit();
            }
            console.log(themeTypeIsSelected);
        })
    </script>
@endsection
