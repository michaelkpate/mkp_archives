	function mkp_url_parameters()
	{

		global $variable;
	
		$url = preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI'));

		$parts = explode('/', $url, 5);

		$variable['y'] = $parts[1];

		$variable['m'] = $parts[2];

		$variable['d'] = $parts[3];

		$month_num = variable(array("name" => "m"));

		$variable['monthtitle'] = (!empty($month_num)) ? date('F', mktime(0, 0, 0, $month_num)) : null;
		 
		return null;
	}
