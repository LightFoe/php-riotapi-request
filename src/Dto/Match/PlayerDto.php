<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:23
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class PlayerDto extends BaseDto
	{
		/** @var string */
		public $currentPlatformId;
		/** @var string */
		public $summonerName;
		/** @var string */
		public $matchHistoryUri;
		/** @var string */
		public $platformId;
		/** @var string Player's current accountId (Encrypted) */
		public $currentAccountId;
		/** @var int Player's summonerId (Encrypted) */
		public $profileIcon;
		/** @var string */
		public $summonerId;
		/** @var string Player's original accountId (Encrypted) */
		public $accountId;
	}