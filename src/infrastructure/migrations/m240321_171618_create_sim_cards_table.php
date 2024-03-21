<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sim_cards}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%providers}}`
 * - `{{%consumers}}`
 */
class m240321_171618_create_sim_cards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sim_cards}}', [
            'id' => $this->primaryKey(),
            'mobile_number' => $this->string()->notNull(),
            'provider_id' => $this->integer()->notNull(),
            'owner_id' => $this->integer(),
        ]);

        // creates index for column `provider_id`
        $this->createIndex(
            '{{%idx-sim_cards-provider_id}}',
            '{{%sim_cards}}',
            'provider_id'
        );

        // add foreign key for table `{{%providers}}`
        $this->addForeignKey(
            '{{%fk-sim_cards-provider_id}}',
            '{{%sim_cards}}',
            'provider_id',
            '{{%providers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `owner_id`
        $this->createIndex(
            '{{%idx-sim_cards-owner_id}}',
            '{{%sim_cards}}',
            'owner_id'
        );

        // add foreign key for table `{{%consumers}}`
        $this->addForeignKey(
            '{{%fk-sim_cards-owner_id}}',
            '{{%sim_cards}}',
            'owner_id',
            '{{%consumers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%providers}}`
        $this->dropForeignKey(
            '{{%fk-sim_cards-provider_id}}',
            '{{%sim_cards}}'
        );

        // drops index for column `provider_id`
        $this->dropIndex(
            '{{%idx-sim_cards-provider_id}}',
            '{{%sim_cards}}'
        );

        // drops foreign key for table `{{%consumers}}`
        $this->dropForeignKey(
            '{{%fk-sim_cards-owner_id}}',
            '{{%sim_cards}}'
        );

        // drops index for column `owner_id`
        $this->dropIndex(
            '{{%idx-sim_cards-owner_id}}',
            '{{%sim_cards}}'
        );

        $this->dropTable('{{%sim_cards}}');
    }
}
