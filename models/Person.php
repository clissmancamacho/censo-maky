<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * @property string $zona
 * @property string $recomendado
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User[] $users
 */
class Person extends \yii\db\ActiveRecord
{
    const DELETE = 0;
    const ACTIVE = 1;

    const SCENARIO_CENSO = 'censo';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'cedula'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'apellido', 'cedula', 'telefono', 'puesto'], 'string', 'max' => 60],
            [['direccion', 'barrio', 'zona', 'recomendado'], 'string', 'max' => 255],
            [['cedula'], 'validateCedula', 'on' => self::SCENARIO_CENSO],
        ];
    }

    public function validateCedula($attribute, $params)
    {
  
        $person = Person::find()->where(['cedula' => $this->cedula])->one();
        if($person) {
            $censo = Censo::find()->where(['person_id' => $person->id])->one();
            if($censo){
                $this->addError($attribute, 'Cédula ya utilizada.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'cedula' => 'Cedula',
            'direccion' => 'Direccion',
            'barrio' => 'Barrio',
            'telefono' => 'Telefono',
            'zona' => 'Zona',
            'puesto' => 'Puesto',
            'recomendado' => 'Recomendado',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert) {
                $this->status = Person::ACTIVE;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['person_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCensos()
    {
        return $this->hasMany(Censo::className(), ['person_id' => 'id']);
    }
}
