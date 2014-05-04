<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vsrv Services')
        . ' - '
        . Yii::t('TrucksModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('TrucksModule.model','Vsrv Services')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('TrucksModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('TrucksModule.model','Vsrv Services')?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<div class="row">
    <div class="span12">
        <h2>
            <?php echo Yii::t('TrucksModule.crud_static','Data')?>            <small>
                #<?php echo $model->vsrv_id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'vsrv_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vsrv_id',
                                'url' => $this->createUrl('/trucks/vsrvServices/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'vsrv_sys_ccmp_id',
            'value' => ($model->vsrvSysCcmp !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->vsrvSysCcmp->itemLabel,
                            array('/trucks/ccmpCompany/view','ccmp_id' => $model->vsrvSysCcmp->ccmp_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/trucks/ccmpCompany/update','ccmp_id' => $model->vsrvSysCcmp->ccmp_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'vsrv_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vsrv_name',
                                'url' => $this->createUrl('/trucks/vsrvServices/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'vsrv_hidded',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'vsrv_hidded',
                                'url' => $this->createUrl('/trucks/vsrvServices/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    </div>
    <div class="row">

    <div class="span12">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
        <div class="well">
            <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>