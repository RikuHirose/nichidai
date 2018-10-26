<?php

namespace App\Helpers\Production;

use App\Helpers\IsMobileHelperInterface;
use Jenssegers\Agent\Agent;

class IsMobileHelper implements IsMobileHelperInterface
{
  public static function isMobile()
    {

      $agent = new Agent();

      if ($agent->isMobile()) {
        return  true;
      } else {
        return false;
      }
    }
}
