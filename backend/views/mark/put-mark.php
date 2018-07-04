<?php
$this->title = Yii::t('main', 'Put Mark');
?>
    <div class="page">
        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">

                    <h4 class="panel-title"><?= $group->name ?></h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?= \yii\helpers\Url::to(['save']) ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <label><?= Yii::t('main', 'Oddiy dars') ?></label>
                                <input name="mark_type" type="radio" value="1" checked>
                                <label><?= Yii::t('main', 'imtihon') ?></label>
                                <input name="mark_type" type="radio" value="2">
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <label><?= Yii::t('main', 'Date : ') ?></label>
                                    <?= date('d/M/Y') ?>
                                    <input type="hidden" value="<?= date('Y-m-d') ?>" name="date">
                                    <input type="hidden" value="<?= $group->id ?>" name="group_id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-right">
                                    <label><?= Yii::t('main', 'Teacher : ') ?></label>
                                    <input type="hidden" value="<?= $groupTech->one()->teacher_id ?>" name="teacher_id">
                                    <?= $groupTech->one()->members->fio ?>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th><?= Yii::t('main', 'Name') ?></th>
                                <th><?= Yii::t('main', 'Absent') ?></th>
                                <? for ($i = 1; $i <= count(Yii::$app->params['mark_status']); $i++) { ?>
                                    <th><?= Yii::$app->params['mark_status'][$i] ?></th>
                                <? } ?>
                                <th><?= Yii::t('main', 'Comment') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $j = 1; ?>
                            <?php foreach ($students as $s) { ?>
                                <tr>
                                    <td><?= $j; ?></td>
                                    <td><?= $s->students->fullname ?>
                                        <input type="hidden" value="<?= $s->students_id ?>" name="students[]">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="absent[]">
                                    </td>
                                    <? for ($i = 1; $i <= count(Yii::$app->params['mark_status']); $i++) { ?>
                                        <td>
                                            <input type="number" name="<?= Yii::$app->params['mark_status'][$i] ?>[]"
                                                   style="width: 50px;">
                                        </td>
                                    <? } ?>
                                    <td><input type="text" name="comment[]"></td>
                                </tr>
                                <? $j++ ?>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light" name="submmit">
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="reset" class="btn btn-primary waves-effect waves-light" name="submmit">
                                    Reset
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= \yii\helpers\Url::to(['/site/index']) ?>"
                                   class="btn btn-info waves-effect waves-light pull-right">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?
$js = <<<JS
$("form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each( function () {
        var checkbox_this = $(this);

        if( checkbox_this.is(":checked") == true ) {
            checkbox_this.attr('value','1');
        } else {
            checkbox_this.prop('checked',true);
            //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
            checkbox_this.attr('value','0');
        }
    })
})
JS;
$this->registerJs($js);
?>