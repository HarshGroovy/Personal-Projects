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
class Joblist extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc;
    /**
     * {@inheritdoc}
     */
    public static function tablename() { return 'Joblist'; }
    public function rules()
    {   
        return [
            [['Title', 'location', 'date', 'package','position','type'], 'required'],
        ];
    }

}