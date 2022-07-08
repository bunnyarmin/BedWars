<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\session\network\handler;

use BedWars\apis\invmenu\session\network\NetworkStackLatencyEntry;
use Closure;

interface PlayerNetworkHandler
{

    public function createNetworkStackLatencyEntry(Closure $then): NetworkStackLatencyEntry;
}