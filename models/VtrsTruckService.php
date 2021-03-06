<?php

// auto-loading
Yii::setPathOfAlias('VtrsTruckService', dirname(__FILE__));
Yii::import('VtrsTruckService.*');

class VtrsTruckService extends BaseVtrsTruckService
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
         return (string) $this->vtrsVtrc->vtrc_car_reg_nr . 
            ' ' . $this->vtrsVsrv->vsrv_name
            ;
    }
    
    public function getItemPositionLabel()
    {
            return $this->getItemLabel();
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
    
    public function afterSave() {
        
        //registre transaction in dimensions        
        if(!empty($this->vtrs_fixr_id)){
            $vsrv = $this->vtrsVsrv;
            $vtrc = $this->vtrsVtrc;


            FddaDimData::registre($this->vtrs_fixr_id,$vsrv->vsrv_id, $vsrv->vsrv_name,$vtrc->vtrc_id, $vtrc->vtrc_car_reg_nr);
        }
        parent::afterSave();
    }    
    

}
