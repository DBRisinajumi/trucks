<?php
if (!$ajax) {
    Yii::app()->clientScript->registerCss('rel_grid', ' 
            .rel-grid-view {margin-top:-60px;}
            .rel-grid-view div.summary {height: 60px;}
            ');
}
if (!$ajax || $ajax == 'vtls-trailer-service-grid') {
    Yii::beginProfile('vtls_vtrl_id.view.grid');

    $grid_error = '';
    $grid_warning = '';
    ?>

    <div class="table-header">
        <?= Yii::t('TrucksModule.model', 'Vtls Trailer Service') ?>
    </div>

    <?php
    if (empty($modelMain->vtlsTrailerServices)) {
        $grid_warning = Yii::t('TrucksModule.model', 'Trailer services add by attaching it to Invoice items as expense position!');
    }

    if (!empty($grid_error)) {
        ?>
        <div class="alert alert-error"><?php echo $grid_error ?></div>
        <?php
    }

    if (!empty($grid_warning)) {
        ?>
        <div class="alert alert-warning"><?php echo $grid_warning ?></div>
        <?php
    }
    if (!empty($modelMain->vtlsTrailerServices)) {
        $model = new VtlsTrailerService();
        $model->vtls_vtrl_id = $modelMain->primaryKey;

        // render grid view

        $this->widget('TbGridView', array(
            'id' => 'vtls-trailer-service-grid',
            'dataProvider' => $model->search(),
            'template' => '{summary}{items}',
            'summaryText' => '&nbsp;',
            'htmlOptions' => array(
                'class' => 'rel-grid-view'
            ),
            'columns' => array(
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtls_vsrv_id',
                    'editable' => array(
                        'type' => 'select',
                        'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                        'source' => CHtml::listData(VsrvServices::model()->findAll(array('limit' => 1000)), 'vsrv_id', 'itemLabel'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtls_notes',
                    'editable' => array(
                        'type' => 'textarea',
                        'url' => $this->createUrl('//trucks/vtlsTrailerService/editableSaver'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'header' => Yii::t('TrucksModule.model','Exp.Postion'),
                    'type' => 'raw',
                    'value' => '!empty($data->vtls_fixr_id)?
                                    $data->vtlsFixr->fixrFiit->fiitFinv->finv_number.
                                    "&nbsp;".
                                    CHtml::link(
                                        "<i class=\"icon-external-link\"></i>",
                                        array(
                                            "/d2fixr/FixrFiitXRef/viewFinv",
                                            "finv_id"=>$data->vtlsFixr->fixrFiit->fiit_finv_id
                                        ),
                                        array("target" => "_blank")
                                    )
                                    :"-"'
                ),                     
//                array(
//                    'class' => 'TbButtonColumn',
//                    'buttons' => array(
//                        'view' => array('visible' => 'FALSE'),
//                        'update' => array('visible' => 'FALSE'),
//                        'delete' => array('visible' => 'Yii::app()->user->checkAccess("Trucks.VtrlTrailer.DeletevtlsTrailerServices")'),
//                    ),
//                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtlsTrailerService/delete", array("vtls_id" => $data->vtls_id))',
//                    'deleteConfirmation' => Yii::t('TrucksModule.crud', 'Do you want to delete this item?'),
//                    'deleteButtonOptions' => array('data-toggle' => 'tooltip'),
//                ),
            )
                )
        );
    }

    Yii::endProfile('vtls_vtrl_id.view.grid');
}

if (!$ajax || $ajax == 'vtrd-trailer-doc-grid') {
    Yii::beginProfile('vtrd_vtrl_id.view.grid');

    $grid_error = '';
    $grid_warning = '';
    
    if (empty($modelMain->vtrdTrailerDocs)) {
        $model = new VtrdTrailerDoc;
        $model->vtrd_vtrl_id = $modelMain->primaryKey;
        if(!$model->save()){
            $grid_error .= implode('<br/>',$model->errors);
        }
        unset($model);
    } 
    ?>

    <div class="table-header">
    <?php 
        echo Yii::t('TrucksModule.model', 'Vtrd Trailer Doc');
        $this->widget(
              'bootstrap.widgets.TbButton',
              array(
                  'buttonType' => 'ajaxButton', 
                  'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                  'size' => 'mini',
                  'icon' => 'icon-plus',
                  'url' => array(
                      '//trucks/vtrdTrailerDoc/ajaxCreate',
                      'field' => 'vtrd_vtrl_id',
                      'value' => $modelMain->primaryKey,
                      'ajax' => 'vtrd-trailer-doc-grid',
                  ),
                  'ajaxOptions' => array(
                          'success' => 'function(html) {$.fn.yiiGridView.update(\'vtrd-trailer-doc-grid\');}'
                          ),
                  'htmlOptions' => array(
                      'title' => Yii::t('TrucksModule.crud', 'Add new record'),
                      'data-toggle' => 'tooltip',
                  ),                 
              )
          );                
    ?>
    </div>

        <?php
        if (empty($modelMain->vtrdTrailerDocs)) {
            $grid_warning = Yii::t('TrucksModule.model', 'Trailer documents add by attaching it to Invoice items as expense position!');
        }

        if (!empty($grid_error)) {
            ?>
        <div class="alert alert-error"><?php echo $grid_error ?></div>
        <?php
    }

    if (!empty($grid_warning)) {
        ?>
        <div class="alert alert-warning"><?php echo $grid_warning ?></div>
        <?php
    }

        $model = new VtrdTrailerDoc();
        $model->vtrd_vtrl_id = $modelMain->primaryKey;

        // render grid view

        $this->widget('TbGridView', array(
            'id' => 'vtrd-trailer-doc-grid',
            'dataProvider' => $model->search(),
            'template' => '{summary}{items}',
            'summaryText' => '&nbsp;',
            'htmlOptions' => array(
                'class' => 'rel-grid-view'
            ),
            'columns' => array(
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtrd_vtdt_id',
                    'editable' => array(
                        'type' => 'select',
                        'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                        'source' => CHtml::listData(VtdtTruckDocType::model()->findAll(array('limit' => 1000)), 'vtdt_id', 'itemLabel'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'header' => Yii::t('TrucksModule.model','Exp.Postion'),
                    'type' => 'raw',
                    'value' => '!empty($data->vtrd_fixr_id)?
                                    $data->vtrdFixr->fixrFiit->fiitFinv->finv_number.
                                    "&nbsp;".
                                    CHtml::link(
                                        "<i class=\"icon-external-link\"></i>",
                                        array(
                                            "/d2fixr/FixrFiitXRef/viewFinv",
                                            "finv_id"=>$data->vtrdFixr->fixrFiit->fiit_finv_id
                                        ),
                                        array("target" => "_blank")
                                    )
                                    :"-"'
                
                ),                
                array(
                    //varchar(50)
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtrd_number',
                    'editable' => array(
                        'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtrd_issue_date',
                    'editable' => array(
                        'type' => 'date',
                        'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtrd_expire_date',
                    'editable' => array(
                        'type' => 'date',
                        'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vtrd_notes',
                    'editable' => array(
                        'type' => 'textarea',
                        'url' => $this->createUrl('//trucks/vtrdTrailerDoc/editableSaver'),
                    //'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'TbButtonColumn',
                    'buttons' => array(
                        'view' => array('visible' => 'FALSE'),
                        'update' => array('visible' => 'FALSE'),
                        'delete' => array('visible' => 'empty($data->vtrd_fixr_id) && Yii::app()->user->checkAccess("Trucks.VtrlTrailer.DeletevtrdTrailerDocs")'),
                    ),
                    'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/trucks/vtrdTrailerDoc/delete", array("vtrd_id" => $data->vtrd_id))',
                    'deleteConfirmation' => Yii::t('TrucksModule.crud', 'Do you want to delete this item?'),
                    'deleteButtonOptions' => array('data-toggle' => 'tooltip'),
                ),
            )
                )
        );

    Yii::endProfile('vtrd_vtrl_id.view.grid');
}    
