function mkp_url_parameters()
{

	global $variable;

	// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

	$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

	$variable['y'] = (is_numeric($parts[1])) ? $parts[1] : null;

	$variable['m'] = (is_numeric($parts[2]))? $parts[2] : null;

	$variable['monthtitle'] = (is_numeric($parts[2])) ? date('F', mktime(0, 0, 0, $parts[2])) : null;

	$variable['d'] = (is_numeric($parts[3]))? $parts[3] : null;
	 
	return null;
}
