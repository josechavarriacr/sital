<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Permisos;

/**
 * PermisosSearch represents the model behind the search form about `frontend\models\Permisos`.
 */
class PermisosSearch extends Permisos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codRoll'], 'integer'],
            [['modulo'], 'safe'],
            [['ver', 'crear', 'modificar', 'eliminar', 'estado'], 'boolean'],
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
        $query = Permisos::find();

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
            'codRoll' => $this->codRoll,
            'ver' => $this->ver,
            'crear' => $this->crear,
            'modificar' => $this->modificar,
            'eliminar' => $this->eliminar,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'modulo', $this->modulo]);

        return $dataProvider;
    }
}
