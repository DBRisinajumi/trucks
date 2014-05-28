<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes')
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
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.*") || Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.View")),
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
                <?php echo Yii::t('TrucksModule.model','Vtco Truc Odo Changes');?>                <small><?php echo$model->itemLabel?></small>
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
                    "submit"=>array("delete","vtco_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                    "confirm"=>Yii::t("TrucksModule.crud","Do you want to delete this item?")
                ),
                "visible"=> (Yii::app()->request->getParam("vtco_id")) && (Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.*") || Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.Delete"))
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
                'name' => 'vtco_vtrc_id',
                'type' => 'raw',    
                'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                            'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
                            'attribute' => 'vtco_vtrc_id',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
            ),

            array(
                'name' => 'vtco_vtro_id',
                'type' => 'raw',    
                'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                            'source' => CHtml::listData(VtroTruckOdometer::model()->findAll(array('limit' => 1000)), 'vtro_id', 'itemLabel'),                        
                            'attribute' => 'vtco_vtro_id',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
            ),

            array(
                'name' => 'vtco_datetime',
                'type' => 'raw',    
                'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'datetime',
                            'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                            'attribute' => 'vtco_datetime',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
            ),

            array(
                'name' => 'vtco_old_odo',
                'type' => 'raw',
                'value' => $this->widget(
                    'EditableField',
                    array(
                        'model' => $model,
                        'attribute' => 'vtco_old_odo',
                        'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    ),
                    true
                )
            ),

            array(
                'name' => 'vtco_new_odo',
                'type' => 'raw',
                'value' => $this->widget(
                    'EditableField',
                    array(
                        'model' => $model,
                        'attribute' => 'vtco_new_odo',
                        'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    ),
                    true
                )
            ),

            array(
                'name' => 'vtco_notes',
                'type' => 'raw',
                'value' => $this->widget(
                    'EditableField',
                    array(
                        'model' => $model,
                        'attribute' => 'vtco_notes',
                        'url' => $this->createUrl('/trucks/vtcoTrucOdoChanges/editableSaver'),
                    ),
                    true
                )
            ),
           ),
        )); ?>
    </div>
</div>

<?php echo $cancel_buton; ?>