<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id_obat
 * @property string $namaObat
 * @property string $khasiat
 * @property int $id_pasien
 *
 * @property Pasien $pasien
 * @property Tagihan[] $tagihans
 */
class obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namaObat', 'khasiat', 'id_pasien'], 'required'],
            [['id_pasien'], 'integer'],
            [['namaObat', 'khasiat'], 'string', 'max' => 250],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'namaObat' => 'Nama Obat',
            'khasiat' => 'Khasiat',
            'id_pasien' => 'Id Pasien',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Tagihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagihans()
    {
        return $this->hasMany(Tagihan::class, ['id_obat' => 'id_obat']);
    }
}
