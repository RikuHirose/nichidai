<?php
use Illuminate\Database\Seeder;

class LessonScheduleSeeder extends CSVSeeder
{
    protected $table = 'lesson_schedules';

    protected $csvFile = 'lesson_schedules';

    protected $isTest = false;

    protected $isDisabled = false;
}
