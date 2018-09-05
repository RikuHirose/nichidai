<?PHP

namespace Tests\Models;

use App\Models\Lesson;
use Tests\TestCase;

class LessonTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\Lesson $lesson */
        $lesson = new Lesson();
        $this->assertNotNull($lesson);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\Lesson $lesson */
        $lessonModel = new Lesson();

        $lessonData = factory(Lesson::class)->make();
        foreach( $lessonData->toFillableArray() as $key => $value ) {
            $lessonModel->$key = $value;
        }
        $lessonModel->save();

        $this->assertNotNull(Lesson::find($lessonModel->id));
    }

}
