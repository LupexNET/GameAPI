<?php

namespace HimmelKreis4865\GameAPI\game;

use HimmelKreis4865\GameAPI\game\settings\GameConfiguration;

abstract class GameBase {
	
	/**
	 * @param string $name
	 * This might be a @see SimpleGameConfigurator
	 * @param GameConfiguration $configuration
	 */
	public function __construct(private readonly string $name, private readonly GameConfiguration $configuration) { }
	
	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @return GameConfiguration
	 */
	public function getConfiguration(): GameConfiguration {
		return $this->configuration;
	}
}