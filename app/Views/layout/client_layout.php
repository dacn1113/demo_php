<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $this->render('blocks/header', $sub_content); ?>

    <?php $this->render($content, $sub_content); ?>

    <?php $this->render('blocks/footer', $sub_content); ?>
    <script type="text/javascript" src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/script.js"></script>
</body>

</html>