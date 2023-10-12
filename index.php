<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bản Đồ Địa Điểm Xanh</title>
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script type="text/javascript" src="./js/googlemap.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
    
    <?php
        session_start();
        include("./admin/config/config.php");
        include("./pages/header.php");
        include("./pages/main.php");
        include("./pages/footer.php")
    ?>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRASDxDC7jLfyIDlRYXklUpjVln7qyFXM&callback=loadMap"></script>
    <script src="./js/app.js"></script>
</body>
</html>

<!-- AIzaSyD3-GHdiHN7yovRr8qhgWcnqEJov4VAmaU -->