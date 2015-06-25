<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    public $_id;
    public $username;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // create
            [['username', 'password'], 'required', 'on' => 'create'],
            [['username', 'password'], 'string', 'min' => 6, 'max' => 18, 'on' => 'create'],
            
            // update
            [['_id', 'username', 'password'], 'required', 'on' => 'update'],
            [['username', 'password'], 'string', 'min' => 6, 'max' => 18, 'on' => 'update'],
            
            // 
            [['_id', 'username', 'password'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return [
            'search' => ['username', 'password'],
            'create' => ['username', 'password'],
            'update' => ['username', 'password', '_id'],
        ];
    }
    
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }
    
    public function afterValidate() {
        parent::afterValidate();
        
    }
    
    /**
     * 检索
     * @param type $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params){
        
        $this->load($params);
        
        $query = UserModel::find();
        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['like', 'password', $this->password]);
        
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['username'=>SORT_ASC, 'password'=>SORT_ASC]
            ],
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        
        return $dataProvider;
    }
    
    
}
