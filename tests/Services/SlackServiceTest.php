<?PHP

namespace Tests\Services;

use Tests\TestCase;

class SlackServiceTest extends TestCase
{

    /**
     * @return  \App\Services\SlackServiceInterface
     */
    protected function getInstance()
    {
        /** @var  \App\Services\SlackServiceInterface $service */
        $service = \App::make(\App\Services\SlackServiceInterface::class);

        return $service;
    }

    public function testGetInstance()
    {
        $service = $this->getInstance();
        $this->assertNotNull($service);
    }

}
