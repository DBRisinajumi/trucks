<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_id'); ?>
        <?php ; ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_ccmp_id'); ?>
        <?php echo $form->textField($model, 'vtrl_ccmp_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_reg_nr'); ?>
        <?php echo $form->textField($model, 'vtrl_reg_nr', array('size' => 20, 'maxlength' => 20)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_year'); ?>
        <?php echo $form->textField($model, 'vtrl_year'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_certificate_number'); ?>
        <?php echo $form->textField($model, 'vtrl_certificate_number', array('size' => 60, 'maxlength' => 100)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_self_weight'); ?>
        <?php echo $form->textField($model, 'vtrl_self_weight'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrl_notes'); ?>
        <?php echo $form->textArea($model, 'vtrl_notes', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('TrucksModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
