<?php
/** @var PedidoController $this */
/** @var Pedido $model */
$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Pedido::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Pedido::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pedido-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Pedido::label(2) ?>    </legend>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'pedido-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => 'reInstallDatepicker',
    'columns' => array(
        'empresa',
        'correo',
        'nombre',
         array(
                'name'=>'descripcion',
                'filter' => false,
                'type'=>'html'
            ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),

));
    Yii::app()->clientScript->registerScript('for-date-picker',"
    function reInstallDatepicker(id, data){
        
    }

    ");
?>
</fieldset>