<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $member_id
 * @property int $date_create
 * @property int $fullname
 * @property string $email
 * @property string $phone
 * @property string $receive_fullname
 * @property string $receive_email
 * @property string $receive_phone
 * @property string $address
 * @property string $receive_address
 * @property string $note
 * @property int $status
 * @property string $total_cost
 */
class Bill extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'date_create', 'fullname', 'status'], 'integer'],
            [['note'], 'string'],
            [['email', 'receive_fullname', 'receive_email', 'receive_phone', 'total_cost'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['address', 'receive_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'date_create' => 'Date Create',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'receive_fullname' => 'Receive Fullname',
            'receive_email' => 'Receive Email',
            'receive_phone' => 'Receive Phone',
            'address' => 'Address',
            'receive_address' => 'Receive Address',
            'note' => 'Note',
            'status' => 'Status',
            'total_cost' => 'Total Cost',
        ];
    }
}
