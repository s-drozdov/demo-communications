<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "devices".
 *
 * @property int $id
 * @property int $device_model_id
 * @property int|null $owner_id
 * @property bool $isOn
 *
 * @property DeviceModel $deviceModel
 * @property DeviceSimCard[] $deviceSimCards
 * @property Consumer $owner
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'devices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_model_id'], 'required'],
            [['device_model_id', 'owner_id'], 'default', 'value' => null],
            [['device_model_id', 'owner_id'], 'integer'],
            [['isOn'], 'boolean'],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consumer::class, 'targetAttribute' => ['owner_id' => 'id']],
            [['device_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeviceModel::class, 'targetAttribute' => ['device_model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'device_model_id' => 'Device Model ID',
            'owner_id' => 'Owner ID',
            'isOn' => 'Is On',
        ];
    }

    /**
     * Gets query for [[DeviceModel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceModel()
    {
        return $this->hasOne(DeviceModel::class, ['id' => 'device_model_id']);
    }

    /**
     * Gets query for [[DeviceSimCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceSimCards()
    {
        return $this->hasMany(DeviceSimCard::class, ['device_id' => 'id']);
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Consumer::class, ['id' => 'owner_id']);
    }
}
