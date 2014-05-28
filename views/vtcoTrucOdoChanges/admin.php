<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes')
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
             'visible'=>(Yii::app()->user->checkAccess('Trucks.VtcoTrucOdoChanges.*') || Yii::app()->user->checkAccess('Trucks.VtcoTrucOdoChanges.Create'))
        ));  
        ?>
</div>
        <div class="btn-group">
            <h1>
                <i class="icon-tachometer"></i>
                <?php echo Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes');?>            </h1>
        </div>
    </div>
</div>

<?php Yii::beginProfile('VtcoTrucOdoChanges.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtco-truc-odo-changes-grid',
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
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_vtrc_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_vtro_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    'source' => CHtml::listData(VtroTruckOdometer::model()->findAll(array('limit' => 1000)), 'vtro_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'vtco_datetime',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_old_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_new_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.View")'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vtco_id" => $data->vtco_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtco_id" => $data->vtco_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtcoTrucOdoChanges.view.grid'); ?>