<?php

/**
 * This is the model base class for the table "vtrd_trailer_doc".
 *
 * Columns in table "vtrd_trailer_doc" available as properties of the model:
 * @property string $vtrd_id
 * @property integer $vtrd_vtrl_id
 * @property integer $vtrd_vtdt_id
 * @property string $vtrd_number
 * @property string $vtrd_issue_date
 * @property string $vtrd_expire_date
 * @property string $vtrd_notes
 * @property string $vtrd_updated
 * @property integer $vtcd_fcrn_id
 * @property string $vtcd_price
 * @property integer $vtrd_deleted
 *
 * Relations of table "vtrd_trailer_doc" available as properties of the model:
 * @property VtdtTruckDocType $vtrdVtdt
 * @property VtrlTrailer $vtrdVtrl
 * @property FcrnCurrency $vtcdFcrn
 */
abstract class BaseVtrdTrailerDoc extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtrd_trailer_doc';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtrd_vtrl_id', 'required'),
                array('vtrd_vtdt_id, vtrd_number, vtrd_issue_date, vtrd_expire_date, vtrd_notes, vtrd_updated, vtcd_fcrn_id, vtcd_price, vtrd_deleted', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrd_vtrl_id, vtrd_vtdt_id, vtcd_fcrn_id, vtrd_deleted', 'numerical', 'integerOnly' => true),
                array('vtrd_number', 'length', 'max' => 50),
                array('vtcd_price', 'length', 'max' => 10),
                array('vtrd_issue_date, vtrd_expire_date, vtrd_notes, vtrd_updated', 'safe'),
                array('vtrd_id, vtrd_vtrl_id, vtrd_vtdt_id, vtrd_number, vtrd_issue_date, vtrd_expire_date, vtrd_notes, vtrd_updated, vtcd_fcrn_id, vtcd_price, vtrd_deleted', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrd_number;
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
                'vtrdVtdt' => array(self::BELONGS_TO, 'VtdtTruckDocType', 'vtrd_vtdt_id'),
                'vtrdVtrl' => array(self::BELONGS_TO, 'VtrlTrailer', 'vtrd_vtrl_id'),
                'vtcdFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'vtcd_fcrn_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrd_id' => Yii::t('TrucksModule.model', 'Vtrd'),
            'vtrd_vtrl_id' => Yii::t('TrucksModule.model', 'Vtrd Vtrl'),
            'vtrd_vtdt_id' => Yii::t('TrucksModule.model', 'Vtrd Vtdt'),
            'vtrd_number' => Yii::t('TrucksModule.model', 'Vtrd Number'),
            'vtrd_issue_date' => Yii::t('TrucksModule.model', 'Vtrd Issue Date'),
            'vtrd_expire_date' => Yii::t('TrucksModule.model', 'Vtrd Expire Date'),
            'vtrd_notes' => Yii::t('TrucksModule.model', 'Vtrd Notes'),
            'vtrd_updated' => Yii::t('TrucksModule.model', 'Vtrd Updated'),
            'vtcd_fcrn_id' => Yii::t('TrucksModule.model', 'Vtcd Fcrn'),
            'vtcd_price' => Yii::t('TrucksModule.model', 'Vtcd Price'),
            'vtrd_deleted' => Yii::t('TrucksModule.model', 'Vtrd Deleted'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtrd_id', $this->vtrd_id, true);
        $criteria->compare('t.vtrd_vtrl_id', $this->vtrd_vtrl_id);
        $criteria->compare('t.vtrd_vtdt_id', $this->vtrd_vtdt_id);
        $criteria->compare('t.vtrd_number', $this->vtrd_number, true);
        $criteria->compare('t.vtrd_issue_date', $this->vtrd_issue_date, true);
        $criteria->compare('t.vtrd_expire_date', $this->vtrd_expire_date, true);
        $criteria->compare('t.vtrd_notes', $this->vtrd_notes, true);
        $criteria->compare('t.vtrd_updated', $this->vtrd_updated, true);
        $criteria->compare('t.vtcd_fcrn_id', $this->vtcd_fcrn_id);
        $criteria->compare('t.vtcd_price', $this->vtcd_price, true);
        $criteria->compare('t.vtrd_deleted', $this->vtrd_deleted);


        return $criteria;

    }

}
