<?PHP

namespace Tests\Repositories;

use App\Models\Favorite;
use Tests\TestCase;

class FavoriteRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(Favorite::class, 3)->create();
        $favoriteIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Favorite::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($favoriteIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(Favorite::class, 3)->create();
        $favoriteIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);

        $favoriteCheck = $repository->find($favoriteIds[0]);
        $this->assertEquals($favoriteIds[0], $favoriteCheck->id);
    }

    public function testCreate()
    {
        $favoriteData = factory(Favorite::class)->make();

        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);

        $favoriteCheck = $repository->create($favoriteData->toFillableArray());
        $this->assertNotNull($favoriteCheck);
    }

    public function testUpdate()
    {
        $favoriteData = factory(Favorite::class)->create();

        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);

        $favoriteData = factory(Favorite::class)->make();

        $favoriteCheck = $repository->update($favoriteData, $favoriteData->toFillableArray());
        $this->assertNotNull($favoriteCheck);
    }

    public function testDelete()
    {
        $favoriteData = factory(Favorite::class)->create();

        /** @var    \App\Repositories\FavoriteRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FavoriteRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($favoriteData);

        $favoriteCheck = $repository->find($favoriteData->id);
        $this->assertNull($favoriteCheck);
    }

}
