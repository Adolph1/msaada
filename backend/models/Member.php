<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $member_number
 * @property string $first_name
 * @property string $middle_name
 * @property string $surname
 * @property string $phone_number
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $current_address
 * @property string $photo
 * @property string $finger_print
 * @property string $maker_id
 * @property string $maker_time
 *
 * @property DonarTransaction[] $donarTransactions
 * @property MemberProblem[] $memberProblems
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_number', 'first_name', 'surname'], 'required'],
            [['date_of_birth', 'maker_time'], 'safe'],
            [['member_number', 'first_name', 'middle_name', 'surname', 'phone_number', 'place_of_birth', 'current_address', 'photo', 'finger_print', 'maker_id'], 'string', 'max' => 200],
            [['member_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'member_number' => Yii::t('app', 'Member Number'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'surname' => Yii::t('app', 'Surname'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'place_of_birth' => Yii::t('app', 'Place Of Birth'),
            'current_address' => Yii::t('app', 'Current Address'),
            'photo' => Yii::t('app', 'Photo'),
            'finger_print' => Yii::t('app', 'Finger Print'),
            'maker_id' => Yii::t('app', 'Maker ID'),
            'maker_time' => Yii::t('app', 'Maker Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonarTransactions()
    {
        return $this->hasMany(DonarTransaction::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberProblems()
    {
        return $this->hasMany(MemberProblem::className(), ['member_id' => 'id']);
    }
}
