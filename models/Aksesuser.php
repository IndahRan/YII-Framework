<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aksesuser".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $status
 */
class Aksesuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aksesuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'status'], 'required'],
            [['status'], 'integer'],
            [['username', 'password'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }
}
