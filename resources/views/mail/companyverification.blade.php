<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <br>
    <br>
    Hello
    <br>
    <br>
    Someone is trying to verify a company with this email address on {{ config('app.name') }}. Please click the link below to confirm your company.
    If this was not you, please ignore this email or contact us immediately.
    <br>
    <br>
    <a href="{!! $email_message["url"] !!}">{!! $email_message["url"] !!}</a>
    <br>
    <br>
    The Support Team
    <br>
    {{ config('app.name') }}
</body>
</html>

