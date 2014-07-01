<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtdc Truck Doc')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);

$this->breadcrumbs[Yii::t('TrucksModule.model', 'Vtdc Truck Docs')] = array('admin');
$this->breadcrumbs[] = Yii::t('TrucksModule.crud_static', 'Create');
$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    #"label"=>Yii::t("TrucksModule.crud_static","Cancel"),
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.*") || Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.View")),
    "htmlOptions"=>array(
                    "class"=>"search-button",
                    "data-toggle"=>"tooltip",
                    "title"=>Yii::t("TrucksModule.crud_static","Cancel"),
                )
 ),true);
    
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"><?php echo $cancel_buton;?></div>
        <div class="btn-group">
            <h1>
                <i class=""></i>
                <?php echo Yii::t('TrucksModule.model','Create Vtdc Truck Doc');?>            </h1>
        </div>
    </div>
</div>

<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"><?php echo $cancel_buton;?></div>
        <div class="btn-group">
            
                <?php  
                    $this->widget("bootstrap.widgets.TbButton", array(
                       "label"=>Yii::t("TrucksModule.crud_static","Save"),
                       "icon"=>"icon-thumbs-up icon-white",
                       "size"=>"large",
                       "type"=>"primary",
                       "htmlOptions"=> array(
                            "onclick"=>"$('.crud-form form').submit();",
                       ),
                       "visible"=> (Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.*") || Yii::app()->user->checkAccess("Trucks.VtdcTruckDoc.View"))
                    )); 
                    ?>
                  
        </div>
    </div>
</div>