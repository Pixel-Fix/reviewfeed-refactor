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
    You have recently signed up for our newsletter at {{ config('app.name') }}. Please click the link below to confirm your newsletter signup.
    If you have not signed up to our newsletter, please ignore this and you wont receive any further emails from us.
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

