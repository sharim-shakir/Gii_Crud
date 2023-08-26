<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use app\models\Subject;

/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var yii\widgets\ActiveForm $form */

$courseList = Course::getCourseList();

$selectedCourses = [];
if ($model->course_books !== null) {
    $selectedCourses = explode(',', $model->course_books);
}

$subjectList =Subject::getSubjectList();

$selectedSubjects = [];
if ($model->subject !== null) {
    $selectedSubjects = explode(',', $model->subject);
}

?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_of_birth')->input('date', ['class' => 'form-control']); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'selectedCourses')->checkboxList(
    \yii\helpers\ArrayHelper::map($courseList, 'id', 'title'),
    ['value' => $selectedCourses]
    ) ?>

    <?= $form->field($model, 'selectedSubjects')->dropDownList(
    \yii\helpers\ArrayHelper::map(Subject::find()->all(), 'id', 'title'),
    ['prompt' => 'Select Subjects', 'multiple' => true]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
