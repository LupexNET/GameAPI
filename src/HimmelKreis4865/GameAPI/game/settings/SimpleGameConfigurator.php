<?php

namespace HimmelKreis4865\GameAPI\game;

use HimmelKreis4865\GameAPI\BitFlags;
use HimmelKreis4865\GameAPI\exception\GameConfigurationException;
use HimmelKreis4865\GameAPI\game\settings\GameConfiguration;
use HimmelKreis4865\GameAPI\game\settings\GameConfigurationFlags;
use pocketmine\block\utils\DyeColor;
use pocketmine\utils\Config;
use SplFixedArray;
use function array_filter;
use function assert;
use function count;

final class SimpleGameConfigurator implements GameConfiguration {
	
	/** @var SplFixedArray<DyeColor> $teamColors */
	private SplFixedArray $teamColors;
	
	/** @var int $minimumPlayers */
	private int $minimumPlayers;
	
	/** @var int $maximumPlayers */
	private int $maximumPlayers;
	
	/** @var int $waitingTime */
	private int $waitingTime;
	
	/** @var int $waitingTimeFast */
	private int $waitingTimeFast;
	
	/** @var BitFlags $flags */
	private BitFlags $flags;
	
	/**
	 * @param int $teams the amount of teams
	 */
	private function __construct(private readonly int $teams) {
		$this->flags = new BitFlags(GameConfigurationFlags::DEFAULT_FLAGS);
	}
	
	public function getMinimumPlayers(): int {
		return $this->minimumPlayers;
	}
	
	public function getMaximumPlayers(): int {
		return $this->maximumPlayers;
	}
	
	public function getWaitingTime(): int {
		return $this->waitingTime;
	}
	
	public function getWaitingTimeFast(): int {
		return $this->waitingTimeFast;
	}
	
	public function getTeams(): int {
		return $this->teams;
	}
	
	public function getTeamColors(): SplFixedArray {
		return $this->teamColors;
	}
	
	public function getFlags(): BitFlags {
		return $this->flags;
	}
	
	/**
	 * After this creation, the following methods must be called:
	 *
	 * @param int $teams
	 *
	 * @return SimpleGameConfigurator
	 */
	public static function create(int $teams): SimpleGameConfigurator {
		return new SimpleGameConfigurator($teams);
	}
	
	/**
	 * Select an array of team colors
	 * Note: when the game starts with few players, the colors used will be picked randomly
	 *
	 * @param SplFixedArray<DyeColor>|array<DyeColor> $colors
	 *
	 * @return $this
	 */
	public function setTeamColors(SplFixedArray|array $colors): SimpleGameConfigurator {
		assert(count($colors) === $this->getTeams(), new GameConfigurationException('The amount of team colors should match the team number.'));
		assert(count(array_filter((array) $colors, fn (mixed $value) => !($value instanceof DyeColor))) === 0, new GameConfigurationException('Setting team colors requires only objects of DyeColor.'));
		$this->teamColors = ($colors instanceof SplFixedArray ? clone $colors : SplFixedArray::fromArray($colors, false));
		return $this;
	}
	
	/**
	 * @param int $minimum the minimum amount of players that are able to join the game
	 * @param int $maximum
	 *
	 * @return $this
	 */
	public function setPlayerLimit(int $minimum, int $maximum): SimpleGameConfigurator {
		assert($minimum <= $maximum, new GameConfigurationException('The minimum ' . $minimum . ' cannot exceed the limits of the maximum ' . $maximum));
		$this->minimumPlayers = $minimum;
		$this->maximumPlayers = $maximum;
		return $this;
	}
	
	/**
	 * @param int $normal the normal waiting time when the lobby waits for more players to start but theoretically has enough to start the game
	 * @param int $fast the waiting time when the game is full
	 *
	 * @return $this
	 */
	public function setWaitingTime(int $normal, int $fast): SimpleGameConfigurator {
		$this->waitingTime = $normal;
		$this->waitingTimeFast = $fast;
		return $this;
	}
	
	public function validate(): void {
	
	}
}