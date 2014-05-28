<div class="crud-form">
    <?php  ?>    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtco-truc-odo-changes-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtco-truc-odo-changes-form',
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

                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_vtrc_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_vtrc_id')) != 'tooltip.vtco_vtrc_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtcoVtrc',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtco_vtrc_id')
                            ?>                            </span>
                        </div>
                    </div>
                                    
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_date') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_date')) != 'tooltip.vtco_date')?$t:'' ?>'>
                                <?php
                            //echo $form->textField($model, 'vtco_datetime');
                            $this->widget('TbDatePicker',
                                            array(
                                                    'model' => $model,
                                                    'attribute' => 'vtco_date',
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
                                    echo $form->error($model,'vtco_date')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>

                <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_time') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_time')) != 'tooltip.vtco_time')?$t:'' ?>'>
                                <?php
                            //echo $form->textField($model, 'vtco_datetime');
                                $this->widget(
                                        'TbTimePicker', array(
                                            'model' => $model,
                                            'attribute' => 'vtco_time',
                                            'options' => array('showMeridian' => false),
//                                            'wrapperHtmlOptions' => array(
//                                                'class' => 'col-md-3'),
//                                            )
                                ));
                                    echo $form->error($model,'vtco_time')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_old_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_old_odo')) != 'tooltip.vtco_old_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtco_old_odo', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtco_old_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_new_odo') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_new_odo')) != 'tooltip.vtco_new_odo')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtco_new_odo', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtco_new_odo')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtco_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtco_notes')) != 'tooltip.vtco_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vtco_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vtco_notes')
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
