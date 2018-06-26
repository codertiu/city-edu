<?php

namespace backend\controllers;

use Yii;
use backend\models\Students;
use backend\models\Members;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComingController implements the CRUD actions for Coming model.
 */
class BirthdayController extends Controller
{/*
    public function actionMembers()
    {
        $today = Members::find()
            ->where(['active' => 1])
            ->where('MONTH(dob)= MONTH(now())')
            ->where('DAY(dob)=DAY(NOW())')
            ->all();
        $month = Members::find()
            ->where(['active' => 1])
            ->where('concat( year(now()), mid(dob,5,6) ) 
                                BETWEEN now() AND date_add(now(), interval 7 day)')
            ->all();
        return $this->render('members',['today' => $today, 'month' => $month]);
    }
*/
    public function actionStudents()
    {
        $today = Students::find()
            ->where(['active' => 1])
            ->where('MONTH(dob)= MONTH(now())')
            ->where('DAY(dob)=DAY(NOW())')
            ->all();
        $month = Students::find()
            ->where(['active' => 1])
            ->where('concat( year(now()), mid(dob,5,6) ) 
                                BETWEEN now() AND date_add(now(), interval 7 day)')
            ->all();
        return $this->render('students', ['today' => $today, 'month' => $month]);
    }
}
