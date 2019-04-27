<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Censo;

/**
 * CensoSearch represents the model behind the search form of `app\models\Censo`.
 */
class CensoSearch extends Censo
{
    public $person_nombre;
    public $person_apellido;
    public $person_cedula;
    public $person_direccion;
    public $person_barrio;
    public $person_telefono;
    public $person_zona;
    public $person_puesto;
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id', 'person_id', 'status'], 'integer'],
            [['created_at', 'updated_at','person_nombre', 'person_apellido', 'person_cedula', 'person_direccion', 'person_barrio', 'person_telefono', 'person_zona', 'person_puesto'] , 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Censo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // Join con Person
        $query->joinWith('person');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'person_id' => $this->person_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'person.nombre', $this->person_nombre])
            ->andFilterWhere(['like', 'person.apellido', $this->person_apellido])
            ->andFilterWhere(['like', 'person.cedula', $this->person_cedula])
            ->andFilterWhere(['like', 'person.direccion', $this->person_direccion])
            ->andFilterWhere(['like', 'person.barrio', $this->person_barrio])
            ->andFilterWhere(['like', 'person.telefono', $this->person_telefono])
            ->andFilterWhere(['like', 'person.zona', $this->person_zona])
            ->andFilterWhere(['like', 'person.puesto', $this->person_puesto]);

        return $dataProvider;
    }
}
