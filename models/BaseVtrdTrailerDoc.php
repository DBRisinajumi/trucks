<?php

/**
 * This is the model base class for the table "vtrd_trailer_doc".
 *
 * Columns in table "vtrd_trailer_doc" available as properties of the model:
 * @property string $vtrd_id
 * @property integer $vtrd_vtrl_id
 * @property integer $vtrd_vtdt_id
 * @property string $vtrd_fixr_id
 * @property string $vtrd_number
 * @property string $vtrd_issue_date
 * @property string $vtrd_expire_date
 * @property string $vtrd_notes
 *
 * Relations of table "vtrd_trailer_doc" available as properties of the model:
 * @property FixrFiitXRef $vtrdFixr
 * @property VtdtTruckDocType $vtrdVtdt
 * @property VtrlTrailer $vtrdVtrl
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
                array('vtrd_vtdt_id, vtrd_fixr_id, vtrd_number, vtrd_issue_date, vtrd_expire_date, vtrd_notes', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrd_vtrl_id, vtrd_vtdt_id', 'numerical', 'integerOnly' => true),
                array('vtrd_fixr_id', 'length', 'max' => 10),
                array('vtrd_number', 'length', 'max' => 50),
                array('vtrd_issue_date, vtrd_expire_date, vtrd_notes', 'safe'),
                array('vtrd_id, vtrd_vtrl_id, vtrd_vtdt_id, vtrd_fixr_id, vtrd_number, vtrd_issue_date, vtrd_expire_date, vtrd_notes', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrd_fixr_id;
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
                'vtrdFixr' => array(self::BELONGS_TO, 'FixrFiitXRef', 'vtrd_fixr_id'),
                'vtrdVtdt' => array(self::BELONGS_TO, 'VtdtTruckDocType', 'vtrd_vtdt_id'),
                'vtrdVtrl' => array(self::BELONGS_TO, 'VtrlTrailer', 'vtrd_vtrl_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrd_id' => Yii::t('TrucksModule.model', 'Vtrd'),
            'vtrd_vtrl_id' => Yii::t('TrucksModule.model', 'Vtrd Vtrl'),
            'vtrd_vtdt_id' => Yii::t('TrucksModule.model', 'Vtrd Vtdt'),
            'vtrd_fixr_id' => Yii::t('TrucksModule.model', 'Vtrd Fixr'),
            'vtrd_number' => Yii::t('TrucksModule.model', 'Vtrd Number'),
            'vtrd_issue_date' => Yii::t('TrucksModule.model', 'Vtrd Issue Date'),
            'vtrd_expire_date' => Yii::t('TrucksModule.model', 'Vtrd Expire Date'),
            'vtrd_notes' => Yii::t('TrucksModule.model', 'Vtrd Notes'),
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
        $criteria->compare('t.vtrd_fixr_id', $this->vtrd_fixr_id);
        $criteria->compare('t.vtrd_number', $this->vtrd_number, true);
        $criteria->compare('t.vtrd_issue_date', $this->vtrd_issue_date, true);
        $criteria->compare('t.vtrd_expire_date', $this->vtrd_expire_date, true);
        $criteria->compare('t.vtrd_notes', $this->vtrd_notes, true);


        return $criteria;

    }

}
