	function mkp_url_parameters()
	{

		global $variable;

		// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

		$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

		$variable['y'] = (is_numeric($parts[1]));

		$variable['m'] = (is_numeric($parts[2]));

		$variable['d'] = (is_numeric($parts[3]));

		$variable['monthtitle'] = (is_numeric($parts[2])) ? date('F', mktime(0, 0, 0, $parts[2])) : null;
		 
		return null;
	}
