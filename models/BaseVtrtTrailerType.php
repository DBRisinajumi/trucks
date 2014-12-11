<?php

/**
 * This is the model base class for the table "vtrt_trailer_type".
 *
 * Columns in table "vtrt_trailer_type" available as properties of the model:
 * @property integer $vtrt_id
 * @property string $vtrt_name
 *
 * Relations of table "vtrt_trailer_type" available as properties of the model:
 * @property VtrlTrailer[] $vtrlTrailers
 */
abstract class BaseVtrtTrailerType extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtrt_trailer_type';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtrt_name', 'required'),
                array('vtrt_name', 'length', 'max' => 50),
                array('vtrt_id, vtrt_name', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtrt_name;
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
                'vtrlTrailers' => array(self::HAS_MANY, 'VtrlTrailer', 'vtrl_vtrt_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtrt_id' => Yii::t('TrucksModule.model', 'Vtrt'),
            'vtrt_name' => Yii::t('TrucksModule.model', 'Vtrt Name'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtrt_id', $this->vtrt_id);
        $criteria->compare('t.vtrt_name', $this->vtrt_name, true);


        return $criteria;

    }

}
