<?php
/** @var TabletController $this */
/** @var Tablet $data */
?>
<div class="view">
                    
        <?php if (!empty($data->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->imagen)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->imagen); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->alt_imagen)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('alt_imagen')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->alt_imagen); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->visible == 1 ? 'True' : 'False'); ?>
                            </div>
        </div>

    </div>