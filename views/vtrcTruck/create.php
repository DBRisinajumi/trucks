<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrc Truck')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Create')
);

?>

    <h1>
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud_static","Cancel"),
                                   )
                    ));
        echo '&nbsp;<i class="icon-truck"></i>';                       
        ?>
        <?php echo Yii::t('TrucksModule.model', 'Vtrc Truck Create'); ?>
    </h1>

<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("TrucksModule.crud_static","Cancel"),
                                   )
                    ));
        $this->widget("bootstrap.widgets.TbButton", array(
           "label"=>Yii::t("TrucksModule.crud_static","Save"),
           "icon"=>"icon-thumbs-up icon-white",
           "size"=>"large",
           "type"=>"primary",
           "htmlOptions"=> array(
                "onclick"=>"$('.crud-form form').submit();",
           ),
           "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrcTruck.*") || Yii::app()->user->checkAccess("Trucks.VtrcTruck.View"))
        ));                       
        ?>
