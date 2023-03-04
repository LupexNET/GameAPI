<?php

namespace HimmelKreis4865\GameAPI;

final class BitFlags {
	
	public function __construct(protected int $bits = 0) { }
	
	public function add(int $bit): void {
		$this->bits |= $bit;
	}
	
	public function remove(int $bit): void {
		$this->bits &= ~$bit;
	}
	
	public function has(int $bit): bool {
		return (($this->bits & $bit) === $bit);
	}
	
	public function reset(): void {
		$this->bits = 0;
	}
}