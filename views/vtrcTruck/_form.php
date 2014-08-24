<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtrc-truck-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtrc-truck-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'enctype' => ''
            )
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span7">
            <div class="form-horizontal">

                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_id')) != 'tooltip.vtrc_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vtrc_id')
                            ?>                            </span>
                        </div>
                    </div>

                <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_car_reg_nr') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_car_reg_nr')) != 'tooltip.vtrc_car_reg_nr')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_car_reg_nr', array('size' => 20, 'maxlength' => 20));
                            echo $form->error($model,'vtrc_car_reg_nr')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_year') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_year')) != 'tooltip.vtrc_year')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_year');
                            echo $form->error($model,'vtrc_year')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_car_certificate_number') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_car_certificate_number')) != 'tooltip.vtrc_car_certificate_number')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_car_certificate_number', array('size' => 60, 'maxlength' => 100));
                            echo $form->error($model,'vtrc_car_certificate_number')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_self_weight') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_self_weight')) != 'tooltip.vtrc_self_weight')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_self_weight');
                            echo $form->error($model,'vtrc_self_weight')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_fuel_consumption') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_fuel_consumption')) != 'tooltip.vtrc_fuel_consumption')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_fuel_consumption');
                            echo $form->error($model,'vtrc_fuel_consumption')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_year_mileage') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_year_mileage')) != 'tooltip.vtrc_year_mileage')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_year_mileage');
                            echo $form->error($model,'vtrc_year_mileage')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_leased_from_cmmp_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_leased_from_cmmp_id')) != 'tooltip.vtrc_leased_from_cmmp_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtrcLeasedFromCmmp',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all',
                        'style' => 'width: 200px;'
                    ),
                )
                );
                            echo $form->error($model,'vtrc_leased_from_cmmp_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_purchase_value') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_purchase_value')) != 'tooltip.vtrc_purchase_value')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtrc_purchase_value');
                            echo $form->error($model,'vtrc_purchase_value')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtrc_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtrc_notes')) != 'tooltip.vtrc_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vtrc_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vtrc_notes')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->
    </div>

    <div class="alert">
        <?php 
        echo Yii::t('TrucksModule.crud_static','Fields with <span class="required">*</span> are required.');
        /**
         * @todo: We need the buttons inside the form, when a user hits <enter>
         */
        echo ' '.CHtml::submitButton(Yii::t('TrucksModule.crud', 'Save'), array(
                'class' => 'btn btn-primary',
                'style'=>'visibility: hidden;',
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->
