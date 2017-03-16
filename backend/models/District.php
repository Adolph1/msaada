<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $region_id
 *
 * @property TblRegion $region
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'region_id' => Yii::t('app', 'Region ID'),
        ];
    }

    //gets all Districts

    public static function getAll()
    {
        return ArrayHelper::map(District::find()->all(),'id','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public static function getName($id)
    {
        if (($model = District::findOne($id)) !== null) {
            return $model->name;
        } else {
            return '';
        }
    }
}
