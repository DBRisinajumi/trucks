<div class="crud-form">
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtrl-trailer-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtrl-trailer-form',
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
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_id')) != 'tooltip.vtrl_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vtrl_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrl_reg_nr') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_reg_nr')) != 'tooltip.vtrl_reg_nr')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrl_reg_nr', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'vtrl_reg_nr')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrl_year') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_year')) != 'tooltip.vtrl_year')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrl_year');
                            echo $form->error($model,'vtrl_year')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrl_certificate_number') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_certificate_number')) != 'tooltip.vtrl_certificate_number')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrl_certificate_number', array('size' => 60, 'maxlength' => 100));
                            echo $form->error($model,'vtrl_certificate_number')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrl_self_weight') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_self_weight')) != 'tooltip.vtrl_self_weight')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrl_self_weight');
                            echo $form->error($model,'vtrl_self_weight')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrl_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrl_notes')) != 'tooltip.vtrl_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vtrl_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vtrl_notes')
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
                'style'=>'visibility: hidden;',
            ));?>
    </p>

    <?php $this->endWidget() ?>
</div> <!-- form -->