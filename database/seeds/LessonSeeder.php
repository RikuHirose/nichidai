<?php
use Illuminate\Database\Seeder;

class LessonSeeder extends CSVSeeder
{
    protected $table = 'lessons';

    protected $csvFile = 'lessons';

    protected $isTest = false;

    protected $isDisabled = false;
}
