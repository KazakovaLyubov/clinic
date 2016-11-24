<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic_name
 * @property string $date_of_birth
 * @property string $address
 *
 * @property Reception[] $receptions
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'patronymic_name', 'date_of_birth', 'address'], 'required'],
            [['date_of_birth'], 'safe'],
            [['first_name', 'last_name', 'patronymic_name', 'address'], 'string', 'max' => 400],
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
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceptions()
    {
        return $this->hasMany(Reception::className(), ['id_pacient' => 'id']);
    }
}
