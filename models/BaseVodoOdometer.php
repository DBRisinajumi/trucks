<?php

/**
 * This is the model base class for the table "vodo_odometer".
 *
 * Columns in table "vodo_odometer" available as properties of the model:
 * @property string $vodo_id
 * @property integer $vodo_vtrc_id
 * @property string $vodo_type
 * @property integer $vodo_start_odo
 * @property string $vodo_start_datetime
 * @property integer $vodo_end_odo
 * @property string $vodo_end_datetime
 * @property integer $vodo_run
 * @property integer $vodo_abs_odo
 * @property string $vodo_notes
 * @property string $vodo_ref_model
 * @property string $vodo_ref_id
 *
 * Relations of table "vodo_odometer" available as properties of the model:
 * @property FpeoPeriodOdo[] $fpeoPeriodOdos
 * @property VtrcTruck $vodoVtrc
 */
abstract class BaseVodoOdometer extends CActiveRecord
{
    /**
    * ENUM field values
    */
    const VODO_TYPE_READING = 'READING';
    const VODO_TYPE_VOYAGE_RUN = 'VOYAGE_RUN';
    const VODO_TYPE_VOYAGE_ODO = 'VOYAGE_ODO';
    const VODO_TYPE_ODO_CHANGE = 'ODO_CHANGE';
    
    var $enum_labels = false;  

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vodo_odometer';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vodo_vtrc_id, vodo_type', 'required'),
                array('vodo_start_odo, vodo_start_datetime, vodo_end_odo, vodo_end_datetime, vodo_run, vodo_abs_odo, vodo_notes, vodo_ref_model, vodo_ref_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vodo_vtrc_id, vodo_start_odo, vodo_end_odo, vodo_run, vodo_abs_odo', 'numerical', 'integerOnly' => true),
                array('vodo_ref_model', 'length', 'max' => 20),
                array('vodo_ref_id', 'length', 'max' => 10),
                array('vodo_start_datetime, vodo_end_datetime, vodo_notes', 'safe'),
                array('vodo_type', 'in', 'range' => array(self::VODO_TYPE_READING, self::VODO_TYPE_VOYAGE_RUN, self::VODO_TYPE_VOYAGE_ODO, self::VODO_TYPE_ODO_CHANGE)),
                array('vodo_id, vodo_vtrc_id, vodo_type, vodo_start_odo, vodo_start_datetime, vodo_end_odo, vodo_end_datetime, vodo_run, vodo_abs_odo, vodo_notes, vodo_ref_model, vodo_ref_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vodo_type;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'fpeoPeriodOdos' => array(self::HAS_MANY, 'FpeoPeriodOdo', 'fpeo_vodo_id'),
                'vodoVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vodo_vtrc_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vodo_id' => Yii::t('TrucksModule.model', 'Vodo'),
            'vodo_vtrc_id' => Yii::t('TrucksModule.model', 'Vodo Vtrc'),
            'vodo_type' => Yii::t('TrucksModule.model', 'Vodo Type'),
            'vodo_start_odo' => Yii::t('TrucksModule.model', 'Vodo Start Odo'),
            'vodo_start_datetime' => Yii::t('TrucksModule.model', 'Vodo Start Datetime'),
            'vodo_end_odo' => Yii::t('TrucksModule.model', 'Vodo End Odo'),
            'vodo_end_datetime' => Yii::t('TrucksModule.model', 'Vodo End Datetime'),
            'vodo_run' => Yii::t('TrucksModule.model', 'Vodo Run'),
            'vodo_abs_odo' => Yii::t('TrucksModule.model', 'Vodo Abs Odo'),
            'vodo_notes' => Yii::t('TrucksModule.model', 'Vodo Notes'),
            'vodo_ref_model' => Yii::t('TrucksModule.model', 'Vodo Ref Model'),
            'vodo_ref_id' => Yii::t('TrucksModule.model', 'Vodo Ref'),
        );
    }

    public function enumLabels()
    {
        if($this->enum_labels){
            return $this->enum_labels;
        }    
        $this->enum_labels =  array(
           'vodo_type' => array(
               self::VODO_TYPE_READING => Yii::t('TrucksModule.model', 'VODO_TYPE_READING'),
               self::VODO_TYPE_VOYAGE_RUN => Yii::t('TrucksModule.model', 'VODO_TYPE_VOYAGE_RUN'),
               self::VODO_TYPE_VOYAGE_ODO => Yii::t('TrucksModule.model', 'VODO_TYPE_VOYAGE_ODO'),
               self::VODO_TYPE_ODO_CHANGE => Yii::t('TrucksModule.model', 'VODO_TYPE_ODO_CHANGE'),
           ),
            );
        return $this->enum_labels;
    }

    public function getEnumFieldLabels($column){

        $aLabels = $this->enumLabels();
        return $aLabels[$column];
    }

    public function getEnumLabel($column,$value){

        $aLabels = $this->enumLabels();

        if(!isset($aLabels[$column])){
            return $value;
        }

        if(!isset($aLabels[$column][$value])){
            return $value;
        }

        return $aLabels[$column][$value];
    }

    public function getEnumColumnLabel($column){
        return $this->getEnumLabel($column,$this->$column);
    }
    

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vodo_id', $this->vodo_id, true);
        $criteria->compare('t.vodo_vtrc_id', $this->vodo_vtrc_id);
        $criteria->compare('t.vodo_type', $this->vodo_type);
        $criteria->compare('t.vodo_start_odo', $this->vodo_start_odo);
        $criteria->compare('t.vodo_start_datetime', $this->vodo_start_datetime, true);
        $criteria->compare('t.vodo_end_odo', $this->vodo_end_odo);
        $criteria->compare('t.vodo_end_datetime', $this->vodo_end_datetime, true);
        $criteria->compare('t.vodo_run', $this->vodo_run);
        $criteria->compare('t.vodo_abs_odo', $this->vodo_abs_odo);
        $criteria->compare('t.vodo_notes', $this->vodo_notes, true);
        $criteria->compare('t.vodo_ref_model', $this->vodo_ref_model, true);
        $criteria->compare('t.vodo_ref_id', $this->vodo_ref_id, true);


        return $criteria;

    }

}
