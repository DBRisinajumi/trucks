<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtro Truck Odometers')
    . ' - '
    . Yii::t('TrucksModule.crud', 'Manage')
);

?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group">
        <?php 
        $this->widget('bootstrap.widgets.TbButton', array(
             'label'=>Yii::t('TrucksModule.crud','Create'),
             'icon'=>'icon-plus',
             'size'=>'large',
             'type'=>'success',
             'url'=>array('create'),
             'visible'=>(Yii::app()->user->checkAccess('Trucks.VtroTruckOdometer.*') || Yii::app()->user->checkAccess('Trucks.VtroTruckOdometer.Create'))
        ));  
        ?>
</div>
        <div class="btn-group">
            <h1>
                <i class="icon-tachometer"></i>
                <?php echo Yii::t('TrucksModule.model', 'Vtro Truck Odometers');?>            </h1>
        </div>
    </div>
</div>

<?php Yii::beginProfile('VtroTruckOdometer.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtro-truck-odometer-grid',
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
                'name' => 'vtro_vtrc_id',
                'value' => '$data->vtroVtrc->itemLabel'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'vtro_datetime',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtro_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtro_abs_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.View")'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vtro_id" => $data->vtro_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtro_id" => $data->vtro_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtroTruckOdometer.view.grid'); ?>