<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type\graphic\network;

use BedWars\apis\invmenu\session\InvMenuInfo;
use BedWars\apis\invmenu\session\PlayerSession;
use pocketmine\network\mcpe\protocol\ContainerOpenPacket;

interface InvMenuGraphicNetworkTranslator
{

    public function translate(PlayerSession $session, InvMenuInfo $current, ContainerOpenPacket $packet): void;
}