<?php

namespace TeamPocketPHP\game;

use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

class Mannager{

    public $players = [];
    public $spectators = [];
    
    public $map;
    public $statu = "waiting";
    
    public $maxPlayerCount = null;
    public $minPlayerCount = null;

	public $taskid = null;
	
    public function __construct(Main $main, $game){
       $this->plugin = $main;
		
		$this->game = $game;
        $files = $this->getPath();
		$this->data = yaml_parse_file($files);
    }
	
	public function getPath() : string{
        return $this->plugin->getDataFolder() . "\games".strtolower($this->game) . ".yml";
    }
	
	
	public function joinLobby($sender){
		if($this->arrayCount() < $this->maxPlayerCount){
			if(!$this->isplaying($sender)){
				if(!$this->isStarted()){
					$this->addPlayer($sender);
					//$this->startTask();
				}else{
					$sender->sendMessage("Ya comenzo");
				}
			}else{
				$sender->sendMessage("ya estas jugando");
			}
	}else {
		$sender->sendMessage("Full");
		}
	}
	
	public function isStarted(){
		if($this->status == "waiting"){
		    return false;
		}else{
			return true;
		}
	}
	
	public function isStarting(){
		if($this->status == "starting"){
		    return true;
		}else{
			return false;
		}
	}
	
	public function isPlaying($sender){
		if(in_array($sender, $this->players)){
		    return true;
		}else{
			return false;
		}
	}
	
    public function addPlayer($sender){
		array_push($this->players, $sender);
		//$this->plugin->kit->getkit($sender);
	}
	
	public function startTask(){
	}
	
	public function stopTask(){
	}
	
	public function stopGame(){
	}
	
	public function removePlayer($sender){
		
	}
	
	public function arrayCount(){
		return count($this->players);
	}
}