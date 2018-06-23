<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "member_salary".
 *
 * @property int $id
 * @property int $member_id
 * @property string $aum
 * @property string $date
 * @property string $comment
 * @property string $create_date
 * @property string $update_date
 */
class MemberSalary extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_salary';
    }


    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'sum', 'date','currency_id','type_pay'], 'required'],
            [['member_id','currency_id','type_pay'], 'integer'],
            [['sum'], 'number'],
            [['date', 'create_date', 'update_date'], 'safe'],
            [['comment'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'member_id' => Yii::t('main', 'Member ID'),
            'sum' => Yii::t('main', 'Sum'),
            'currency_id'=>Yii::t('main','Currency ID'),
            'type_pay'=>Yii::t('main','Type Pay'),
            'date' => Yii::t('main', 'Date'),
            'comment' => Yii::t('main', 'Comment'),
            'create_date' => Yii::t('main', 'Create Date'),
            'update_date' => Yii::t('main', 'Update Date'),
        ];
    }

    public function getMember(){
        return $this->hasOne(Members::className(),['id'=>'member_id']);
    }
}
