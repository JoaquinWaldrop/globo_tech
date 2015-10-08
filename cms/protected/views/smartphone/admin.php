<?php
/** @var SmartphoneController $this */
/** @var Smartphone $model */
$this->breadcrumbs=array(
	'Smartphones'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Smartphone::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Smartphone::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('smartphone-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Smartphone::label(2) ?>    </legend>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'smartphone-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => 'reInstallDatepicker',
    'columns' => array(
        'nombre',
        array(
                    'name' => 'imagen',
                    'type' => 'image',
                    'value' => 'isset($data->imagen) ? $data->imagen : null',
                    'htmlOptions'=>array('width'=>'50'),
                    'filter' => false,
                ),
        'alt_imagen',
        array(
					'name' => 'visible',
					'value' => '($data->visible == 0) ? Yii::t(\'AweCrud.app\', \'No\') : Yii::t(\'AweCrud.app\', \'Yes\')',
					'filter' => array('0' => Yii::t('AweCrud.app', 'No'), '1' => Yii::t('AweCrud.app', 'Yes')),
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