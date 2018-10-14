<?PHP

namespace Tests\Repositories;

use App\Models\OtherArticle;
use Tests\TestCase;

class OtherArticleRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(OtherArticle::class, 3)->create();
        $otherArticleIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(OtherArticle::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($otherArticleIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(OtherArticle::class, 3)->create();
        $otherArticleIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $otherArticleCheck = $repository->find($otherArticleIds[0]);
        $this->assertEquals($otherArticleIds[0], $otherArticleCheck->id);
    }

    public function testCreate()
    {
        $otherArticleData = factory(OtherArticle::class)->make();

        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $otherArticleCheck = $repository->create($otherArticleData->toFillableArray());
        $this->assertNotNull($otherArticleCheck);
    }

    public function testUpdate()
    {
        $otherArticleData = factory(OtherArticle::class)->create();

        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $otherArticleData = factory(OtherArticle::class)->make();

        $otherArticleCheck = $repository->update($otherArticleData, $otherArticleData->toFillableArray());
        $this->assertNotNull($otherArticleCheck);
    }

    public function testDelete()
    {
        $otherArticleData = factory(OtherArticle::class)->create();

        /** @var    \App\Repositories\OtherArticleRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\OtherArticleRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($otherArticleData);

        $otherArticleCheck = $repository->find($otherArticleData->id);
        $this->assertNull($otherArticleCheck);
    }

}
