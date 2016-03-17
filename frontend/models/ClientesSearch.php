<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Clientes;

/**
 * ClientesSearch represents the model behind the search form about `frontend\models\Clientes`.
 */
class ClientesSearch extends Clientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codTarifas'], 'integer'],
            [['nombre', 'empresa', 'correo', 'telefono'], 'safe'],
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
        $query = Clientes::find()
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
            'codTarifas' => $this->codTarifas,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'empresa', $this->empresa])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
