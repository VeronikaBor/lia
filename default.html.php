<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
$this->extend('layout.html.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ateles teamsite</title>
</head>

<body>
<div class="header">
  <div class="header_image" >
    <?= $this->image("h_image") ?>
  </div>

  <div class="city_image">
    <?= $this->image("city_image") ?>
  </div>
  
<div class="Linkoping">
    <?= $this->inc(2) ?>
</div>


  <div class="employee_grid">
            <!--?= $this->action("employees", "Employees", null) ?-->
    </div>


</body>
</html>
