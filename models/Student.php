<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $contact
 * @property string|null $address
 * @property string|null $date_of_birth
 * @property int|null $status
 * @property string|null $course_books
 * @property int|null $subject
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    public $selectedCourses;
    public $selectedSubjects;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['status', 'subject'], 'integer'],
            [['full_name', 'course_books'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 15],
            [['date_of_birth'], 'string', 'max' => 50],
            [['selectedCourses','selectedSubjects'], 'safe'], // Make 
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'contact' => 'Contact',
            'address' => 'Address',
            'date_of_birth' => 'Date Of Birth',
            'status' => 'Status',
            'course_books' => 'Course Books',
            'subject' => 'Subject',
        ];
    }

 public function getCourseTitles()
    {
        $courseIds = explode(',', $this->course_books);

        $query = Course::find()->select('title')->where(['id' => $courseIds]);
        $courseTitles = $query->column();

        return implode(', ', $courseTitles);
    }

 public function getSubjectTitles()
    {
        $subjectIds = explode(',', $this->subject);

        $query = Subject::find()->select('title')->where(['id' => $subjectIds]);
        $subjectTitles = $query->column();

        return implode(', ', $subjectTitles);
    }

//Create student code and get course books title 

    // ... other methods

   public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->selectedCourses !== null) {
            // Process selected courses and update course_books field here
        }

        if ($this->selectedSubjects !== null) {
            // Process selected subjects and update subject field here
        }
    }


}
