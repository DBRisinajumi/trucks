<div class="crud-form">
    <?php  ?>    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtrs-truck-service-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtrs-truck-service-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'enctype' => ''
            )
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span12">
            <div class="form-horizontal">

                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrs_id')) != 'tooltip.vtrs_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vtrs_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrs_vtrc_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrs_vtrc_id')) != 'tooltip.vtrs_vtrc_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtrsVtrc',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtrs_vtrc_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrs_vsrv_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrs_vsrv_id')) != 'tooltip.vtrs_vsrv_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtrsVsrv',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtrs_vsrv_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrs_fixr_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrs_fixr_id')) != 'tooltip.vtrs_fixr_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrs_fixr_id', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtrs_fixr_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrs_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrs_notes')) != 'tooltip.vtrs_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vtrs_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vtrs_notes')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->

            </div>
    <div class="row">
        
    </div>

    <p class="alert">
        
        <?php 
            echo Yii::t('TrucksModule.crud','Fields with <span class="required">*</span> are required.');
                
            /**
             * @todo: We need the buttons inside the form, when a user hits <enter>
             */                
            echo ' '.CHtml::submitButton(Yii::t('TrucksModule.crud', 'Save'), array(
                'class' => 'btn btn-primary',
                'style'=>'visibility: hidden;'                
            ));
                
        ?>
    </p>


    <?php $this->endWidget() ?>    <?php  ?></div> <!-- form -->
