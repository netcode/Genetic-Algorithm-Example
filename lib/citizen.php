<?php

class Citizen{
	
	private $data;
	private $fitness;
	
	public function __construct()
	{
		$this->data = '';
		$this->fitness = -1;
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function setData($newData = NULL)
	{
		try{
			if(!is_null($newData)){
				$this->data = $newData;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function getFitness()
	{
		return $this->fitness;
	}
	
	public function setFitness($newFitness = NULL)
	{
		try{
			if(!is_null($newFitness)){
				$this->fitness = $newFitness;
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
			
	}
	
	public function calculateFitness($objective = NULL){
		try{
			if(is_null($objective)){
				throw new Exception('Error, no se ha especificado objetivo');
			}
			
			$fitness = 0;
			/* 
			for($x=0;$x<strlen($objective);$x++){
				$fitness += abs(ord($objective[$x]) - ord($this->data[$x]));
			}
			 * 
			 * 
			 */
			$data_len = count($this->data); 
			
			$totalX = 0;
			$totalXx = 0;
			for($x=0;$x<$data_len;$x++){
				$totalX += $this->data[$x];
				if($this->data[$x] >= (0.25 * $objective)){
					$totalXx++;
				}
			} 
			
			$fitness = ($objective + $data_len) - ($totalX + $totalXx);
			if($fitness == 0 && ($objective != $totalX)){
				//best case
				$fitness = 1;
			}
			//$fitness = $objective - $totalX;
			if($fitness < 0){
				//negative value make a bigbig fitness 
				$fitness = 100000;
			}
			$this->setFitness($fitness);
			
		}catch(Exception $e){
			die($e->getMessage());
		}
		
	}
	
}

?>