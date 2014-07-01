<div class="crud-form">
    <?php  ?>    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vtls-trailer-service-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vtls-trailer-service-form',
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
            <h2>
                <?php echo Yii::t('TrucksModule.crud','Data')?>                <small>
                    #<?php echo $model->vtls_id ?>                </small>

            </h2>


            <div class="form-horizontal">

                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtls_id')) != 'tooltip.vtls_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vtls_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtls_vtrl_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtls_vtrl_id')) != 'tooltip.vtls_vtrl_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtlsVtrl',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtls_vtrl_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtls_vsrv_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtls_vsrv_id')) != 'tooltip.vtls_vsrv_id')?$t:'' ?>'>
                                <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'vtlsVsrv',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'vtls_vsrv_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtls_notes') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtls_notes')) != 'tooltip.vtls_notes')?$t:'' ?>'>
                                <?php
                            echo $form->textArea($model, 'vtls_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'vtls_notes')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                                    
                    <?php  ?>
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vtls_fixr_id') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vtls_fixr_id')) != 'tooltip.vtls_fixr_id')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vtls_fixr_id', array('size' => 10, 'maxlength' => 10));
                            echo $form->error($model,'vtls_fixr_id')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->

            </div>
    <div class="row">
        
        <div class="span12"><!-- sub inputs -->
            <h2>
                <?php echo Yii::t('TrucksModule.crud','Relations')?>            </h2>
            <div class="well">
                                                        </div>
        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('TrucksModule.crud','Fields with <span class="required">*</span> are required.');?>
    </p>

    <!-- TODO: We need the buttons inside the form, when a user hits <enter> -->
    <div class="form-actions" style="visibility: hidden; height: 1px">
        
        <?php
            echo CHtml::Button(
            Yii::t('TrucksModule.crud', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('vtlsTrailerService/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('TrucksModule.crud', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>    <?php  ?></div> <!-- form -->
