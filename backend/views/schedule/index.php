<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Schedules');
$this->params['breadcrumbs'][] = $this->title;

?>
<style type="text/css">
    table{
        border: 1px solid #36459b;
    }
    td{
        text-align: center;
        margin:auto;
        border: 1px solid #36459b;

    }
    th{
        text-align: center;
        border: 1px solid #36459b;
        margin:auto;
    }
</style>
<div class="page">
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        <p><?=Yii::t('main','Schedules')?></p>
                        <a href="<?=Url::to(['create'])?>"><button type="button" class="add-item btn btn-success btn-sm pull-right" ><i class="glyphicon glyphicon-plus"></i> Add</button></a>
                        <div class="example-wrap">
                            <div class="example table-responsive">
                                <!-- Example Tabs Solid -->
                                <div class="example-wrap">
                                    <div class="nav-tabs-horizontal">
                                        <ul class="nav nav-tabs nav-tabs-solid" data-plugin="nav-tabs" role="tablist">

                                            <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsSolidOne" aria-controls="exampleTabsSolidOne"
                                                                                      role="tab">Monday</a>
                                            </li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidTwo" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Tuesday</a></li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidThree" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Wednesday</a></li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidFour" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Thursday</a></li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidFive" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Friday</a></li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidSix" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Saturday</a></li>
                                            <li role="presentation"><a data-toggle="tab" href="#exampleTabsSolidSeven" aria-controls="exampleTabsSolidTwo"
                                                                       role="tab">Sunday</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="exampleTabsSolidOne" role="tabpanel">

                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table" >
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 1):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->

                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidTwo" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 2):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidThree" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 1):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidFour" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 2):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidFive" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 1):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==1):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidSix" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 2):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==2):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>
                                            <div class="tab-pane" id="exampleTabsSolidSeven" role="tabpanel">
                                                <!-- Example Responsive -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <?php foreach($schedule as $key => $schedule_group):?>
                                                                <?php if($schedule_group['day_id'] == 3):?>
                                                                    <th>Group</th>
                                                                    <th>Room</th>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td ><a href="#">09:00 - 10:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '09:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">10:00 - 11:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '10:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">11:00 - 12:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '11:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">12:00 - 13:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '12:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">14:00 - 15:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '14:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">15:00 - 16:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '15:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">16:00 - 17:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '16:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">17:00 - 18:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '17:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">18:00 - 19:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '18:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">19:00 - 20:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '19:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">20:00 - 21:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '20:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        <tr>
                                                            <td ><a href="#">21:00 - 22:00</a></td>
                                                            <?php foreach($schedule as $key => $schedule_lesson):?>
                                                                <?php if($schedule_lesson['day_id']==3):?>
                                                                    <?php if($schedule_lesson['begin_time'] == '21:00:00'):?>
                                                                        <td>
                                                                            <?php echo $schedule_lesson->group->name;?><hr>
                                                                            <?php echo $schedule_lesson->since->name;?><hr>
                                                                            <?php
                                                                            if ($schedule_lesson['type_of_study'] == 1){echo "Writing";}
                                                                            elseif($schedule_lesson['type_of_study'] == 2){ echo "Reading";}
                                                                            elseif($schedule_lesson['type_of_study'] == 3){echo "Listening";}
                                                                            elseif($schedule_lesson['type_of_study'] == 4){echo "Speaking";}
                                                                            elseif($schedule_lesson['type_of_study'] == 5){echo "Grammar";}
                                                                            ?><hr>
                                                                            <?php echo $schedule_lesson->members->fio;?>
                                                                        </td>
                                                                        <td><?php echo $schedule_lesson->room->room;?></td>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Example Responsive -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Example Tabs Solid -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>