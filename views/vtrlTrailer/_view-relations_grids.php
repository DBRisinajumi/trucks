
<?php Yii::beginProfile('vtrd_vtrl_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vtrd Trailer Doc') . ' '; 
        
    if (empty($modelMain->vtrdTrailerDocs)) {
        // if no records, reload page
        $button_type = 'Button';
        $no_ajax = 1;
        $ajaxOptions = array();
    } else {
        // ajax button
        $button_type = 'ajaxButton';
        $no_ajax = 0;
        $ajaxOptions = array(
                'success' => 'function(html) {$.fn.yiiGridView.update(\'vtrd-trailer-doc-grid\');}'
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
                '//trucks/vtrdTrailerDoc/ajaxCreate',
                'field' => 'vtrd_vtrl_id',
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
$model = new VtrdTrailerDoc();
$model->vtrd_vtrl_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vtrd-trailer-doc-grid',
        'dataProvider' => $model->search(),
        'template' => '{items}',
        'htmlOptions' => array('class'=>'grid-view-no-details'),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrd_vtdt_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    'source' => CHtml::listData(VtdtTruckDocType::model()->findAll(array('limit' => 1000)), 'vtdt_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(50)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrd_number',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrd_issue_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrd_expire_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrd_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtcd_fcrn_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    'source' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //decimal(10,2)
                'class' => 'editable.EditableColumn',
                'name' => 'vtcd_price',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrlTrailer.DeletevtrdTrailerDocs")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtrdTrailerDoc/delete", array("vtrd_id" => $data->vtrd_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VtrdTrailerDoc.view.grid'); ?>

<?php Yii::beginProfile('vtls_vtrl_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vtls Trailer Service') . ' '; 
        
    if (empty($modelMain->vtlsTrailerServices)) {
        // if no records, reload page
        $button_type = 'Button';
        $no_ajax = 1;
        $ajaxOptions = array();
    } else {
        // ajax button
        $button_type = 'ajaxButton';
        $no_ajax = 0;
        $ajaxOptions = array(
                'success' => 'function(html) {$.fn.yiiGridView.update(\'vtls-trailer-service-grid\');}'
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
                '//trucks/vtlsTrailerService/ajaxCreate',
                'field' => 'vtls_vtrl_id',
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
$model = new VtlsTrailerService();
$model->vtls_vtrl_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vtls-trailer-service-grid',
        'dataProvider' => $model->search(),
        'template' => '{items}',
        'htmlOptions' => array('class'=>'grid-view-no-details'),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_vsrv_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    'source' => CHtml::listData(VsrvServices::model()->sysCompany()->findAll(array('limit' => 1000)), 'vsrv_id', 'itemLabel'),                                            
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_start_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_end_date',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //decimal(10,2)
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_price',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtls_fcrn_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    'source' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),


            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrlTrailer.DeletevtlsTrailerServices")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtlsTrailerService/delete", array("vtls_id" => $data->vtls_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VtlsTrailerService.view.grid'); ?>
