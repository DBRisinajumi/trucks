<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtdt Truck Doc Type')
        . ' - '
        . Yii::t('TrucksModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('TrucksModule.model','Vtdt Truck Doc Types')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('TrucksModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('TrucksModule.model','Vtdt Truck Doc Type')?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('TrucksModule.crud_static','Data')?>            <small>
                #<?php echo $model->vtdt_id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'vtdt_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtdt_id',
                                'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtdt_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtdt_name',
                                'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vtdt_hidded',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vtdt_hidded',
                                'url' => $this->createUrl('/trucks/vtdtTruckDocType/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>


    <div class="span5">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
        <div class="well">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>