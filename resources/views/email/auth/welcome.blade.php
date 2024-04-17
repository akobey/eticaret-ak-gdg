<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoşgeldin</title>
</head>
<body>
<p>
    Merhaba {{ $user->name }}
    <br>
    Hoşgeldin.
</p>

    <p>
    Aşağıdaki mail doğrulama butonuna tıklayarak mailinizi doğrulayınız.

</p>

<hr>

<span>
    <a href="{{ route('verify', ['token' => $token]) }}">Mail Doğrula</a>
</span>

</body>
</html>
