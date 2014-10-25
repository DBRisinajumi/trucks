<?php

/**
 * This is the model base class for the table "vtrc_truck".
 *
 * Columns in table "vtrc_truck" available as properties of the model:
 * @property integer $vtrc_id
 * @property string $vtrc_cmmp_id
 * @property string $vtrc_car_reg_nr
 * @property integer $vtrc_year
 * @property string $vtrc_car_certificate_number
 * @property double $vtrc_self_weight
 * @property double $vtrc_fuel_consumption
 * @property integer $vtrc_year_mileage
 * @property string $vtrc_leased_from_cmmp_id
 * @property double $vtrc_purchase_value
 * @property string $vtrc_notes
 * @property string $vtrc_abs_odo_calc_type
 *
 * Relations of table "vtrc_truck" available as properties of the model:
 * @property VodoOdometer[] $vodoOdometers
 * @property VtdcTruckDoc[] $vtdcTruckDocs
 * @property CcmpCompany $vtrcCmmp
 * @property CcmpCompany $vtrcLeasedFromCmmp
 * @property VtrsTruckService[] $vtrsTruckServices
 * @property VvoyVoyage[] $vvoyVoyages
 */
abstract class BaseVtrcTruck extends CActiveRecord
{
    /**
    * ENUM field values
    */
    const VTRC_ABS_ODO_CALC_TYPE_RUN = 'RUN';
    const VTRC_ABS_ODO_CALC_TYPE_ODO = 'ODO';
    
    var $enum_labels = false;  

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtrc_truck';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtrc_cmmp_id, vtrc_car_reg_nr, vtrc_year, vtrc_car_certificate_number, vtrc_self_weight, vtrc_fuel_consumption, vtrc_year_mileage, vtrc_leased_from_cmmp_id, vtrc_purchase_value, vtrc_notes, vtrc_abs_odo_calc_type', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrc_year, vtrc_year_mileage', 'numerical', 'integerOnly' => true),
                array('vtrc_self_weight, vtrc_fuel_consumption, vtrc_purchase_value', 'numerical'),
                array('vtrc_cmmp_id, vtrc_leased_from_cmmp_id', 'length', 'max' => 10),
                array('vtrc_car_reg_nr', 'length', 'max' => 20),
                array('vtrc_car_certificate_number', 'length', 'max' => 100),
                array('vtrc_notes', 'safe'),
                array('vtrc_abs_odo_calc_type', 'in', 'range' => array('RUN','ODO')),
                array('vtrc_id, vtrc_cmmp_id, vtrc_car_reg_nr, vtrc_year, vtrc_car_certificate_number, vtrc_self_weight, vtrc_fuel_consumption, vtrc_year_mileage, vtrc_leased_from_cmmp_id, vtrc_purchase_value, vtrc_notes, vtrc_abs_odo_calc_type', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrc_cmmp_id;
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
                'vodoOdometers' => array(self::HAS_MANY, 'VodoOdometer', 'vodo_vtrc_id'),
                'vtdcTruckDocs' => array(self::HAS_MANY, 'VtdcTruckDoc', 'vtdc_vtrc_id'),
                'vtrcCmmp' => array(self::BELONGS_TO, 'CcmpCompany', 'vtrc_cmmp_id'),
                'vtrcLeasedFromCmmp' => array(self::BELONGS_TO, 'CcmpCompany', 'vtrc_leased_from_cmmp_id'),
                'vtrsTruckServices' => array(self::HAS_MANY, 'VtrsTruckService', 'vtrs_vtrc_id'),
                'vvoyVoyages' => array(self::HAS_MANY, 'VvoyVoyage', 'vvoy_vtrc_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrc_id' => Yii::t('TrucksModule.model', 'Vtrc'),
            'vtrc_cmmp_id' => Yii::t('TrucksModule.model', 'Vtrc Cmmp'),
            'vtrc_car_reg_nr' => Yii::t('TrucksModule.model', 'Vtrc Car Reg Nr'),
            'vtrc_year' => Yii::t('TrucksModule.model', 'Vtrc Year'),
            'vtrc_car_certificate_number' => Yii::t('TrucksModule.model', 'Vtrc Car Certificate Number'),
            'vtrc_self_weight' => Yii::t('TrucksModule.model', 'Vtrc Self Weight'),
            'vtrc_fuel_consumption' => Yii::t('TrucksModule.model', 'Vtrc Fuel Consumption'),
            'vtrc_year_mileage' => Yii::t('TrucksModule.model', 'Vtrc Year Mileage'),
            'vtrc_leased_from_cmmp_id' => Yii::t('TrucksModule.model', 'Vtrc Leased From Cmmp'),
            'vtrc_purchase_value' => Yii::t('TrucksModule.model', 'Vtrc Purchase Value'),
            'vtrc_notes' => Yii::t('TrucksModule.model', 'Vtrc Notes'),
            'vtrc_abs_odo_calc_type' => Yii::t('TrucksModule.model', 'Vtrc Abs Odo Calc Type'),
        );
    }

    public function enumLabels()
    {
        if($this->enum_labels){
            return $this->enum_labels;
        }    
        $this->enum_labels =  array(
           'vtrc_abs_odo_calc_type' => array(
               self::VTRC_ABS_ODO_CALC_TYPE_RUN => Yii::t('TrucksModule.model', 'VTRC_ABS_ODO_CALC_TYPE_RUN'),
               self::VTRC_ABS_ODO_CALC_TYPE_ODO => Yii::t('TrucksModule.model', 'VTRC_ABS_ODO_CALC_TYPE_ODO'),
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

        $criteria->compare('t.vtrc_id', $this->vtrc_id);
        $criteria->compare('t.vtrc_cmmp_id', $this->vtrc_cmmp_id);
        $criteria->compare('t.vtrc_car_reg_nr', $this->vtrc_car_reg_nr, true);
        $criteria->compare('t.vtrc_year', $this->vtrc_year);
        $criteria->compare('t.vtrc_car_certificate_number', $this->vtrc_car_certificate_number, true);
        $criteria->compare('t.vtrc_self_weight', $this->vtrc_self_weight);
        $criteria->compare('t.vtrc_fuel_consumption', $this->vtrc_fuel_consumption);
        $criteria->compare('t.vtrc_year_mileage', $this->vtrc_year_mileage);
        $criteria->compare('t.vtrc_leased_from_cmmp_id', $this->vtrc_leased_from_cmmp_id);
        $criteria->compare('t.vtrc_purchase_value', $this->vtrc_purchase_value);
        $criteria->compare('t.vtrc_notes', $this->vtrc_notes, true);
        $criteria->compare('t.vtrc_abs_odo_calc_type', $this->vtrc_abs_odo_calc_type);


        return $criteria;

    }

}
