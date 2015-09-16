<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'emp_num_cel', 'emp_num_tel'], 'integer'],
            [['emp_mail', 'emp_nosotros', 'emp_nombre', 'emp_facebook', 'emp_twitter', 'emp_galeria'], 'safe'],
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
        $query = Empresa::find();

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
            'emp_id' => $this->emp_id,
            'emp_num_cel' => $this->emp_num_cel,
            'emp_num_tel' => $this->emp_num_tel,
        ]);

        $query->andFilterWhere(['like', 'emp_mail', $this->emp_mail])
            ->andFilterWhere(['like', 'emp_nosotros', $this->emp_nosotros])
            ->andFilterWhere(['like', 'emp_nombre', $this->emp_nombre])
            ->andFilterWhere(['like', 'emp_facebook', $this->emp_facebook])
            ->andFilterWhere(['like', 'emp_twitter', $this->emp_twitter])
            ->andFilterWhere(['like', 'emp_galeria', $this->emp_galeria]);

        return $dataProvider;
    }
}
