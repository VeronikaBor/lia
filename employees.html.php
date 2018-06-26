<?php
use \Pimcore\Model\DataObject;
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 * @var \Pimcore\Model\DataObject\Employees $employees
 */


$this->extend('layout.html.php');

/* PATH DOCUMENTS FOR EMPLOYEECARDS/OBJECT */

$document_key = $this -> getKey();

$employeesObject = $this->getProperty('Employees');

$list = new Pimcore\Model\DataObject\Listing();
$list->setCondition('o_parentId = ?', $employeesObject->getId());
$list->setOrderKey([ 'o_index', 'o_key' ]);
$list->setOrder('asc');

$employees = [];
foreach ($list as $child) {
  echo $child->getFullPath() . "<br>";
  if ($child->getType() == "folder") {
    $sublist = new Pimcore\Model\DataObject\Listing();
    $sublist->setCondition('o_parentId = ?', $child->getId());
    $sublist->setOrderKey([ 'o_index', 'o_key' ]);
    $sublist->setOrder('asc');
    foreach ($sublist as $subchild) {
      echo $subchild->getFullPath() . "<br>";
      $employees[] = $subchild;
    }
  } else {
    $employees[] = $child;
  }
}


?>


<!-- EMPLOYEECARDS/OBJECTS -->

<div class="employees-info">
  <?php if($this->editmode):
    echo $this->href('employees');
    else: ?>
<div class="employees">

<?php

foreach ($employees as $item) {
  $employees = $this->href('employees')->getElement();
  ?>
  <?php
    
  $image = $item->getImage();
  if($image instanceof \Pimcore\Model\Asset\Image):
  /** @var \Pimcore\Model\Asset\Image $Image */

  /*Output when registrer employee-object in Pimcore with image*/
  ?>
  <div class="employee_card">
    <?= $image->getThumbnail("employee_image")->getHTML(); ?>
    <div class="employee_text">
    <h3><?= $this->escape($item->getName()); ?></h3>
    <h5><?= $this->escape($item->getTitle()); ?></h5>
    <div class="contactinfo">
      <h5><i class="fa fa-phone"></i><?= $this->escape($item->getPhone()); ?></h5>
    	<h5><i class="fa fa-envelope-o"></i><?= strtolower($this->escape($item->getEpost())); ?></h5>
    </div>
    </div>
  </div>  
  <?php
  else:{
  /* Output if profilepicture is missing - Default image */
  $asset = \Pimcore\Model\Asset\Image::getByPath('/profilpictures/default-image.png');
  ?>
  <div class="employee_card">
    <?= $asset->getThumbnail("employee_image")->getHTML(); ?>
    <div class="employee_text">
    <h3><?= $this->escape($item->getName()); ?></h3>
    <h5><?= $this->escape($item->getTitle()); ?></h5>
    <div class="contactinfo">
    	<h5><i class="fa fa-phone"></i><?= $this->escape($item->getPhone()); ?></h5>
    	<h5><i class="fa fa-envelope-o"></i><?= strtolower($this->escape($item->getEpost())); ?></h5>
  	</div>
    </div>
  </div>
  <?php }
    endif; }?> 
	</div>
    <?php endif; ?>
</div>