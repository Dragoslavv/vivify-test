<?php

error_reporting( E_ALL );
ini_set('display_errors',1);

/**
 *
 */
defined("MYSQL_HOST") ? null : define("MYSQL_HOST","localhost");
/**
 *
 */
defined("MYSQL_PORT") ? null : define("MYSQL_PORT","3306");
/**
 *
 */
defined("MYSQL_USER") ? null : define("MYSQL_USER","admin");
/**
 *
 */
defined("MYSQL_PASS") ? null : define("MYSQL_PASS","Admin4321");
/**
 *
 */
defined("MYSQL_NAME") ? null : define("MYSQL_NAME","vivify_test");

/**
 *
 */
defined("LOG_PATH") ? null : define("LOG_PATH","/tmp/debug-hero.log");

