<?php

// auto-loading
Yii::setPathOfAlias('VtrdTrailerDoc', dirname(__FILE__));
Yii::import('VtrdTrailerDoc.*');

class VtrdTrailerDoc extends BaseVtrdTrailerDoc
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
        return (string) $this->vtrdVtrl->vtrl_reg_nr . 
            ' ' . $this->vtrdVtdt->vtdt_name
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
        if(!empty($this->vtrd_fixr_id)){
            $vtdt = $this->vtrdVtdt;
            $vtrl = $this->vtrdVtrl;        

            FddaDimData::registre($this->vtrd_fixr_id,$vtdt->vtdt_id, $vtdt->vtdt_name,$vtrl->vtrl_id, $vtrl->vtrl_reg_nr);
        }
        
        parent::afterSave();
    }      
    
    /**
     * common name for FddaDimData
     * @return date
     */
    public function getFddaDateFrom(){
        return $this->vtrd_issue_date;
    }

    /**
     * common name for FddaDimData
     * @return date
     */    
    public function getFddaDateTo(){
        return $this->vtrd_expire_date;
    }     

}
