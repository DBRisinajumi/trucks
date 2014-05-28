<?php

// auto-loading
Yii::setPathOfAlias('VtroTruckOdometer', dirname(__FILE__));
Yii::import('VtroTruckOdometer.*');

class VtroTruckOdometer extends BaseVtroTruckOdometer
{
    public $vtro_date;
    public $vtro_time;

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
                , array(
                    array('vtro_date,vtro_time', 'required'),
                    array('vtro_odo', 'isOdoValueValid'),
                )
        );
    }
    
    public function isOdoValueValid($attribute, $params)
    {
        
        if(empty($this->vtro_odo)){  
            return;
        }
        
        $criteria = new CDbCriteria();
        $criteria->condition = 'vtro_vtrc_id = :vtrc_id and vtro_odo < :odo';
        $criteria->params = array(
            ':odo'=>$this->vtro_odo,
            ':vtrc_id'=>$this->vtro_vtrc_id,
            );
        $vtro =  VtroTruckOdometer::model()->find($criteria);        
        
        if($vtro && $vtro->vtro_datetime > $this->vtro_datetime){
            $this->addError($attribute, Yii::t('TrucksModule.model','Incorect odometer value'));
            return FALSE;
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'vtro_vtrc_id = :vtrc_id and vtro_odo > :odo';
        $criteria->params = array(
            ':odo'=>$this->vtro_odo,
            ':vtrc_id'=>$this->vtro_vtrc_id,
            );
        $vtro =  VtroTruckOdometer::model()->find($criteria);        
        
        if($vtro && $vtro->vtro_datetime < $this->vtro_datetime){
            $this->addError($attribute, Yii::t('TrucksModule.model','Incorect odometer value'));
            return FALSE;
        }
        
        
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
