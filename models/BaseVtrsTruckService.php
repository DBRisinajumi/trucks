<?php

/**
 * This is the model base class for the table "vtrs_truck_service".
 *
 * Columns in table "vtrs_truck_service" available as properties of the model:
 * @property string $vtrs_id
 * @property integer $vtrs_vtrc_id
 * @property integer $vtrs_vsrv_id
 * @property string $vtrs_fixr_id
 * @property string $vtrs_notes
 *
 * Relations of table "vtrs_truck_service" available as properties of the model:
 * @property FixrFiitXRef $vtrsFixr
 * @property VtrcTruck $vtrsVtrc
 * @property VsrvServices $vtrsVsrv
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
                array('vtrs_vsrv_id, vtrs_fixr_id, vtrs_notes', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrs_vtrc_id, vtrs_vsrv_id', 'numerical', 'integerOnly' => true),
                array('vtrs_fixr_id', 'length', 'max' => 10),
                array('vtrs_notes', 'safe'),
                array('vtrs_id, vtrs_vtrc_id, vtrs_vsrv_id, vtrs_fixr_id, vtrs_notes', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrs_fixr_id;
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
                'vtrsFixr' => array(self::BELONGS_TO, 'FixrFiitXRef', 'vtrs_fixr_id'),
                'vtrsVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vtrs_vtrc_id'),
                'vtrsVsrv' => array(self::BELONGS_TO, 'VsrvServices', 'vtrs_vsrv_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrs_id' => Yii::t('TrucksModule.model', 'Vtrs'),
            'vtrs_vtrc_id' => Yii::t('TrucksModule.model', 'Vtrs Vtrc'),
            'vtrs_vsrv_id' => Yii::t('TrucksModule.model', 'Vtrs Vsrv'),
            'vtrs_fixr_id' => Yii::t('TrucksModule.model', 'Vtrs Fixr'),
            'vtrs_notes' => Yii::t('TrucksModule.model', 'Vtrs Notes'),
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
        $criteria->compare('t.vtrs_fixr_id', $this->vtrs_fixr_id);
        $criteria->compare('t.vtrs_notes', $this->vtrs_notes, true);


        return $criteria;

    }

}
