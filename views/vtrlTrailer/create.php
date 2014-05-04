<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrl Trailer')
    . ' - '
    . Yii::t('TrucksModule.crud', 'Create')
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

        <?php echo $cancel_button; ?>
        <?php echo Yii::t('TrucksModule.model', 'Vtrl Trailer Create'); ?>
    </h1>

<?php 
$this->renderPartial('_form', array('model' => $model, 'buttons' => 'create'));
echo $cancel_button . ' ';
$this->widget("bootstrap.widgets.TbButton", array(
   "label"=>Yii::t("TrucksModule.crud","Save"),
   "icon"=>"icon-thumbs-up icon-white",
   "size"=>"large",
   "type"=>"primary",
   "htmlOptions"=> array(
        "onclick"=>"$('.crud-form form').submit();",
   ),
   "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrlTrailer.*") || Yii::app()->user->checkAccess("Trucks.VtrlTrailer.View"))
));