
<!--
<h2>
    <?php echo Yii::t('TrucksModule.crud_static', 'Relations') ?></h2>
-->


<?php Yii::beginProfile('vtdc_vtrc_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vtdc Truck Doc') . ' '; 

    //spec parbauda, vai ir ieraksti
    $isRecords = FALSE;
    if(!empty($modelMain->vtdcTruckDocs)){
        foreach($modelMain->vtdcTruckDocs as $doc){
            if($doc->vtdc_deleted != 1){
                $isRecords = TRUE;
                break;
            }
        }
    }
    
    if (!$isRecords) {
        // if no records, reload page
        $button_type = 'Button';
        $no_ajax = 1;
        $ajaxOptions = array();
    } else {
        // ajax button
        $button_type = 'ajaxButton';
        $no_ajax = 0;
        $ajaxOptions = array(
                'success' => 'function(html) {$.fn.yiiGridView.update(\'vtdc-truck-doc-grid\');}'
            );        
    }
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => $button_type, 
            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'mini',
            'icon' => 'icon-plus',
            'url' => array(
                '//trucks/vtdcTruckDoc/ajaxCreate',
                'field' => 'vtdc_vtrc_id',
                'value' => $modelMain->primaryKey,
                'no_ajax' => $no_ajax,
            ),
            'ajaxOptions' => $ajaxOptions,
            'htmlOptions' => array(
                'title' => Yii::t('TrucksModule.crud_static', 'Add new record'),
                'data-toggle' => 'tooltip',
            ),                 
        )
    );        
    ?>
</h3> 
 
<?php 
$model = new VtdcTruckDoc();
$model->vtdc_vtrc_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vtdc-truck-doc-grid',
        'dataProvider' => $model->search(),
        'template' => '{items}',
        'htmlOptions' => array('class'=>'grid-view-no-details'),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_vtdt_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    'source' => CHtml::listData(VtdtTruckDocType::model()->findAll(array('limit' => 1000)), 'vtdt_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(50)
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_number',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_issue_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_expire_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtcd_fcrn_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    'source' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //decimal(10,2)
                'class' => 'editable.EditableColumn',
                'name' => 'vtcd_price',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),            

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtdcTruckDocs")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtdcTruckDoc/delete", array("vtdc_id" => $data->vtdc_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VtdcTruckDoc.view.grid'); ?>

<?php Yii::beginProfile('vtrs_vtrc_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vtrs Truck Service') . ' '; 
        
    if (empty($modelMain->vtrsTruckServices)) {
        // if no records, reload page
        $button_type = 'Button';
        $no_ajax = 1;
        $ajaxOptions = array();
    } else {
        // ajax button
        $button_type = 'ajaxButton';
        $no_ajax = 0;
        $ajaxOptions = array(
                'success' => 'function(html) {$.fn.yiiGridView.update(\'vtrs-truck-service-grid\');}'
            );        
    }
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => $button_type, 
            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'mini',
            'icon' => 'icon-plus',
            'url' => array(
                '//trucks/vtrsTruckService/ajaxCreate',
                'field' => 'vtrs_vtrc_id',
                'value' => $modelMain->primaryKey,
                'no_ajax' => $no_ajax,
            ),
            'ajaxOptions' => $ajaxOptions,
            'htmlOptions' => array(
                'title' => Yii::t('TrucksModule.crud_static', 'Add new record'),
                'data-toggle' => 'tooltip',
            ),                 
        )
    );        
    ?>
</h3> 
 
<?php 
$model = new VtrsTruckService();
$model->vtrs_vtrc_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vtrs-truck-service-grid',
        'dataProvider' => $model->search(),
        'template' => '{items}',
        'htmlOptions' => array('class'=>'grid-view-no-details'),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_vsrv_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    'source' => CHtml::listData(VsrvServices::model()->sysCompany()->findAll(array('limit' => 1000)), 'vsrv_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_start_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_end_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //decimal(10,2)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_price',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_fcrn_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    'source' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtrsTruckServices")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtrsTruckService/delete", array("vtrs_id" => $data->vtrs_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VtrsTruckService.view.grid'); ?>
