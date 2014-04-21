<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrl Trailer')
    . ' - '
    . Yii::t('TrucksModule.crud', 'Create')
);


?>
    <h1>
        <?php echo Yii::t('TrucksModule.model', 'Vtrl Trailer Create'); ?>
    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>