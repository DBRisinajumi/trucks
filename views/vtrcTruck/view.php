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
        <?php echo Yii::t('TrucksModule.model','Vtrc Truck')?>
        <small>
            <?php echo $model->vtrc_car_reg_nr ?>
        </small>
    </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<div class="row">
    <div class="span7">
        <?php
        $this->widget(
            'TbDetailView',
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
            'value' => ($model->vtrcLeasedFromCmmp !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->vtrcLeasedFromCmmp->itemLabel,
                            array('/trucks/ccmpCompany/view','ccmp_id' => $model->vtrcLeasedFromCmmp->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/trucks/ccmpCompany/update','ccmp_id' => $model->vtrcLeasedFromCmmp->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
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
        )); ?>
    </div>


    <div class="span5">
        <div class="well">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>