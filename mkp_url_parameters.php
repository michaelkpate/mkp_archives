// TXP 4.6 tag registration
if (class_exists('\Textpattern\Tag\Registry')) {
Txp::get('\Textpattern\Tag\Registry')
->register('mkp_url_parameters')
;
}

function mkp_url_parameters()
{

	global $variable;

	// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

	$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

	if (is_numeric($parts[1])) {

	// y is numeric year, m is numeric month, monthtitle is name of month, d is numeric day 

		if (isset($parts[1])) { $variable['y'] = (is_numeric($parts[1])) ? $parts[1] : null; }

		if (isset($parts[2])) { $variable['m'] = (is_numeric($parts[2]))? $parts[2] : null; }

		if (isset($parts[2])) { $variable['monthtitle'] = (is_numeric($parts[2])) ? date('F', mktime(0, 0, 0, $parts[2])) : null; }

		if (isset($parts[3])) { $variable['d'] = (is_numeric($parts[3]))? $parts[3] : null; }

	} else {

	// at this point we are going to assume that Textpattern is running in a subdirectory and shift to the right in our array

		if (isset($parts[2])) { $variable['y'] = (is_numeric($parts[2])) ? $parts[2] : null; }

		if (isset($parts[3])) { $variable['m'] = (is_numeric($parts[3]))? $parts[3] : null; }

		if (isset($parts[3])) { $variable['monthtitle'] = (is_numeric($parts[3])) ? date('F', mktime(0, 0, 0, $parts[3])) : null; }

		if (isset($parts[4])) { $variable['d'] = (is_numeric($parts[4]))? $parts[4] : null; }

	} 
	 
	return null;
}
