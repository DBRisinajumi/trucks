<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes')
    . ' - '
    . Yii::t('TrucksModule.crud', 'Create')
);

$this->breadcrumbs[Yii::t('TrucksModule.model', 'Vtco Truc Odo Changes')] = array('admin');
$this->breadcrumbs[] = Yii::t('TrucksModule.crud', 'Create');
$cancel_buton = $this->widget("bootstrap.widgets.TbButton", array(
    #"label"=>Yii::t("TrucksModule.crud","Cancel"),
    "icon"=>"chevron-left",
    "size"=>"large",
    "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
    "visible"=>(Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.*") || Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.View")),
    "htmlOptions"=>array(
                    "class"=>"search-button",
                    "data-toggle"=>"tooltip",
                    "title"=>Yii::t("TrucksModule.crud","Cancel"),
                )
 ),true);
    
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?><div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"><?php echo $cancel_buton;?></div>
        <div class="btn-group">
            <h1>
                <i class="icon-tachometer"></i>
                <?php echo Yii::t('TrucksModule.model','Create Vtco Truc Odo Changes');?>            </h1>
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
                       "label"=>Yii::t("TrucksModule.crud","Save"),
                       "icon"=>"icon-thumbs-up icon-white",
                       "size"=>"large",
                       "type"=>"primary",
                       "htmlOptions"=> array(
                            "onclick"=>"$('.crud-form form').submit();",
                       ),
                       "visible"=> (Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.*") || Yii::app()->user->checkAccess("Trucks.VtcoTrucOdoChanges.View"))
                    )); 
                    ?>
                  
        </div>
    </div>
</div>