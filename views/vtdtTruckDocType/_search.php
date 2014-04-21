<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    
    <div class="row">
        <?php echo $form->label($model, 'vtdt_id'); ?>
        <?php ; ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtdt_name'); ?>
        <?php echo $form->textField($model, 'vtdt_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>


    
    <div class="row">
        <?php echo $form->label($model, 'vtdt_hidded'); ?>
        <?php echo $form->textField($model, 'vtdt_hidded'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('TrucksModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
