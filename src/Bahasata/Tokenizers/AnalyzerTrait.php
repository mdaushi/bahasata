<?php

namespace Bahasata\Tokenizers;

trait AnalyzerTrait
{
	public function whitespace($string)
	{
		$replace = ['!\s+!'];
		$this->out = preg_replace($replace, ' ', $string);
		return $this;
	}
}