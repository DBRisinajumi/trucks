<?php

// auto-loading
Yii::setPathOfAlias('VtlsTrailerService', dirname(__FILE__));
Yii::import('VtlsTrailerService.*');

class VtlsTrailerService extends BaseVtlsTrailerService
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
        return (string) $this->vtlsVtrl->vtrl_reg_nr . 
            ' ' . $this->vtlsVsrv->vsrv_name
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
        
        /**
         * registre transaction in dimensions
         */
        
        //get models
        $fixr = $this->vtlsFixr;
        if(empty($fixr->fixr_period_fret_id)){
            parent::afterSave();
            return;
        }
        
        //get period
        $attributes = array(
            'fped_fixr_id' => $fixr->fixr_id,
        );
        $fped = FpedPeriodDate::model()->findByAttributes($attributes);
        if(empty($fped)){
            parent::afterSave();
            return;
        }
        
        $vsrv = $this->vtlsVsrv;
        $vtrl = $this->vtlsVtrl;
        
        //save dim data
        $fdda = FddaDimData::findByFixrId($fixr->fixr_id);
        $fdda->fdda_fret_id = $fixr->fixr_position_fret_id;
        $fdda->setFdm2Id($vsrv->vsrv_id, $vsrv->vsrv_name);
        $fdda->setFdm3Id($vtrl->vtrl_id, $vtrl->vtrl_reg_nr);
        $fdda->fdda_date_from = $fped->fped_start_date;
        $fdda->fdda_date_to = $fped->fped_end_date;
        $fdda->save();
        
        parent::afterSave();
    }    
    
    
}
