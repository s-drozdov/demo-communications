<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "device_categories".
 *
 * @property int $id
 * @property string $code
 * @property string $title
 *
 * @property DeviceModel[] $deviceModels
 */
class DeviceCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'title'], 'required'],
            [['code', 'title'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[DeviceModels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceModels()
    {
        return $this->hasMany(DeviceModel::class, ['device_category_id' => 'id']);
    }
}
