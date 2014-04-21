
<!--
<h2>
    <?php echo Yii::t('TrucksModule.crud', 'Relations') ?></h2>
-->


<?php Yii::beginProfile('vvoy_vtrl_id.view.grid'); ?>
<h3>
    <?php 
    echo Yii::t('TrucksModule.model', 'Vvoy Voyage') . ' '; 
        
    if (empty($modelMain->vvoyVoyages)) {
        // if no records, reload page
        $button_type = 'Button';
        $no_ajax = 1;
        $ajaxOptions = array();
    } else {
        // ajax button
        $button_type = 'ajaxButton';
        $no_ajax = 0;
        $ajaxOptions = array(
                'success' => 'function(html) {$.fn.yiiGridView.update(\'vvoy-voyage-grid\');}'
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
                '//trucks/vvoyVoyage/ajaxCreate',
                'field' => 'vvoy_vtrl_id',
                'value' => $modelMain->primaryKey,
                'no_ajax' => $no_ajax,
            ),
            'ajaxOptions' => $ajaxOptions,
            'htmlOptions' => array(
                'title' => Yii::t('TrucksModule.crud', 'Add new record'),
                'data-toggle' => 'tooltip',
            ),                 
        )
    );        
    ?>
</h3> 
 
<?php 
$model = new VvoyVoyage();
$model->vvoy_vtrl_id = $modelMain->primaryKey;

// render grid view

$this->widget('TbGridView',
    array(
        'id' => 'vvoy-voyage-grid',
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
                'name' => 'vvoy_ccmp_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    'source' => CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //char(20)
                'class' => 'editable.EditableColumn',
                'name' => 'vvoy_number',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vvoy_vtrc_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vvoy_stst_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    'source' => CHtml::listData(StstState::model()->findAll(array('limit' => 1000)), 'stst_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vvoy_fcrn_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    'source' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'vvoy_start_date',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'vvoy_end_date',
                'editable' => array(
                    'url' => $this->createUrl('//trucks/vvoyVoyage/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrlTrailer.DeletevvoyVoyages")'),
                ),
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vvoyVoyage/delete", array("vvoy_id" => $data->vvoy_id))',
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),                    
            ),
        )
    )
);
?>

<?php Yii::endProfile('VvoyVoyage.view.grid'); ?>
