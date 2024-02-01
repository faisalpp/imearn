<!DOCTYPE html>
<html>
<head>
    <title>title</title>
</head>
<body>
    <h3>Dear User,</h3>
    <p>Forgot your password?</p>
    <p>To reset your password, click on the button below:</p>
    <a href="{{$url}}" style="background-color: orange;text-decoration: none;color:white;padding: 10px;border-radius: 5px;">Reset password</a>
    <p>Or copy and paste the URL into your browser:</p>
    <a>{{$url}}</a>
    <p style="color:red;" >Note: Link expire's after 3 Hours!</p>
</body>
</html>