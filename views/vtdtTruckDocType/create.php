<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtdt Truck Doc Type')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);
$cancel_button =                    $this->widget("bootstrap.widgets.TbButton", array(
                       #"label"=>Yii::t("TrucksModule.crud_static","Cancel"),
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.*") || Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud_static","Cancel"),
                                   )
                    ),TRUE);
?>

    <h1>
        <?php echo $cancel_button; ?>
        <?php echo Yii::t('TrucksModule.model', 'Vtdt Truck Doc Type Create'); ?>
    </h1>

<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>

<?php echo $cancel_button;?>
&nbsp;
<?php 
$this->widget("bootstrap.widgets.TbButton", array(
    "label" => Yii::t("TrucksModule.crud_static", "Save"),
    "icon" => "icon-thumbs-up icon-white",
    "size" => "large",
    "type" => "primary",
    "htmlOptions" => array(
        "onclick" => "$('.crud-form form').submit();",
    ),
    "visible" => (Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.*") || Yii::app()->user->checkAccess("Trucks.VtdtTruckDocType.View"))
));
?>
