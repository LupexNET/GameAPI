<?php

namespace HimmelKreis4865\GameAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

final class GameAPI extends PluginBase {
	use SingletonTrait;
	
	protected function onLoad(): void {
		self::$instance = $this;
	}
	
	protected function onEnable(): void {
	
	}
}