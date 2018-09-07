<?PHP

namespace Tests\Repositories;

use App\Models\LessonSchedule;
use Tests\TestCase;

class LessonScheduleRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(LessonSchedule::class, 3)->create();
        $lessonScheduleIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(LessonSchedule::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($lessonScheduleIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(LessonSchedule::class, 3)->create();
        $lessonScheduleIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonScheduleCheck = $repository->find($lessonScheduleIds[0]);
        $this->assertEquals($lessonScheduleIds[0], $lessonScheduleCheck->id);
    }

    public function testCreate()
    {
        $lessonScheduleData = factory(LessonSchedule::class)->make();

        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonScheduleCheck = $repository->create($lessonScheduleData->toFillableArray());
        $this->assertNotNull($lessonScheduleCheck);
    }

    public function testUpdate()
    {
        $lessonScheduleData = factory(LessonSchedule::class)->create();

        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonScheduleData = factory(LessonSchedule::class)->make();

        $lessonScheduleCheck = $repository->update($lessonScheduleData, $lessonScheduleData->toFillableArray());
        $this->assertNotNull($lessonScheduleCheck);
    }

    public function testDelete()
    {
        $lessonScheduleData = factory(LessonSchedule::class)->create();

        /** @var    \App\Repositories\LessonScheduleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonScheduleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($lessonScheduleData);

        $lessonScheduleCheck = $repository->find($lessonScheduleData->id);
        $this->assertNull($lessonScheduleCheck);
    }

}
