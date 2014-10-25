<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtrc Truck')
        . ' - '
        . Yii::t('TrucksModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
?>

    <h1>
        <?php 
        $this->widget("bootstrap.widgets.TbButton", array(
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud_static","Cancel"),
                                   )
                    ));
        echo '&nbsp;<i class="icon-truck"></i>';
        echo '&nbsp;' . Yii::t('TrucksModule.model','Vtrc Truck');
        ?>
        <small>
            <?php echo $model->vtrc_car_reg_nr ?>
        </small>
    </h1>

<div class="row">
    <div class="span4">
        <?php
        $this->widget(
            'TbAceDetailView',
            array(
                'data' => $model,
                'attributes' => array(
    
            array(
                        'name' => 'vtrc_car_reg_nr',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_car_reg_nr',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtrc_year',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_year',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtrc_car_certificate_number',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_car_certificate_number',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtrc_self_weight',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_self_weight',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtrc_fuel_consumption',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_fuel_consumption',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtrc_year_mileage',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_year_mileage',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'vtrc_leased_from_cmmp_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_leased_from_cmmp_id',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                                'type' => 'select',
                                'source' => CHtml::listData(CcmpCompany::model()->userSysCompanyCompanies()->findAll(array('limit' => 1000)), 'ccmp_id', 'itemLabel'),                                   
                            ),
                            true
                        )
            
//            'value' => ($model->vtrcLeasedFromCmmp !== null)?CHtml::link(
//                            '<i class="icon icon-circle-arrow-left"></i> '.$model->vtrcLeasedFromCmmp->itemLabel,
//                            array('/trucks/ccmpCompany/view','ccmp_id' => $model->vtrcLeasedFromCmmp->ccmp_id),
//                            array('class' => '')).' '.CHtml::link(
//                            '<i class="icon icon-pencil"></i> ',
//                            array('/trucks/ccmpCompany/update','ccmp_id' => $model->vtrcLeasedFromCmmp->ccmp_id),
//                            array('class' => '')):'n/a',
//            'type' => 'html',
        ),
array(
                        'name' => 'vtrc_purchase_value',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_purchase_value',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'vtrc_abs_odo_calc_type',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'type' => 'select',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                                'source' => $model->getEnumFieldLabels('vtrc_abs_odo_calc_type'),
                                'attribute' => 'vtrc_abs_odo_calc_type',
                                //'placement' => 'right',
                            ),
                            true
                        )
                    ),                    
                    array(
                        'name' => 'vtrc_notes',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrc_notes',
                                'url' => $this->createUrl('/trucks/vtrcTruck/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); 
        
        $this->widget('d2FilesWidget',array('module'=>$this->module->id, 'model'=>$model)); 
        ?>        
    </div>


    <div class="span8">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model, 'ajax' => false,)); ?>
    </div>
</div>

<?php         
    $this->widget("bootstrap.widgets.TbButton", array(
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud_static","List"),
                                   )
                    ));
 ?>