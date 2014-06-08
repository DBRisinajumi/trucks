<?php

/**
 * This is the model base class for the table "vtdc_truck_doc".
 *
 * Columns in table "vtdc_truck_doc" available as properties of the model:
 * @property string $vtdc_id
 * @property integer $vtdc_vtrc_id
 * @property integer $vtdc_vtdt_id
 * @property string $vtdc_fixr_id
 * @property string $vtdc_number
 * @property string $vtdc_issue_date
 * @property string $vtdc_expire_date
 * @property string $vtdc_notes
 * @property integer $vtdc_deleted
 *
 * Relations of table "vtdc_truck_doc" available as properties of the model:
 * @property FixrFiitXRef $vtdcFixr
 * @property VtdtTruckDocType $vtdcVtdt
 * @property VtrcTruck $vtdcVtrc
 */
abstract class BaseVtdcTruckDoc extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtdc_truck_doc';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtdc_vtrc_id', 'required'),
                array('vtdc_vtdt_id, vtdc_fixr_id, vtdc_number, vtdc_issue_date, vtdc_expire_date, vtdc_notes, vtdc_deleted', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtdc_vtrc_id, vtdc_vtdt_id, vtdc_deleted', 'numerical', 'integerOnly' => true),
                array('vtdc_fixr_id', 'length', 'max' => 10),
                array('vtdc_number', 'length', 'max' => 50),
                array('vtdc_issue_date, vtdc_expire_date, vtdc_notes', 'safe'),
                array('vtdc_id, vtdc_vtrc_id, vtdc_vtdt_id, vtdc_fixr_id, vtdc_number, vtdc_issue_date, vtdc_expire_date, vtdc_notes, vtdc_deleted', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtdc_fixr_id;
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
                'vtdcFixr' => array(self::BELONGS_TO, 'FixrFiitXRef', 'vtdc_fixr_id'),
                'vtdcVtdt' => array(self::BELONGS_TO, 'VtdtTruckDocType', 'vtdc_vtdt_id'),
                'vtdcVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vtdc_vtrc_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtdc_id' => Yii::t('TrucksModule.model', 'Vtdc'),
            'vtdc_vtrc_id' => Yii::t('TrucksModule.model', 'Vtdc Vtrc'),
            'vtdc_vtdt_id' => Yii::t('TrucksModule.model', 'Vtdc Vtdt'),
            'vtdc_fixr_id' => Yii::t('TrucksModule.model', 'Vtdc Fixr'),
            'vtdc_number' => Yii::t('TrucksModule.model', 'Vtdc Number'),
            'vtdc_issue_date' => Yii::t('TrucksModule.model', 'Vtdc Issue Date'),
            'vtdc_expire_date' => Yii::t('TrucksModule.model', 'Vtdc Expire Date'),
            'vtdc_notes' => Yii::t('TrucksModule.model', 'Vtdc Notes'),
            'vtdc_deleted' => Yii::t('TrucksModule.model', 'Vtdc Deleted'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtdc_id', $this->vtdc_id, true);
        $criteria->compare('t.vtdc_vtrc_id', $this->vtdc_vtrc_id);
        $criteria->compare('t.vtdc_vtdt_id', $this->vtdc_vtdt_id);
        $criteria->compare('t.vtdc_fixr_id', $this->vtdc_fixr_id);
        $criteria->compare('t.vtdc_number', $this->vtdc_number, true);
        $criteria->compare('t.vtdc_issue_date', $this->vtdc_issue_date, true);
        $criteria->compare('t.vtdc_expire_date', $this->vtdc_expire_date, true);
        $criteria->compare('t.vtdc_notes', $this->vtdc_notes, true);
        $criteria->compare('t.vtdc_deleted', $this->vtdc_deleted);


        return $criteria;

    }

}
