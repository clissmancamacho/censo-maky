<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SignupForm;
use app\models\Person;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user.status' => User::STATUS_ACTIVE]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        $person = new Person();

        if (Yii::$app->request->isAjax && $person->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($person);
        }

        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
            $person = $this->verifyAndSavePerson($person);
            $model->person_id = $person->id;
            if ($user = $model->signup()) {
                return $this->redirect(['view', 'id' => $user->id]);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'person' => $person
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $person = $model->person;

        if (Yii::$app->request->isAjax && $person->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($person);
        }

        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
            if(!empty($model->newPassword)){
                $model->setPassword($model->newPassword);
            }
            if($model->save() && $person->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'person' => $person
        ]);
    }

    public function actionEliminar($id)
    {
        $item = $this->findModel($id);

        return $this->renderAjax('delete', [
            'item' => $item,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->status = User::STATUS_DELETED;

        if($model->save()){
            return $this->redirect(['index']);         
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function verifyAndSavePerson($person)
    {
        $dbPerson = Person::find()->where(['cedula' => $person->cedula])->one();
        if($dbPerson){
            return $dbPerson;
        }
        
        if($person->save()) {
            return $person;
        }
    }
}
