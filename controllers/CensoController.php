<?php

namespace app\controllers;

use Yii;
use app\models\Censo;
use app\models\search\CensoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Person;

/**
 * CensoController implements the CRUD actions for Censo model.
 */
class CensoController extends Controller
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
     * Lists all Censo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CensoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['censo.status' => Censo::ACTIVE]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Censo model.
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
     * Creates a new Censo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Censo();
        $person = new Person();
        $person->scenario = Person::SCENARIO_CENSO;

        if (Yii::$app->request->isAjax && $person->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($person);
        }

        if ($person->load(Yii::$app->request->post())) {
            $person = $this->verifyAndSavePerson($person);
            $model->person_id = $person->id;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'person' => $person
        ]);
    }

    /**
     * Updates an existing Censo model.
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

        if ($person->load(Yii::$app->request->post())) {
            $person = $this->verifyAndSavePerson($person);
            if($model->save()){
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
     * Deletes an existing Censo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->status = Censo::DELETED;

        if($model->save()){
            return $this->redirect(['index']);         
        }
    }

    /**
     * Finds the Censo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Censo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Censo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function verifyAndSavePerson($person)
    {
        $dbPerson = Person::find()->where(['cedula' => $person->cedula])->one();
        if($dbPerson){
            $dbPerson->nombre = $person->nombre;
            $dbPerson->apellido = $person->apellido;
            $dbPerson->telefono = $person->telefono;
            $dbPerson->barrio = $person->barrio;
            $dbPerson->zona = $person->zona;
            $dbPerson->puesto = $person->puesto;
            $dbPerson->direccion = $person->direccion;
            if($dbPerson->save()){
                return $dbPerson;
            }
        }
        if($person->save()) {
            return $person;
        }
    }
}
