<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property int $id
 * @property string $title
 * @property string $code
 *
 * @property ApartmentProvider[] $apartmentProviders
 * @property SimCard[] $simCards
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'code'], 'required'],
            [['title', 'code'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[ApartmentProviders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentProviders()
    {
        return $this->hasMany(ApartmentProvider::class, ['provider_id' => 'id']);
    }

    /**
     * Gets query for [[SimCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSimCards()
    {
        return $this->hasMany(SimCard::class, ['provider_id' => 'id']);
    }
}
