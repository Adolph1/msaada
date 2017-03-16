<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_reference_index`.
 */
class m170313_084456_create_tbl_reference_index_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_reference_index', [
            'id' => $this->primaryKey(),
            'code'=>$this->char(5),
            'last_index'=>$this->string(20),
            'last_reference'=>$this->string(200),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_reference_index');
    }
}
