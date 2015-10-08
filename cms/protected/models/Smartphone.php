<?php

Yii::import('application.models._base.BaseSmartphone');

class Smartphone extends BaseSmartphone
{
    /**
     * @return Smartphone
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Smartphone|Smartphones', $n);
    }

}