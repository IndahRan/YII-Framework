<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id_pasien
 * @property string $nama
 * @property string $alamat
 * @property string $diagnosaPenyakit
 *
 * @property Obat[] $obats
 * @property Tagihan[] $tagihans
 * @property Tindakan[] $tindakans
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'diagnosaPenyakit'], 'required'],
            [['nama', 'alamat', 'diagnosaPenyakit'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'diagnosaPenyakit' => 'Diagnosa Penyakit',
        ];
    }

    /**
     * Gets query for [[Obats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObats()
    {
        return $this->hasMany(Obat::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Tagihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagihans()
    {
        return $this->hasMany(Tagihan::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Tindakans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakans()
    {
        return $this->hasMany(Tindakan::class, ['id_pasien' => 'id_pasien']);
    }
}
