<?php
$this->setPageTitle(
    Yii::t('TrucksModule.model', 'Vtrl Trailers')
    . ' - '
    . Yii::t('TrucksModule.crud', 'Manage')
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'vtrl-trailer-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

    <h1>
        <?php $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("TrucksModule.crud","Create"),
                        "icon"=>"icon-plus",
                        "size"=>"large",
                        "type"=>"success",
                        "url"=>array("create"),
                        "visible"=>(Yii::app()->user->checkAccess("Trucks.VtrlTrailer.*") || Yii::app()->user->checkAccess("Trucks.VtrlTrailer.Create"))
                   ));
;?>
        <?php echo Yii::t('TrucksModule.model', 'Vtrl Trailers Manage'); ?>
    </h1>

<?php Yii::beginProfile('VtrlTrailer.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'vtrl-trailer-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                //char(20)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrl_reg_nr',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                    'placement' => 'right',
                )
            ),
            array(
                //smallint(5) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtrl_year',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //varchar(100)
                'class' => 'editable.EditableColumn',
                'name' => 'vtrl_certificate_number',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                //float(5,3) unsigned
                'class' => 'editable.EditableColumn',
                'name' => 'vtrl_self_weight',
                'editable' => array(
                    'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'vtrl_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/trucks/vtrlTrailer/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrlTrailer.View")'),
                    'update' => array('visible' => 'false'),
                    'delete' => array('visible' => 'false'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("vtrl_id" => $data->vtrl_id))',
                //'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("vtrl_id" => $data->vtrl_id))',
                //'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("vtrl_id" => $data->vtrl_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),                       
            ),
        )
    )
);
?>
<?php Yii::endProfile('VtrlTrailer.view.grid'); ?>