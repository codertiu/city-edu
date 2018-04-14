<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reception_tech".
 *
 * @property int $id
 * @property int $reception_id
 * @property string $date
 * @property int $member_id
 */
class ReceptionTech extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reception_tech';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reception_id', 'date', 'member_id'], 'required'],
            [['reception_id', 'member_id'], 'integer'],
            [['date'], 'safe'],
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
            'date' => Yii::t('main', 'Date'),
            'member_id' => Yii::t('main', 'Member ID'),
        ];
    }
    public function getMember(){
        return $this->hasOne(Members::className(),['id'=>'member_id']);
    }
}
