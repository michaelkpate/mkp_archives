function mkp_url_parameters()
{

	global $variable;

	// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

	$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

	if (is_numeric($parts[1])) {

	// y is numeric year, m is numeric month, monthtitle is name of month, d is numeric day 

		$variable['y'] = (is_numeric($parts[1])) ? $parts[1] : null;

		$variable['m'] = (is_numeric($parts[2]))? $parts[2] : null;

		$variable['monthtitle'] = (is_numeric($parts[2])) ? date('F', mktime(0, 0, 0, $parts[2])) : null;

		$variable['d'] = (is_numeric($parts[3]))? $parts[3] : null;

	} else {

	// at this point we are going to assume that Textpattern is running in a subdirectory and shift to the right in our array

 	 	$variable['y'] = (is_numeric($parts[2])) ? $parts[2] : null;

		$variable['m'] = (is_numeric($parts[3]))? $parts[3] : null;

		$variable['monthtitle'] = (is_numeric($parts[3])) ? date('F', mktime(0, 0, 0, $parts[3])) : null;

		$variable['d'] = (is_numeric($parts[4]))? $parts[4] : null;

	} 
	 
	return null;
}

