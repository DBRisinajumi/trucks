<?php

/**
 * This is the model base class for the table "vsrv_services".
 *
 * Columns in table "vsrv_services" available as properties of the model:
 * @property integer $vsrv_id
 * @property string $vsrv_sys_ccmp_id
 * @property string $vsrv_name
 * @property integer $vsrv_hidded
 *
 * Relations of table "vsrv_services" available as properties of the model:
 * @property CcmpCompany $vsrvSysCcmp
 * @property VtrsTruckService[] $vtrsTruckServices
 */
abstract class BaseVsrvServices extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vsrv_services';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vsrv_sys_ccmp_id, vsrv_name', 'required'),
                array('vsrv_hidded', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vsrv_hidded', 'numerical', 'integerOnly' => true),
                array('vsrv_sys_ccmp_id', 'length', 'max' => 10),
                array('vsrv_name', 'length', 'max' => 256),
                array('vsrv_id, vsrv_sys_ccmp_id, vsrv_name, vsrv_hidded', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vsrv_sys_ccmp_id;
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
                'vsrvSysCcmp' => array(self::BELONGS_TO, 'CcmpCompany', 'vsrv_sys_ccmp_id'),
                'vtrsTruckServices' => array(self::HAS_MANY, 'VtrsTruckService', 'vtrs_vsrv_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vsrv_id' => Yii::t('TrucksModule.model', 'Vsrv'),
            'vsrv_sys_ccmp_id' => Yii::t('TrucksModule.model', 'Vsrv Sys Ccmp'),
            'vsrv_name' => Yii::t('TrucksModule.model', 'Vsrv Name'),
            'vsrv_hidded' => Yii::t('TrucksModule.model', 'Vsrv Hidded'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vsrv_id', $this->vsrv_id);
        $criteria->compare('t.vsrv_sys_ccmp_id', $this->vsrv_sys_ccmp_id);
        $criteria->compare('t.vsrv_name', $this->vsrv_name, true);
        $criteria->compare('t.vsrv_hidded', $this->vsrv_hidded);


        return $criteria;

    }

}
