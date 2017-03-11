<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_payment_method`.
 */
class m170311_115636_create_tbl_payment_method_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_payment_method', [
            'id' => $this->primaryKey(),
            'method'=>$this->string(200),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_payment_method');
    }
}
