<?php
if (!$ajax) {
    Yii::app()->clientScript->registerCss('rel_grid', ' 
            .rel-grid-view {margin-top:-60px;}
            .rel-grid-view div.summary {height: 60px;}
            ');
}

if (!$ajax || $ajax == 'vtdc-truck-doc-grid') {
    Yii::beginProfile('vtdc_vtrc_id.view.grid');
    
    $grid_error = '';
    $grid_warning = '';
    
    if (empty($modelMain->vtdcTruckDocs)) {
        $model = new VtdcTruckDoc;
        $model->vtdc_vtrc_id = $modelMain->primaryKey;
        if(!$model->save()){
            $grid_error .= implode('<br/>',$model->errors);
        }
        unset($model);
    }       
    ?>

    <div class="table-header">
        <?php 
            echo Yii::t('TrucksModule.model', 'Vtdc Truck Doc');
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
        $grid_warning = Yii::t('TrucksModule.model', 'Truck documents add by attaching it to Invoice items as expense position!');
    }    
    
    if (!empty($grid_error)) {
        ?>
        <div class="alert alert-error"><?php echo $grid_error ?></div>
        <?php
    }

    if (!empty($grid_warning)) {
        ?>
        <div class="alert alert-warning"><?php echo $grid_warning ?></div>
        <?php
    }    

    // render grid view
    //if (!empty($modelMain->vtdcTruckDocs)) {
        
        $model = new VtdcTruckDoc();
        $model->vtdc_vtrc_id = $modelMain->primaryKey;

        $this->widget('TbGridView', array(
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
                    'header' => Yii::t('TrucksModule.model','Exp.Postion'),
                    'type' => 'raw',
                    'value' => '!empty($data->vtdc_fixr_id)?
                                    $data->vtdcFixr->fixrFiit->fiitFinv->finv_number.
                                    "&nbsp;".
                                    CHtml::link(
                                        "<i class=\"icon-external-link\"></i>",
                                        array(
                                            "/d2fixr/FixrFiitXRef/viewFinv",
                                            "finv_id"=>$data->vtdcFixr->fixrFiit->fiit_finv_id
                                        ),
                                        array("target" => "_blank")
                                    )
                                    :"-"'

                ),                
                array(
                    'class' => 'TbButtonColumn',
                    'buttons' => array(
                        'view' => array('visible' => 'FALSE'),
                        'update' => array('visible' => 'FALSE'),
                        'delete' => array('visible' => 'empty($data->vtdc_fixr_id) && Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtdcTruckDocs")'),
                    ),
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtdcTruckDoc/delete", array("vtdc_id" => $data->vtdc_id))',
                    'deleteConfirmation' => Yii::t('TrucksModule.crud', 'Do you want to delete this item?'),
                    'deleteButtonOptions' => array('data-toggle' => 'tooltip'),
                ),
            )
                )
        );
    }
    Yii::endProfile('vtdc_vtrc_id.view.grid');
//}

if (!$ajax || $ajax == 'vtrs-truck-service-grid') {
    Yii::beginProfile('vtrs_vtrc_id.view.grid');
    
    $grid_error = '';
    $grid_warning = '';
    
    if (empty($modelMain->vtrsTruckServices)) {
        $model = new VtrsTruckService;
        $model->vtrs_vtrc_id = $modelMain->primaryKey;
        if(!$model->save()){
            $grid_error .= implode('<br/>',$model->errors);
        }
        unset($model);
    }      
    
    if (empty($modelMain->vtrsTruckServices)) {
        $grid_warning = Yii::t('TrucksModule.model', 'Truck services add by attaching it to Invoice items as expense position!');
    }    
    
    ?>
    <div class="table-header">
        <?
        echo Yii::t('TrucksModule.model', 'Vtrs Truck Service');
    ?>
    </div>

    <?php
    
    if (!empty($grid_error)) {
        ?>
        <div class="alert alert-error"><?php echo $grid_error ?></div>
        <?php
    }

    if (!empty($grid_warning)) {
        ?>
        <div class="alert alert-warning"><?php echo $grid_warning ?></div>
        <?php
    }    
   
    // render grid view
//    if (!empty($modelMain->vtrsTruckServices)) {
        $model = new VtrsTruckService();
        $model->vtrs_vtrc_id = $modelMain->primaryKey;
        
        $this->widget('TbGridView', array(
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
                    'header' => Yii::t('TrucksModule.model','Exp.Postion'),
                    'type' => 'raw',
                    'value' => '!empty($data->vtrs_fixr_id)?
                                    $data->vtrsFixr->fixrFiit->fiitFinv->finv_number.
                                    "&nbsp;".
                                    CHtml::link(
                                        "<i class=\"icon-external-link\"></i>",
                                        array(
                                            "/d2fixr/FixrFiitXRef/viewFinv",
                                            "finv_id"=>$data->vtrsFixr->fixrFiit->fiit_finv_id
                                        ),
                                        array("target" => "_blank")
                                    )
                                    :"-"'
                
                ),                
                array(
                    'class' => 'TbButtonColumn',
                    'buttons' => array(
                        'view' => array('visible' => 'FALSE'),
                        'update' => array('visible' => 'FALSE'),
                        'delete' => array('visible' => 'empty($data->vtrs_fixr_id) && Yii::app()->user->checkAccess("Trucks.VtrcTruck.DeletevtrsTruckServices")'),
                    ),
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtrsTruckService/delete", array("vtrs_id" => $data->vtrs_id))',
                    'deleteConfirmation' => Yii::t('TrucksModule.crud', 'Do you want to delete this item?'),
                    'deleteButtonOptions' => array('data-toggle' => 'tooltip'),
                ),
            )
                )
        );
    }
    Yii::endProfile('vtrs_vtrc_id.view.grid');
//}

