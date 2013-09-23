<?php

/**
 * This is the model class for table "arm_baixa".
 *
 * The followings are the available columns in table 'arm_baixa':
 * @property integer $id
 * @property integer $id_cautela
 * @property integer $qtde_municao
 * @property string $data
 * @property string $estado
 */
class baixa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return baixa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'arm_baixa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cautela, data, estado', 'required'),
			array('id_cautela, qtde_municao, qtde_carregador', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_cautela, qtde_municao, data, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cautela'=>array(self::BELONGS_TO,'cautela','id_cautela'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_cautela' => 'Cautela',
			'qtde_carregador' => 'Qtde. Carregadores',
			'qtde_municao' => 'Qtde. Munição',
			'data' => 'Data',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		if (Yii::app()->getModule('user')->user()->profile->orgao !== 'SSP')
			$criteria->scopes = 'orgao';

		$criteria->compare('id',$this->id);

		$criteria->compare('id_cautela',$this->id_cautela);

		$criteria->compare('qtde_municao',$this->qtde_municao);

		$criteria->compare('data',$this->data,true);

		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider('baixa', array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave()
	{		
		$cautela = cautela::model()->findByPk($this->id_cautela);
		if($cautela===null)
		{
			$this->addError('id_cautela', 'Cautela Inválida.');
			return false;
		}

		$arma = arma::model()->findByPk($this->cautela->id_arma);
		$arma->disponivel = 1;
		
		$user = Yii::app()->getModule('user')->user();
		$this->orgao = $user->profile->orgao;
		$this->usuario = $user->username;
		$this->time = new CDbExpression('NOW()');
		
		return $arma->save(false);
	}
	
	public function scopes()
	{
		return array(
					'orgao'=>array('condition'=>"orgao = '".Yii::app()->getModule('user')->user()->profile->orgao."'"),
		);
	}
}