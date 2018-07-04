<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\StudentMessage;

$this->title = Yii::t('main', 'Student');
?>
<div class="page">
    <div class="page-header text-center">
        <h1 class="page-title"><?= Yii::t('main', 'Student') ?></h1>
        <p class="page-description">
            Page Description Here.
        </p>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel panel-title"><?= Yii::t('main', 'Info') ?></h4>
            </div>
            <div class="panel-body">
                <? if(Yii::$app->session->hasFlash('success')){
                    echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>'.Yii::$app->session->getFlash('success').'</div>';
                }?>
                <div class="col-lg-12">
                    <!-- Example Tabs Line -->
                    <div class="example-wrap margin-lg-0">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne"
                                                                          aria-controls="exampleTabsLineOne" role="tab">Home</a>
                                </li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo"
                                                           aria-controls="exampleTabsLineTwo" role="tab">Components</a>
                                </li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineThree"
                                                           aria-controls="exampleTabsLineThree" role="tab">Css</a></li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineFour"
                                                           aria-controls="exampleTabsLineFour" role="tab">Javascript</a>
                                </li>
                                <li class="dropdown" role="presentation" style="display: none;">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="caret"></span>Dropdown </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne"
                                                                            aria-controls="exampleTabsLineOne"
                                                                            role="tab">Home</a></li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineTwo"
                                                                   aria-controls="exampleTabsLineTwo" role="tab">Components</a>
                                        </li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineThree"
                                                                   aria-controls="exampleTabsLineThree"
                                                                   role="tab">Css</a></li>
                                        <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineFour"
                                                                   aria-controls="exampleTabsLineFour" role="tab">Javascript</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-tabs-autoline"
                                    style="transition-duration: 0.5s, 1s; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1), cubic-bezier(0.4, 0, 0.2, 1); left: 0px; width: 81px;"></li>
                            </ul>
                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="exampleTabsLineOne" role="tabpanel">
                                    Quoquo timeret omne redeamus ratione monet nosque requietis afferrent iste,
                                    pertinerent.
                                    Postremo frustra oportet pueriliter finxerat eos offendit
                                    fecerint, iudicem quieti scribi animumque pondere ancillae,
                                    timeret stoicos iustitia parvam.
                                </div>
                                <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                                    Sole, latinas incurreret optari vivatur, porro delectu epicurus cadere impedit
                                    fit ferreum concludaturque varias, omnium gloriosis vivendo
                                    via filio contentam expeteretur fonte expectata, quosque
                                    praetor quid iucunditatis fortitudinem esse.
                                </div>
                                <div class="tab-pane" id="exampleTabsLineThree" role="tabpanel">
                                    Maestitiam quamquam iudicare veterum contineri ipse cognoscerem se omittantur
                                    dialectica,
                                    dixit poterit nondum tempora corpora claudicare ratione percipitur.
                                    Earum comprehenderit laudem platonis allevatio graeci, invidus
                                    coercendi valetudinis numen deseruisse.
                                </div>
                                <div class="tab-pane" id="exampleTabsLineFour" role="tabpanel">

                                    <? $student = new StudentMessage(); ?>
                                    <? $form = ActiveForm::begin([
                                        'action' => 'student-message/create',
                                        'method' => 'post'
                                    ]) ?>
                                    <?= $form->field($student, 'content')->textarea(['rows' => 6]) ?>
                                    <?= $form->field($student, 'type_message')->radioList([1 => Yii::t('main', 'ariza'), 2 => Yii::t('main', 'taklif')]) ?>
                                    <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
                                    <? ActiveForm::end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Example Tabs Line With JS -->
                </div>
            </div>
        </div>
    </div>
</div>
