<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type\graphic\network;

use BedWars\apis\invmenu\session\InvMenuInfo;
use BedWars\apis\invmenu\session\PlayerSession;
use pocketmine\network\mcpe\protocol\ContainerOpenPacket;

final class MultiInvMenuGraphicNetworkTranslator implements InvMenuGraphicNetworkTranslator
{

    /**
     * @param InvMenuGraphicNetworkTranslator[] $translators
     */
    public function __construct(
        private array $translators
    )
    {
    }

    public function translate(PlayerSession $session, InvMenuInfo $current, ContainerOpenPacket $packet): void
    {
        foreach ($this->translators as $translator) {
            $translator->translate($session, $current, $packet);
        }
    }
}