<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "reception_tech".
 *
 * @property int $id
 * @property int $reception_id
 * @property string $date
 * @property int $member_id
 */
class ReceptionTech extends ActiveRecord
{
    public $member_sc;
    public $member_th;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
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
            [['reception_id', 'member_id'], 'required'],
            [['reception_id', 'member_id','member_sc','member_th'], 'integer'],
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
            'member_sc' => Yii::t('main', 'Member ID'),
            'member_th' => Yii::t('main', 'Member ID'),
        ];
    }
    public function getMember(){
        return $this->hasOne(Members::className(),['id'=>'member_id']);
    }
}
