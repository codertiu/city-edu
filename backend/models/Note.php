<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property int $reception_id
 * @property string $create_date
 * @property int $creator
 * @property string $text
 * @property string $admin_name
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reception_id', 'create_date', 'creator', 'text', 'admin_name'], 'required'],
            [['reception_id', 'creator'], 'integer'],
            [['create_date'], 'safe'],
            [['text', 'admin_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'reception_id' => Yii::t('main', 'Reception ID'),
            'create_date' => Yii::t('main', 'Create Date'),
            'creator' => Yii::t('main', 'Creator'),
            'text' => Yii::t('main', 'Text'),
            'admin_name' => Yii::t('main', 'Admin Name'),
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'creator']);
    }
}
