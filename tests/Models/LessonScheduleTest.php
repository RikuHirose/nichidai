<?PHP

namespace Tests\Models;

use App\Models\LessonSchedule;
use Tests\TestCase;

class LessonScheduleTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\LessonSchedule $lessonSchedule */
        $lessonSchedule = new LessonSchedule();
        $this->assertNotNull($lessonSchedule);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\LessonSchedule $lessonSchedule */
        $lessonScheduleModel = new LessonSchedule();

        $lessonScheduleData = factory(LessonSchedule::class)->make();
        foreach( $lessonScheduleData->toFillableArray() as $key => $value ) {
            $lessonScheduleModel->$key = $value;
        }
        $lessonScheduleModel->save();

        $this->assertNotNull(LessonSchedule::find($lessonScheduleModel->id));
    }

}
