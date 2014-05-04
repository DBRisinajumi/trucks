<?php

// auto-loading
Yii::setPathOfAlias('VsrvServices', dirname(__FILE__));
Yii::import('VsrvServices.*');

class VsrvServices extends BaseVsrvServices
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
        return (string) $this->vsrv_name;
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
    
        public function save($runValidation = true, $attributes = NULL) 
    {
        //set system company id
        if ($this->isNewRecord && Yii::app()->sysCompany->getActiveCompany()){
            $this->vsrv_sys_ccmp_id = Yii::app()->sysCompany->getActiveCompany();
        }              

        return parent::save($runValidation,$attributes);

    }    

    public function sysCompany()
    {
        $this->getDbCriteria()->mergeWith(array(
                'condition'=>'t.vsrv_sys_ccmp_id = ' . Yii::app()->sysCompany->getActiveCompany(),
        ));
        return $this;
    }  
    
}
