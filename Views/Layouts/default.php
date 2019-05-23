<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Boknings Schema</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="Views/Layouts/style.css">
    <link rel="stylesheet" href="Views/Layouts/logincss.css">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Hammersmith+One">

</head>

<body>
  <div id="wrapper">
    <h1> BOKNING AV NÅGONTING </h1>
    <button id="loginButton" type="button" class="btn btn-primary">Login</button>
    <div id="schemaContainer">
      <?php
        echo $content_for_layout;
      ?>
    </div>
  </div>
  <script type="text/javascript" src="Js/js.js"></script>
</body>
</html>
