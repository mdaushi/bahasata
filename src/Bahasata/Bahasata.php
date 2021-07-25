<?php

namespace Bahasata;

use Bahasata\Distance\Distance;
use Bahasata\Stemmer\Stemmer;
use Bahasata\Tokenizers\Tokenizer;

class Bahasata extends Tokenizer
{
	public function write($string)
	{
		return $this->process($string);
	}

	public function get()
	{
		return $this->out;
	}

	public function stem($word = '')
	{
		$stemmer = new Stemmer();
		if($word){
			if(str_word_count($word) > 1){
				return $this->out = 'maaf, hanya bisa memproses satu kata';
			}
			$this->out = $stemmer->stem($word);
			return $this->out;
		}else{
			for ($i=0; $i < count($this->out); $i++) { 
				$this->out[$i] = $stemmer->stem($this->out[$i]);
			}
			return $this;
		}
	}

	// public function distance($word1, $word2, $case='')
	// {
	// 	$distance = new Distance();
	// 	return $distance->HammingDistance($word1, $word2, $case);
	// }

}
