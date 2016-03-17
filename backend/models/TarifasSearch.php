<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tarifas;

/**
 * TarifasSearch represents the model behind the search form about `frontend\models\Tarifas`.
 */
class TarifasSearch extends Tarifas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codCliente', 'codFeriado', 'codTroncal', 'tiempo'], 'integer'],
            [['precio'], 'number'],
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
        $query = Tarifas::find();

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
            'codCliente' => $this->codCliente,
            'codFeriado' => $this->codFeriado,
            'codTroncal' => $this->codTroncal,
            'tiempo' => $this->tiempo,
            'precio' => $this->precio,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
