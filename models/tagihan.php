<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $id_pasien
 * @property string $diagnosaPenyakit
 * @property int $id_tindakan
 * @property int $id_obat
 * @property int $id_pegawai
 *
 * @property Obat $obat
 * @property Pasien $pasien
 * @property Pegawai $pegawai
 * @property Tindakan $tindakan
 */
class tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'diagnosaPenyakit', 'id_tindakan', 'id_obat', 'id_pegawai'], 'required'],
            [['id_pasien', 'id_tindakan', 'id_obat', 'id_pegawai'], 'integer'],
            [['diagnosaPenyakit', 'totalTagihan'], 'string', 'max' => 250],
            [['id_obat'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['id_obat' => 'id_obat']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
            [['id_tindakan'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['id_tindakan' => 'id_tindakan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'diagnosaPenyakit' => 'Diagnosa Penyakit',
            'id_tindakan' => 'Id Tindakan',
            'id_obat' => 'Id Obat',
            'id_pegawai' => 'Id Pegawai',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id_obat' => 'id_obat']);
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
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id_tindakan' => 'id_tindakan']);
    }
}
