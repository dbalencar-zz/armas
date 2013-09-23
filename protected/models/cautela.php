<?php

/**
 * This is the model class for table "arm_cautela".
 *
 * The followings are the available columns in table 'arm_cautela':
 * @property integer $id
 * @property integer $id_servidor
 * @property integer $id_arma
 * @property integer $qtde_municao
 * @property string $data
 * @property string $estado
 */
class cautela extends CActiveRecord
{
	private $_servidorMat = null;
	private $_servidorNome = null;
	private $_armaPat = null;
	private $_municaoLote = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return cautela the static model class
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
		return 'arm_cautela';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_servidor, data, estado', 'required'),
			array('qtde_municao, id_arma', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_servidor, servidorMat, servidorNome, id_arma, armaPat, qtde_carregador, id_municao, municaoLote, qtde_municao, data, estado', 'safe', 'on'=>'search'),
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
			'servidor'=>array(self::BELONGS_TO,'servidor','id_servidor'),
			'arma'=>array(self::BELONGS_TO,'arma','id_arma'),
			'baixa'=>array(self::HAS_ONE,'baixa','id_cautela'),
			'municao'=>array(self::BELONGS_TO,'municao','id_municao'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Cautela',
			'id_servidor' => 'Matrícula do Servidor',
			'servidorMat' => 'Matrícula',
			'servidorNome' => 'Servidor',
			'id_arma' => 'Patrimônio do Armamento',
			'armaPat' => 'Pat. Armamento',
			'id_municao' => 'Lote da Munição',
			'municaoLote' => 'Lote da Munição',
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
		
		$criteria->with = array('servidor','arma','municao');

		$criteria->compare('t.id',$this->id);

		$criteria->compare('servidor.matricula',$this->servidorMat,true);
		
		$criteria->compare('servidor.nome',$this->servidorNome,true);

		$criteria->compare('arma.patrimonio',$this->armaPat,true);
		
		$criteria->compare('municao.lote',$this->municaoLote,true);

		$criteria->compare('t.data',$this->data,true);

		return new CActiveDataProvider('cautela', array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave()
	{	
		$servidor = servidor::model()->findByAttributes(array('matricula'=>$this->id_servidor));
		if($servidor===null)
		{
			$this->addError('id_servidor', 'Matrícula Inválida.');
			return false;
		}
		
		$arma = arma::model()->findByAttributes(array('patrimonio'=>$this->id_arma));
		if($arma===null)
		{
			$this->addError('id_arma', 'Patrimônio Inválido.');
			return false;
		}
		else if(!$arma->disponivel&&$this->isNewRecord)
		{
			$this->addError('id_arma', 'Armamento Não Disponível.');
			return false;
		}
		
		if(!empty($this->id_municao))
		{			
			$municao = municao::model()->findByAttributes(array('lote'=>$this->id_municao));
			if($municao===null)
			{
				$this->addError('id_municao', 'Lote Inválido.');
				return false;
			}
			else 
			{
				if(empty($this->qtde_municao))
				{
					$this->addError('qtde_municao', 'Especificar quantidade de Munição.');
					return false;
				}
				else $this->id_municao = $municao->id;
			}
		}
		elseif(!empty($this->qtde_municao))
		{
			$this->addError('id_municao', 'Lote Inválido.');
			return false;
		}
		
		$this->id_servidor = $servidor->id;
		$this->id_arma = $arma->id;
		$arma->disponivel = 0;
		
		$user = Yii::app()->getModule('user')->user();
		$this->orgao = $user->profile->orgao;
		$this->usuario = $user->username;
		$this->time = new CDbExpression('NOW()');

		return $arma->save(false);
	}
	
	public function getServidorMat()
	{
		if($this->_servidorMat === null && $this->servidor !== null)
		{
			$this->_servidorMat = $this->servidor->matricula;
		}
		return $this->_servidorMat;
	}
	
	public function setServidorMat($value)
	{
		$this->_servidorMat = $value;
	}
	
	public function getServidorNome()
	{
		if($this->_servidorNome === null && $this->servidor !== null)
		{
			$this->_servidorNome = $this->servidor->nome;
		}
		return $this->_servidorNome;
	}
	
	public function setServidorNome($value)
	{
		$this->_servidorNome = $value;
	}
	
	public function getArmaPat()
	{
		if($this->_armaPat === null && $this->arma !== null)
		{
			$this->_armaPat = $this->arma->patrimonio;
		}
		return $this->_armaPat;
	}
	
	public function setArmaPat($value)
	{
		$this->_armaPat = $value;
	}
	
	public function getMunicaoLote()
	{
		if($this->_municaoLote === null && $this->municao !== null)
		{
			$this->_municaoLote = $this->municao->lote;
		}
		return $this->_municaoLote;
	}
	
	public function setMunicaoLote($value)
	{
		$this->_municaoLote = $value;
	}
	
	public function scopes()
	{
		return array(
			'orgao'=>array('condition'=>"t.orgao = '".Yii::app()->getModule('user')->user()->profile->orgao."'"),
		);
	}
	
	public function getOrgaoOptions()
	{
		return array(
			'SSP'=>'SSP',
			'PCAM'=>'PCAM',
			'PMAM'=>'PMAM',
		);
	}
	
	public function getOrgaoText()
	{
		$options=$this->getOrgaoOptions();
		return $options[$this->orgao];
	}
}