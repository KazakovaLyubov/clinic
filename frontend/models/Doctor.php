<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic_name
 * @property string $specialization
 * @property string $number_room
 *
 * @property Reception[] $receptions
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'patronymic_name', 'specialization', 'number_room'], 'required'],
            [['first_name', 'last_name', 'patronymic_name', 'specialization'], 'string', 'max' => 400],
            [['number_room'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'patronymic_name' => 'Patronymic Name',
            'specialization' => 'Specialization',
            'number_room' => 'Number Room',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceptions()
    {
        return $this->hasMany(Reception::className(), ['id_doctor' => 'id']);
    }
}
