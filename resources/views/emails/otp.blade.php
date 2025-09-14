<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OTP Verifikasi</title>
</head>
<body>
    <p>Halo,</p>
    <p>Berikut adalah kode OTP kamu:</p>
    <h2>{{ $otp }}</h2>

    <p>Kode ini berlaku selama 10 menit.</p>

    <p>Atau klik link berikut untuk langsung verifikasi:</p>
    <a href="{{ route('verify.otp.link', ['user' => $user->id, 'code' => $otp]) }}">
        Verifikasi Akun Saya
    </a>
</body>
</html>
