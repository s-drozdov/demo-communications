<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device_models}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%device_categories}}`
 */
class m240321_172551_create_device_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_models}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'device_category_id' => $this->integer()->notNull(),
            'sim_slots_number' => $this->integer()->defaultValue(0),
            'has_wifi_adapter' => $this->boolean()->notNull()->defaultValue(false),
            'has_ethernet_adapter' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        // creates index for column `device_category_id`
        $this->createIndex(
            '{{%idx-device_models-device_category_id}}',
            '{{%device_models}}',
            'device_category_id'
        );

        // add foreign key for table `{{%device_categories}}`
        $this->addForeignKey(
            '{{%fk-device_models-device_category_id}}',
            '{{%device_models}}',
            'device_category_id',
            '{{%device_categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%device_categories}}`
        $this->dropForeignKey(
            '{{%fk-device_models-device_category_id}}',
            '{{%device_models}}'
        );

        // drops index for column `device_category_id`
        $this->dropIndex(
            '{{%idx-device_models-device_category_id}}',
            '{{%device_models}}'
        );

        $this->dropTable('{{%device_models}}');
    }
}
