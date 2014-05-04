<?php

/**
 * This is the model base class for the table "vtrs_truck_service".
 *
 * Columns in table "vtrs_truck_service" available as properties of the model:
 * @property string $vtrs_id
 * @property integer $vtrs_vtrc_id
 * @property integer $vtrs_vsrv_id
 * @property string $vtrs_start_date
 * @property string $vtrs_end_date
 * @property string $vtrs_notes
 * @property string $vtrs_price
 * @property integer $vtrs_fcrn_id
 * @property integer $vtrs_deleted
 *
 * Relations of table "vtrs_truck_service" available as properties of the model:
 * @property VsrvServices $vtrsVsrv
 * @property VtrcTruck $vtrsVtrc
 * @property FcrnCurrency $vtrsFcrn
 */
abstract class BaseVtrsTruckService extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtrs_truck_service';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtrs_vtrc_id', 'required'),
                array('vtrs_vsrv_id, vtrs_start_date, vtrs_end_date, vtrs_notes, vtrs_price, vtrs_fcrn_id, vtrs_deleted', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrs_vtrc_id, vtrs_vsrv_id, vtrs_fcrn_id, vtrs_deleted', 'numerical', 'integerOnly' => true),
                array('vtrs_price', 'length', 'max' => 10),
                array('vtrs_start_date, vtrs_end_date, vtrs_notes', 'safe'),
                array('vtrs_id, vtrs_vtrc_id, vtrs_vsrv_id, vtrs_start_date, vtrs_end_date, vtrs_notes, vtrs_price, vtrs_fcrn_id, vtrs_deleted', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrs_start_date;
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
                'vtrsVsrv' => array(self::BELONGS_TO, 'VsrvServices', 'vtrs_vsrv_id'),
                'vtrsVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vtrs_vtrc_id'),
                'vtrsFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'vtrs_fcrn_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrs_id' => Yii::t('TrucksModule.model', 'Vtrs'),
            'vtrs_vtrc_id' => Yii::t('TrucksModule.model', 'Vtrs Vtrc'),
            'vtrs_vsrv_id' => Yii::t('TrucksModule.model', 'Vtrs Vsrv'),
            'vtrs_start_date' => Yii::t('TrucksModule.model', 'Vtrs Start Date'),
            'vtrs_end_date' => Yii::t('TrucksModule.model', 'Vtrs End Date'),
            'vtrs_notes' => Yii::t('TrucksModule.model', 'Vtrs Notes'),
            'vtrs_price' => Yii::t('TrucksModule.model', 'Vtrs Price'),
            'vtrs_fcrn_id' => Yii::t('TrucksModule.model', 'Vtrs Fcrn'),
            'vtrs_deleted' => Yii::t('TrucksModule.model', 'Vtrs Deleted'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtrs_id', $this->vtrs_id, true);
        $criteria->compare('t.vtrs_vtrc_id', $this->vtrs_vtrc_id);
        $criteria->compare('t.vtrs_vsrv_id', $this->vtrs_vsrv_id);
        $criteria->compare('t.vtrs_start_date', $this->vtrs_start_date, true);
        $criteria->compare('t.vtrs_end_date', $this->vtrs_end_date, true);
        $criteria->compare('t.vtrs_notes', $this->vtrs_notes, true);
        $criteria->compare('t.vtrs_price', $this->vtrs_price, true);
        $criteria->compare('t.vtrs_fcrn_id', $this->vtrs_fcrn_id);
        $criteria->compare('t.vtrs_deleted', $this->vtrs_deleted);


        return $criteria;

    }

}
