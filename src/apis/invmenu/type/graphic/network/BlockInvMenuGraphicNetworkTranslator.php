<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type\graphic\network;

use BedWars\apis\invmenu\session\InvMenuInfo;
use BedWars\apis\invmenu\session\PlayerSession;
use BedWars\apis\invmenu\type\graphic\PositionedInvMenuGraphic;
use InvalidArgumentException;
use pocketmine\network\mcpe\protocol\ContainerOpenPacket;
use pocketmine\network\mcpe\protocol\types\BlockPosition;

final class BlockInvMenuGraphicNetworkTranslator implements InvMenuGraphicNetworkTranslator
{

    private function __construct()
    {
    }

    public static function instance(): self
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function translate(PlayerSession $session, InvMenuInfo $current, ContainerOpenPacket $packet): void
    {
        $graphic = $current->graphic;
        if (!($graphic instanceof PositionedInvMenuGraphic)) {
            throw new InvalidArgumentException("Expected " . PositionedInvMenuGraphic::class . ", got " . get_class($graphic));
        }

        $pos = $graphic->getPosition();
        $packet->blockPosition = new BlockPosition((int)$pos->x, (int)$pos->y, (int)$pos->z);
    }
}