<?php

/**
 * Bahasata ()
 * 
 * Thanks for @Susantokun for this basic logic
 */

namespace Bahasata\Stemmer;

class Stemmer
{
	/**
	 * load root words from file
	 */
	public function getWordFile()
	{
		$file = __DIR__ . '/../../../data/kata-dasar.txt';
		if (!is_readable($file)) {
			throw new \Exception('file is missing');
		}
		$words = explode("\n", file_get_contents($file));
		return $words;
	}

	/**
	 * 
	 */
	public function getWord($word)
	{
		$words = $this->getWordFile();
		foreach ($words as $item) {
			if ($item == $word) {
				return true;
			}
		}
		return false;
	}

	/** remove suffix
	 * akhiran 	-ku -mu -nya -kah -lah -pun
	 * referensi = https://id.wikipedia.org/wiki/Akhiran
	 */
	public function suffix($word)
	{
		$rootWord = $word;
		$suffix = '/([km]u|nya|[kl]ah|pun)\z/i';
		if (preg_match($suffix, $word)) {
			$word__ = preg_replace($suffix, '', $word);
			return $word__;
		}
		return $rootWord;
	}

	/** 
	 * remove derivation suffix
	 * akiran -i -an atau -kan
	 * reference = https://id.wikipedia.org/wiki/Akhiran
	 */
	function derivationSuffixes($word)
	{
		$rootWord = $word;
		/**
		 * check word match
		 */
		if (preg_match('/(i|an)\z/i', $word)) {
			$__kata = preg_replace('/(i|an)\z/i', '', $word);
			if ($this->getWord($__kata)) {
				return $__kata;
			} else if (preg_match('/(kan)\z/i', $word)) {
				$__kata = preg_replace('/(kan)\z/i', '', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
			}
		}
		return $rootWord;
	}

	/**
	 * remove preffix
	 * awalan se- di- me- meng- ber- pe- per- ter- ke-
	 * reference = https://id.wikipedia.org/wiki/Awalan
	 */
	function DerivationPrefix($word)
	{
		$rootWord = $word;

		/**
		 * type 1
		 * if di- ke- se-
		 */
		if (preg_match('/^(di|[ks]e)/', $word)) {
			$__kata = preg_replace('/^(di|[ks]e)/', '', $word);

			if ($this->getWord($__kata)) {
				return $__kata;
			}

			$__kata__ = $this->derivationSuffixes($__kata);

			if ($this->getWord($__kata__)) {
				return $__kata__;
			}

			/**
			 * diper-
			 */
			if (preg_match('/^(diper)/', $word)) {
				$__kata = preg_replace('/^(diper)/', '', $word);
				$__kata__ = $this->derivationSuffixes($__kata);

				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			/**
			 * keber- keter-
			 */
			if (preg_match('/^(ke[bt]er)/', $word)) {
				$__kata = preg_replace('/^(ke[bt]er)/', '', $word);
				$__kata__ = $this->derivationSuffixes($__kata);

				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}
		}

		/**
		 * type 2
		 * if te- ter- be- ber-
		 */
		if (preg_match('/^([bt]e)/', $word)) {

			$__kata = preg_replace('/^([bt]e)/', '', $word);
			if ($this->getWord($__kata)) {
				return $__kata;
			}

			$__kata = preg_replace('/^([bt]e[lr])/', '', $word);
			if ($this->getWord($__kata)) {
				return $__kata;
			}

			$__kata__ = $this->derivationSuffixes($__kata);
			if ($this->getWord($__kata__)) {
				return $__kata__;
			}
		}

		if (preg_match('/^([mp]e)/', $word)) {
			$__kata = preg_replace('/^([mp]e)/', '', $word);
			if ($this->getWord($__kata)) {
				return $__kata;
			}
			$__kata__ = $this->derivationSuffixes($__kata);
			if ($this->getWord($__kata__)) {
				return $__kata__;
			}

			if (preg_match('/^(memper)/', $word)) {
				$__kata = preg_replace('/^(memper)/', '', $word);
				if ($this->getWord($word)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			if (preg_match('/^([mp]eng)/', $word)) {
				$__kata = preg_replace('/^([mp]eng)/', '', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}

				$__kata = preg_replace('/^([mp]eng)/', 'k', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			if (preg_match('/^([mp]eny)/', $word)) {
				$__kata = preg_replace('/^([mp]eny)/', 's', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			if (preg_match('/^([mp]e[lr])/', $word)) {
				$__kata = preg_replace('/^([mp]e[lr])/', '', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			if (preg_match('/^([mp]en)/', $word)) {
				$__kata = preg_replace('/^([mp]en)/', 't', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}

				$__kata = preg_replace('/^([mp]en)/', '', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}

			if (preg_match('/^([mp]em)/', $word)) {
				$__kata = preg_replace('/^([mp]em)/', '', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}
				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}

				$__kata = preg_replace('/^([mp]em)/', 'p', $word);
				if ($this->getWord($__kata)) {
					return $__kata;
				}

				$__kata__ = $this->derivationSuffixes($__kata);
				if ($this->getWord($__kata__)) {
					return $__kata__;
				}
			}
		}
		return $rootWord;
	}

	public function checkWord($word)
	{
		if ($this->getWord($word)) {
			return $word;
		}
		return $word;
	}

	public function stemmingProcess($word)
	{
		$word = $this->suffix($word);
		$word = $this->checkWord($word);
		$word = $this->DerivationPrefix($word);
		$word = $this->checkWord($word);
		return $word;
	}

	public function stem($word = '')
	{
		// check word in directory 
		// if there are is then the word is the root word
		// if not then do stemmer
		$check = $this->getWord($word);
		if ($check == true) {
			return $word;
		} else {
			$word = $this->stemmingProcess($word);
			return $word;
		}
	}
}
