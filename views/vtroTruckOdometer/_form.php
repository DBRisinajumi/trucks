<div class="crud-form">
    <?php  ?>    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtro-truck-odometer-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtro-truck-odometer-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'enctype' => ''
            )
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span5">
            <div class="form-horizontal">

                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_id')) != 'tooltip.vtro_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vtro_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtro_vtrc_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_vtrc_id')) != 'tooltip.vtro_vtrc_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtroVtrc',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtro_vtrc_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtro_datetime') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_date')) != 'tooltip.vtro_date')?$t:'' ?>'>
                                <?php

                            $this->widget('TbDatePicker',
                                            array(
                                                    'model' => $model,
                                                    'attribute' => 'vtro_date',
                                                    'htmlOptions' => array(
                                                        'size' => 10,
                                                        'class' => 'input-small'
                                                        ),

                                                    'options' => array(
                                                        'autoclose' => true,
                                                        'todayHighlight' => true,
                                                        'showButtonPanel' => true,
                                                        'changeYear' => true,
                                                        'format' => 'yyyy-mm-dd',
                                                        ),
                                                    )
                                                );       
                            
                            echo $form->error($model,'vtro_date')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>

                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtro_datetime') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_time')) != 'tooltip.vtro_time')?$t:'' ?>'>
                                <?php
                                $this->widget(
                                        'TbTimePicker', array(
                                            'model' => $model,
                                            'attribute' => 'vtro_time',
                                            'options' => array('showMeridian' => false),

                                ));                            
                            echo $form->error($model,'vtro_time')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
                
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtro_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_odo')) != 'tooltip.vtro_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtro_odo', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtro_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtro_abs_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtro_abs_odo')) != 'tooltip.vtro_abs_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtro_abs_odo', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtro_abs_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->

        
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
