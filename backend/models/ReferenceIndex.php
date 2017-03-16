<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_reference_index".
 *
 * @property integer $id
 * @property string $code
 * @property string $last_index
 * @property string $last_reference
 */
class ReferenceIndex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_reference_index';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 5],
            [['last_index'], 'string', 'max' => 20],
            [['last_reference'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'last_index' => Yii::t('app', 'Last Index'),
            'last_reference' => Yii::t('app', 'Last Reference'),
        ];
    }
}
