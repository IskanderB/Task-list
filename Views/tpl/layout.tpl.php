<!DOCTYPE HTML>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
       <?php echo "{$pageData['title']}"; ?>
   </title>
   <link rel="stylesheet" href="/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" <?php echo "href='/css/styles/" . $tpl . ".css'"; ?>>
</head>

<body>
    <!-- Header section -->
    <?php include "layout/header.tpl.php"; ?>
    <!--  -->

    <!-- Message section -->
    <?php include "layout/messageSection.tpl.php"; ?>
    <!--  -->

    <!-- Self page content section -->
    <?php include TPL_PATH . $tpl . ".tpl.php" ?>
    <!--  -->

    <!-- Footer section -->
    <?php include "layout/footer.tpl.php"; ?>
    <!--  -->
    
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" <?php echo "src='/js/scripts/" . $tpl . ".js'"; ?>></script>
</body>
</html>
