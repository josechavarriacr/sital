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
        [['id', 'status', 'created_at', 'updated_at'], 'integer'],
        [['nombre', 'email', 'username', 'password_hash', 'password_reset_token', 'auth_key'], 'safe'],
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
        $query = Usuarios::find()
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
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'estado' => $this->estado,
            ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
        ->andFilterWhere(['like', 'email', $this->email])
        ->andFilterWhere(['like', 'username', $this->username])
        ->andFilterWhere(['like', 'password_hash', $this->password_hash])
        ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
        ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
