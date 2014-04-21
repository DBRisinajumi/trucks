<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_id'); ?>
        <?php ; ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_cmmp_id'); ?>
        <?php echo $form->textField($model, 'vtrc_cmmp_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_car_reg_nr'); ?>
        <?php echo $form->textField($model, 'vtrc_car_reg_nr', array('size' => 20, 'maxlength' => 20)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_year'); ?>
        <?php echo $form->textField($model, 'vtrc_year'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_car_certificate_number'); ?>
        <?php echo $form->textField($model, 'vtrc_car_certificate_number', array('size' => 60, 'maxlength' => 100)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_self_weight'); ?>
        <?php echo $form->textField($model, 'vtrc_self_weight'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_fuel_consumption'); ?>
        <?php echo $form->textField($model, 'vtrc_fuel_consumption'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_year_mileage'); ?>
        <?php echo $form->textField($model, 'vtrc_year_mileage'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_leased_from_cmmp_id'); ?>
        <?php echo $form->textField($model, 'vtrc_leased_from_cmmp_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_purchase_value'); ?>
        <?php echo $form->textField($model, 'vtrc_purchase_value'); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtrc_notes'); ?>
        <?php echo $form->textArea($model, 'vtrc_notes', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('TrucksModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
