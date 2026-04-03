<!DOCTYPE html>
<html>
<head>
    <style>
        .wrapper { background: #f4f7ff; padding: 40px; font-family: sans-serif; }
        .card { background: #ffffff; padding: 30px; border-radius: 12px; max-width: 500px; margin: auto; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .btn { background: #4f46e5; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; display: inline-block; margin-top: 20px; font-weight: bold; }
        .footer { margin-top: 20px; font-size: 12px; color: #6b7280; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <h2>Welcome to {{ config('app.name') }}!</h2>
            <p>Hi {{ $full_name }}, you're almost there. Click the button below to verify your email address and activate your account.</p>
            <a href="{{ $url }}" class="btn">Verify Email Address</a>
            <p class="footer">If you did not create an account, no further action is required.</p>
        </div>
    </div>
</body>
</html>