<?php
$this->setPageTitle(Yii::t('TrucksModule.model', 'Truck Odometers'));

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
             'visible'=>(Yii::app()->user->checkAccess('Trucks.VodoOdometer.*') || Yii::app()->user->checkAccess('Trucks.VodoOdometer.Create'))
        ));  
        ?>
</div>
        <div class="btn-group">
            <h1>
                <i class="icon-dashboard "></i>
                <?php echo Yii::t('TrucksModule.model', 'Truck Odometers');?>
            </h1>
        </div>
    </div>
</div>

<?php Yii::beginProfile('VodoOdometer.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vodo-odometer-grid',
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
                'name' => 'vodo_vtrc_id',
                'value' => '$data->vodoVtrc->itemLabel',
            ),
            array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vodo_type',
                    'editable' => array(
                        'type' => 'select',
                        'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        'source' => $model->getEnumFieldLabels('vodo_type'),
                        //'placement' => 'right',
                    ),
                   'filter' => $model->getEnumFieldLabels('vodo_type'),
                ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_start_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                ),
                'htmlOptions' => array(
                    'class' => 'numeric-column',
                ),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_start_datetime',
                'editable' => array(
                    'type' => 'datetime',
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_end_odo',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                ),
                'htmlOptions' => array(
                    'class' => 'numeric-column',
                ),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_end_datetime',
                'editable' => array(
                    'type' => 'datetime',
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_run',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                ),
                'htmlOptions' => array(
                    'class' => 'numeric-column',
                ),
            ),

            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_abs_ado',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                ),
                'htmlOptions' => array(
                    'class' => 'numeric-column',
                ),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'vodo_ref_model',
            ),
            /*            
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vodo_ref_id',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                    //'placement' => 'right',
                ),
                'htmlOptions' => array(
                    'class' => 'numeric-column',
                ),
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VodoOdometer.View")'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VodoOdometer.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vodo_id" => $data->vodo_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vodo_id" => $data->vodo_id))',
                'deleteConfirmation'=>Yii::t('TrucksModule.crud','Do you want to delete this item?'),                    
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('VodoOdometer.view.grid'); ?>