<?php

class ArmaController extends RController
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
		$model=new arma;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['arma']))
		{
			$model->attributes=$_POST['arma'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$tipos=CHtml::listData(tipo::model()->findAll(), 'id', 'tipoText');

		$this->render('create',array(
			'model'=>$model,
			'tipos'=>$tipos,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['arma']))
		{
			$model->attributes=$_POST['arma'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$tipos=CHtml::listData(tipo::model()->findAll(), 'id', 'tipoText');

		$this->render('update',array(
			'model'=>$model,
			'tipos'=>$tipos,
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
		$model=new arma('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['arma']))
			$model->attributes=$_GET['arma'];

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
				$this->_model=arma::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='arma-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionFindByPat()
	{
		$model=arma::model()->findByAttributes(array('patrimonio'=>$_GET['id']));
		if ($model !== null)
		{
			echo '<div class="view">';
			$this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'patrimonio',
					array('label'=>'Tipo de Armamento','value'=>$model->tipo->tipoText),
					'sinarm',
					'num_serie',
					'nf',
					'data_nf',
					array('label'=>'Disponível','value'=>$model->disponivelText),
				),
			));
			echo '</div>';
		} else {
			echo "Armamento Não Encontrado!";
		}
		die;
	}
}
