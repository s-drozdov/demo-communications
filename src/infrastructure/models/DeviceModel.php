<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "device_models".
 *
 * @property int $id
 * @property string $title
 * @property int $device_category_id
 * @property int|null $sim_slots_number
 * @property bool $has_wifi_adapter
 * @property bool $has_ethernet_adapter
 *
 * @property DeviceCategory $deviceCategory
 * @property Device[] $devices
 */
class DeviceModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'device_category_id'], 'required'],
            [['device_category_id', 'sim_slots_number'], 'default', 'value' => null],
            [['device_category_id', 'sim_slots_number'], 'integer'],
            [['has_wifi_adapter', 'has_ethernet_adapter'], 'boolean'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['device_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeviceCategory::class, 'targetAttribute' => ['device_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'device_category_id' => 'Device Category ID',
            'sim_slots_number' => 'Sim Slots Number',
            'has_wifi_adapter' => 'Has Wifi Adapter',
            'has_ethernet_adapter' => 'Has Ethernet Adapter',
        ];
    }

    /**
     * Gets query for [[DeviceCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceCategory()
    {
        return $this->hasOne(DeviceCategory::class, ['id' => 'device_category_id']);
    }

    /**
     * Gets query for [[Devices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::class, ['device_model_id' => 'id']);
    }
}
