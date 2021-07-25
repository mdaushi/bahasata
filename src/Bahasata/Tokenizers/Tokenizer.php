<?php

namespace Bahasata\Tokenizers;

use Bahasata\Tokenizers\AnalyzerTrait;

class Tokenizer
{
	use AnalyzerTrait;

	protected $input = '';
	protected $text = '';
	protected $out = '';	

	public function process($string)
	{
		if ($string) {
			$this->input = $string;
		} else {
			$this->input = 'masukan kata atau kalimat yang akan diproses';
		}

		$this->whitespace($string);

		$this->text = $this->out;

		return $this;
	}


	public function wordsTokenizer()
	{
		if (is_array($this->out) && !is_array($this->out[0])) {
			for ($i = 0; $i < count($this->out[0]); $i++) {
				$this->out[$i] = $this->trimWords($this->out[$i]);
			}
		} else {
			$this->out = $this->trimWords($this->text);
		}

		return $this;
	}

	public function trimWords($string)
	{
		$toLower = strtolower($string);
		$result = preg_replace('/[^0-9a-z\s]+/i', '', $toLower);
		$result = preg_replace('/=/i', ' ', $result);
		$result = trim($result);
		$result = explode(' ', $result);
		return $result;
	}

	public function sentencesTokenizer()
	{
		$data = preg_split('/(?<=[,.?!])\s+/i', $this->text);
		$this->out = preg_replace('/[^0-9a-z\s]+/i', '', $data);
		return $this;
	}
}
