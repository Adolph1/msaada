<?php

namespace backend\controllers;

use backend\models\MemberProblem;
use Yii;
use backend\models\Member;
use backend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ReferenceIndex;
use yii\web\UploadedFile;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $problemModel=$this->findProblemModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),'problemModel'=>$problemModel
        ]);
    }

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();
        $model->maker_id=Yii::$app->user->identity->username;
        $model->maker_time=date('Y-m-d:h:i');

        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'member_photo');
            if ($model->photo!=null) {
                //print_r($model);
               // exit;
                $model->photo->saveAs('uploads/'.$model->photo->baseName .'.' . $model->photo->extension);
                $model->photo=$model->photo->baseName .'.' . $model->photo->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Member model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findProblemModel($id)
    {
        if (($model = MemberProblem::find()->where(['member_id'=>$id])->one()) !== null) {
            return $model;
        } else {
           $model=new MemberProblem();
           return $model;
        }
    }


    public function actionReference($id)
    {
        $reference = ReferenceIndex::find()
            ->where(['code' => $id])
            ->orderBy('code DESC')
            ->one();

        if ($reference != null) {


            $reference->last_index =sprintf("%04d", $reference->last_index + 1);

            $reference->last_reference = $id .'-' .$reference->last_index;
            $reference->save();
            echo $reference->last_reference;



        }
        else {

            $model = new ReferenceIndex();
            $model->last_index = '0001';
            $model->code = $id;
            $model->last_reference =  $id .'-'. $model->last_index;
            $model->save();
            echo $model->last_reference;

        }

    }
}
