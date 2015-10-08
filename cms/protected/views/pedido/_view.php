<?php
/** @var PedidoController $this */
/** @var Pedido $data */
?>
<div class="view">
                    
        <?php if (!empty($data->empresa)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('empresa')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->empresa); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->correo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->correo); ?>
            </div>
        </div>

        <?php endif; ?>
                
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
                
        <?php if (!empty($data->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>