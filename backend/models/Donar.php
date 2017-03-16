<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "donar".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone_number
 */
class Donar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_number'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['phone_number'], 'string', 'max' => 13],
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
            'phone_number' => Yii::t('app', 'Phone Number'),
        ];
    }
}
