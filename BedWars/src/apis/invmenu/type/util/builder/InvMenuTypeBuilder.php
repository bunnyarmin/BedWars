<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type\util\builder;

use BedWars\apis\invmenu\type\InvMenuType;

interface InvMenuTypeBuilder
{

    public function build(): InvMenuType;
}