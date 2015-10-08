<?php
/** @var SmartphoneController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>


    
<?php echo  $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>


    
<?php echo  $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 255)); ?>


    
<?php echo  $form->textFieldRow($model, 'imagen', array('class' => 'span5', 'maxlength' => 150)); ?>


    
<?php echo  $form->textFieldRow($model, 'alt_imagen', array('class' => 'span5', 'maxlength' => 100)); ?>


    
<?php echo  $form->checkBoxRow($model, 'visible'); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
