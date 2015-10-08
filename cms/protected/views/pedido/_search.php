<?php
/** @var PedidoController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>


    
<?php echo  $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>


    
<?php echo  $form->textFieldRow($model, 'empresa', array('class' => 'span5', 'maxlength' => 255)); ?>


    
<?php echo  $form->textFieldRow($model, 'correo', array('class' => 'span5', 'maxlength' => 100)); ?>


    
<?php echo  $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 120)); ?>


    
<?php echo  $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
