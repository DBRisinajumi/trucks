<?php

/**
 * This is the model base class for the table "vtls_trailer_service".
 *
 * Columns in table "vtls_trailer_service" available as properties of the model:
 * @property string $vtls_id
 * @property integer $vtls_vtrl_id
 * @property integer $vtls_vsrv_id
 * @property string $vtls_notes
 * @property string $vtls_fixr_id
 *
 * Relations of table "vtls_trailer_service" available as properties of the model:
 * @property VtrlTrailer $vtlsVtrl
 * @property VsrvServices $vtlsVsrv
 */
abstract class BaseVtlsTrailerService extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vtls_trailer_service';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('vtls_vtrl_id', 'required'),
                array('vtls_vsrv_id, vtls_notes, vtls_fixr_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtls_vtrl_id, vtls_vsrv_id', 'numerical', 'integerOnly' => true),
                array('vtls_fixr_id', 'length', 'max' => 10),
                array('vtls_notes', 'safe'),
                array('vtls_id, vtls_vtrl_id, vtls_vsrv_id, vtls_notes, vtls_fixr_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtls_notes;
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
                'vtlsVtrl' => array(self::BELONGS_TO, 'VtrlTrailer', 'vtls_vtrl_id'),
                'vtlsVsrv' => array(self::BELONGS_TO, 'VsrvServices', 'vtls_vsrv_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtls_id' => Yii::t('TrucksModule.model', 'Vtls'),
            'vtls_vtrl_id' => Yii::t('TrucksModule.model', 'Vtls Vtrl'),
            'vtls_vsrv_id' => Yii::t('TrucksModule.model', 'Vtls Vsrv'),
            'vtls_notes' => Yii::t('TrucksModule.model', 'Vtls Notes'),
            'vtls_fixr_id' => Yii::t('TrucksModule.model', 'Vtls Fixr'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.vtls_id', $this->vtls_id, true);
        $criteria->compare('t.vtls_vtrl_id', $this->vtls_vtrl_id);
        $criteria->compare('t.vtls_vsrv_id', $this->vtls_vsrv_id);
        $criteria->compare('t.vtls_notes', $this->vtls_notes, true);
        $criteria->compare('t.vtls_fixr_id', $this->vtls_fixr_id, true);


        return $criteria;

    }

}
