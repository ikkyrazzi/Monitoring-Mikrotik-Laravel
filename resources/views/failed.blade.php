<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connection Failed!</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('error/css/style.css') }}" />
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>500</h1>
            </div>
            <h2>We are sorry, Page error!</h2>
            <p>The server encountered an internal error or misconfiguration and was unable to complete your request.
                Please contact the server administrator at<br>
                and inform them of the time the error occurred, along with any actions you may have taken that could
                have caused the error.
                More information about this error may be available in the server error log.</p>
            <a href="{{ route('login') }}">Back To Login</a>
        </div>
    </div>
</body>

</html>
