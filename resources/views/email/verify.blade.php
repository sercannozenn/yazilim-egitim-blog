<h1>Doğrulama Emaili</h1>

<p>
    Merhaba {{ $user->name }}, hoşgeldiniz.
</p>

<p>
    Lütfen aşağıdaki linke tıklayarak mailinizi doğrulayınız.<br>
</p>

<a href="{{ route("verify-token", ['token' => $token]) }}">
    Mailimi doğrula.
</a>
