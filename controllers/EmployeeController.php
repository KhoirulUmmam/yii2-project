<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Employee;

class EmployeeController extends Controller
{
    public function actionIndex()
    {
        $employees = Employee::find()->all();

        return $this->render('index', [
            'employees' => $employees,
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

    public function actionUpdate()
    {
        // $db = Yii::$app->db;
        // $row_affected = $db->createCommand('UPDATE EMPLOYEE SET ADDRESS="Tangerang" WHERE ID=4')->execute();

        // echo $row_affected . " row affected";
    }
}
