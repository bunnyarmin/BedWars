<?php

declare(strict_types=1);

namespace BedWars;

use BedWars\arena\setup\Villager;
use BedWars\forms\menu\VillagerShop;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;

class Events implements Listener
{
    public function onDamage(EntityDamageEvent $event): void
    {
        $entity = $event->getEntity();

        if ($event instanceof EntityDamageByEntityEvent) {
            $damager = $event->getDamager();
            if ($entity instanceof Villager) {
                $event->cancel();

                $shop = new VillagerShop();
                $shop->sendItemShop($damager);
            }
        }
    }
}