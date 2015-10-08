<div class="form">
    <?php
    /** @var SmartphoneController $this */
    /** @var Smartphone $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'smartphone-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                                    <?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 255)) ?>
                               <?php echo $form->labelEx($model,'imagen'); ?>
                                <p><em style="color:green; font-size:12px;">Tamaño recomendado: ---x---</em></p>
                               <?php
                                if(!$model->isNewRecord){
                                    ?>
                                    <table width="100%" border="0">
                                        <?php
                                        if ($model->imagen){
                                            ?>
                                            <tr>
                                                <td><?php echo '<div >'.CHtml::image($model->imagen,"imagen",array('width'=>300));?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                <?php
                                }
                                ?>
                               <?php echo $form->fileField($model,'imagen',array('accept' => 'image/*',)); ?>
                                <?php echo $form->textFieldRow($model, 'alt_imagen', array('class' => 'span5', 'maxlength' => 100)) ?>
                                <?php echo $form->checkBoxRow($model, 'visible') ?>
                <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
