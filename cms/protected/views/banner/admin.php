<?php
/** @var BannerController $this */
/** @var Banner $model */
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Banner::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Banner::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('banner-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Banner::label(2) ?>    </legend>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'banner-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => 'reInstallDatepicker',
    'columns' => array(
        array(
                'name'=>'descripcion',
                'filter' => false,
                'type'=>'html'
            ),
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