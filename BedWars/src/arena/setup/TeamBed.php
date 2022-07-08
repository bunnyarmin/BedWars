<?php

declare(strict_types=1);

namespace BedWars\arena\setup;

use BedWars\BedWars;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class TeamBed
{
    public function __construct(private BedWars $plugin)
    {
    }

    public function setTeamBed(Player $sender, string $team): void
    {
        if (file_exists($this->plugin->getDataFolder() . "Arena.json")) {
            $pos = $sender->getPosition()->asVector3();

            $arena = new Config($this->plugin->getDataFolder() . "ArenaData.json", Config::JSON);
            switch ($team) {
                case "1":
                    $arena->set("team.rot.bed", $pos);
                    $arena->save();
                    break;
                case "2":
                    $arena->set("team.gelb.bed", $pos);
                    $arena->save();
                    break;
                case "3":
                    $arena->set("team.grün.bed", $pos);
                    $arena->save();
                    break;
                case "4":
                    $arena->set("team.cyan.bed", $pos);
                    $arena->save();
                    break;
                case "5":
                    $arena->set("team.blau.bed", $pos);
                    $arena->save();
                    break;
                case "6":
                    $arena->set("team.magenta.bed", $pos);
                    $arena->save();
                    break;
                case "7":
                    $arena->set("team.schwarz.bed", $pos);
                    $arena->save();
                    break;
                case "8":
                    $arena->set("team.weiß.bed", $pos);
                    $arena->save();
                    break;
            }

            $sender->sendMessage("§fBed§cWars §8» §aDu hast den Spawn von Team " . $team . " gesetzt!");
        } else {
            $sender->sendMessage("§cBed§fWars §8» §cError");
        }
    }
}