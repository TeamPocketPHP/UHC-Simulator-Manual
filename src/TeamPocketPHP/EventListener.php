<?php

namespace TeamPocketPHP;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerMoveEvent;


class EventListener implements Listener{
	
	public function __construct(Main $owner){
		$this->plugin = $owner;
		$this->plugin->getServer()->getPluginManager()->registerEvents($this, $owner);
	}
}
	