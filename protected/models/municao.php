<?php

/**
 * This is the model class for table "arm_municao".
 *
 * The followings are the available columns in table 'arm_municao':
 * @property integer $id
 * @property integer $id_tipo
 * @property string $lote
 * @property string $nf
 * @property string $data_nf
 * @property integer $quantidade
 * @property integer $disponivel
 * @property string $orgao
 * @property string $usuario
 * @property string $time
 */
class municao extends CActiveRecord
{
	private $_tipoNome = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return municao the static model class
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
		return 'arm_municao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo, lote, nf, data_nf, quantidade', 'required'),
			array('id_tipo, quantidade', 'numerical', 'integerOnly'=>true),
			array('lote, nf', 'length', 'max'=>20),
			array('orgao, usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_tipo, tipoNome, lote, nf, data_nf, quantidade, orgao, usuario, time', 'safe', 'on'=>'search'),
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
			'lote' => 'Lote da Munição',
			'nf' => 'Nota Fiscal',
			'data_nf' => 'Data NF',
			'quantidade' => 'Quantidade',
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

		$criteria->compare('t.lote',$this->lote,true);

		$criteria->compare('t.nf',$this->nf,true);

		$criteria->compare('t.data_nf',$this->data_nf,true);

		$criteria->compare('t.quantidade',$this->quantidade);

		return new CActiveDataProvider('municao', array(
			'criteria'=>$criteria,
		));
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
	
	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->disponivel = $this->quantidade;
	
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