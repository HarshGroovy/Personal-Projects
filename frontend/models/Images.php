<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $user_id
 * @property string $image_original_name
 * @property string $image_name
 * @property string $image_type
 * @property string|null $user_role
 * @property string $main_image
 * @property string|null $image_link
 * @property int $created_at
 * @property int $updated_at
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'image_original_name', 'image_name', 'image_type', 'created_at', 'updated_at'], 'required'],
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['image_original_name', 'main_image', 'image_link'], 'string', 'max' => 255],
            [['image_name'], 'string', 'max' => 50],
            [['image_type'], 'string', 'max' => 20],
            [['user_role'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image_original_name' => 'Image Original Name',
            'image_name' => 'Image Name',
            'image_type' => 'Image Type',
            'user_role' => 'User Role',
            'main_image' => 'Main Image',
            'image_link' => 'Image Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
