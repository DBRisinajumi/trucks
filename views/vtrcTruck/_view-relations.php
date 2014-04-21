
<!--
<h2>
    <?php echo Yii::t('TrucksModule.crud_static', 'Relations') ?></h2>
-->


<?php 
        echo '<h3>';
            echo Yii::t('TrucksModule.model','relation.VtdcTruckDocs').' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//trucks/vtdcTruckDoc/admin','VtdcTruckDoc' => array('vtdc_vtrc_id' => $model->{$model->tableSchema->primaryKey}))
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//trucks/vtdcTruckDoc/create',
                    'VtdcTruckDoc' => array('vtdc_vtrc_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->vtdcTruckDocs(array('scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/trucks/vtdcTruckDoc/view', 'vtdc_id' => $relatedModel->vtdc_id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/trucks/vtdcTruckDoc/update', 'vtdc_id' => $relatedModel->vtdc_id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

