<?php

/**
 * This is the model base class for the table "vtrl_trailer".
 *
 * Columns in table "vtrl_trailer" available as properties of the model:
 * @property integer $vtrl_id
 * @property string $vtrl_ccmp_id
 * @property string $vtrl_reg_nr
 * @property integer $vtrl_year
 * @property string $vtrl_certificate_number
 * @property double $vtrl_self_weight
 * @property string $vtrl_notes
 *
 * Relations of table "vtrl_trailer" available as properties of the model:
 * @property CcmpCompany $vtrlCcmp
 * @property VvoyVoyage[] $vvoyVoyages
 */
abstract class BaseVtrlTrailer extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtrl_trailer';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtrl_ccmp_id, vtrl_reg_nr, vtrl_year, vtrl_certificate_number, vtrl_self_weight, vtrl_notes', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtrl_year', 'numerical', 'integerOnly' => true),
                array('vtrl_self_weight', 'numerical'),
                array('vtrl_ccmp_id', 'length', 'max' => 10),
                array('vtrl_reg_nr', 'length', 'max' => 20),
                array('vtrl_certificate_number', 'length', 'max' => 100),
                array('vtrl_notes', 'safe'),
                array('vtrl_id, vtrl_ccmp_id, vtrl_reg_nr, vtrl_year, vtrl_certificate_number, vtrl_self_weight, vtrl_notes', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrl_ccmp_id;
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
                'vtrlCcmp' => array(self::BELONGS_TO, 'CcmpCompany', 'vtrl_ccmp_id'),
                'vvoyVoyages' => array(self::HAS_MANY, 'VvoyVoyage', 'vvoy_vtrl_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrl_id' => Yii::t('TrucksModule.model', 'Vtrl'),
            'vtrl_ccmp_id' => Yii::t('TrucksModule.model', 'Vtrl Ccmp'),
            'vtrl_reg_nr' => Yii::t('TrucksModule.model', 'Vtrl Reg Nr'),
            'vtrl_year' => Yii::t('TrucksModule.model', 'Vtrl Year'),
            'vtrl_certificate_number' => Yii::t('TrucksModule.model', 'Vtrl Certificate Number'),
            'vtrl_self_weight' => Yii::t('TrucksModule.model', 'Vtrl Self Weight'),
            'vtrl_notes' => Yii::t('TrucksModule.model', 'Vtrl Notes'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtrl_id', $this->vtrl_id);
        $criteria->compare('t.vtrl_ccmp_id', $this->vtrl_ccmp_id);
        $criteria->compare('t.vtrl_reg_nr', $this->vtrl_reg_nr, true);
        $criteria->compare('t.vtrl_year', $this->vtrl_year);
        $criteria->compare('t.vtrl_certificate_number', $this->vtrl_certificate_number, true);
        $criteria->compare('t.vtrl_self_weight', $this->vtrl_self_weight);
        $criteria->compare('t.vtrl_notes', $this->vtrl_notes, true);


        return $criteria;

    }

}
