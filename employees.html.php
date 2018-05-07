<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');

?>

<h1><?= $this->input("headline", ["width" => 540]); ?></h1>
<div class="employees-info">
    <?php if($this->editmode):
        echo $this->href('employees');
    else: ?>
    <div id="employees">
        <?php
        /** @var \Pimcore\Model\DataObject\Employees $employees */
        $employees = $this->href('employees')->getElement();
        ?>
        <h3><?= $this->escape($employees->getName()); ?></h3>
		  <h4><?= $this->escape($employees->getTitle()); ?></h4>
       <div class="employee_picture">
    <?php
    $image = $employees->getImage();
    if($image instanceof \Pimcore\Model\Asset\Image):
        /** @var \Pimcore\Model\Asset\Image $image */
        
    ?>
        <?= $image->getThumbnail("employee_image")->getHTML(); ?>
    <?php endif; ?>
</div>
    </div>
    <?php endif; ?>
</div>