<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form about `frontend\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codRoll', 'codExtension'], 'integer'],
            [['nombre', 'correo', 'contrasena'], 'safe'],
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
        $query = Usuarios::find();

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
            'codExtension' => $this->codExtension,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena]);

        return $dataProvider;
    }
}
