
<!--
<h2>
    <?php echo Yii::t('TrucksModule.crud_static', 'Relations') ?></h2>
-->


<?php Yii::beginProfile('vtdc_vtdt_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vtdc Truck Doc') . ' '; 
        
    if (empty($modelMain->vtdcTruckDocs)) {
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
                'field' => 'vtdc_vtdt_id',
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
$model->vtdc_vtdt_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vtdc-truck-doc-grid',
        'dataProvider' => $model->search(),
        #'responsiveTable' => true,
        'template' => '{items}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_vtrc_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
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
                'name' => 'vtdc_updated',
                'editable' => array(
                    'type' => 'date',
                    'url' => $this->createUrl('//trucks/vtdcTruckDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //tinyint(3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtdc_deleted',
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
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.DeletevtdcTruckDocs")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtdcTruckDoc/delete", array("vtdc_id" => $data->vtdc_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VtdcTruckDoc.view.grid'); ?>
