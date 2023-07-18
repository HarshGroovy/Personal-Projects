<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int $assign_id
 * @property string $type
 * @property string $path
 * @property string $extention
 * @property string $createdAt
 */
class Image extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assign_id', 'type', 'path', 'extention'], 'safe'],
            [['assign_id'], 'integer'],
            // [['createdAt'], 'safe'],
            // [['type'], "safe"],
            // [['path'], 'safe'],
            // [['extention'], "safe"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assign_id' => 'Assign ID',
            'type' => 'Type',
            'path' => 'Path',
            'extention' => 'Extention',
            'createdAt' => 'Created At',
        ];
    }
    public function upload($type=admin)
    {
        if ($this->validate()) {

            $path = '../web/images/' . $this->path->baseName . '.' . $this->path->extension;
            $this->path->saveAs($path);

            // // Save image details to the database
            $image = new Image();
            $image->assign_id = 3; // Assign the appropriate assign_id
            $image->type = $type; // Assign the appropriate type
            $image->path = $path;
            $image->extention = $this->path->extension;
            $image->save();
            if($image->save()){
                echo 'uploaded';
            }
            else{
                echo "/n\$image-ajay 💀<pre>"; print_r($image); echo "\n</pre>";exit;
            }
            // echo "/n \$image->save();-ajay 💀<pre>";
            // print_r($image->save());
            // echo "\n</pre>";
            // exit;

            return true;
        } else {
            return false;
        }
    }

}