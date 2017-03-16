<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m170311_102619_create_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member', [
            'id' => $this->primaryKey(),
            'member_number'=>$this->string(200)->unique()->notNull(),
            'district_id'=>$this->integer()->notNull(),
            'first_name'=>$this->string(200)->notNull(),
            'middle_name'=>$this->string(200),
            'gender'=>$this->char(1),
            'surname'=>$this->string(200)->notNull(),
            'phone_number'=>$this->string(200),
            'date_of_birth'=>$this->date(),
            'place_of_birth'=>$this->string(200),
            'current_address'=>$this->string(200),
            'photo'=>$this->string(200),
            'finger_print'=>$this->string(200),
            'maker_id'=>$this->string(200),
            'maker_time'=>$this->dateTime(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('member');
    }
}
