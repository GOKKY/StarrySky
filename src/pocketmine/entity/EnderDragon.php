<?php

/*
 *     _____    _                                   _____   _
 *    / ___ \ _| |_   ___    _  __ _  __ _      __ / ___ \ | |   __      __
 *   | |___\_|_  __| / _ \  | |/ _| |/ _| \    / /| |___\_|| | __\ \    / /
 *    \___  \  | |  / / \ | | / / | / /  \ \  / /  \___  \ | |/ / \ \  / /
 *   | \___\ | | \_ | \_| |_|  /  |  /    \ \/ /  | \___\ || / /   \ \/ /
 *    \_____/   \__| \_____/|_|   |_|      \  /    \_____/ | |\ \   \  /
 *                                         / /             |_| \_\  / /
 *                                        / /                      / /
 *                                       /_/                      /_/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author StarrySky Team
 * 
*/


namespace pocketmine\entity;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;

class Endermite extends Monster{
	const NETWORK_ID = 53;
	public function initEntity(){
		parent::initEntity();
		$this->setMaxHealth(200);
	}

	public function getName() : string{
		return "Ender Dragon";
	}
	
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = self::NETWORK_ID;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}
}