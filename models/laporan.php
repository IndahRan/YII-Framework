<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property string $dateLaporan
 * @property int $id_tagihan
 *
 * @property Tagihan $tagihan
 */
class laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateLaporan', 'id_tagihan'], 'required'],
            [['dateLaporan'], 'safe'],
            [['id_tagihan'], 'integer'],
            [['id_tagihan'], 'exist', 'skipOnError' => true, 'targetClass' => Tagihan::class, 'targetAttribute' => ['id_tagihan' => 'id_tagihan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dateLaporan' => 'Date Laporan',
            'id_tagihan' => 'Id Tagihan',
        ];
    }

    /**
     * Gets query for [[Tagihan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagihan()
    {
        return $this->hasOne(Tagihan::class, ['id_tagihan' => 'id_tagihan']);
    }
}
