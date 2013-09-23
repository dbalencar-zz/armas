<?php

class CautelaController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new cautela;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['cautela']))
		{
			$model->attributes=$_POST['cautela'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$model->id_servidor=$model->servidor->matricula;
		if($model->arma!==null)
			$model->id_arma=$model->arma->patrimonio;
		if($model->municao!==null)
			$model->id_municao=$model->municao->lote;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['cautela']))
		{
			$model->attributes=$_POST['cautela'];
			$model->id_municao=$_POST['cautela']['id_municao'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new cautela('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['cautela']))
			$model->attributes=$_GET['cautela'];
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=cautela::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cautela-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionBaixar()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel();
		
			if($model->baixa===null)
				$this->redirect(array('/baixa/create','id'=>$_GET['id']));
			else $model->addError('id', 'Cautela já Baixada!');
			
			$this->render('view',array('model'=>$model));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionFindById()
	{
		$model=cautela::model()->findByPk($_GET['id']);
		if ($model !== null)
		{
			$this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'id',
					'servidor.matricula',
					'arma.patrimonio',
					'qtde_carregador',
					'municao.lote',
					'qtde_municao',
					'data',
					'estado',
				),
			));
		} else {
			echo "Cautela Não Encontrada!";
		}
		die;
	}
	
	public function actionImprimir()
	{
		$model=new cautela;
		if(isset($_GET['id']))
			$model=cautela::model()->with(array('servidor','arma'))->together()->findByPk($_GET['id']);
		
		if($model->orgao === 'PCAM')
		{
			$this->layout='cautela-pc';
			$this->render('cautela-pc', array('model'=>$model));
		}
		elseif($model->orgao === 'PMAM')
		{
			$this->layout='cautela-pm';
			$this->render('cautela-pm', array('model'=>$model));
		}
	}
	
	public function actionRelCautelasVigentes()
	{
		if(isset($_POST['orgao']))
			$orgao=$_POST['orgao'];
		else $orgao = Yii::app()->getModule('user')->user()->profile->orgao;
		
		$criteria=new CDbCriteria;
		$criteria->join='LEFT JOIN arm_baixa ON arm_baixa.id_cautela=t.id';
		$criteria->condition='arm_baixa.id_cautela is null and t.orgao = :orgao';
		$criteria->params = array(':orgao'=>$orgao);

		if($orgao === 'PCAM')
			$this->layout='relatorio-pc';
		elseif($orgao === 'PMAM')
			$this->layout='relatorio-pm';
		else {
			$criteria->condition='arm_baixa.id_cautela is null';
			$this->layout='relatorio';
		}

		$models=cautela::model()->findAll($criteria);
		
		$this->render('cautelas_vigentes', array('models'=>$models,'orgao'=>$orgao));
	}
	
	public function actionRelCautelasBaixadas()
	{
		if(isset($_POST['orgao']))
			$orgao=$_POST['orgao'];
		else $orgao = Yii::app()->getModule('user')->user()->profile->orgao;
		
		$criteria=new CDbCriteria;
		$criteria->join='JOIN arm_baixa ON arm_baixa.id_cautela=t.id';
		$criteria->condition='t.orgao = :orgao';
		$criteria->params = array(':orgao'=>$orgao);
		
		if($orgao === 'PCAM')
			$this->layout='relatorio-pc';
		elseif($orgao === 'PMAM')
			$this->layout='relatorio-pm';
		else {
			$criteria->condition='';
			$this->layout='relatorio';
		}
		
		$models=cautela::model()->findAll($criteria);
		
		$this->render('cautelas_baixadas', array('models'=>$models,'orgao'=>$orgao));
	}
}
