<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $mine
 * @property int $size
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['path'], 'string', 'max' => 250],
            [['mine'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'mine' => 'Mine',
            'size' => 'Size',
        ];
    }

    /**
     * Удаления картинки с физической памяти
     */
    public function afterDelete()
    {
        if (fileExists($this->path)) {
            unlink($this->path);
        }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}
