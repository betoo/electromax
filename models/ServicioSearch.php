<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servicio;

/**
 * ServicioSearch represents the model behind the search form about `app\models\Servicio`.
 */
class ServicioSearch extends Servicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ser_id', 'empresa_emp_id'], 'integer'],
            [['ser_servicio', 'ser_imagen', 'serviciocol'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Servicio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ser_id' => $this->ser_id,
            'empresa_emp_id' => $this->empresa_emp_id,
        ]);

        $query->andFilterWhere(['like', 'ser_servicio', $this->ser_servicio])
            ->andFilterWhere(['like', 'ser_imagen', $this->ser_imagen])
            ->andFilterWhere(['like', 'serviciocol', $this->serviciocol]);

        return $dataProvider;
    }
}
