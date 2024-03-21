<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device_sim_cards}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%devices}}`
 * - `{{%sim_cards}}`
 */
class m240321_173331_create_device_sim_cards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_sim_cards}}', [
            'id' => $this->primaryKey(),
            'device_id' => $this->integer()->notNull(),
            'sim_card_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `device_id`
        $this->createIndex(
            '{{%idx-device_sim_cards-device_id}}',
            '{{%device_sim_cards}}',
            'device_id'
        );

        // add foreign key for table `{{%devices}}`
        $this->addForeignKey(
            '{{%fk-device_sim_cards-device_id}}',
            '{{%device_sim_cards}}',
            'device_id',
            '{{%devices}}',
            'id',
            'CASCADE'
        );

        // creates index for column `sim_card_id`
        $this->createIndex(
            '{{%idx-device_sim_cards-sim_card_id}}',
            '{{%device_sim_cards}}',
            'sim_card_id'
        );

        // add foreign key for table `{{%sim_cards}}`
        $this->addForeignKey(
            '{{%fk-device_sim_cards-sim_card_id}}',
            '{{%device_sim_cards}}',
            'sim_card_id',
            '{{%sim_cards}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%devices}}`
        $this->dropForeignKey(
            '{{%fk-device_sim_cards-device_id}}',
            '{{%device_sim_cards}}'
        );

        // drops index for column `device_id`
        $this->dropIndex(
            '{{%idx-device_sim_cards-device_id}}',
            '{{%device_sim_cards}}'
        );

        // drops foreign key for table `{{%sim_cards}}`
        $this->dropForeignKey(
            '{{%fk-device_sim_cards-sim_card_id}}',
            '{{%device_sim_cards}}'
        );

        // drops index for column `sim_card_id`
        $this->dropIndex(
            '{{%idx-device_sim_cards-sim_card_id}}',
            '{{%device_sim_cards}}'
        );

        $this->dropTable('{{%device_sim_cards}}');
    }
}
