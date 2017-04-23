<?php

namespace gja;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class main extends PluginBase{

	
	public function getTxt($key, $jurl){
		$urlh = $this->curl_get_contents("$jurl"); 
		$url = json_decode($urlh, true); 
		return $url["{$key}"];
	}

	public function curl_get_contents($url){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
	}
}