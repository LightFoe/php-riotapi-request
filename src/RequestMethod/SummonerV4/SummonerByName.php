<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:42
	 */

	namespace RiotQuest\RequestMethod\SummonerV4;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\SummonerV4\SummonerDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	class SummonerByName extends RequestMethodAbstract
	{
		public $path = EndPoint::SUMMONERV4__SUMMONERS_BY_NAME;

		public $name;

		function __construct(Platform $platform, $name) {
			parent::__construct($platform);

			$this->name = $name;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{summonerName}", $this->name, $uri);

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