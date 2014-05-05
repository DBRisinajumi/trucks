<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vsrv Services')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);
$cancel_button = $this->widget("bootstrap.widgets.TbButton", array(
    "icon" => "chevron-left",
    "size" => "large",
    "url" => (isset($_GET["returnUrl"])) ? $_GET["returnUrl"] : array("{$this->id}/admin"),
    "visible" => (Yii::app()->user->checkAccess("Trucks.VsrvServices.*") || Yii::app()->user->checkAccess("Trucks.VsrvServices.View")),
    "htmlOptions" => array(
        "class" => "search-button",
        "data-toggle" => "tooltip",
        "title" => Yii::t("TrucksModule.crud_static", "Cancel"),
    )
        ), TRUE);
?>
    <h1>
        <?php echo $cancel_button?>
        <i class="icon-wrench"></i>  
        <?php echo Yii::t('TrucksModule.model', 'Vsrv Services Create'); ?>
    </h1>

<?php 
$this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); 
?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group"></div>
<?php
echo $cancel_button;

$this->widget("bootstrap.widgets.TbButton", array(
                       "label"=>Yii::t("TrucksModule.crud_static","Save"),
                       "icon"=>"icon-thumbs-up icon-white",
                       "size"=>"large",
                       "type"=>"primary",
                       "htmlOptions"=> array(
                            "onclick"=>"$('.crud-form form').submit();",
                       ),
                       "visible"=> (Yii::app()->user->checkAccess("Trucks.VsrvServices.*") || Yii::app()->user->checkAccess("Trucks.VsrvServices.View"))
                    ));
?>
</div></div></div>