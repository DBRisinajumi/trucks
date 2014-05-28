<?php

/**
 * This is the model base class for the table "vtro_truck_odometer".
 *
 * Columns in table "vtro_truck_odometer" available as properties of the model:
 * @property string $vtro_id
 * @property integer $vtro_vtrc_id
 * @property string $vtro_datetime
 * @property string $vtro_odo
 * @property string $vtro_abs_odo
 *
 * Relations of table "vtro_truck_odometer" available as properties of the model:
 * @property VtcoTrucOdoChanges[] $vtcoTrucOdoChanges
 * @property VtrcTruck $vtroVtrc
 */
abstract class BaseVtroTruckOdometer extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtro_truck_odometer';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtro_vtrc_id, vtro_odo, vtro_abs_odo', 'required'),
                array('vtro_vtrc_id', 'numerical', 'integerOnly' => true),
                array('vtro_odo, vtro_abs_odo', 'length', 'max' => 10),
                array('vtro_id, vtro_vtrc_id, vtro_datetime, vtro_odo, vtro_abs_odo', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtro_datetime;
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
                'vtcoTrucOdoChanges' => array(self::HAS_MANY, 'VtcoTrucOdoChanges', 'vtco_vtro_id'),
                'vtroVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vtro_vtrc_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtro_id' => Yii::t('TrucksModule.model', 'Vtro'),
            'vtro_vtrc_id' => Yii::t('TrucksModule.model', 'Vtro Vtrc'),
            'vtro_datetime' => Yii::t('TrucksModule.model', 'Vtro Datetime'),
            'vtro_odo' => Yii::t('TrucksModule.model', 'Vtro Odo'),
            'vtro_abs_odo' => Yii::t('TrucksModule.model', 'Vtro Abs Odo'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtro_id', $this->vtro_id, true);
        $criteria->compare('t.vtro_vtrc_id', $this->vtro_vtrc_id);
        $criteria->compare('t.vtro_datetime', $this->vtro_datetime, true);
        $criteria->compare('t.vtro_odo', $this->vtro_odo, true);
        $criteria->compare('t.vtro_abs_odo', $this->vtro_abs_odo, true);


        return $criteria;

    }

}
