<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Extensiones;

/**
 * ExtensionesSearch represents the model behind the search form about `frontend\models\Extensiones`.
 */
class ExtensionesSearch extends Extensiones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['codigo', 'numero'], 'integer'],
        [['nombre'], 'safe'],
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
        $query = Extensiones::find()
        ->where(['estado'=>1])
        ->orderBy(['estado'=>SORT_DESC ]);

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
            'numero' => $this->numero,
            'estado' => $this->estado,
            ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
