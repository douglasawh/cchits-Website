<?php
/**
 * CCHits.net is a website designed to promote Creative Commons Music,
 * the artists who produce it and anyone or anywhere that plays it.
 * These files are used to generate the site.
 *
 * PHP version 7.4+
 *
 * @category Default
 * @package  CCHitsClass
 * @author   Jon Spriggs <jon@sprig.gs>
 * @license  http://www.gnu.org/licenses/agpl.html AGPLv3
 * @link     http://cchits.net Actual web service
 * @link     https://github.com/CCHits/Website/wiki Developers Web Site
 * @link     https://github.com/CCHits/Website Version Control Service
 */
/**
 * A basic autoloader using PSR-4 style class naming
 *
 * @param string $className The name of the class we're trying to load
 *
 * @return true|false Whether we were able to load the class.
 */
spl_autoload_register(function ($className) {
    // Handle both legacy class_ prefix style and PSR-4 namespaced style
    $classFile = dirname(__FILE__) . '/class_' . $className . '.php';
    if (is_file($classFile)) {
        require_once $classFile;
        return true;
    }
    
    // Try PSR-4 style: convert namespace to path
    $psr4Class = str_replace('\\', '/', $className);
    $psr4File = dirname(__FILE__) . '/' . $psr4Class . '.php';
    if (is_file($psr4File)) {
        require_once $psr4File;
        return true;
    }
    
    return false;
});
