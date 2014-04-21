<?php

/**
 * This is the model base class for the table "vtdt_truck_doc_type".
 *
 * Columns in table "vtdt_truck_doc_type" available as properties of the model:
 * @property integer $vtdt_id
 * @property string $vtdt_name
 * @property integer $vtdt_hidded
 *
 * Relations of table "vtdt_truck_doc_type" available as properties of the model:
 * @property VtdcTruckDoc[] $vtdcTruckDocs
 */
abstract class BaseVtdtTruckDocType extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtdt_truck_doc_type';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtdt_name', 'required'),
                array('vtdt_hidded', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtdt_hidded', 'numerical', 'integerOnly' => true),
                array('vtdt_name', 'length', 'max' => 50),
                array('vtdt_id, vtdt_name, vtdt_hidded', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtdt_name;
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
                'vtdcTruckDocs' => array(self::HAS_MANY, 'VtdcTruckDoc', 'vtdc_vtdt_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtdt_id' => Yii::t('TrucksModule.model', 'Vtdt'),
            'vtdt_name' => Yii::t('TrucksModule.model', 'Vtdt Name'),
            'vtdt_hidded' => Yii::t('TrucksModule.model', 'Vtdt Hidded'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtdt_id', $this->vtdt_id);
        $criteria->compare('t.vtdt_name', $this->vtdt_name, true);
        $criteria->compare('t.vtdt_hidded', $this->vtdt_hidded);


        return $criteria;

    }

}
