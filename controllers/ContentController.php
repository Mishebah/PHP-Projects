<?php

namespace app\controllers;

use Yii;
use app\models\Content;
use app\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserGroups;
use app\models\Users;
use app\models\Clients;
use yii\db\Expression;
use yii\web\UploadedFile;
use app\components\StatusCodes;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    

    
    public function actionIndex()
    
    {    
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      //  $searchUserModel=$searchModel->clientID = yii::$app->user->identity->userID;
    return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    

    }
    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
     public function actionCreate()
    {
        $model = new Content();
        $userGroupsmodel = new UserGroups();
        $model->dateCreated = $userGroupsmodel->dateCreated =  new Expression('NOW()');
        
    
         if ($model->load(Yii::$app->request->post())) {
            
                $model->insertedBy= $userGroupsmodel->insertedBy= yii::$app->user->identity->userID;
      $model->updatedBy= $userGroupsmodel->updatedBy= yii::$app->user->identity->userID;
     // $model->updatedBy= $userGroupsmodel->updatedBy= yii::$app->user->identity->userID;
     $model->dateCreated = $userGroupsmodel->dateCreated =  new Expression('NOW()');
              
	         $time = microtime(true); // time in Microseconds
				$model->contentfile = UploadedFile::getInstance($model, 'contentfile');
                   
			        if ($model->validate()) {
				$file = UploadedFile::getInstance($model, 'contentfile');
              
				 	$filename = yii::$app->user->identity->clientID."_".yii::$app->user->identity->clientID."_".$time. '.' . $file->extension;
                    $model->contentfile->saveAs('contentuploads/' .$filename);
                     $model->originalFileName = $file->baseName . '.' . $file->extension;
                   	$model->generatedFileName =  $filename;
				     
                     if ($model->save())
                     
				
                 return $this->redirect(['view', 'id' => $model->contentID]);
       
                    }
                    
                    }
                   
                    return $this->render('create', [
                'model' => $model,
            ]);
        
    }
    
   
    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
