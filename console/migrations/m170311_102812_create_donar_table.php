<?php

use yii\db\Migration;

/**
 * Handles the creation of table `donar`.
 */
class m170311_102812_create_donar_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('donar', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(200),
            'phone_number'=>$this->char(13)->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('donar');
    }
}
