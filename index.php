<?php

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION,
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;

    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// LOAD OUR PATHS CONFIG FILE
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . 'localhub-app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'Boot.php';

// LOCALE IS CURRENTLY SET MANUALLY TO "en_US" IN Utils_model.php. PLEASE REPLACE ALL OCCURENCES WITH THE ACTUAL LOCALE VARIABLE
$locale = "en_US";
// $locale = "ja_JP";
putenv("LANGUAGE=$locale.utf8");
putenv("LANG=$locale.utf8");
putenv("LC_ALL=$locale.utf8");
setlocale(LC_ALL, $locale . ".utf8");
if ($locale != "en_US") {
    $locales_root = $paths->langsDirectory;
    $domains = glob($locales_root.'/'.$locale.'.utf8/LC_MESSAGES/messages-*.mo');
    $current = basename($domains[0],'.mo');
    $timestamp = preg_replace('{messages-}i','',$current);
    bindtextdomain($current,$locales_root);
    textdomain($current);
}

exit(CodeIgniter\Boot::bootWeb($paths));