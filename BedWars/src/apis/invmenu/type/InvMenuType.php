<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\type;

use BedWars\apis\invmenu\InvMenu;
use BedWars\apis\invmenu\type\graphic\InvMenuGraphic;
use pocketmine\inventory\Inventory;
use pocketmine\player\Player;

interface InvMenuType
{

    public function createGraphic(InvMenu $menu, Player $player): ?InvMenuGraphic;

    public function createInventory(): Inventory;
}