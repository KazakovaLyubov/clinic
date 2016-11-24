<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property integer $id
 * @property integer $id_pacient
 * @property integer $id_doctor
 * @property string $name_diagnosis
 * @property string $date_reception
 * @property integer $status
 *
 * @property Patient $idPacient
 * @property Doctor $idDoctor
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reception';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pacient', 'id_doctor', 'name_diagnosis'], 'required'],
            [['id_pacient', 'id_doctor', 'status'], 'integer'],
            [['date_reception'], 'safe'],
            [['name_diagnosis'], 'string', 'max' => 400],
            [['id_pacient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['id_pacient' => 'id']],
            [['id_doctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id_doctor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pacient' => 'Id Pacient',
            'id_doctor' => 'Id Doctor',
            'name_diagnosis' => 'Name Diagnosis',
            'date_reception' => 'Date Reception',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPacient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'id_pacient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id_doctor']);
    }
}
