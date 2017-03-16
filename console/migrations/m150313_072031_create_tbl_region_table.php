<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_region`.
 */
class m150313_072031_create_tbl_region_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_region', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(200)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_region');
    }
}
