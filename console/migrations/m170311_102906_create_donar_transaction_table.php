<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member_transaction`.
 */
class m170311_102906_create_donar_transaction_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('donar_transaction', [
            'id' => $this->primaryKey(),
            'trn_date'=>$this->date(),
            'donar_number'=>$this->integer(),
            'amount'=>$this->decimal(),
            'member_id'=>$this->integer(),
            'payment_method'=>$this->integer(),
            'source_ref_no'=>$this->string(200),
        ]);

        // creates index for column `member_id`
        $this->createIndex(
            'idx-donar_transaction-member_id',
            'donar_transaction',
            'member_id'
        );


        // add foreign key for table `member`
        $this->addForeignKey(
            'fk-donar_transaction-member_id',
            'donar_transaction',
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
        $this->dropTable('donar_transaction');
    }
}
