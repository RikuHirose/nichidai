<?php

namespace Tests\Helpers;

use Tests\TestCase;

class IsMobileHelperTest extends TestCase
{
    public function testGetInstance()
    {
        /** @var    \App\Helpers\IsMobileHelperInterface $helper */
        $helper = \App::make(\App\Helpers\IsMobileHelperInterface::class);
        $this->assertNotNull($helper);
    }
}
