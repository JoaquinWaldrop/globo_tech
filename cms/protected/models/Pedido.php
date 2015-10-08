<?php

Yii::import('application.models._base.BasePedido');

class Pedido extends BasePedido
{
    /**
     * @return Pedido
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Pedido|Pedidos', $n);
    }

}