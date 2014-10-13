<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h3>Client : <?php echo $client->fullname?> </h3>

<h5>History of changes. Field : phone</h5>

<?php
foreach($client_history as $k=>$v) {
    echo $k . ' --- ' . $v. PHP_EOL;
}
