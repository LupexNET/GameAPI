<?php

namespace HimmelKreis4865\GameAPI\game\settings;

use HimmelKreis4865\GameAPI\BitFlags;
use HimmelKreis4865\GameAPI\exception\GameConfigurationException;
use pocketmine\block\utils\DyeColor;
use SplFixedArray;

interface GameConfiguration {
	
	/**
	 * The minimum amount of players required to start the game
	 *
	 * @return int
	 */
	public function getMinimumPlayers(): int;
	
	/**
	 * The maximum amount of players, the game will start fast if this number is reached
	 *
	 * @return int
	 */
	public function getMaximumPlayers(): int;
	
	/**
	 * The timer starts when the minimum amount of players is reached
	 *
	 * @return int
	 */
	public function getWaitingTime(): int;
	
	/**
	 * This time is used when the lobby is full - it should be faster than the normal waiting time
	 *
	 * @return int
	 */
	public function getWaitingTimeFast(): int;
	
	/**
	 * The amount of teams used
	 *
	 * @return int
	 */
	public function getTeams(): int;
	
	/**
	 * The team colors can only consist of dye colors, as these are the only ones to be displayable in chat
	 *
	 * @return SplFixedArray<DyeColor>
	 */
	public function getTeamColors(): SplFixedArray;
	
	/**
	 * The flags that will optimise some settings
	 *
	 * @return BitFlags
	 */
	public function getFlags(): BitFlags;
	
	/**
	 * Validates whether all data are set up correctly
	 *
	 * @throws GameConfigurationException
	 *
	 * @return void
	 */
	public function validate(): void;
}