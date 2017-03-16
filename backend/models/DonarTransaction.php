<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "donar_transaction".
 *
 * @property integer $id
 * @property string $trn_date
 * @property integer $donar_number
 * @property string $amount
 * @property integer $member_id
 * @property integer $payment_method
 * @property string $source_ref_no
 *
 * @property Member $member
 */
class DonarTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donar_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trn_date'], 'safe'],
            [['donar_number', 'member_id', 'payment_method'], 'integer'],
            [['amount'], 'number'],
            [['source_ref_no'], 'string', 'max' => 200],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'trn_date' => Yii::t('app', 'Trn Date'),
            'donar_number' => Yii::t('app', 'Donar Number'),
            'amount' => Yii::t('app', 'Amount'),
            'member_id' => Yii::t('app', 'Member ID'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'source_ref_no' => Yii::t('app', 'Source Ref No'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
