<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type\util;

use BedWars\apis\invmenu\type\util\builder\BlockActorFixedInvMenuTypeBuilder;
use BedWars\apis\invmenu\type\util\builder\BlockFixedInvMenuTypeBuilder;
use BedWars\apis\invmenu\type\util\builder\DoublePairableBlockActorFixedInvMenuTypeBuilder;

final class InvMenuTypeBuilders
{

    public static function BLOCK_ACTOR_FIXED(): BlockActorFixedInvMenuTypeBuilder
    {
        return new BlockActorFixedInvMenuTypeBuilder();
    }

    public static function BLOCK_FIXED(): BlockFixedInvMenuTypeBuilder
    {
        return new BlockFixedInvMenuTypeBuilder();
    }

    public static function DOUBLE_PAIRABLE_BLOCK_ACTOR_FIXED(): DoublePairableBlockActorFixedInvMenuTypeBuilder
    {
        return new DoublePairableBlockActorFixedInvMenuTypeBuilder();
    }
}