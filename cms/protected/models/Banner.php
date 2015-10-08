<?php

Yii::import('application.models._base.BaseBanner');

class Banner extends BaseBanner
{
    /**
     * @return Banner
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Banner|Banners', $n);
    }

}