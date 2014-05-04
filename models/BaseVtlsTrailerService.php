<?php

/**
 * This is the model base class for the table "vtls_trailer_service".
 *
 * Columns in table "vtls_trailer_service" available as properties of the model:
 * @property string $vtls_id
 * @property integer $vtls_vtrl_id
 * @property integer $vtls_vsrv_id
 * @property string $vtls_start_date
 * @property string $vtls_end_date
 * @property string $vtls_notes
 * @property string $vtls_price
 * @property integer $vtls_fcrn_id
 * @property integer $vtls_deleted
 *
 * Relations of table "vtls_trailer_service" available as properties of the model:
 * @property VsrvServices $vtlsVsrv
 * @property VtrlTrailer $vtlsVtrl
 * @property FcrnCurrency $vtlsFcrn
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
                array('vtls_vsrv_id, vtls_start_date, vtls_end_date, vtls_notes, vtls_price, vtls_fcrn_id, vtls_deleted', 'default', 'setOnEmpty' => true, 'value' => null),
                array('vtls_vtrl_id, vtls_vsrv_id, vtls_fcrn_id, vtls_deleted', 'numerical', 'integerOnly' => true),
                array('vtls_price', 'length', 'max' => 10),
                array('vtls_start_date, vtls_end_date, vtls_notes', 'safe'),
                array('vtls_id, vtls_vtrl_id, vtls_vsrv_id, vtls_start_date, vtls_end_date, vtls_notes, vtls_price, vtls_fcrn_id, vtls_deleted', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->vtls_start_date;
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
                'vtlsVsrv' => array(self::BELONGS_TO, 'VsrvServices', 'vtls_vsrv_id'),
                'vtlsVtrl' => array(self::BELONGS_TO, 'VtrlTrailer', 'vtls_vtrl_id'),
                'vtlsFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'vtls_fcrn_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'vtls_id' => Yii::t('TrucksModule.model', 'Vtls'),
            'vtls_vtrl_id' => Yii::t('TrucksModule.model', 'Vtls Vtrl'),
            'vtls_vsrv_id' => Yii::t('TrucksModule.model', 'Vtls Vsrv'),
            'vtls_start_date' => Yii::t('TrucksModule.model', 'Vtls Start Date'),
            'vtls_end_date' => Yii::t('TrucksModule.model', 'Vtls End Date'),
            'vtls_notes' => Yii::t('TrucksModule.model', 'Vtls Notes'),
            'vtls_price' => Yii::t('TrucksModule.model', 'Vtls Price'),
            'vtls_fcrn_id' => Yii::t('TrucksModule.model', 'Vtls Fcrn'),
            'vtls_deleted' => Yii::t('TrucksModule.model', 'Vtls Deleted'),
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
        $criteria->compare('t.vtls_start_date', $this->vtls_start_date, true);
        $criteria->compare('t.vtls_end_date', $this->vtls_end_date, true);
        $criteria->compare('t.vtls_notes', $this->vtls_notes, true);
        $criteria->compare('t.vtls_price', $this->vtls_price, true);
        $criteria->compare('t.vtls_fcrn_id', $this->vtls_fcrn_id);
        $criteria->compare('t.vtls_deleted', $this->vtls_deleted);


        return $criteria;

    }

}
