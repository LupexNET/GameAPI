<?php

namespace HimmelKreis4865\GameAPI\game\settings;

final class GameConfigurationFlags {
	
	/**
	 * When this flag is set the game will pick random colors if there are few people in the game
	 * If not set, the colors will be chosen descending
	 *
	 * DEFAULT
	 */
	public const TEAM_COLOR_RANDOMIZER = 0x001;
	
	// todo: setup more flags
	
	public const DEFAULT_FLAGS = GameConfigurationFlags::TEAM_COLOR_RANDOMIZER;
}