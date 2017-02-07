<?php

namespace TeamPocketPHP\game;

use pocketmine\Server;
use pocketmine\Player;

class gameMannager{
	
	private $owner;
	
	public function __construct(Main $owner){
		$this->plugin = $owner;
	}
	
	public function createGameData($game){
		$this->plugin->games[$game] = new Mannager($this->plugin, $game);
	}
	
	public function joinGame($sender, $game){
		if(!isset($this->plugin->games[$game]) and is_file($this->plugin->getDataFolder() ."\games".strtolower($game) . ".yml")){
			$this->createGameData($game);
		}
		$this->plugin->games [$game]->joinLobby($sender);
	}
}
	