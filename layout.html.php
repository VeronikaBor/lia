<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ateles team site</title>
    <link rel="stylesheet" type="text/css" href="/static/css/global.css" />
</head>

<body>

    <div class="container">
        <?php $this->slots()->output('_content') ?>
    </div>


  
</body>
</html>