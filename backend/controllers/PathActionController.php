<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Languages;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;

/**
 * Site controller
 */
class PathActionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        //$this->controller->pageTitle=Yii::$app->params['settings']['title'];
        if (User::hasRole('call-center')) {
                return $this->render('call-center');
            } else if (User::hasRole('Admin')) {
                return $this->render('index');
            }

        //return $this->render('index');
    }

    public function actionLang($lang)
    {
        $query = Languages::find()->where('abb= "' . $lang . '" AND status>-1')->one();
        if ($query || $lang == Yii::$app->params['main_language']) {
//          $lang_id = $lang == Yii::$app->params['main_language'] ? Yii::$app->params['main_language_id'] : $query->id;
            $lang_id = $lang == Yii::$app->params['main_language'] ? 3 : $query->id;
            Yii::$app->language = $lang;
            Yii::$app->session->set('lang', $lang);
            Yii::$app->session->set('lang_id', $lang_id);
            $rescookies = \Yii::$app->response->cookies;
            $rescookies->add(new \yii\web\Cookie(['name' => '_language', 'value' => $lang, 'expire' => (time() + 3600 * 24 * 365)]));
            $rescookies->add(new \yii\web\Cookie(['name' => '_lid', 'value' => $lang_id, 'expire' => (time() + 3600 * 24 * 365)]));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

}
