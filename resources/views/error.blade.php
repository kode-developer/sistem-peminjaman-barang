<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">

    <title>Something Error</title>
</head>
<body>

<!-- gagal -->
<section class="msg">
    <div class="errormsg">
        <img class="img" src="/img/notgood/error.png">
    </div>
</section>
<!-- gagal -->>

<script>
    var delay = 5000;
    setTimeout(function () {
        window.location ="{{ URL::previous() }}";
    }, delay);
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>
