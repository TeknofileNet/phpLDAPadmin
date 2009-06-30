<?php
// $Header: /cvsroot/phpldapadmin/phpldapadmin/htdocs/header.php,v 1.27 2007/12/15 07:50:30 wurley Exp $

/**
 * @package phpLDAPadmin
 */

require_once LIBDIR.'./common.php';

/* We want to get $language into scope in case we were included
   from within a function */
$language = isset($_SESSION['plaConfig']) ? $language = $_SESSION['plaConfig']->GetValue('appearance','language') : 'auto';

# text/xml won't work with MSIE, but is very useful for debugging xhtml code.
# header('Content-type: text/xml; charset="UTF-8"');
@header('Content-type: text/html; charset="UTF-8"');

# XML version and encoding for well-behaved browsers
echo '<?xml version="1.0" encoding="utf-8"?>'."\n";

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"'."\n";
echo '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";

printf('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="%s" lang="%s" dir="ltr">',$language,$language);
echo "\n\n";

echo '<head>';

if (isset($_SESSION['plaConfig']) && $pagetitle = $_SESSION['plaConfig']->GetValue('appearance','page_title'))
	printf('<title>phpLDAPadmin - %s</title>',$pagetitle);
else
	echo '<title>phpLDAPadmin</title>';

if (isset($_SESSION['plaConfig']))
	$css = $_SESSION['plaConfig']->GetValue('appearance','stylesheet');
else
	$css = 'style.css';
printf('<link type="text/css" rel="stylesheet" href="%s%s" media="screen" />','../htdocs/'.CSSDIR,$css);

if (isset($server_id)) {
	$custom_file = get_custom_file($server_id,'style.css','../htdocs/'.CSSDIR);

	if (strcmp($custom_file,'style.css') != 0)
		printf('<link type="text/css" rel="stylesheet" href="%s" media="screen" />',$custom_file);
}

printf('<script type="text/javascript" src="%sentry_chooser.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sie_png_work_around.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sgeneric_utils.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sto_ascii.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%smodify_member.js"></script>','../htdocs/'.JSDIR);
printf('<link type="text/css" rel="stylesheet" media="all" href="%s/jscalendar/calendar-blue.css" title="blue" />','../htdocs/'.JSDIR);

echo "\n<!--\n";
printf('<script type="text/javascript" src="%sjscalendar/calendar.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sjscalendar/lang/calendar-en.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sjscalendar/calendar-setup.js"></script>','../htdocs/'.JSDIR);
printf('<script type="text/javascript" src="%sdate_selector.js"></script>','../htdocs/'.JSDIR);
echo "\n-->\n";

printf('<link type="text/css" rel="stylesheet" href="%s/phplayersmenu/layerstreemenu.css"></link>','../htdocs/'.JSDIR);

if (isset($meta_refresh_variable))
	printf('<meta http-equiv="refresh" content="%s" />',$meta_refresh_variable);

echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
echo '</head>';
echo "\n\n";
?>
