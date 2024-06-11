<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id_tindakan
 * @property string $namaTindakan
 * @property int $id_pegawai
 * @property int $id_pasien
 *
 * @property Pasien $pasien
 * @property Pegawai $pegawai
 * @property Tagihan[] $tagihans
 */
class tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tindakan', 'namaTindakan', 'id_pegawai', 'id_pasien'], 'required'],
            [['id_tindakan', 'id_pegawai', 'id_pasien'], 'integer'],
            [['namaTindakan'], 'string', 'max' => 250],
            [['id_tindakan'], 'unique'],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tindakan' => 'Id Tindakan',
            'namaTindakan' => 'Nama Tindakan',
            'id_pegawai' => 'Id Pegawai',
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
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, ['id_pegawai' => 'id_pegawai']);
    }

    /**
     * Gets query for [[Tagihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagihans()
    {
        return $this->hasMany(Tagihan::class, ['id_tindakan' => 'id_tindakan']);
    }
}
