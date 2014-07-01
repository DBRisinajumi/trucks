<?php
    $this->setPageTitle(
        Yii::t('TrucksModule.model', 'Vtdc Truck Doc')
        . ' - '
        . Yii::t('TrucksModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('TrucksModule.model','Vtdc Truck Docs')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('TrucksModule.crud_static', 'View');
$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    #"label"=>Yii::t("TrucksModule.crud_static","Cancel"),
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.*") || Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.View")),
    "htmlOptions"=>array(
                    "class"=>"search-button",
                    "data-toggle"=>"tooltip",
                    "title"=>Yii::t("TrucksModule.crud_static","Back"),
                )
 ),true);
    
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"><?php echo $cancel_buton;?></div>
        <div class="btn-group">
            <h1>
                <i class=""></i>
                <?php echo Yii::t('TrucksModule.model','Vtdc Truck Doc');?>                <small><?php echo$model->itemLabel?></small>
            </h1>
        </div>
        <div class="btn-group">
            <?php
            
            $this->widget("bootstrap.widgets.TbButton", array(
                "label"=>Yii::t("TrucksModule.crud_static","Delete"),
                "type"=>"danger",
                "icon"=>"icon-trash icon-white",
                "size"=>"large",
                "htmlOptions"=> array(
                    "submit"=>array("delete","vtdc_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                    "confirm"=>Yii::t("TrucksModule.crud_static","Do you want to delete this item?")
                ),
                "visible"=> (Yii::app()->request->getParam("vtdc_id")) && (Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.*") || Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.Delete"))
            ));
            ?>
        </div>
    </div>
</div>



<div class="row">
    <div class="span12">
        <h2>
            <?php echo Yii::t('TrucksModule.crud_static','Data')?>            <small>
                #<?php echo $model->vtdc_id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                
                array(
                    'name' => 'vtdc_id',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vtdc_id',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vtdc_vtrc_id',
                    'type' => 'raw',    
                    'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                            'source' => CHtml::listData(VtrcTruck::model()->findAll(array('limit' => 1000)), 'vtrc_id', 'itemLabel'),                        
                            'attribute' => 'vtdc_vtrc_id',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
                ),

                array(
                    'name' => 'vtdc_vtdt_id',
                    'type' => 'raw',    
                    'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                            'source' => CHtml::listData(VtdtTruckDocType::model()->findAll(array('limit' => 1000)), 'vtdt_id', 'itemLabel'),                        
                            'attribute' => 'vtdc_vtdt_id',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
                ),

                array(
                    'name' => 'vtdc_fixr_id',
                    'type' => 'raw',    
                    'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'select',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                            'source' => CHtml::listData(FixrFiitXRef::model()->findAll(array('limit' => 1000)), 'fixr_id', 'itemLabel'),                        
                            'attribute' => 'vtdc_fixr_id',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
                ),

                array(
                    'name' => 'vtdc_number',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vtdc_number',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vtdc_issue_date',
                    'type' => 'raw',    
                    'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'date',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                            'attribute' => 'vtdc_issue_date',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
                ),

                array(
                    'name' => 'vtdc_expire_date',
                    'type' => 'raw',    
                    'value' => $this->widget(
                        'EditableField', 
                        array(
                            'model' => $model,
                            'type' => 'date',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                            'attribute' => 'vtdc_expire_date',
                            //'placement' => 'right',                                
                        ), 
                        true
                    )                   
                ),

                array(
                    'name' => 'vtdc_notes',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vtdc_notes',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
                        ),
                        true
                    )
                ),

                array(
                    'name' => 'vtdc_deleted',
                    'type' => 'raw',
                    'value' => $this->widget(
                        'EditableField',
                        array(
                            'model' => $model,
                            'attribute' => 'vtdc_deleted',
                            'url' => $this->createUrl('/trucks/vtdcTruckDoc/editableSaver'),
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
        <?php $this->renderPartial('_view-relations_grids',array('modelMain' => $model, 'ajax' => false,)); ?>    </div>
</div>

<?php echo $cancel_buton; ?>