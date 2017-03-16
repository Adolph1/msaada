<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_district`.
 */
class m150313_073950_create_tbl_district_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_district', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(200)->notNull(),
            'region_id'=>$this->integer()->notNull(),
        ]);

        // creates index for column `member_id`
        $this->createIndex(
            'idx-tbl_district-region_id',
            'tbl_district',
            'region_id'
        );


        // add foreign key for table `member`
        $this->addForeignKey(
            'fk-tbl_district-region_id',
            'tbl_district',
            'region_id',
            'tbl_region',
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
            'fk-tbl_district-region_id',
            'tbl_district'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            'idx-tbl_district-region_id',
            'tbl_district'
        );
        $this->dropTable('tbl_district');
    }
}
