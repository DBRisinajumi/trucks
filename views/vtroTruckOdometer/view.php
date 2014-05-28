<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtro Truck Odometer')
        . ' - '
        . Yii::t('TrucksModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    

$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    #"label"=>Yii::t("TrucksModule.crud","Cancel"),
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.*") || Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.View")),
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
                <i class="icon-tachometer"></i>
                <?php echo Yii::t('TrucksModule.model','Vtro Truck Odometer');?> 
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
                    "submit"=>array("delete","vtro_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                    "confirm"=>Yii::t("TrucksModule.crud","Do you want to delete this item?")
                ),
                "visible"=> (Yii::app()->request->getParam("vtro_id")) && (Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.*") || Yii::app()->user->checkAccess("Trucks.VtroTruckOdometer.Delete"))
            ));
            ?>
        </div>
    </div>
</div>



<div class="row">
    <div class="span5">
        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
            array(
                'name' => 'vtro_vtrc_id',
                'value' => $model->vtroVtrc->itemLabel,
            ),

            array(
                'name' => 'vtro_datetime',
                'type' => 'raw',    
                'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'datetime',
                            'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                            'attribute' => 'vtro_datetime',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
            ),

            array(
                'name' => 'vtro_odo',
                'type' => 'raw',
                'value' => $this->widget(
                    'EditableField',
                    array(
                        'model' => $model,
                        'attribute' => 'vtro_odo',
                        'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                    ),
                    true
                )
            ),

            array(
                'name' => 'vtro_abs_odo',
                'type' => 'raw',
                'value' => $this->widget(
                    'EditableField',
                    array(
                        'model' => $model,
                        'attribute' => 'vtro_abs_odo',
                        'url' => $this->createUrl('/trucks/vtroTruckOdometer/editableSaver'),
                    ),
                    true
                )
            ),
           ),
        )); ?>
    </div>

</div>

<?php echo $cancel_buton; ?>