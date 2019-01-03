<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:47
	 */

	namespace RiotQuest\RequestMethod\Summoner;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Summoner\SummonerDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	/**
	 * Class SummonersById
	 * @package RiotQuest\RequestMethod\Summoner
	 */
	class SummonerById extends RequestMethodAbstract
	{
		public $path = EndPoint::SUMMONER__BY_SUMMONER;

		/** @deprecated */
		public $id;

		/** @var string */
		public $encryptedSummonerId;

		function __construct(Platform $platform, $encryptedSummonerId) {
			parent::__construct($platform);

			$this->encryptedSummonerId = $encryptedSummonerId;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{encryptedSummonerId}", $this->encryptedSummonerId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var SummonerDto $object */
			$object = $mapper->map($json, new SummonerDto());
			return $object;
		}
	}