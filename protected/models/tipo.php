<?php

/**
 * This is the model class for table "arm_tipo".
 *
 * The followings are the available columns in table 'arm_tipo':
 * @property integer $id
 * @property string $especie
 * @property string $marca
 * @property string $modelo
 * @property string $calibre
 * @property integer $capacidade
 * @property string $funcionamento
 * @property integer $qtde_canos
 * @property integer $comp_canos
 * @property string $tipo_alma
 * @property integer $qtde_raias
 * @property string $sent_raias
 * @property string $acabamento
 * @property string $pais
 */
class tipo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return tipo the static model class
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
		return 'arm_tipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('especie, marca, modelo, calibre, capacidade, funcionamento, qtde_canos, comp_canos, tipo_alma, qtde_raias, sent_raias, acabamento, pais', 'required'),
			array('capacidade, qtde_canos, comp_canos, qtde_raias', 'numerical', 'integerOnly'=>true),
			array('especie, marca, acabamento, pais', 'length', 'max'=>50),
			array('modelo, calibre, tipo_alma, sent_raias', 'length', 'max'=>10),
			array('funcionamento', 'length', 'max'=>20),
			array('acessorios','length','max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, especie, marca, modelo, calibre, capacidade, funcionamento, qtde_canos, comp_canos, tipo_alma, qtde_raias, sent_raias, acabamento, pais', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'especie' => 'Espécie',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'calibre' => 'Calibre',
			'capacidade' => 'Capacidade',
			'funcionamento' => 'Funcionamento',
			'qtde_canos' => 'Quantidade Canos',
			'comp_canos' => 'Comprimento Cano(s) (mm)',
			'tipo_alma' => 'Tipo de Alma',
			'qtde_raias' => 'Quantidade de Raias',
			'sent_raias' => 'Sentido das Raias',
			'acabamento' => 'Acabamento',
			'pais' => 'País',
			'acessorios' => 'Acessórios',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('especie',$this->especie,true);

		$criteria->compare('marca',$this->marca,true);

		$criteria->compare('modelo',$this->modelo,true);

		$criteria->compare('calibre',$this->calibre,true);

		$criteria->compare('capacidade',$this->capacidade);

		$criteria->compare('funcionamento',$this->funcionamento,true);

		$criteria->compare('qtde_canos',$this->qtde_canos);

		$criteria->compare('comp_canos',$this->comp_canos);

		$criteria->compare('tipo_alma',$this->tipo_alma,true);

		$criteria->compare('qtde_raias',$this->qtde_raias);

		$criteria->compare('sent_raias',$this->sent_raias,true);

		$criteria->compare('acabamento',$this->acabamento,true);

		$criteria->compare('pais',$this->pais,true);

		return new CActiveDataProvider('tipo', array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTipoText()
	{
		return $this->especie.' '.$this->marca.' : '.$this->modelo.' ('.$this->calibre.')';
	}
	
	public function beforeSave()
	{
		$user = Yii::app()->getModule('user')->user();
		$this->usuario = $user->username;
		$this->time = new CDbExpression('NOW()');
			
		return true;
	}
}