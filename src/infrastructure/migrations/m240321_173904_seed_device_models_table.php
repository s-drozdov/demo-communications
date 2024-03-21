<?php

use app\src\domain\enums\DeviceCategoryCode;
use yii\db\Query;
use yii\db\Migration;
use yii\helpers\ArrayHelper;

/**
 * Class m240321_173904_seed_device_models_table
 */
class m240321_173904_seed_device_models_table extends Migration
{
    private const TABLE_NAME = '{{%device_models}}';
    private array $categories;

    public function init()
    {
        parent::init();

        $categories = (new Query())
            ->select(['id', 'code'])
            ->from('{{%device_categories}}')
            ->all();

        $this->categories = ArrayHelper::map($categories, 'code', 'id');
    }

    private function getBasicModels(): array
    {
        return [
            [
                'title' => 'Macbook Pro',
                'device_category_id' => $this->categories[DeviceCategoryCode::Laptop->value],
                'sim_slots_number' => 0,
                'has_wifi_adapter' => true,
                'has_ethernet_adapter' => false,
            ],
            [
                'title' => 'Lenovo Legion 7',
                'device_category_id' => $this->categories[DeviceCategoryCode::Laptop->value],
                'sim_slots_number' => 0,
                'has_wifi_adapter' => true,
                'has_ethernet_adapter' => true,
            ],
            [
                'title' => 'HP DeskJet 720',
                'device_category_id' => $this->categories[DeviceCategoryCode::Desktop->value],
                'sim_slots_number' => 0,
                'has_wifi_adapter' => true,
                'has_ethernet_adapter' => true,
            ],
            [
                'title' => 'iPhone 15 Pro Max',
                'device_category_id' => $this->categories[DeviceCategoryCode::Smartphone->value],
                'sim_slots_number' => 1,
                'has_wifi_adapter' => true,
                'has_ethernet_adapter' => false,
            ],
            [
                'title' => 'iPad Pro',
                'device_category_id' => $this->categories[DeviceCategoryCode::Tablet->value],
                'sim_slots_number' => 1,
                'has_wifi_adapter' => true,
                'has_ethernet_adapter' => false,
            ],
            [
                'title' => 'Intel NUC Mini PC',
                'device_category_id' => $this->categories[DeviceCategoryCode::Desktop->value],
                'sim_slots_number' => 0,
                'has_wifi_adapter' => false,
                'has_ethernet_adapter' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->getBasicModels() as $value) {
            $this->insert(static::TABLE_NAME, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {}
}
