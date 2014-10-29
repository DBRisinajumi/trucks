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

    public function rules() {
        return array_merge(
                parent::rules()
                , array(
            //array('vvoy_mileage,vvoy_odo_start,vvoy_odo_end', 'validateSqn', Yii::t('TrucksModule.mmodel', 'Try save incorect odometer values')),
                )
        );
    }

    public function validateSqn(){
        
        //get prev reading
        $last_vodo = $this->getPrevReading();     
        $abs_odo = 0;
        switch ($this->vodoVtrc->vtrc_abs_odo_calc_type) {
            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_RUN:
                $abs_odo = $last_vodo->vodo_abs_odo + $this->vodo_run;
                break;
            
            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_ODO:
                $this->vodo_run = $this->vodo_end_odo - $this->vodo_end_odo;
                $abs_odo = $last_vodo->vodo_abs_odo + $this->vodo_run;
                break;

            default:
                break;
        }
        
        $sql = " 
          SELECT 
            count(*) c
          FROM
            vodo_odometer 
          WHERE vodo_vtrc_id = :vtrc_id
            AND (
              :startdate > :enddate 
              OR (
                vodo_abs_odo <= :abs_odo 
                AND vodo_end_datetime > :startdate
              ) 
              OR (
                vodo_abs_odo >= :abs_odo 
                AND vodo_start_datetime < :enddate
              )
            )
            ";
        $vtrc_id = $this->vodo_vtrc_id;
        $vodo_start_datetime= $this->vodo_start_datetime;
        $vodo_end_datetime = $this->vodo_end_datetime;
        $rawData = Yii::app()->db->createCommand($sql);
        $rawData->bindParam(":vtrc_id", $vtrc_id, PDO::PARAM_INT);                
        $rawData->bindParam(":abs_odo", $abs_odo, PDO::PARAM_INT);                
        $rawData->bindParam(":startdate", $vodo_start_datetime, PDO::PARAM_STR);      
        $rawData->bindParam(":enddate", $vodo_end_datetime, PDO::PARAM_STR);      
        $count = $rawData->queryScalar();
//        var_dump($this->attributes);
//        var_dump($count);
        return ($count == 0);
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

    public function getPrevReading(){
        //get last run
        $criteria = new CDbCriteria;
        $criteria->compare('vodo_vtrc_id',$this->vodo_vtrc_id);
        //$criteria->compare('vodo_type',VodoOdometer::VODO_TYPE_VOYAGE_RUN);
        $criteria->condition = "vodo_end_datetime <= :date";
        $criteria->params = array(':date' => $this->vodo_start_datetime);
        $criteria->limit = 1;
        $criteria->order = "vodo_end_datetime DESC";

        return VodoOdometer::model()->find($criteria);        
        
    }

    public function getNextReading(){
        //get last run
        $criteria = new CDbCriteria;
        $criteria->compare('vodo_vtrc_id',$this->vodo_vtrc_id);
        //$criteria->compare('vodo_type',VodoOdometer::VODO_TYPE_VOYAGE_RUN);
        $criteria->condition = "vodo_start_datetime >= :date";
        $criteria->params = array(':date' => $this->vodo_end_datetime);
        $criteria->limit = 1;
        $criteria->order = "vodo_end_datetime ASC";

        return VodoOdometer::model()->find($criteria);        
        
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
    
    public function setVodoType() {
        //get odo type from truck
        if(empty($this->vodoVtrc)){
            return false;
        }
        switch ($this->vodoVtrc->vtrc_abs_odo_calc_type) {
            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_RUN:
                $this->vodo_type = VodoOdometer::VODO_TYPE_VOYAGE_RUN;
                break;

            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_ODO:
                $this->vodo_type = VodoOdometer::VODO_TYPE_VOYAGE_ODO;
                break;

            default:
                return false;
                break;
        }
        
        return true;
    }

    public function beforeSave()
    {

        //get prev reading
        $last_vodo = $this->getPrevReading();        
        
        //calculate absalute odometer
        switch ($this->vodoVtrc->vtrc_abs_odo_calc_type) {
            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_RUN:
                $this->vodo_abs_odo = $last_vodo->vodo_abs_odo + $this->vodo_run;
                break;
            
            case VtrcTruck::VTRC_ABS_ODO_CALC_TYPE_ODO:
                $this->vodo_run = $this->vodo_end_odo - $this->vodo_end_odo;
                $this->vodo_abs_odo = $last_vodo->vodo_abs_odo + $this->vodo_run;
                break;

            default:
                break;
        }
        
        return parent::beforeSave();

    }
    
    protected function afterSave()
    {
        //recalc next reading
        if($next_vodo = $this->getNextReading()){
            $next_vodo->save();
        }
        
        parent::afterSave();
    }

}
