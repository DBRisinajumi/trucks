<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtrl Trailer')
        . ' - '
        . Yii::t('TrucksModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    

$cancel_button = $this->widget("bootstrap.widgets.TbButton", array(
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrlTrailer.*") || Yii::app()->user->checkAccess("Trucks.VtrlTrailer.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud","Cancel"),
                                   )
                    ),TRUE);
    
?>
    <h1>
        <?php echo $cancel_button?>
        <?php echo Yii::t('TrucksModule.model','Vtrl Trailer')?>
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
                    'name' => 'vtrl_vtrt_id',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                            'source' => CHtml::listData(VtrtTrailerType::model()->findAll(array('limit' => 1000)), 'vtrt_id', 'vtrt_name'),
                            'attribute' => 'vtrl_vtrt_id',
                            //'placement' => 'right',
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
        ));
        ?>
        <div class="space-12"></div>            
        <?php        
        $this->widget('d2FilesWidget',array('module'=>$this->module->id, 'model'=>$model)); 
        ?>
    </div>

    <div class="span8">
         <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model, 'ajax' => false,)); ?>    
    </div>         

</div>

<?php echo $cancel_button;
