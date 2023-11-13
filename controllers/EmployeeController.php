<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Employee;
use yii\data\Pagination;

class EmployeeController extends Controller
{
    public function actionIndex()
    {
        $query = Employee::find();
        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 5,
        ]);

        $employees = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        if (!empty($name)) {
            $employees = $query->where(['name' => $name]);
        }

        return $this->render('index', [
            'employees' => $employees,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
    {
        $model = new Employee();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
            } else {
                Yii::$app->session->setFlash('error', 'Gagal disimpan');
            }
            return $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($ID)
    {
        $model = Employee::findOne($ID);

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
            } else {
                Yii::$app->session->setFlash('error', 'Gagal disimpan');
            }
            return $this->refresh();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($ID)
    {
        $model = Employee::findOne($ID);
        $model->delete();

        return $this->redirect('index');
    }
}
