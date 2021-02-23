<?php


namespace Kylan1940;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("Plugin Enable");
	}
	
	public function onCommand(CommandSender $player, Command $cmd, string $label, array $data): bool{
		switch($cmd->getName()){
		case "online":
		  $result = $data;
			if($player instanceof Player){
				$this->OnlineUI($player);
				return true;
			}
		}
		return true;
	}
	public function OnlineUI($player){
	  $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createSimpleForm function (Player $player, int $data = null) {
        $result = $data;
        if($result === null){
            return true;

			}
		};
		$form->setTitle("§e-=Online §aUI=-");
		$form->setContent("Players:");
		foreach($this->getServer()->getOnlinePlayers() as $online){
			$form->addButton($online->getName(), -1, "", $online->getName(), 0, "textures/ui/confirm");
		}
		$form->sendToPlayer($player);
		return $form;
	}
}
