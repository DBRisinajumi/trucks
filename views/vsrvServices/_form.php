<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerPackage('select2');
        Yii::app()->clientScript->registerScript('crud/variant/update','$("#vsrv-services-form select").select2();');


        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'vsrv-services-form',
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

                                    

                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vsrv_id')) != 'tooltip.vsrv_id')?$t:'' ?>'>
                                <?php
                            ;
                            echo $form->error($model,'vsrv_id')
                            ?>                            </span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vsrv_name') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vsrv_name')) != 'tooltip.vsrv_name')?$t:'' ?>'>
                                <?php
                            echo $form->textField($model, 'vsrv_name', array('size' => 60, 'maxlength' => 256));
                            echo $form->error($model,'vsrv_name')
                            ?>                            </span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'vsrv_hidded') ?>
                        </div>
                        <div class='controls'>
                            <span class="tooltip-wrapper" data-toggle='tooltip' data-placement="right"
                                 title='<?php echo (($t = Yii::t('TrucksModule.model', 'tooltip.vsrv_hidded')) != 'tooltip.vsrv_hidded')?$t:'' ?>'>
                                <?php
                            echo $form->checkbox($model, 'vsrv_hidded');
                            echo $form->error($model,'vsrv_hidded')
                            ?>                            </span>
                        </div>
                    </div>
                    <?php  ?>
                
            </div>
        </div>
        <!-- main inputs -->

            </div>
    <div class="row">
        
    <p class="alert">
        
        <?php 
            echo Yii::t('TrucksModule.crud_static','Fields with <span class="required">*</span> are required.');
                
            /**
             * @todo: We need the buttons inside the form, when a user hits <enter>
             */                
            echo ' '.CHtml::submitButton(Yii::t('TrucksModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary',
                'style'=>'visibility: hidden;'                
            ));
                
        ?>
    </p>


    <?php $this->endWidget() ?>
</div> <!-- form -->
