<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_region".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TblDistrict[] $tblDistricts
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    //gets all Regions

    public static function getAll()
    {
        return ArrayHelper::map(Region::find()->all(),'id','name');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDistricts()
    {
        return $this->hasMany(TblDistrict::className(), ['region_id' => 'id']);
    }
}
