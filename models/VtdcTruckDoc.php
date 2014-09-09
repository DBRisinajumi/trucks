<?php

// auto-loading
Yii::setPathOfAlias('VtdcTruckDoc', dirname(__FILE__));
Yii::import('VtdcTruckDoc.*');

class VtdcTruckDoc extends BaseVtdcTruckDoc
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
         return (string) $this->vtdcVtrc->vtrc_car_reg_nr .
            ' ' .$this->vtdcVtdt->vtdt_name;
    }
    
    public function getItemPositionLabel()
    {
            return $this->getItemLabel();
    }    
    
    public function getItemPeriodLabel()
    {
            return $this->vtdc_issue_date . ' - ' . $this->vtdc_expire_date;
    }    
    
    
    
    public function isPeriodEditable(){
        return false;
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
        
        /**
         * registre transaction in dimensions
         */
        
        //get models
        $fixr = $this->vtdcFixr;
        if(empty($fixr->fixr_period_fret_id)){
            parent::afterSave();
            return;
        }
        
        $vtdt = $this->vtdcVtdt;
        $vtrc = $this->vtdcVtrc;
        
        //save dim data
        $fdda = FddaDimData::findByFixrId($fixr->fixr_id);
        $fdda->fdda_fret_id = $fixr->fixr_position_fret_id;
        $fdda->setFdm2Id($vtdt->vtdt_id, $vtdt->vtdt_name);
        $fdda->setFdm3Id($vtrc->vtrc_id, $vtrc->vtrc_car_reg_nr);
        $fdda->fdda_date_from = $this->vtdc_issue_date;
        $fdda->fdda_date_to = $this->vtdc_expire_date;
        $fdda->save();
        
        parent::afterSave();
    }    

}
