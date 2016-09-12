<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use \app\models\TypeService;

class TypeserviceController extends Controller
{
	public function actionIndex(){

		return $this->render('index',array('model'=>TypeService::find()->all()));
	}
	public function actionCreate(){
		$model = new \app\models\TypeService();
		if ($model->load(Yii::$app->request->post())) {
			$data = Yii::$app->request->post('TypeService');

			$model->title = $data['title'];
			$model->value = $data['value'];
			
			if ($model->save()) {
				Yii::$app->getSession()->setFlash('success', "Tipo de Servicio Guardado con éxito!");
				$model = new \app\models\TypeService();
			}else{
				Yii::$app->getSession()->setFlash('danger', "Ocurrio un error");
			}
		}
		return $this->render('create',array('model'=>$model));
	}
	public function actionEdit($type_service_id = null){
		$model = new \app\models\TypeService();
		// $model = new \app\models\TypeService();
		if ($model->load(Yii::$app->request->post())) {
			$data = Yii::$app->request->post('TypeService');
		
			
			if ($model->updateAll($data,'type_service_id ='.$type_service_id)) {
				Yii::$app->getSession()->setFlash('success', "Tipo de Servicio Actualizado con éxito!");
				$model = new \app\models\TypeService();
			}else{
				echo "<br><br><br><br><pre>";
				print_r($model->getErrors());
				echo "</pre>";
				Yii::$app->getSession()->setFlash('danger', "Ocurrio un error");
			}
		}
		$model = TypeService::find()->where(array('=','type_service_id',$type_service_id))->one();
	
		return $this->render('edit',array('model'=>$model));
	}
	public function actionDelete($type_service_id = null){
		$model = TypeService::find()->where(array('=','type_service_id',$type_service_id))->one();
		// $model = new \app\models\TypeService();
	
			if ($model->delete()) {
				Yii::$app->getSession()->setFlash('success', "Tipo de Servicio Eliminado con éxito!");
			}else{
				echo "<br><br><br><br><pre>";
				print_r($model->getErrors());
				echo "</pre>";
				Yii::$app->getSession()->setFlash('danger', "Ocurrio un error");
			}
		return $this->redirect('/typeservice/index');
	}
    // public function actionView($id)
    // {
    //     $model = Post::findOne($id);
    //     if ($model === null) {
    //         throw new NotFoundHttpException;
    //     }

    //     return $this->render('view', [
    //         'model' => $model,
    //     ]);
    // }

    // public function actionCreate()
    // {
    //     $model = new Post;

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }
}