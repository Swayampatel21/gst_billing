<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Reset Your Password</h1>
    <p>Hello {{ $user->name }},</p>
    <p>You requested a password reset. Click the link below to reset your password:</p>
    <p><a href="{{ $user->reset_link }}">{{ $user->reset_link }}</a></p>
    <p>If you did not request this, please ignore this email.</p>
    <p>Thank you,</p>
    <p>GST Billing Team</p>
</body>
</html>