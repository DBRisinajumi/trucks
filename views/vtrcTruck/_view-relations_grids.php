<?php
if(!$ajax){
    Yii::app()->clientScript->registerCss('rel_grid',' 
            .rel-grid-view {margin-top:-60px;}
            .rel-grid-view div.summary {height: 60px;}
            ');     
}
?>

<?php
if(!$ajax || $ajax == 'vtdc-truck-doc-grid'){
    Yii::beginProfile('vtdc_vtrc_id.view.grid');
?>

<div class="table-header">
    <?=Yii::t('TrucksModule.model', 'Vtdc Truck Doc')?>
    <?php    
        
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'ajaxButton', 
            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'mini',
            'icon' => 'icon-plus',
            'url' => array(
                '//trucks/vtdcTruckDoc/ajaxCreate',
                'field' => 'vtdc_vtrc_id',
                'value' => $modelMain->primaryKey,
                'ajax' => 'vtdc-truck-doc-grid',
            ),
            'ajaxOptions' => array(
                    'success' => 'function(html) {$.fn.yiiGridView.update(\'vtdc-truck-doc-grid\');}'
                    ),
            'htmlOptions' => array(
                'title' => Yii::t('TrucksModule.crud', 'Add new record'),
                'data-toggle' => 'tooltip',
            ),                 
        )
    );        
    ?>
</div>
 
<?php 

    if (empty($modelMain->vtdcTruckDocs)) {
        $model = new VtdcTruckDoc;
        $model->vtdc_vtrc_id = $modelMain->primaryKey;
        $model->save();
        unset($model);
    } 
    
    $model = new VtdcTruckDoc();
    $model->vtdc_vtrc_id = $modelMain->primaryKey;

    // render grid view

    $this->widget('TbGridView',
        array(
            'id' => 'vtdc-truck-doc-grid',
            'dataProvider' => $model->search(),
            'template' => '{summary}{items}',
            'summaryText' => '&nbsp;',
            'htmlOptions' => array(
                'class' => 'rel-grid-view'
            ),            
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
//            array(
//                'class' => 'editable.EditableColumn',
//                'name' => 'vtdc_fixr_id',
//                'editable' => array(
//                    'type' => 'select',
//                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
//                    'source' => CHtml::listData(FixrFiitXRef::model()->findAll(array('limit' => 1000)), 'fixr_id', 'itemLabel'),
//                    //'placement' => 'right',
//                )
//            ),
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
                    'class' => 'TbButtonColumn',
                    'buttons' => array(
                        'view' => array('visible' => 'FALSE'),
                        'update' => array('visible' => 'FALSE'),
                        'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtdcTruckDocs")'),
                    ),
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtdcTruckDoc/delete", array("vtdc_id" => $data->vtdc_id))',
                    'deleteConfirmation'=>Yii::t('TrucksModule.crud','Do you want to delete this item?'),   
                    'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
                ),
            )
        )
    );
    ?>

<?php
    Yii::endProfile('vtdc_vtrc_id.view.grid');
}    
?>

<?php
if(!$ajax || $ajax == 'vtrs-truck-service-grid'){
    Yii::beginProfile('vtrs_vtrc_id.view.grid');
?>

<div class="table-header">
    <?=Yii::t('TrucksModule.model', 'Vtrs Truck Service')?>
    <?php    
        
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'ajaxButton', 
            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'mini',
            'icon' => 'icon-plus',
            'url' => array(
                '//trucks/vtrsTruckService/ajaxCreate',
                'field' => 'vtrs_vtrc_id',
                'value' => $modelMain->primaryKey,
                'ajax' => 'vtrs-truck-service-grid',
            ),
            'ajaxOptions' => array(
                    'success' => 'function(html) {$.fn.yiiGridView.update(\'vtrs-truck-service-grid\');}'
                    ),
            'htmlOptions' => array(
                'title' => Yii::t('TrucksModule.crud', 'Add new record'),
                'data-toggle' => 'tooltip',
            ),                 
        )
    );        
    ?>
</div>
 
<?php 

    if (empty($modelMain->vtrsTruckServices)) {
        $model = new VtrsTruckService;
        $model->vtrs_vtrc_id = $modelMain->primaryKey;
        $model->save();
        unset($model);
    } 
    
    $model = new VtrsTruckService();
    $model->vtrs_vtrc_id = $modelMain->primaryKey;

    // render grid view

    $this->widget('TbGridView',
        array(
            'id' => 'vtrs-truck-service-grid',
            'dataProvider' => $model->search(),
            'template' => '{summary}{items}',
            'summaryText' => '&nbsp;',
            'htmlOptions' => array(
                'class' => 'rel-grid-view'
            ),            
            'columns' => array(
                array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrs_vsrv_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
                    'source' => CHtml::listData(VsrvServices::model()->findAll(array('limit' => 1000)), 'vsrv_id', 'itemLabel'),
                    //'placement' => 'right',
                )
            ),
//            array(
//                //int(10) unsigned
//                'class' => 'editable.EditableColumn',
//                'name' => 'vtrs_fixr_id',
//                'editable' => array(
//                    'url' => $this->createUrl('//trucks/vtrsTruckService/editableSaver'),
//                    //'placement' => 'right',
//                )
//            ),
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
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtrsTruckServices")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtrsTruckService/delete", array("vtrs_id" => $data->vtrs_id))',
                'deleteConfirmation'=>Yii::t('TrucksModule.crud','Do you want to delete this item?'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
            )
        )
    );
    ?>

<?php
    Yii::endProfile('vtrs_vtrc_id.view.grid');
}

