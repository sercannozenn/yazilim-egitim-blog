@extends("layouts.front")
@section("css")
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <x-bootstrap.card>
                <x-slot:header>
                    PAROLAMI SIFIRLA
                </x-slot:header>
                <x-slot:body>
                    <form action="{{ isset($token) ? route("passwordResetToken", ['token' => $token]) : route("passwordReset") }}" method="POST" class="login-form">
                        @csrf
                        <div class="row">
                            <x-errors.display-error></x-errors.display-error>

                            @isset($token)
                                <div class="col-md-12 mt-2">
                                    <input type="password" name="password" id="email" class="form-control" placeholder="Parola">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input type="password" name="password_confirmation" id="email" class="form-control" placeholder="Parola Doğrulama">
                                </div>
                            @else
                                <div class="col-md-12 mt-2">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                            @endisset
                            <div class="col-md-12">
                                <hr class="my-4">

                                <button class="btn btn-success w-100">PAROLAMI SIFIRLA</button>
                            </div>
                        </div>
                    </form>
                </x-slot:body>
            </x-bootstrap.card>
        </div>
    </div>
@endsection

@section("js")
@endsection
