<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrc Trucks')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Manage')
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'vtrc-truck-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>


    <h1>
        <?php 
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("TrucksModule.crud_static", "Create"),
            "icon" => "icon-plus",
            "size" => "large",
            "type" => "success",
            "url" => array("create"),
            "visible" => (Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.Create"))
        ));
        ?>   
        <i class="icon-truck"></i>      
        <?php echo Yii::t('TrucksModule.model', 'Vtrc Trucks Manage'); ?>
    </h1>
s
<?php Yii::beginProfile('VtrcTruck.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtrc-truck-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                //char(20)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_car_reg_nr',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //smallint(6)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_year',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(100)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_car_certificate_number',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //float(5,3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_self_weight',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //float(3,1)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_fuel_consumption',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //smallint(5) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_year_mileage',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_leased_from_cmmp_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    'source' => CHtml::listData(CcmpCompany::model()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),                        
                    //'placement' => 'right',
                )
            ),
            array(
                //float(8,2) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_purchase_value',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrc_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrcTruck.View")'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'FALSE'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vtrc_id" => $data->vtrc_id))',
                //'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("vtrc_id" => $data->vtrc_id))',
                //'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtrc_id" => $data->vtrc_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),       
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtrcTruck.view.grid'); ?>