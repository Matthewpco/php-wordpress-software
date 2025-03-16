# Paradigm-Theme
Custom WordPress theme for Paradigm Oral Health

Wp-Config modifications:

// Enable WP_DEBUG mode 

define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file 

define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings 

define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 1);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files) 

//define('SCRIPT_DEBUG', true);
