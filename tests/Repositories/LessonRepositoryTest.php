<?PHP

namespace Tests\Repositories;

use App\Models\Lesson;
use Tests\TestCase;

class LessonRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(Lesson::class, 3)->create();
        $lessonIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Lesson::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($lessonIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(Lesson::class, 3)->create();
        $lessonIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonCheck = $repository->find($lessonIds[0]);
        $this->assertEquals($lessonIds[0], $lessonCheck->id);
    }

    public function testCreate()
    {
        $lessonData = factory(Lesson::class)->make();

        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonCheck = $repository->create($lessonData->toFillableArray());
        $this->assertNotNull($lessonCheck);
    }

    public function testUpdate()
    {
        $lessonData = factory(Lesson::class)->create();

        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);

        $lessonData = factory(Lesson::class)->make();

        $lessonCheck = $repository->update($lessonData, $lessonData->toFillableArray());
        $this->assertNotNull($lessonCheck);
    }

    public function testDelete()
    {
        $lessonData = factory(Lesson::class)->create();

        /** @var    \App\Repositories\LessonRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LessonRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($lessonData);

        $lessonCheck = $repository->find($lessonData->id);
        $this->assertNull($lessonCheck);
    }

}
