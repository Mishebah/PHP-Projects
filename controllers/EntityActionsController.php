<?php

namespace app\controllers;

use Yii;
use app\models\EntityActions;
use app\models\EntityActionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\PermissionUtils;
use yii\web\ForbiddenHttpException;


/**
 * EntityActionsController implements the CRUD actions for EntityActions model.
 */
class EntityActionsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EntityActions models.
     * @return mixed
     */
    public function actionIndex()
    {
							if(!PermissionUtils::checkModuleActionPermission("EntityActions",PermissionUtils::VIEW_ALL)){
				throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }
		$searchModel = new EntityActionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntityActions model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
								   if(!PermissionUtils::checkModuleActionPermission("EntityActions",PermissionUtils::VIEW_ONE)){
				throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EntityActions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
											   if(!PermissionUtils::checkModuleActionPermission("EntityActions",PermissionUtils::CREATE)){
				throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }  
        $model = new EntityActions();
$model->insertedBy= yii::$app->user->identity->userID;
      $model->updatedBy=  yii::$app->user->identity->userID;
     $model->dateCreated = new Expression('NOW()');
	 $model->active = StatusCodes::ACTIVE;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->entityActionID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntityActions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
			            			if(!PermissionUtils::checkModuleActionPermission("EntityActions",PermissionUtils::UPDATE)){
				throw new ForbiddenHttpException('You are not allowed to perform this action.');
        } 
        $model = $this->findModel($id);
      $model->updatedBy=  yii::$app->user->identity->userID;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->entityActionID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntityActions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
 if(!PermissionUtils::checkModuleActionPermission("EntityActions",PermissionUtils::DELETE)){
				throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }	
      $model = $this->findModel($id);
      $model->updatedBy=  yii::$app->user->identity->userID;
	 $model->active = StatusCodes::INACTIVE;
	 
	 if($model->save())
	 	Yii::$app->session->addFlash( 'success',"EntityActions has been deleted " );
		else
		Yii::$app->session->addFlash( 'error',"Error on deleting EntityActions " );

        return $this->redirect(['index']);
    }

    /**
     * Finds the EntityActions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EntityActions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
$model = EntityActions::findOne($id);
		if ((isset(Yii::$app->params['ADMIN_CLIENT_ID']) and  Yii::$app->user->identity->clientID == Yii::$app->params['ADMIN_CLIENT_ID']))
		{
            return $model;
        }
		else
			throw new NotFoundHttpException('The requested page does not exist.');

    }
}
