<?PHP

namespace Tests\Repositories;

use App\Models\Review;
use Tests\TestCase;

class ReviewRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(Review::class, 3)->create();
        $reviewIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Review::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($reviewIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(Review::class, 3)->create();
        $reviewIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $reviewCheck = $repository->find($reviewIds[0]);
        $this->assertEquals($reviewIds[0], $reviewCheck->id);
    }

    public function testCreate()
    {
        $reviewData = factory(Review::class)->make();

        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $reviewCheck = $repository->create($reviewData->toFillableArray());
        $this->assertNotNull($reviewCheck);
    }

    public function testUpdate()
    {
        $reviewData = factory(Review::class)->create();

        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $reviewData = factory(Review::class)->make();

        $reviewCheck = $repository->update($reviewData, $reviewData->toFillableArray());
        $this->assertNotNull($reviewCheck);
    }

    public function testDelete()
    {
        $reviewData = factory(Review::class)->create();

        /** @var    \App\Repositories\ReviewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ReviewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($reviewData);

        $reviewCheck = $repository->find($reviewData->id);
        $this->assertNull($reviewCheck);
    }

}
