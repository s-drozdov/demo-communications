<?php

use yii\db\Migration;
use yii\helpers\ArrayHelper;

/**
 * Class m240321_173849_seed_device_categories_table
 */
class m240321_173849_seed_device_categories_table extends Migration
{
    private const TABLE_NAME = '{{%device_categories}}';

    private const DICTIONARY = [
        [
            'code' => 'smartphone',
            'title' => 'Смартфон',
        ],
        [
            'code' => 'laptop',
            'title' => 'Laptop',
        ],
        [
            'code' => 'tablet',
            'title' => 'Планшет',
        ],
        [
            'code' => 'desktop',
            'title' => 'PC',
        ],
        [
            'code' => 'router',
            'title' => 'Роутер',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (self::DICTIONARY as $value) {
            $this->insert(static::TABLE_NAME, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $codes = ArrayHelper::getColumn(self::DICTIONARY, 'code');

        foreach ($codes as $code) {
            $this->delete(static::TABLE_NAME, ['code' => $code]);
        }

    }
}
