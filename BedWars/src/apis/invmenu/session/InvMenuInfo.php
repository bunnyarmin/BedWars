<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\session;

use BedWars\apis\invmenu\InvMenu;
use BedWars\apis\invmenu\type\graphic\InvMenuGraphic;

final class InvMenuInfo
{

    public function __construct(
        public InvMenu        $menu,
        public InvMenuGraphic $graphic,
        public ?string        $graphic_name
    )
    {
    }
}