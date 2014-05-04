<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Manage')
);
$create_button = $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("TrucksModule.crud_static","Create"),
                        "icon"=>"icon-plus",
                        "size"=>"large",
                        "type"=>"success",
                        "url"=>array("create"),
                        "visible"=>(Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.*") || Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.Create"))
                   ),TRUE);

?>

    <h1>
        <?php echo $create_button; ?>
        <?php echo Yii::t('TrucksModule.model', 'Vtdt Truck Doc Types Manage'); ?>
    </h1>

<?php Yii::beginProfile('VtdtTruckDocType.view.grid'); ?>

<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtdt-truck-doc-type-grid',
        'dataProvider' => $model->search(),
        'template' => '{items}',
        'columns' => array(
            array(
                //varchar(50)
                'class' => 'editable.EditableColumn',
                'name' => 'vtdt_name',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                //tinyint(3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtdt_hidded',
                'editable' => array(
                    'type'      => 'select',
                    'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                    'source'    => Editable::source(array(
                        0 => Yii::t('TrucksModule.model', 'Active'), 
                        1 => Yii::t('TrucksModule.model', 'Hidded'),
                     )),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.Delete")'),
                ),
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("vtdt_id" => $data->vtdt_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtdt_id" => $data->vtdt_id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtdtTruckDocType.view.grid'); ?>