<?php

// auto-loading
Yii::setPathOfAlias('VtcoTrucOdoChanges', dirname(__FILE__));
Yii::import('VtcoTrucOdoChanges.*');

class VtcoTrucOdoChanges extends BaseVtcoTrucOdoChanges
{

    var $vtco_date;
    var $vtco_time;
    
    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }
    

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtco_date, vtco_time', 'required'),
            )
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

}
