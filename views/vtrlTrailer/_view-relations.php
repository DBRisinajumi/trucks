
<!--
<h2>
    <?php echo Yii::t('TrucksModule.crud', 'Relations') ?></h2>
-->


<?php 
        echo '<h3>';
            echo Yii::t('TrucksModule.model','relation.VvoyVoyages').' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//trucks/vvoyVoyage/admin','VvoyVoyage' => array('vvoy_vtrl_id' => $model->{$model->tableSchema->primaryKey}))
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//trucks/vvoyVoyage/create',
                    'VvoyVoyage' => array('vvoy_vtrl_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->vvoyVoyages(array('scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/trucks/vvoyVoyage/view', 'vvoy_id' => $relatedModel->vvoy_id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/trucks/vvoyVoyage/update', 'vvoy_id' => $relatedModel->vvoy_id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

