<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtdt Truck Doc Type')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);

$this->breadcrumbs[Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types')] = array('admin');
$this->breadcrumbs[] = Yii::t('TrucksModule.crud_static', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('TrucksModule.model', 'Vtdt Truck Doc Type'); ?>
        <small><?php echo Yii::t('TrucksModule.crud_static', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>