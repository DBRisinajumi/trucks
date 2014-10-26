<div class="crud-form">
    <?php  ?>    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vodo-odometer-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vodo-odometer-form',
            'enableAjaxValidation' => true,
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
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_id')) != 'tooltip.vodo_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vodo_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_vtrc_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_vtrc_id')) != 'tooltip.vodo_vtrc_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vodoVtrc',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vodo_vtrc_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_type') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_type')) != 'tooltip.vodo_type')?$t:'' ?>'>
                                <?php
                            echo CHtml::activeDropDownList($model, 'vodo_type', $model->getEnumFieldLabels('vodo_type'));
                            echo $form->error($model,'vodo_type')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_start_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_start_odo')) != 'tooltip.vodo_start_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_start_odo');
                            echo $form->error($model,'vodo_start_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_start_datetime') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_start_datetime')) != 'tooltip.vodo_start_datetime')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_start_datetime');
                            echo $form->error($model,'vodo_start_datetime')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_end_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_end_odo')) != 'tooltip.vodo_end_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_end_odo');
                            echo $form->error($model,'vodo_end_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_end_datetime') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_end_datetime')) != 'tooltip.vodo_end_datetime')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_end_datetime');
                            echo $form->error($model,'vodo_end_datetime')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_run') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_run')) != 'tooltip.vodo_run')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_run');
                            echo $form->error($model,'vodo_run')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_abs_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_abs_odo')) != 'tooltip.vodo_abs_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_abs_odo');
                            echo $form->error($model,'vodo_abs_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_notes')) != 'tooltip.vodo_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vodo_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vodo_notes')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_ref_model') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_ref_model')) != 'tooltip.vodo_ref_model')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_ref_model', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'vodo_ref_model')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vodo_ref_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vodo_ref_id')) != 'tooltip.vodo_ref_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vodo_ref_id', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vodo_ref_id')
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
