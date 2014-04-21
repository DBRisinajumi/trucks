<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtrl Trailer')
        . ' - '
        . Yii::t('TrucksModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
?>
    <h1>
        <?php echo Yii::t('TrucksModule.model','Vtrl Trailer')?>
    </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<div class="row">
    <div class="span12">

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(

                array(
                        'name' => 'vtrl_reg_nr',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrl_reg_nr',
                                'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            ),
                            true
                        )
                    ),
                array(
                        'name' => 'vtrl_year',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrl_year',
                                'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            ),
                            true
                        )
                    ),
                array(
                        'name' => 'vtrl_certificate_number',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrl_certificate_number',
                                'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            ),
                            true
                        )
                    ),
                array(
                        'name' => 'vtrl_self_weight',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrl_self_weight',
                                'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            ),
                            true
                        )
                    ),
                array(
                        'name' => 'vtrl_notes',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtrl_notes',
                                'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    </div>
    <div class="row">
    <?php 
    if(false){
?>    
    <div class="span12">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
        <div class="well">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model)); ?>        </div>
    </div>
    <?php    
    }
    ?>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>