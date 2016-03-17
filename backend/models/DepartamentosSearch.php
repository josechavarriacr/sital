<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Departamentos;

/**
 * DepartamentosSearch represents the model behind the search form about `frontend\models\Departamentos`.
 */
class DepartamentosSearch extends Departamentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codUsuario'], 'integer'],
            [['nombreDepartamento'], 'safe'],
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
        $query = Departamentos::find();

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
            'codUsuario' => $this->codUsuario,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombreDepartamento', $this->nombreDepartamento]);

        return $dataProvider;
    }
}
