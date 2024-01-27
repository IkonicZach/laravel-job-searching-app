<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>

<style>
    body {
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .btn {
        border-radius: 2rem !important;
        text-transform: capitalize !important;
    }

    .ms-5 {
        margin-left: 3rem !important;
    }

    .btn-primary {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: white;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        background-color: #3b82f6;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .btn-primary:hover {
        background-color: transparent !important;
        color: #3b82f6 !important;
        border-color: #3b82f6 !important;
    }
</style>

<body>
    <p>Hello name</p>

    <p>We received a request to reset your password. If you didn't make this request, you can ignore this email.</p>

    <p>To reset your password, click on the link below:</p>

    <p>
        <a href="{{ route('password.reset.page', $token) }}" class="btn btn-primary">
            Reset Password
        </a>
    </p>

    <p>This link will expire in minutes.</p>

    <p>If you're having trouble clicking the "Reset Password" button, copy and paste the following URL into your web
        browser:</p>

    <a class="btn btn-primary ms-5" href="{{ route('password.reset.page', $token) }}">{{ route('password.reset.page', $token) }}</a>

    <p>Thank you!</p>
</body>

</html>
