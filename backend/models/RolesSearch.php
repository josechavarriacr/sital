<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Roles;

/**
 * RolesSearch represents the model behind the search form about `frontend\models\Roles`.
 */
class RolesSearch extends Roles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'integer'],
            [['rol', 'descripcion'], 'safe'],
            [['estado'], 'boolean'],
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
        $query = Roles::find();
               // ->where("estado=false"); // solo me mostraría los que el estado este en false

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
            'codigo' => $this->codigo,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'rol', $this->rol])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
