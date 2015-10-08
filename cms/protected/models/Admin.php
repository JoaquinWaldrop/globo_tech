<?php

Yii::import('application.models._base.BaseAdmin');

class Admin extends BaseAdmin
{
    /**
     * @return Admin
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Admin|Admins', $n);
    }

}