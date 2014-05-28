<?php
if(!$ajax){
    Yii::app()->clientScript->registerCss('rel_grid',' 
            h3.rel_grid{padding-left: 40px;}
            ');     
}
?>
<?php
if(!$ajax || $ajax == 'vtco-truc-odo-changes-grid'){
    Yii::beginProfile('vtco_vtro_id.view.grid');
?>

<h3 class="rel_grid">    
    <?=Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes')?>
  
</h3> 
 
<?php 
    
    $model = new VtcoTrucOdoChanges();
    $model->vtco_vtro_id = $modelMain->primaryKey;

    // render grid view

    $this->widget('TbGridView',
        array(
            'id' => 'vtco-truc-odo-changes-grid',
            'dataProvider' => $model->search(),
            'template' => '{summary}{items}',
            'summaryText' => '&nbsp;',
            'columns' => array(
                array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_vtrc_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtcoTrucOdoChanges/editableSaver'),
                    'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'vtco_datetime',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_old_odo',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //int(10) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_new_odo',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtco_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('//trucks/vtcoTrucOdoChanges/editableSaver'),
                    //'placement' => 'right',
                )
            ),

                array(
                    'class' => 'TbButtonColumn',
                    'buttons' => array(
                        'view' => array('visible' => 'FALSE'),
                        'update' => array('visible' => 'FALSE'),
                        'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.DeletevtcoTrucOdoChanges")'),
                    ),
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtcoTrucOdoChanges/delete", array("vtco_id" => $data->vtco_id))',
                    'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
                ),
            )
        )
    );
    ?>

<?php
    Yii::endProfile('VtcoTrucOdoChanges.view.grid');
}    
?>
