<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Manage')
);

$this->breadcrumbs[] = Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'vtdt-truck-doc-type-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types'); ?>
        <small><?php echo Yii::t('TrucksModule.crud_static', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('VtdtTruckDocType.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtdt-truck-doc-type-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("vtdt_id" => $data["vtdt_id"]))'
            ),
            array(
                //tinyint(3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtdt_id',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(50)
                'class' => 'editable.EditableColumn',
                'name' => 'vtdt_name',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //tinyint(3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtdt_hidded',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vtdt_id" => $data->vtdt_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("vtdt_id" => $data->vtdt_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtdt_id" => $data->vtdt_id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtdtTruckDocType.view.grid'); ?>