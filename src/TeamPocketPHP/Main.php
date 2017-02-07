<?php

namespace TeamPocketPHP;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\PluginCommand;

use TeamPocketPHP\game\game;

class Main extends PluginBase{
	
	public $games = [];
	
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->register();
	}
	
	public function register(){
		$this->gameMannager = new game($this);
		$this->eventlistener = new EventListener($this);
	}
}