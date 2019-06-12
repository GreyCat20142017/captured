<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Captured on MDB</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="mdbcss/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="mdbcss/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="mdbcss/style.css" rel="stylesheet">
    <style>
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            border: 0;
            padding: 0;
            white-space: nowrap;
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            clip: rect(0 0 0 0);
            overflow: hidden;
        }
    </style>
</head>

<body>

<div style="font-family: Arial, sans-serif;	min-height: 100vh;">

    <?= $header_content; ?>
    <?= $page_content; ?>

    <footer class="page-footer font-small indigo pt-4 mt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-auto">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12 mt-md-0 mt-3">

                    <!-- Content -->
                    <h6>Идея проекта позаимствована у HTML Academy</h6>
                    <p>
                        <small>Использована только идея и визуальный скелет проекта. Выполнено по принципу: "Что вижу -
                            то пою!"
                        </small>
                    </p>
                    <p>
                        <small>Контент изменен. Все совпадения с ТЗ случайны. Оригинальная верстка заменена на верстку с
                            использованием
                        </small>
                        <a href="https://mdbootstrap.com/previews/free-templates/blog/home-page.html">Material Design
                            Bootstrap</a></p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="mdbjs/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="mdbjs/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="mdbjs/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="mdbjs/mdb.min.js"></script>
<script>
  $(document).keyup(function (e) {
    if (e.keyCode == 27) {
      $('.navbar #filters_ul').removeClass('show')
    }
  });
</script>
</body>

</html>
