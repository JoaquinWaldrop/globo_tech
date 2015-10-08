<?php
/** @var AdminController $this */
/** @var Admin $model */
$this->breadcrumbs=array(
	'Admins'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Admin::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Admin::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Admin::label(2) ?>    </legend>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'admin-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => 'reInstallDatepicker',
    'columns' => array(
        'username',
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