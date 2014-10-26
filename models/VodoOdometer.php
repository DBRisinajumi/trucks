<?php

// auto-loading
Yii::setPathOfAlias('VodoOdometer', dirname(__FILE__));
Yii::import('VodoOdometer.*');

class VodoOdometer extends BaseVodoOdometer
{

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
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
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

    /**
     * get last reading before requestd date
     * @param int $vtrc_id
     * @param date $date
     * @return VodoOdometer record
     */
    public static function getOdoByDate($vtrc_id,$date){
        
        $criteria = new CDbCriteria;
        $criteria->compare('vodo_vtrc_id',$vtrc_id);
        $criteria->condition = "vodo_end_datetime < :date";
        $criteria->params = array(':date' => $date);
        
        return VodoOdometer::model()->find($criteria);
        
    }
}
