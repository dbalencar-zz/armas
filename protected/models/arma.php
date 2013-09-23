<?php

/**
 * This is the model class for table "arm_arma".
 *
 * The followings are the available columns in table 'arm_arma':
 * @property integer $id
 * @property integer $id_tipo
 * @property string $patrimonio
 * @property string $sinarm
 * @property string $num_serie
 * @property string $nf
 * @property string $data_nf
 * @property integer $disponivel
 */
class arma extends CActiveRecord
{
	private $_tipoNome = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return arma the static model class
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
		return 'arm_arma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo, patrimonio, sinarm, num_serie, nf, data_nf', 'required'),
			array('id_tipo, disponivel', 'numerical', 'integerOnly'=>true),
			array('patrimonio, sinarm, num_serie, nf', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_tipo, tipoNome, patrimonio, sinarm, num_serie, nf, data_nf, disponivel', 'safe', 'on'=>'search'),
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
			'tipo'=>array(self::BELONGS_TO,'tipo','id_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_tipo' => 'Tipo de Armamento',
			'tipoNome' => 'Tipo de Armamento',
			'patrimonio' => 'Patrimônio',
			'sinarm' => 'SINARM',
			'num_serie' => 'Nº.Série',
			'nf' => 'Nota Fiscal',
			'data_nf' => 'Data NF',
			'disponivel' => 'Disponível',
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
		
		$criteria->with[] = 'tipo';

		$criteria->compare('concat(tipo.especie," ",tipo.marca," : ",tipo.modelo," (",tipo.calibre,")")',$this->tipoNome,true);

		$criteria->compare('t.patrimonio',$this->patrimonio,true);

		$criteria->compare('t.sinarm',$this->sinarm,true);

		$criteria->compare('t.num_serie',$this->num_serie,true);

		$criteria->compare('t.nf',$this->nf,true);

		$criteria->compare('t.disponivel',$this->disponivel);

		return new CActiveDataProvider('arma', array(
			'criteria'=>$criteria,
		));
	}
	
	public function getDisponivelOptions()
	{
		return array(
			'0'=>'Não',
			'1'=>'Sim',
		);
	}
	
	public function getDisponivelText()
	{
		$options = $this->getDisponivelOptions();
		return $options[$this->disponivel];
	}
	
	public function getTipoNome()
	{
		if($this->_tipoNome === null && $this->tipo !== null)
		{
			$this->_tipoNome = $this->tipo->tipoText;
		}
		return $this->_tipoNome;
	}
	
	public function setTipoNome($value)
	{
		$this->_tipoNome = $value;
	}
	
	public function getSigma()
	{
		if($this->patrimonio === $this->sinarm)
			return "";
		else
			return $this->sinarm;
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->disponivel = true;
		
		$user = Yii::app()->getModule('user')->user();
		$this->orgao = $user->profile->orgao;
		$this->usuario = $user->username;
		$this->time = new CDbExpression('NOW()');
			
		return true;
	}
	
	public function scopes()
	{
		return array(
			'orgao'=>array('condition'=>"orgao = '".Yii::app()->getModule('user')->user()->profile->orgao."'"),
		);
	}
}