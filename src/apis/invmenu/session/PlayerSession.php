<?php

declare(strict_types=1);

namespace BedWars\apis\invmenu\session;

use BedWars\apis\invmenu\session\network\PlayerNetwork;
use Closure;
use pocketmine\player\Player;
use function spl_object_id;

final class PlayerSession
{

    private ?InvMenuInfo $current = null;

    public function __construct(
        private Player        $player,
        private PlayerNetwork $network
    )
    {
    }

    /**
     * @internal
     */
    public function finalize(): void
    {
        if ($this->current !== null) {
            $this->current->graphic->remove($this->player);
            $this->player->removeCurrentWindow();
        }
        $this->network->dropPending();
    }

    public function getCurrent(): ?InvMenuInfo
    {
        return $this->current;
    }

    /**
     * @param InvMenuInfo|null $current
     * @param (Closure(bool) : void)|null $callback
     * @internal use InvMenu::send() instead.
     *
     */
    public function setCurrentMenu(?InvMenuInfo $current, ?Closure $callback = null): void
    {
        if ($this->current !== null) {
            $this->current->graphic->remove($this->player);
        }

        $this->current = $current;

        if ($this->current !== null) {
            $current_id = spl_object_id($this->current);
            $this->current->graphic->send($this->player, $this->current->graphic_name);
            $this->network->waitUntil(PlayerNetwork::DELAY_TYPE_OPERATION, $this->current->graphic->getAnimationDuration(), function (bool $success) use ($callback, $current_id): bool {
                if ($this->current !== null && spl_object_id($this->current) === $current_id) {
                    if ($success && $this->current->graphic->sendInventory($this->player, $this->current->menu->getInventory())) {
                        if ($callback !== null) {
                            $callback(true);
                        }
                        return false;
                    }

                    $this->removeCurrentMenu();
                }
                if ($callback !== null) {
                    $callback(false);
                }
                return false;
            });
        } else {
            $this->network->wait(PlayerNetwork::DELAY_TYPE_ANIMATION_WAIT, static function (bool $success) use ($callback): bool {
                if ($callback !== null) {
                    $callback($success);
                }
                return false;
            });
        }
    }

    /**
     * @return bool
     * @internal use Player::removeCurrentWindow() instead
     */
    public function removeCurrentMenu(): bool
    {
        if ($this->current !== null) {
            $this->setCurrentMenu(null);
            return true;
        }
        return false;
    }

    public function getNetwork(): PlayerNetwork
    {
        return $this->network;
    }
}
