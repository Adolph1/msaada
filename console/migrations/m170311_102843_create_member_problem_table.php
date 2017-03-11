<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member_problem`.
 */
class m170311_102843_create_member_problem_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member_problem', [
            'id' => $this->primaryKey(),
            'member_id'=>$this->integer(),
            'title'=>$this->string(200)->notNull(),
            'description'=>$this->string(200),
            'start_year'=>$this->char(4)->notNull(),
            'amount_required'=>$this->decimal(),
            'total_donated_amount'=>$this->decimal(),
            'status'=>$this->integer(),
            'maker_id'=>$this->string(200),
            'maker_time'=>$this->dateTime(),

        ]);

        // creates index for column `member_id`
        $this->createIndex(
            'idx-member_problem-member_id',
            'member_problem',
            'member_id'
        );


        // add foreign key for table `member`
        $this->addForeignKey(
            'fk-member_problem-member_id',
            'member_problem',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-member_problem-member_id',
            'member_problem'
        );

        // drops index for column `member_id`
        $this->dropIndex(
            'idx-member_problem-member_id',
            'member_problem'
        );
        $this->dropTable('member_problem');
    }
}
