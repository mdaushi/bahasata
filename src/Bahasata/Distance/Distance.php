<?php 

namespace Bahasata\Distance;

class Distance 
{
	public function HammingDistance($word1, $word2, $case = '')
	{
		if(gettype($word1) !== 'string' or gettype($word2) !== 'string'){
			return -1;
		}

		if(strlen($word1) !== strlen($word2)){
			return -1;
		}

		if($case){
			$word1 = strtolower($word1);
			$word2 = strtolower($word2);
		}

		$diff = 0;
		for($i = 0; $i < strlen($word1); $i++){
			if($word1[$i] !== $word2[$i]){
				$diff++;
			}
		}
		return $diff;

	}
}