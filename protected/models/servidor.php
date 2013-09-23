<?php

/**
 * This is the model class for table "arm_servidor".
 *
 * The followings are the available columns in table 'arm_servidor':
 * @property integer $id
 * @property string $matricula
 * @property string $nome
 * @property string $cargo
 * @property string $classe
 * @property string $tel_res
 * @property string $tel_cel
 * @property string $tel_outro
 */
class servidor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return servidor the static model class
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
		return 'arm_servidor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('matricula, nome, cargo, classe', 'required'),
			array('matricula', 'length', 'max'=>8),
			array('nome', 'length', 'max'=>200),
			array('cargo', 'length', 'max'=>50),
			array('classe', 'length', 'max'=>15),
			array('tel_res, tel_cel, tel_outro', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, matricula, nome, cargo, classe, tel_res, tel_cel, tel_outro', 'safe', 'on'=>'search'),
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
		);
	}
	
	public function scopes()
	{
		return array(
			'orgao'=>array('condition'=>"orgao = '".Yii::app()->getModule('user')->user()->profile->orgao."'"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'matricula' => 'Matrícula',
			'nome' => 'Nome',
			'cargo' => 'Cargo',
			'classe' => 'Classe',
			'tel_res' => 'Tel. Res.',
			'tel_cel' => 'Tel. Cel.',
			'tel_outro' => 'Tel. Outro',
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

		$criteria->compare('matricula',$this->matricula,true);

		$criteria->compare('nome',$this->nome,true);

		$criteria->compare('cargo',$this->cargo,true);

		$criteria->compare('classe',$this->classe,true);

		$criteria->compare('tel_res',$this->tel_res,true);

		$criteria->compare('tel_cel',$this->tel_cel,true);

		$criteria->compare('tel_outro',$this->tel_outro,true);

		return new CActiveDataProvider('servidor', array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave()
	{
		$user = Yii::app()->getModule('user')->user();
		$this->orgao = $user->profile->orgao;
		$this->usuario = $user->username;
		$this->time = new CDbExpression('NOW()');
			
		return true;
	}
}