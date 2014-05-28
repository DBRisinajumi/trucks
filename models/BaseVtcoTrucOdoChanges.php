<?php

/**
 * This is the model base class for the table "vtco_truc_odo_changes".
 *
 * Columns in table "vtco_truc_odo_changes" available as properties of the model:
 * @property integer $vtco_id
 * @property integer $vtco_vtrc_id
 * @property string $vtco_vtro_id
 * @property string $vtco_datetime
 * @property string $vtco_old_odo
 * @property string $vtco_new_odo
 * @property string $vtco_notes
 *
 * Relations of table "vtco_truc_odo_changes" available as properties of the model:
 * @property VtroTruckOdometer $vtcoVtro
 * @property VtrcTruck $vtcoVtrc
 */
abstract class BaseVtcoTrucOdoChanges extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtco_truc_odo_changes';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtco_vtrc_id, vtco_old_odo, vtco_new_odo', 'required'),
                array('vtco_notes', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtco_id, vtco_vtrc_id', 'numerical', 'integerOnly' => true),
                array('vtco_vtro_id, vtco_old_odo, vtco_new_odo', 'length', 'max' => 10),
                array('vtco_notes', 'safe'),
                array('vtco_id, vtco_vtrc_id, vtco_vtro_id, vtco_datetime, vtco_old_odo, vtco_new_odo, vtco_notes', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtco_vtro_id;
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
                'vtcoVtro' => array(self::BELONGS_TO, 'VtroTruckOdometer', 'vtco_vtro_id'),
                'vtcoVtrc' => array(self::BELONGS_TO, 'VtrcTruck', 'vtco_vtrc_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtco_id' => Yii::t('TrucksModule.model', 'Vtco'),
            'vtco_vtrc_id' => Yii::t('TrucksModule.model', 'Vtco Vtrc'),
            'vtco_vtro_id' => Yii::t('TrucksModule.model', 'Vtco Vtro'),
            'vtco_datetime' => Yii::t('TrucksModule.model', 'Vtco Datetime'),
            'vtco_old_odo' => Yii::t('TrucksModule.model', 'Vtco Old Odo'),
            'vtco_new_odo' => Yii::t('TrucksModule.model', 'Vtco New Odo'),
            'vtco_notes' => Yii::t('TrucksModule.model', 'Vtco Notes'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtco_id', $this->vtco_id);
        $criteria->compare('t.vtco_vtrc_id', $this->vtco_vtrc_id);
        $criteria->compare('t.vtco_vtro_id', $this->vtco_vtro_id);
        $criteria->compare('t.vtco_datetime', $this->vtco_datetime, true);
        $criteria->compare('t.vtco_old_odo', $this->vtco_old_odo, true);
        $criteria->compare('t.vtco_new_odo', $this->vtco_new_odo, true);
        $criteria->compare('t.vtco_notes', $this->vtco_notes, true);


        return $criteria;

    }

}
