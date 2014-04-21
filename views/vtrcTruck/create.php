<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrc Truck')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);

?>

    <h1>
        <?php echo Yii::t('TrucksModule.model', 'Vtrc Truck Create'); ?>
    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>