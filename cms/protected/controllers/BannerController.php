<?php

class BannerController extends AweController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout = '//layouts/column2';

    public $defaultAction = 'admin';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}
	
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Banner;
		Yii::import('application.vendor.*');
		require_once('Otras.class.php');
        $this->performAjaxValidation($model, 'banner-form');

        if(isset($_POST['Banner']))
		{
			$model->attributes = $_POST['Banner'];
			$file_imagen1 = CUploadedFile::getInstance($model,'imagen');
            if ((is_object($file_imagen1) && get_class($file_imagen1)==='CUploadedFile')){
            	if (Otras::verificar_extension($file_imagen1->getName())) {
                if(!file_exists(Yii::app()->basePath.'/../img/banner'))
                    mkdir(Yii::app()->basePath.'/../img/banner', 0777, true);

                $nombre1=mt_rand(0,10000).$file_imagen1->getName();
                $model->imagen = 'img/banner/'.$nombre1;
                }
            else
            {
            	Yii::app()->user->setFlash('error', "Formato de imagen no valido");
                    $this->render('create',array(
                        'model'=>$model,
                    ));
                    return;
            }
            }
            if($model->validate()) $file_imagen1->saveAs(Yii::app()->basePath.'/../img/banner/'.$nombre1);
			if($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('create',array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$imagen = $model->imagen;
        $this->performAjaxValidation($model, 'banner-form');
        Yii::import('application.vendor.*');
		require_once('Otras.class.php');
		if(isset($_POST['Banner']))
		{
			$model->attributes = $_POST['Banner'];
			$model->imagen = $imagen;
			if ($model->validate())
			{
				$model->attributes = $_POST['Banner'];
			}
			else
			{
				$this->render('update',array(
				'model' => $model,
				));
				return;
			}
			$file_imagen = CUploadedFile::getInstance($model,'imagen');

            if ((is_object($file_imagen) && get_class($file_imagen)==='CUploadedFile')){
            	if (Otras::verificar_extension($file_imagen->getName())) {
                if(!file_exists(Yii::app()->basePath.'/../img/banner'))
                    mkdir(Yii::app()->basePath.'/../img/banner', 0777, true);

				try{
                    $image = Yii::app()->basePath.'/../'.$imagen;
                    @unlink($image);
                }catch(Exception $e){
                    ;
                }

                $nombre=mt_rand(0,10000).$file_imagen->getName();
                $model->imagen = 'img/banner/'.$nombre;
                $file_imagen->saveAs(Yii::app()->basePath.'/../img/banner/'.$nombre);
                }
            else
            {
            	Yii::app()->user->setFlash('error', "Formato de imagen no valido");
                    $this->render('update',array(
                        'model'=>$model,
                    ));
                    return;
            }
            }else{
                $model->imagen = $imagen;
            }
			if($model->save()) {
				$this->redirect(array('view','id' => $model->id));
            }
		}

		$this->render('update',array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			$imagen = $model->imagen;
				try{
                    $image = Yii::app()->basePath.'/../'.$imagen;
                    @unlink($image);
                }catch(Exception $e){
                    ;
                }
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Banner('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes = $_GET['Banner'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $modelClass=__CLASS__)
	{
		$model = Banner::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model, $form=null)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
