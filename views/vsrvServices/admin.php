<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vsrv Services')
    . ' - '
    . Yii::t('TrucksModule.crud_static', 'Manage')
);


?>

    <h1>
        <?php                    
            $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("TrucksModule.crud_static","Create"),
                        "icon"=>"icon-plus",
                        "size"=>"large",
                        "type"=>"success",
                        "url"=>array("create"),
                        "visible"=>(Yii::app()->user->checkAccess("Trucks.VsrvServices.*") || Yii::app()->user->checkAccess("Trucks.VsrvServices.Create"))
                   ));
        ?>
        <i class="icon-wrench"></i>  
        <?php echo Yii::t('TrucksModule.model', 'Vsrv Services Manage'); ?>
    </h1>

<?php Yii::beginProfile('VsrvServices.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vsrv-services-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                //varchar(256)
                'class' => 'editable.EditableColumn',
                'name' => 'vsrv_name',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vsrvServices/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                //tinyint(3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vsrv_hidded',
                'editable' => array(
                    'type'      => 'select',
                    'url' => $this->createUrl('/trucks/vsrvServices/editableSaver'),
                    'source'    => Editable::source(array(
                        0 => Yii::t('TrucksModule.model', 'Active'), 
                        1 => Yii::t('TrucksModule.model', 'Hidded'),
                     )),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VsrvServices.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VsrvServices.Delete")'),
                ),
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("vsrv_id" => $data->vsrv_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vsrv_id" => $data->vsrv_id))',
                'updateButtonOptions'=>array('data-toggle'=>'tooltip'),   
                'deleteButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('VsrvServices.view.grid'); ?>