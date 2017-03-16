<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member_problem".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $title
 * @property string $description
 * @property string $start_year
 * @property string $amount_required
 * @property string $total_donated_amount
 * @property integer $status
 * @property string $maker_id
 * @property string $maker_time
 *
 * @property Member $member
 */
class MemberProblem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const PENDING=0;
    const CLOSED=1;

    public static function tableName()
    {
        return 'member_problem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'status'], 'integer'],
            [['title', 'start_year'], 'required'],
            [['amount_required', 'total_donated_amount'], 'number'],
            [['maker_time'], 'safe'],
            [['title', 'description', 'maker_id'], 'string', 'max' => 200],
            [['start_year'], 'string', 'max' => 4],
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
            'member_id' => Yii::t('app', 'Member ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'start_year' => Yii::t('app', 'Start Year'),
            'amount_required' => Yii::t('app', 'Amount Required'),
            'total_donated_amount' => Yii::t('app', 'Total Donated Amount'),
            'status' => Yii::t('app', 'Status'),
            'maker_id' => Yii::t('app', 'Maker ID'),
            'maker_time' => Yii::t('app', 'Maker Time'),
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
