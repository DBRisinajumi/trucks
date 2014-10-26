<?php
$this->setPageTitle(Yii::t('TrucksModule.model', 'Odometer reading'));    
$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VodoOdometer.*") || Yii::app()->user->checkAccess("Trucks.VodoOdometer.View")),
    "htmlOptions"=>array(
                    "class"=>"search-button",
                    "data-toggle"=>"tooltip",
                    "title"=>Yii::t("TrucksModule.crud","Back"),
                )
 ),true);
    
?>

<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"><?php echo $cancel_buton;?></div>
        <div class="btn-group">
            <h1>
                <i class="icon-dashboard "></i>
                <?php echo Yii::t('TrucksModule.model','Odometer reading');?>  
                
            </h1>
        </div>
        <div class="btn-group">
            <?php
            
            $this->widget("bootstrap.widgets.TbButton", array(
                "label"=>Yii::t("TrucksModule.crud","Delete"),
                "type"=>"danger",
                "icon"=>"icon-trash icon-white",
                "size"=>"large",
                "htmlOptions"=> array(
                    "submit"=>array("delete","vodo_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                    "confirm"=>Yii::t("TrucksModule.crud","Do you want to delete this item?")
                ),
                "visible"=> (Yii::app()->request->getParam("vodo_id")) && (Yii::app()->user->checkAccess("Trucks.VodoOdometer.*") || Yii::app()->user->checkAccess("Trucks.VodoOdometer.Delete"))
            ));
            ?>
        </div>
    </div>
</div>



<div class="row">
    <div class="span5">

        <?php
        $this->widget(
            'TbAceDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                


                array(
                    'name' => 'vodo_vtrc_id',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                            'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),
                            'attribute' => 'vodo_vtrc_id',
                            //'placement' => 'right',
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_type',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                            'source' => $model->getEnumFieldLabels('vodo_type'),
                            'attribute' => 'vodo_type',
                            //'placement' => 'right',
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_start_odo',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_start_odo',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_start_datetime',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'type' => 'datetime',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                            'attribute' => 'vodo_start_datetime',
                            //'placement' => 'right',
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_end_odo',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_end_odo',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_end_datetime',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'type' => 'datetime',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                            'attribute' => 'vodo_end_datetime',
                            //'placement' => 'right',
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_run',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_run',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_abs_odo',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_abs_odo',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_notes',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_notes',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_ref_model',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_ref_model',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vodo_ref_id',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vodo_ref_id',
                            'url' => $this->createUrl('/trucks/vodoOdometer/editableSaver'),
                        ),
                        true
                    )
                ),
           ),
        )); ?>
    </div>

</div>

<?php 
$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VodoOdometer.*") || Yii::app()->user->checkAccess("Trucks.VodoOdometer.View")),
    "htmlOptions"=>array(
                    "class"=>"search-button",
                    "data-toggle"=>"tooltip",
                    "title"=>Yii::t("TrucksModule.crud","Back"),
                )
 ),true);
echo $cancel_buton;