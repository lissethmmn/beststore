<?php
/*-----------------------------------------------------------------------------+
| eMagicOne                                                                    |
| Copyright (c) 2012-2018 eMagicOne.com <contact@emagicone.com>                |
| All rights reserved                                                          |
+------------------------------------------------------------------------------+
|                                                                              |
| PHP MySQL Bridge                                                             |
|                                                                              |
| Bridge is just another way to connect to your database.                      |
| Normally program uses direct MySQL connection to remote database installed at|
| website or some other web server. In some cases this type of connection does |
| not work - your hosting provider may not allow direct connections or your    |
| LAN settings/firewall prevent connection from being established.             |
| Bridge allows you to work with remote database with                          |
| no direct MySQL connection established.                                      |
|                                                                              |
|                                                                              |
| Developed by eMagicOne,                                                      |
| Copyright (C) 2012-2018                                                      |
+------------------------------------------------------------------------------+
| Bridge Version: 7.63                                                         |
+-----------------------------------------------------------------------------*/

//define('BRIDGE_VERSION', '$Revision: 7.63 $');
define('BRIDGE_VERSION', '7.65');



// PLEASE CHANGE IMMEDIATELY ! It is security threat to leave these values as is!
$username = 'Best Store';
$password = 'z2ha8jW3PCl5';



/*
    Please uncomments following database connection information if you need to connect to some
    specific database or with some specific database login information.
    By default PHP MySQL Bridge is getting login information from your shopping cart.
    This option should be used on non-standard configuration, we assume you know what you are doing
*/

/*
define('USER_DB_SERVER',''); // database host to connect
define('USER_DB_PORT',''); // database port to connect
define('USER_DB_SERVER_USERNAME',''); // database user login to connect
define('USER_DB_SERVER_PASSWORD',''); // database user password to connect
define('USER_DB_DATABASE','');        // database name
define('USER_TABLE_PREFIX','');        // database prefix
*/
//define('USER_DB_SOCKET','/kunden/tmp/mysql5.sock');        // socket name

// Add your IP to allowed list to run bridge, for example, $allowed_ips = '48.78.88.98';
// or you can add a few IPs, for example, $allowed_ips = '48.78.88.98, 15.25.35.45';
// also you can IP mask, for example, $allowed_ips = '48.78.x.x'
$allowed_ips = '';

// Do not store tables specified below. Use this variable to reduce size of the data retrieved from bridge
// Specify table names delimited by semicolon ;
$exclude_db_tables = 'log_*;dataflow_*;xcart_sessions_data;xcart_session_history;xcart_stats_shop;xcart_stats_pages_views;xcart_stats_pages;xcart_stats_pages_paths;amazonimport_*;bcse_catalog_sessions;bcse_catalog_config;google_*;zen_uti;zen_uti_*;emo_admin;emo_admin_*;emo_user_*;admin_activity_log;*connections*;*guest;*pagenotfound;ui_bookmark;*vault_payment_token';
//$tables_with_structure_only = 'core_url_rewrite:4;url_rewrite:4';
$tables_with_structure_only = '';

$database_extension = 'auto'; // 'auto', 'pdo', 'mysqli', 'mysql'

// Please create this directory or change to any existing temporary directory
// temporary directory should be writable by php script (chmod 0777)
$temporary_dir = "./tmp"; // on some systems if you get output with 0 size, try to use some local temporary folder

$allow_compression = true;

//Values of $compress_level between 1 and 9 will trade off speed and efficiency, and the default is 6.
//The 1 flag means "fast but less efficient" compression, and 9 means "slow but most efficient" compression.
$compress_level = 6; // 1 - 9

$limit_query_size = 2048; //Kb

// Please enter your email address here to receive notifications
//$user_email = 'YOUR@EMAIL-HERE.com';

// You can define table prefix here - only tables with names starting with these characters will be stored by bridge and transferred to Store Manager.
// Empty this value to tell bridge to use all tables except for those specified in $exclude_db_tables below
// $include_db_tables = '';

// In case if you have problems with data retrieving change this to a single quote
define('QOUTE_CHAR', '"');

error_reporting(E_ERROR | E_WARNING | E_PARSE); //good (and pretty enough) for most hostings

if (!ini_get('safe_mode')) {
    @set_time_limit(0); //no time limiting for script, doesn't work in safe mode
} else {
    @ini_set('max_execution_time', '0'); // no time limiting for script, works in SAFE mode
}

#############################################################################################
#!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!#
#!                                                                                         !#
#! Don't change anything below this line! You should REALLY understand what are you doing! !#
#!                                                                                         !#
#!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!#
#############################################################################################
// If false - Don't forget to delete the files manually
$delete_tmpfile_after_post = true;
#
# X-Cart removes all global vars, but do not change any vars in HTTP_*_VARS arrays
# we will hide you technical vars in HTTP_GET_VARS array
# put here any var you need to be saved
#
define('TEST_POST_STRING', '////AjfiIkllsomsdjUNNLkdsuinmJNFIkmsiidmfmiOKSFKMI/////');
define('TEST_OK', '<span style="color: #008000;">Ok</span>');
define('TEST_FAIL', '<span style="color: #ff0000;">Fail</span>');
define('TEST_YES', '<span style="color: #008000;">Yes</span>');
define('TEST_SKIP', '<span style="color: #808080;">Test Skipped</span>');
define('TEST_NO', '<span style="color: #ff0000;">Fail</span>');

define('SUCCESSFUL', 20);    // an operation was executed successfully
define('POST_ERROR_CHUNK_CHECKSUM_DIF', 21);    // chunk checksum from the store manager and chunk checksum from the bridge file are different
define('POST_ERROR_SQL_INDEX', 22);    // chunk checksums are correct, but some sql code was not executed; has one parameter - an index of sql code which was not executed
define('ERROR_GENERATE_STORE_FILE_ARCHIVE', 27);

// Used in json response
define('KEY_RESPONSE_CODE', 'response_code');
define('KEY_MESSAGE', 'message');
define('KEY_IS_COMPRESSED', 'is_compressed');
define('KEY_PARTS_COUNT', 'parts_count');
define('KEY_FILE_SIZE', 'file_size');
define('KEY_FILE_NAME', 'file_name');
define('KEY_CHECKSUM', 'checksum');
define('ERROR_CODE_COMMON', 19);

define('GET_SQL_CANCEL_MESSAGE', 'Generating database dump is canceled');
define('GET_SQL_CANCEL_PARAM', 'get_sql_cancel');
define('GET_SQL_TABLE', 'get_sql_table');
define('GET_SQL_PERCENTAGE', 'get_sql_percentage');
define('GET_SQL_FILE_PART', 'get_sql_file_part');
//define('GET_SQL_FILE_PART_NAME', 'part_name');
//define('GET_SQL_FILE_PART_NAME_LAST', 'part_name_last');
define('GET_SQL_FILE_DUMP_PARTS', 'dump_parts');
define('KEY_PROCESS_ID', 'process_id');

// Current file name in which dump is generated
define('GET_SQL_FILE_NAME_GENERATING', 'get_sql_file_name_generating');

// It is used to put sql, contains checksum, sql count
$file_name_put_sql_tmp = 'sm_tmp_put_sql.txt';

// It is used to get sql, contains table name, percentage, get_sql_cancel
define('FILE_NAME_GET_SQL_TMP', 'sm_tmp_get_sql.txt');

define('FILE_NAME_GET_FILE_LIST_TMP', 'sm_tmp_get_file_list.txt');

// Dump is generated into this file
define('FILE_NAME_GET_SQL_MAIN', 'em1_bridge_db_dump');

// It is used to continue generating dump after fail, contains table name, count records which have been processed
define('FILE_NAME_GET_SQL_FOR_CONTINUE', 'dump_data_tmp.txt');

// It is used to get ftp file list in file
define('FILE_NAME_FILE_LIST', 'bridge_file_list');

// Defines how much digits will be added to the end of file
define('FILE_NAME_PART_NUMBER_COUNT_DIGITS', 3);

define('UNKNOWN', -1);
define('OSCOMMERCE', 0);
define('XCART', 1);
define('PINNACLE', 2);
define('MAGENTO_1', 3);
define('CUBECART', 4);
define('PRESTASHOP', 5);
define('VIRTUEMART', 6);
define('OPENCART', 7);
define('MIJOSHOP', 8);
define('WOOCOMMERCE', 9);
define('MAGENTO_2', 10);

// It is used to put sql to find out if chunk is encoded in base64
$put_sql_encoded = 'base_64_encoded_';

if (!ini_get('date.timezone') || ini_get('date.timezone' == "")) {
    @date_default_timezone_set(@date_default_timezone_get());
}

/*if(isset($_REQUEST['phpinfo'])) {
    echo "<a href='" . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . "?task=self_test'>back</a><br>";
    phpinfo();
    echo "<br><a href='" . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . "?task=self_test'>back</a>";
    die();
}*/

if ($_REQUEST['task'] == 'self_test') {
    run_self_test();
    die;
}

if ($_REQUEST['task'] == 'test_post') {
    echo TEST_POST_STRING;
    die;
}

if (!(function_exists("gzopen") && function_exists("gzread") && function_exists("gzwrite") && function_exists("gzclose"))) {
    $allow_compression = false;
}

//$br_ver = explode(' ', BRIDGE_VERSION);
//$br_ver = $br_ver[1];
$errors = array(
    "authentification" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . '): Authentication Error',
    "cart_type" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . '): Unknown Cart Type',
    "create_tmp_file" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Can't Create Temporary File",
    "open_tmp_file" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Can't Open Temporary File",
    "put_tmp_file" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Can't Write Temporary File",
    "not_writeable_dir" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Your Temporary Directory specified in bridge.php doesn't exist or is not writeable",
    "temporary_file_exist_not" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Temporary File doesn't exist",
    "temporary_file_readable_not" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Temporary File isn't readable",
    "file_uid_mismatch" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): SAFE MODE Restriction in effect. The script uid is not allowed to access tmp folder owned by other uid. If you don't understand this error, please contact your hosting provider for help",
    "open_basedir" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . "): Please create local Temporary Directory, see \$temporary_dir variable in bridge.php",
    "checksum_dif" => "Checksums are different",
    "ip_check" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . '): Add your IP to allowed list to run bridge, please',
    "invalid_parameters" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . '): Parameters are invalid',
    "cannot_archive_files" => 'PHP MySQL Bridge (v.' . BRIDGE_VERSION . '): Cannot archive files'
);

if (!check_allowed_ip($allowed_ips)) {
    generate_error($errors['ip_check']);
}

//Detecting open_basedir - required for temporary file storage
if( ini_get('open_basedir') && null == $temporary_dir ) {
    generate_error($errors['open_basedir']);
}

// Detecting system temporary directory
if(empty($temporary_dir)) {
    // Get temporary directory
    $temporary_dir = m1BridgeGetTempDir();
}

// checking temporary directory
if(!is_dir($temporary_dir) || !is_writable($temporary_dir)) {
    generate_error($errors['not_writeable_dir']);
}

$tmpFileStat = stat($temporary_dir);
if(function_exists('getmyuid')) {
    if((ini_get('safe_mode') && getmyuid() != intval($tmpFileStat['uid']))) {
        generate_error($errors['file_uid_mismatch']);
    }
}

$xcartbackuparray = array (
    'username',
    'password',
    'temporary_dir',
    'allow_compression',
    'version',
    'errors',
    'xcartbackuparray' // should be ALWAYS for restore
);

$g_iCartType = getCartType();
if ($g_iCartType == 1) {
    foreach ($xcartbackuparray as $v) {
        $HTTP_GET_VARS['xcartbackuparray=' . $v] = $$v;
    }
}

$hash = isset($_REQUEST['hash']) ? $_REQUEST['hash'] : '';
$sql = isset($_REQUEST['sql']) ? $_REQUEST['sql'] : '';

$g_sCartHost = '';
//ob_start();

if (!defined('USER_DB_SERVER') || !defined('USER_DB_SERVER_USERNAME') || !defined('USER_DB_SERVER_PASSWORD') || !defined('USER_DB_DATABASE')) {
    switch ($g_iCartType) {
        case UNKNOWN:
            generate_error($errors['cart_type']);

            break;
        case OSCOMMERCE:
            require_once './includes/configure.php';

            $g_sCartHost = substr(HTTP_SERVER, 7);

            if (defined('DB_PREFIX')) {
                define('DB_TABLE_PREFIX', DB_PREFIX);
            }

            break;
        case XCART:
            require_once './config.php';

            // workaround for X-Cart cleaner
            // saving values to HTTP_GET_VARS
            $xcart_dir = dirname(__FILE__);
            $g_sCartHost = $GLOBALS['xcart_http_host'];
            $g_iCartType = getCartType();

            break;
        case PINNACLE:
            require_once dirname(__FILE__) . '/content/engine/engine_config.php';

            defineConfigData(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, DB_PREFIX);
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case MAGENTO_1:
            parseMagentoDbConfig();
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case CUBECART:
            require_once dirname(__FILE__) . '/includes/global.inc.php';

            defineConfigData($glob['dbhost'], $glob['dbdatabase'], $glob['dbusername'], $glob['dbpassword'], $glob['dbprefix']);
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case PRESTASHOP:
            if (file_exists(dirname(__FILE__) . '/app/config/parameters.php')) {
                $settings = require_once dirname(__FILE__) . '/app/config/parameters.php';
                define('_DB_SERVER_', $settings['parameters']['database_host'] . (!empty($settings['parameters']['database_port']) ? ':' . $settings['parameters']['database_port'] : ''));
                define('_DB_NAME_', $settings['parameters']['database_name']);
                define('_DB_USER_', $settings['parameters']['database_user']);
                define('_DB_PASSWD_', $settings['parameters']['database_password']);
                define('_DB_PREFIX_', $settings['parameters']['database_prefix']);
            } else {
                require_once dirname(__FILE__) . '/config/settings.inc.php';
            }

            defineConfigData(_DB_SERVER_, _DB_NAME_, _DB_USER_, _DB_PASSWD_, _DB_PREFIX_);
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case VIRTUEMART:
            require_once dirname(__FILE__) . '/configuration.php';

            $VMConfig = new JConfig();
            defineConfigData($VMConfig->host, $VMConfig->db, $VMConfig->user, $VMConfig->password, $VMConfig->dbprefix);
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case OPENCART:
            require_once './config.php';

            defineConfigData(DB_HOSTNAME, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_PREFIX);
            define('SERVER_DB_SOCKET', (defined('USER_DB_SOCKET')) ? USER_DB_SOCKET : ((defined('DB_SOCKET')) ? DB_SOCKET : ""));
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case MIJOSHOP:
            require_once dirname(__FILE__) . '/configuration.php';

            $VMConfig = new JConfig();
            defineConfigData($VMConfig->host, $VMConfig->db, $VMConfig->user, $VMConfig->password, $VMConfig->dbprefix . 'mijoshop_');
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case WOOCOMMERCE:
            require_once dirname(__FILE__) . '/wp-config.php';

            defineConfigData(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, $table_prefix);
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
        case MAGENTO_2:
            if (file_exists(dirname(__FILE__) . '/app/etc/env.php')) {
                $config = require_once dirname(__FILE__) . '/app/etc/env.php';
            } else {
                $config = require_once dirname(__FILE__) . '/../app/etc/env.php';
            }

            defineConfigData(
                    $config['db']['connection']['default']['host'],
                    $config['db']['connection']['default']['dbname'],
                    $config['db']['connection']['default']['username'],
                    $config['db']['connection']['default']['password'],
                    $config['db']['table_prefix']
            );
            $g_sCartHost = $_SERVER['SERVER_NAME'];

            break;
    }
}

function defineConfigData($host, $database, $username, $password, $prefix)
{
    define('DB_SERVER', $host);
    define('DB_DATABASE', $database);
    define('DB_SERVER_USERNAME', $username);
    define('DB_SERVER_PASSWORD', $password);
    define('DB_TABLE_PREFIX', $prefix);
}

//ob_end_clean();

function parseMagentoDbConfig()
{
    $config_file = simplexml_load_file(dirname(__FILE__) . '/app/etc/local.xml');

    $table_prefix = $config_file->xpath("//global/resources/db/table_prefix");
    $table_prefix = (string)$table_prefix[0];
    define('DB_TABLE_PREFIX', ($table_prefix ? $table_prefix : ''));

    $connections = $config_file->xpath("//global/resources/default_setup/connection");
    foreach ($connections as $connection) {
        if ((int)$connection->active == 1) {
            define(
                    'DB_SERVER',
                    (string)$connection->host . (isset($connection->port) ? ':' . (int)$connection->port : '')
            );
            define('SERVER_DB_SOCKET', (string)(defined('USER_DB_SOCKET')) ? USER_DB_SOCKET : (strpos($connection->host, '.sock') ? $connection->host : ''));
            define('DB_DATABASE', (string)$connection->dbname);
            define('DB_SERVER_USERNAME', (string)$connection->username);
            define('DB_SERVER_PASSWORD', (string)$connection->password);
            break;
        }
    }
}

function getServerProtocol() {
    $protocol = 'http://';
    if (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $protocol = 'https://';
    }
    return $protocol;
}

if (md5($username.$password) != $hash) {
    if (md5(DB_SERVER_USERNAME.DB_SERVER_PASSWORD) != $hash) {
        if (isset($user_email) && !empty($user_email)) {
            mail($user_email, '[ bridge.php ] Bad authetification try', 'Bad login or password was used to login into bridge.php from ' . $_SERVER['REMOTE_ADDR']);
        }

        generate_error($errors['authentification']);
    }
}

if ($g_iCartType == XCART) {
    // workaround for X-Cart cleaner
    foreach ($HTTP_GET_VARS['xcartbackuparray=xcartbackuparray'] as $k => $v) {
        $k_real = 'xcartbackuparray=' . $v;
        $$v = $HTTP_GET_VARS[$k_real];
        unset($HTTP_GET_VARS[$k_real]);
    }

    $_REQUEST = array_merge(
        isset($HTTP_GET_VARS) && is_array($HTTP_GET_VARS) ? $HTTP_GET_VARS : array(),
        isset($HTTP_POST_VARS) && is_array($HTTP_POST_VARS) ? $HTTP_POST_VARS : array(),
        isset($HTTP_COOKIE_VARS) && is_array($HTTP_COOKIE_VARS) ? $HTTP_COOKIE_VARS : array()
    );
}

if ($g_iCartType == VIRTUEMART) {
    if (isset($_REQUEST['db_prefix'])) {
        $vm_db_prefix = $_REQUEST['db_prefix'];
    } else {
        $vm_db_prefix = (defined('USER_TABLE_PREFIX') ? USER_TABLE_PREFIX : DB_TABLE_PREFIX);
    }

//    $include_db_tables .= $vm_db_prefix . "vm_*;" . $vm_db_prefix . "virtuemart_*;" . $vm_db_prefix . "users;" .  $vm_db_prefix . "extensions";
    $vm_version_file = dirname(__FILE__).'/administrator/components/com_virtuemart/version.php';

    if (file_exists($vm_version_file)) {
        define('_JEXEC', 1);

        require_once $vm_version_file;

        if ($VMVERSION->RELEASE) {
            define('VM_VERSION', $VMVERSION->RELEASE);
        } elseif (vmVersion::$RELEASE) {
            define('VM_VERSION', vmVersion::$RELEASE);
        }
    }
}

if ($g_iCartType == MIJOSHOP) {
    if (isset($_REQUEST['db_prefix'])) {
        $mijo_db_prefix = $_REQUEST['db_prefix'];
//        $include_db_tables .= "*";
    } else {
        $mijo_db_prefix = (defined('USER_TABLE_PREFIX') ? USER_TABLE_PREFIX : DB_TABLE_PREFIX);
//        $include_db_tables .= $mijo_db_prefix."*";
    }

    define('_JEXEC', 1);
}

// Disabling magic quotes at runtime
// $g_iCartType = 9 - Woocommerce; It does screening and disables magic_quotes
if ((get_magic_quotes_runtime() || get_magic_quotes_gpc()) && $g_iCartType != WOOCOMMERCE) {
    function stripslashes_deep($value) {
        $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
        return $value;
    }

    $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    $sql = isset($_REQUEST['sql']) ? $_REQUEST['sql'] : '';
}

if ($g_iCartType == XCART) {
    $_REQUEST = $_GET + $_POST + $_COOKIE;

    define('DB_DATABASE', $sql_db);
    define('DB_SERVER_USERNAME', $sql_user);
    define('DB_SERVER_PASSWORD', $sql_password);
    define('DB_SERVER', $sql_host);
    define('XCART_START', true );
}

/*
 * Bridge additional parameters.
 * */
$task                  = isset($_REQUEST['task']) ? $_REQUEST['task'] : '';
$filename              = isset($_REQUEST['filename']) ? $_REQUEST['filename'] : '';
$position              = isset($_REQUEST['position']) ? $_REQUEST['position'] : '';
$vars_main_dir         = isset($_REQUEST['vars_main_dir']) ? $_REQUEST['vars_main_dir'] : '';
$xml_path              = isset($_REQUEST['xml_path']) ? $_REQUEST['xml_path'] : '';
$xml_fields            = isset($_REQUEST['xml_fields']) ? $_REQUEST['xml_fields'] : '';
$xml_items_node        = isset($_REQUEST['xml_items_node']) ? $_REQUEST['xml_items_node'] : '';
$xml_items_info_node   = isset($_REQUEST['xml_items_info_node']) ? $_REQUEST['xml_items_info_node'] : '';
$xml_filters           = isset($_REQUEST['xml_filters']) ? $_REQUEST['xml_filters'] : '';
$table_name            = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : '';
$order_id              = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : 0;
$cache_type            = isset($_REQUEST['cache_type']) ? $_REQUEST['cache_type'] : '';
$search_path           = isset($_REQUEST['search_path']) ? $_REQUEST['search_path'] : '';
$mask                  = isset($_REQUEST['mask']) ? $_REQUEST['mask'] : '*';
$ignore_dir            = isset($_REQUEST['ignore_dir']) ? $_REQUEST['ignore_dir'] : '';
$vars_names            = isset($_REQUEST['vars_names']) && !empty($_REQUEST['vars_names']) ? explode(',', $_REQUEST['vars_names']) : array();
$searchPath            = isset($_REQUEST['search_path']) ? $_REQUEST['search_path'] : '';

// for put_sql
if (isset($_REQUEST['checksum'])) $checksum_sm = $_REQUEST['checksum'];

// for _connect - Andriy Prudyus
$cur_count_attempt_post = 0;
$max_count_attempt_post = 3;

// Delay to run next attempt generating dump
define('DELAY_TO_CHECK_DUMP_GENERATING', 10); // seconds

if (!isset($import_handle)) $import_handle = '';
$package_size = 1048576;

switch ($task) {
    case 'get_sql':
        get_sql_dump();
        break;
    case 'get_sql_file':
        get_sql_file($filename, $position);
        break;
    case 'put_sql':
        put_sql($import_handle);
        break;
    case 'get_version':
        get_version();
        break;
    case 'get_config':
        get_config();
        break;
    case 'get_category_tree':
        get_category_tree();
        break;
    case 'run_indexer':
        run_indexer();
        break;
    case 'get_include_tables_exists':
        get_include_tables_exists();
        break;
    case 'get_var_from_script':
        echo handle_dirs($vars_main_dir, $vars_names);
        break;
    case 'get_xml_data':
        echo get_xml_data($xml_path, $xml_fields, $xml_items_node, $xml_items_info_node, $xml_filters);
        break;
    case 'get_ftp_files':
        echo get_ftp_files($search_path, $mask, $ignore_dir);
        break;
    case 'get_file_list':
        get_file_list($searchPath);
        break;
    case 'get_cart_version':
        echo get_cart_version();
        break;
    case 'check_data_changes':
        echo check_data_changes($table_name);
        break;
    case 'get_new_orders':
        echo get_new_orders($order_id);
        break;
    case 'get_sql_cancel':
        get_sql_cancel();
        break;
    case 'get_sql_progress':
        echo get_sql_progress();
        break;
    case 'get_sql_file_part_info':
        get_sql_file_part_info();
        break;
    case 'get_cache':
        echo get_cache();
        break;
    case 'clear_cache':
        echo clear_cache($cache_type);
        break;
    case 'get_payment_and_shipping_methods':
        get_payment_and_shipping_methods();
        break;
    case 'get_store_file_archive':
        get_store_file_archive();
        break;
    case 'phpinfo':
        get_phpinfo();
        break;
    /*case 'check_dump_generating':
        echo check_dump_generating();
        break;*/
    default:
        die('Unknown task parameter');
}

function get_table_prefix() {
    global $g_iCartType;

    return defined('USER_TABLE_PREFIX')
            ? USER_TABLE_PREFIX
            : (defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : (($g_iCartType == 1) ? 'xcart_' : ''));
}

function check_allowed_ip($allowed_ips) {
    if (!empty($allowed_ips)) {
        $allowed_ips = explode(',', $allowed_ips);
        $ip_allowed = false;

        foreach ($allowed_ips as $ip) {
            $ip = trim($ip);
            $str_without_x = $ip;

            if (strpos($ip, 'x') !== false) {
                $str_without_x = substr($ip, 0, strpos($ip, 'x'));
            }

            if (check_ip($str_without_x) === true) {
                $ip_allowed = true;
                break;
            }
        }

        return $ip_allowed;
    } else {
        return true;
    }
}

function check_ip($ip) {
    if (strpos($_SERVER['REMOTE_ADDR'], $ip) === 0) {
        return true;
    } else {
        return false;
    }
}

/************************************************************************
 * Get json encoded list of files in specific directory
 * and process each script with get_vars_from_script($vars_main_dir, $vars_names)
 ************************************************************************/
function handle_dirs($vars_main_dir, $vars_names)
{
    global $errors;

    $vars_main_dir = (string)$vars_main_dir;

    if (empty($vars_main_dir)) {
        generate_error($errors['invalid_parameters']);
    }

    $translations = array();
    $dir = getcwd() . '/' . $vars_main_dir;

    /*if((substr(getcwd(), 0, -1) != '/' || substr(getcwd(), 0, -1) != '\\') && (substr($vars_main_dir, 0, -1) != '/' || substr($vars_main_dir, 0, -1) != '\\'))
        $separator = '/';
    else
        $separator = '';*/

    if (file_exists($dir)) {
        $itemHandler = opendir($dir);

        if ($itemHandler) {
            while (($item = readdir($itemHandler)) !== false) {
                if ($item !== false && substr($item, 0, 1) != '.' && !is_dir($item)) {
                    $translations[strval($item)] = get_vars_from_script($vars_main_dir . '/' . $item, $vars_names);
                }
            }
        }
    }

    return is_array($translations) ? '1|' . json_encode($translations) : '0|';
}

/************************************************************************
* Returns array of value of specific variables in script
************************************************************************/
function get_vars_from_script($path_to_script, $vars_names)
{
    if(file_exists('./' . $path_to_script) && is_readable('./' . $path_to_script) && filesize('./' . $path_to_script) > 0)
    {
        $content = file_get_contents('./' . $path_to_script) or die('Cannot open file:  '.$path_to_script);
        $rows    = explode("\n", $content);
        $pattern = '/^\$\_\[\'(.*)\']\s*\=\s*(.*)\;/i';
        $current_translations = array();

        foreach($rows as $data) {
            preg_match($pattern, $data, $matches);
            if(in_array($matches[1], $vars_names)) {
                if(isset($matches[2]) && $matches[2] != null) {
                    $current_translations[$matches[1]] = $matches[2];
                }
            }
        }
        return $current_translations;
    }
    return '';
}

/************************************************************************
* Returns json encoded array of fields and values by fields mask ($xml_fields)
 * may be separeted in xml $items_node and $items_info_node
 *
 * bridge.php?task=get_xml_data&hash=6512bd43d9caa6e02c990b0a82652dca&xml_path=./app\code\core\Mage\Shipping\etc\config.xml&xml_fields=active,sallowspecific,cutoff_cost,model,name,title,specificerrmsg
 * &xml_items_node=default/carriers&xml_items_info_node=default/carriers
 ************************************************************************/
function get_xml_data($xml_path, $xml_fields, $xml_items_node, $xml_items_info_node, $xml_filters)
{
    try {
        $xml = new XmlConfig($xml_path);
        $result = $xml->getItemsList($xml_fields, $xml_items_node, $xml_items_info_node, $xml_filters);
        unset($xml);

        return $result;
    } catch (Exception $e) {
        die($e->__toString());
    }
}

/************************************************************************
* Returns dump
************************************************************************/
function get_sql_dump() {
    global $temporary_dir, $allow_compression, $package_size;

    $dumpData = cMySQLBackUp::getDumpData($temporary_dir);

    if (isset($_REQUEST['only_continue']) && !$dumpData) {
        return;
    } elseif (!$dumpData) { // Set data to initial at the start
        _set_generating_dump_value(
            array(
                GET_SQL_CANCEL_PARAM    => 0,
                GET_SQL_TABLE           => '',
                GET_SQL_PERCENTAGE      => 0,
                GET_SQL_FILE_PART       => 0,
                GET_SQL_FILE_DUMP_PARTS => array(),
            )
        );
    } elseif (cMySQLBackUp::isDumpGenerating($temporary_dir)) {
        die('Dump is being generated. Could not run next attempt');
    }

    $dump = new cMySQLBackUp($temporary_dir, '', $allow_compression, $package_size);
    $dump->create_dump();

    // Set data to initial to prevent incorrect next start of getting sql dump
    _set_generating_dump_value(array(GET_SQL_CANCEL_PARAM => 0, GET_SQL_TABLE => '', GET_SQL_PERCENTAGE => 0));

    if (isset($_REQUEST['get_dump_parts'])) {
        echo '0';
        return;
    }

    $dump->download($dump->sBackUpFile);
}
//#################################################################

/**
 * **********************************************************************
 *
 * @param string $filename shows filename what to read from tmp directory;
 * @param integer $position shows position of package needed in filename;
 */
function get_sql_file($filename, $position) {
    global $errors, $temporary_dir;

    $position = (int)$position;
    $filename = (string)$filename;

    if (empty($filename) || $position < 0) {
        generate_error($errors['invalid_parameters']);
    }

    $filename = $temporary_dir . '/' . $filename;

    if (!file_exists($filename)) {
        generate_error($errors['temporary_file_exist_not']); // generating error
    }

    if (!is_readable($filename)) {
        generate_error($errors['temporary_file_readable_not']); // generating error
    }

    get_file_part($filename, $position);
}

/************************************************************************
* Function try to determine current cart type (X-Cart or osCommerce)
*
* Return values:
* -1 - unknown cart type
*  0 - osCommerce, CRE Loaded, Zen Cart
*  1 - X-Cart
*  2 - Pinnacle
*  3 - Magneto
*  4 - CubeCart
*  5 - PrestaShop
*  6 - VirtueMart
*  7 - OpenCart
*  8 - MijoShop
*  9 - Woocommerce
*  10 - Magento 2
************************************************************************/
function getCartType() {
    $result = UNKNOWN;

    if (is_dir('./includes') && is_file('./includes/configure.php')) {
        $result = OSCOMMERCE;
    } elseif (file_exists('./config.php') && (file_exists('./auth.php') || file_exists('./VERSION'))) {
        define('XCART_START', 1);
        $result = XCART;
    } elseif (file_exists('./config.php') && (file_exists('system/startup.php') || file_exists('./common.php') || file_exists('library/locator.php'))) {
        $result = OPENCART;
    } elseif (file_exists(dirname(__FILE__) . '/content/engine/engine_config.php')) {
        $result = PINNACLE;
    } elseif (file_exists(dirname(__FILE__) . '/app/Mage.php')) {
        $result = MAGENTO_1;
    } elseif (file_exists(dirname(__FILE__) . '/includes/global.inc.php')) {
        $result = CUBECART;
    } elseif (file_exists(dirname(__FILE__) . '/config/settings.inc.php') || file_exists(dirname(__FILE__) . '/app/config/parameters.php')) {
        $result = PRESTASHOP;
    } elseif (file_exists(dirname(__FILE__) . '/components/com_mijoshop/opencart/config.php')) {
        $result = MIJOSHOP;
    } elseif (file_exists(dirname(__FILE__) . '/configuration.php')) {
        $result = VIRTUEMART;
    } elseif (file_exists(dirname(__FILE__) . '/wp-content/plugins/woocommerce/woocommerce.php')) {
        $result = WOOCOMMERCE;
    } elseif (file_exists(dirname(__FILE__) . '/app/etc/env.php') || file_exists(dirname(__FILE__) . '/../app/etc/env.php')) {
        $result = MAGENTO_2;
    }

    return $result;
}

function get_include_tables_exists() {
    echo isset($GLOBALS['include_db_tables'])?'1':'0';
}

function get_config() {
    global $g_iCartType;

    $sConf = array(
        'database_host' => ((DB_SERVER == 'localhost' || DB_SERVER == '127.0.0.1' || strpos(DB_SERVER, 'localhost:') === 0) ? $GLOBALS['g_sCartHost'] : DB_SERVER ),
        'database_name' => DB_DATABASE,
        'database_username' => DB_SERVER_USERNAME,
        'database_password' => DB_SERVER_PASSWORD,
//        'database_table_prefix' => (defined('USER_TABLE_PREFIX') ? USER_TABLE_PREFIX : (defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : (($g_iCartType == 1) ? 'xcart_' : ''))),
        'database_table_prefix' => get_table_prefix(),
        'php_version' => phpversion(),
        'gzip' => intval(extension_loaded('zlib'))
    );
    if(defined('VM_VERSION')) {
        $sConf["vm_version"] = VM_VERSION;
    }
    echo "0\r\n";
    foreach ($sConf as $key=>$val) {
        echo "$key=$val<br>\r\n";
    }
}

function get_category_tree() {
    global $compress_level, $allow_compression, $temporary_dir, $package_size;

    $dir = strval($_REQUEST['category']);
    $str = '';

    if ($dir == '') {
        $str .= '[' . date('r') ."]Error: Category name is empty\n";

    } else {
//        $sBackUpDir = m1BridgeGetTempDir();
        $sBackUpDir = "./$temporary_dir";
        $tmp_dir = dir($sBackUpDir);
        while (false !== ($entry = $tmp_dir->read())) {
            if($entry != '.' && $entry != '..' && substr($entry, 0, strlen('m1bridgetmp_')) == 'm1bridgetmp_') {
                @unlink($sBackUpDir. '/' . $entry);
            }
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), RecursiveIteratorIterator::LEAVES_ONLY);

        $str .= "[" . date('r') ."] " . "Creating tmp file for get category path" . "\n";
        if($allow_compression) {
            $tmpfname = strtolower("m1bridgetmp_" . date('H_i_s-d_M_Y')) . ".txt.gz";
        } else{
            $tmpfname = strtolower("m1bridgetmp_" . date('H_i_s-d_M_Y')) . ".txt";
        }
        // $tmpfname = tempnam(m1BridgeGetTempDir(), "m1bridgetmp_");
        if(!$tmpfname) {
            $str .= "[" . date('r') ."] " . "Error creating tmp file" . "\n";
        }

        $str .= "[" . date('r') ."] " . "Openning tmp file" . "\n";

        if($allow_compression) {
            $tmpfd = gzopen($temporary_dir . "/" .  $tmpfname, "wb{$compress_level}");
        } else  {
            $tmpfd = fopen($temporary_dir . "/" . $tmpfname, "wb");
        }
        // $tmpfd = fopen($tmpfname, "w+b");
        if(!$tmpfd) {
            $str .= "[" . date('r') ."] " . "Error openning tmp file" . "\n";
        }

        foreach ($iterator as $path) {
            if($path->isDir()) {
                //get_path($path->__toString());
            } else {
                if($allow_compression) {
                    gzwrite($tmpfd, $path->__toString()."\r\n");
                } else {
                    @fwrite($tmpfd, $path->__toString()."\r\n");
                }
            }
        }

        if($allow_compression) {
            gzclose($tmpfd);
        } else {
            @fclose($tmpfd);
        }

        /*$file_size = filesize("$temporary_dir/$tmpfname");
        $outpustr = "0\r\n" . ($allow_compression ? '1' : '0');
        $div_last = $file_size % $package_size;

        if($div_last == 0) {
            $outpustr .= '|' . (($file_size - $div_last) / $package_size);
        } else {
            $outpustr .=  '|' . (($file_size - $div_last) / $package_size + 1);
        }

        $outpustr .= "|" . $file_size . "|";
        $outpustr .= "\r\n" . basename($tmpfname) . "\r\n";
        if(!headers_sent()) {
            header('Content-Length: ' . strlen($outpustr));
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Pragma: no-cache');
        }
        echo $outpustr;*/

        echo generate_file_data("$temporary_dir/$tmpfname", $allow_compression);
    }

//    $log = @fopen(m1BridgeGetTempDir() . '/bridge_log.txt', 'w');
    $log = @fopen("./$temporary_dir/bridge_log.txt", 'w');
    fwrite($log, $str);
    fclose($log);

    exit;
}

function get_path($dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($iterator as $path) {
        if($path->isDir()) {
            get_path($path->__toString());
        } else {
            return $path->__toString()."\r\n";
        }
    }
}

function run_indexer() {
    $iCartType = getCartType();
    $result = '';

    switch ($iCartType) {
        case MAGENTO_1:
            require_once 'app/Mage.php';
            umask(0);
            Mage::app("admin");
            $processes = array();

            $_processesCollection = Mage::getResourceModel('index/process_collection');
            foreach($_processesCollection as $process) {
                $processes[] = $process;
            }

            foreach($processes as $process) {
                try {
                    $process->reindexEverything();
                    $result .= $process->getIndexer()->getName() . " index was rebuilt successfully\n<br>";
//                    echo $process->getIndexer()->getName() . " index was rebuilt successfully\n";
//                    echo "<br>";
                } catch (Mage_Core_Exception $e) {
//                    echo $e->getMessage() . "\n";
//                    echo "<br>";
                    $result .= $e->getMessage() . "\n<br>";
                } catch (Exception $e) {
//                    echo $process->getIndexer()->getName() . " index process unknown error:\n";
//                    echo $e . "\n";
//                    echo "<br>";
                    $result .= $process->getIndexer()->getName() . " index process unknown error\n<br>";
                }
            }

            break;
        case PRESTASHOP:
            include(dirname(__FILE__).'/config/config.inc.php');

            ini_set('max_execution_time', 7200);
            Search::indexation(1);
            break;
        case MAGENTO_2:
            exec('php bin/magento indexer:reindex', $output, $returnVar);
            $result = empty($output) ? '' : implode("\n<br>", $output);
            break;
    }

    die($result);
}

/************************************************************************
* Executes SQL
************************************************************************/
function put_sql($import_handle) {
    global $import_handle, $sql, $allow_compression, $temporary_dir, $errors, $delete_tmpfile_after_post, $f_name;

    $dump = new cMySQLBackUp($temporary_dir,'', $allow_compression);

    $f_name = tempnam($temporary_dir, 'm1bridge_');

    if(!$f_name) {
        generate_error($errors['create_tmp_file']);
    }

    $import_handle = fopen($f_name, "w+");

    $ind = $import_handle;

    if(!$ind) {
        generate_error($errors['open_tmp_file']);
    }

    if($ind) {
        $ind = (boolean)fputs($import_handle, $sql);
        $ind &= fclose($import_handle);
    }

    $import_handle = fopen($f_name, 'r');

    if(!$import_handle) {
        generate_error($errors['open_tmp_file']);
    }

    if(!$ind) {
        generate_error($errors['put_tmp_file']);
    }
    $content = running($import_handle);

    if(strlen($content)>0) {
        echo $content;
    } else {
        echo "0\r\n";
    }
    fclose($import_handle);

    if($delete_tmpfile_after_post) {
        @unlink($f_name);
        $dump->_clearAll("m1bridge_");
        $dump->_clearAll("m1bridgetmp_");
        $dump->_exit();
    } else {
        @chmod($f_name, 0777);
    }
}

function get_file_part($fname, $position) {
    global $package_size, $temporary_dir, $allow_compression;

    $outputstr = '';
    $fsize = filesize($fname);
    $fsize = $fsize - $position * $package_size;

    if ($fsize > $package_size) {
        $fsize = $package_size;
    }

    if ($fsize < 0) {
        $fsize = 0;
    }

    if ($fsize < $package_size) {
        $del = true;
    } else {
        $del = false;
    }

    if (!headers_sent()) {
        header('Content-Length: ' . (strlen($outputstr) + $fsize));
        header('Content-Length-Alternative: ' . (strlen($outputstr) + $fsize));
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Pragma: no-cache');

        if ($allow_compression) {
            header('Content-Type: application/octet-stream');
        }
    }

    echo $outputstr;

    $fp = fopen($fname, "rb");
    fseek($fp,$package_size * $position);
    $read_size = 2048;

    while ($read_size > 0 && $package_size > 0) {
        if ($package_size >= $read_size) {
            $package_size -= $read_size;
        } else {
            $read_size = $package_size;
            $package_size = 0;
        }

        if ($read_size == 0) {
            break;
        }

        $str = fread($fp, $read_size);

        echo $str;
    }

    @fclose($fp);

    if ($del === true) {
        @unlink($fname);
        $fileNameBase = substr($fname, strrpos($fname, '/') + 1);

        $dumpParts = _get_generating_dump_value(GET_SQL_FILE_DUMP_PARTS);
        $isPartLast = true;

        if (is_array($dumpParts) && array_key_exists($fileNameBase, $dumpParts)) {
            $isPartLast = $dumpParts[$fileNameBase] == 1;
            _set_generating_dump_value(array(GET_SQL_FILE_DUMP_PARTS => $dumpParts), $fileNameBase);
        }

        if ($isPartLast) {
            @unlink($temporary_dir . '/dump_data_tmp.txt');
        }
    }
}

function get_sql_cancel() {
    _set_generating_dump_value(array(GET_SQL_CANCEL_PARAM => 1));
}

function get_sql_progress() {
    $ret = array();

    $ret['table'] = _get_generating_dump_value(GET_SQL_TABLE);
    $ret['percentage'] = _get_generating_dump_value(GET_SQL_PERCENTAGE);

    if ($ret['table'] === false || $ret['percentage'] === false) {
        $str = '0|' . json_encode($ret);
    } else {
        $str = '1|' . json_encode($ret);
    }

    return $str;
}

function get_sql_file_part_info() {
    global $temporary_dir, $package_size;

    _set_generating_dump_value(array(GET_SQL_FILE_PART => 1));
    $max_attempts = 10;

    for ($i = 0; $i < $max_attempts; $i++) {
//        sleep(10);
        $dumpParts = _get_generating_dump_value(GET_SQL_FILE_DUMP_PARTS);

        if (empty($dumpParts)) {
            if ($i < $max_attempts) {
                sleep(10);
            }

            continue;
        }

        ksort($dumpParts);

        foreach ($dumpParts as $fileName => $isPartLast) {
            $isCompressed = preg_match('/.gz$/', $fileName) ? true : false;

            $dump = new cMySQLBackUp($temporary_dir, $fileName, $isCompressed, $package_size, true);
            $dump->download($fileName, true, $isPartLast == 1);

            die();
        }

        /*if ($i < $max_attempts) {
            sleep(10);
        }*/
    }

    die('Cannot give a file');
}

function get_cache() {
    global $g_iCartType;

    $cache = array();

    switch ($g_iCartType) {
        case MAGENTO_1:
            require_once 'app/Mage.php';

            foreach (Mage::app()->getCacheInstance()->getTypes() as $data) {
                $cache[] = $data->toArray();
            }

            break;
        case MAGENTO_2:
            exec('php bin/magento cache:status', $output);
            $count = count($output);

            for ($i = 1; $i < $count; $i++) {
                $data = explode(':', $output[$i]);

                if (count($data) != 2) {
                    continue;
                }

                $cache[] = array('id' => trim($data[0]), 'status' => trim($data[1]));
            }

            break;
    }

    $str = empty($cache) ? '0|' : '1|';

    return $str . json_encode($cache);
}

function clear_cache($type) {
    global $g_iCartType;

    try {
        switch ($g_iCartType) {
            case MAGENTO_1:
                require_once 'app/Mage.php';

                if (empty($type)) {
                    return 'Incorrect type';
                }

                $types = explode(';', $type);
                $count = count($types);

                for ($i = 0; $i < $count; $i++) {
                    Mage::app()->getCacheInstance()->cleanType($types[$i]);
                }

                break;
            case MAGENTO_2:
                if (empty($type)) {
                    return 'Incorrect type';
                }

                exec('php bin/magento cache:clean ' . str_replace(';', ' ', $type), $output);

                break;
        }
    } catch (Exception $e) {
        return 'Cache did not refresh. Some error occurred';
    }

    return 'Cache refreshed';
}

function get_payment_and_shipping_methods() {
    global $g_iCartType;

    $shippingMethods = array();
    $paymentMethods = array();

    switch ($g_iCartType) {
        case WOOCOMMERCE:
            require_once dirname(__FILE__) . '/wp-content/plugins/woocommerce/includes/class-wc-shipping.php';
            require_once dirname(__FILE__) . '/wp-content/plugins/woocommerce/includes/class-wc-payment-gateways.php';

            // Get shipping methods
            $wcShiping = WC_Shipping::instance();
            $methods = $wcShiping->load_shipping_methods();
            foreach ($methods as $method) {
                $shippingMethod = array('id' => $method->id);

                if ($method->title) {
                    $shippingMethod['title'] = $method->title;
                }

                if ($method->method_title) {
                    $shippingMethod['method_title'] = $method->method_title;
                }

                $shippingMethods[] = $shippingMethod;
                /*$shippingMethods[] = array(
                    'id' => $method->id,
                    'method_title' => $method->method_title,
                    'method_description' => $method->method_description,
                    'enabled' => $method->enabled,
                    'title' => $method->title,
                    'rates' => $method->rates,
                    'tax_status' => $method->tax_status,
                    'supports' => $method->supports,
                    'fee' => $method->fee,
                    'minimum_fee' => $method->minimum_fee,
                    'instance_id' => $method->instance_id,
                    'instance_form_fields' => $method->instance_form_fields,
                    'instance_settings' => $method->instance_settings,
                    'availability' => $method->availability,
                    'countries' => $method->countries,
                    'plugin_id' => $method->plugin_id,
                    'errors' => $method->errors,
                    'settings' => $method->settings,
                    'form_fields' => $method->form_fields,
                );*/
            }

            // Get payment methods
            $wcPayment = WC_Payment_Gateways::instance();
            $methods = $wcPayment->get_available_payment_gateways();
            foreach ($methods as $method) {
                $paymentMethod = array('id' => $method->id);

                if ($method->title) {
                    $paymentMethod['title'] = $method->title;
                }

                if ($method->method_title) {
                    $paymentMethod['method_title'] = $method->method_title;
                }

                $paymentMethods[] = $paymentMethod;
                /*$paymentMethods[] = array(
                    'order_button_text' => $method->order_button_text,
                    'enabled' => $method->enabled,
                    'title' => $method->title,
                    'description' => $method->description,
                    'chosen' => $method->chosen,
                    'method_title' => $method->method_title,
                    'method_description' => $method->method_description,
                    'has_fields' => $method->has_fields,
                    'countries' => $method->countries,
                    'availability' => $method->availability,
                    'icon' => $method->icon,
                    'supports' => $method->supports,
                    'max_amount' => $method->max_amount,
                    'view_transaction_url' => $method->view_transaction_url,
                    'new_method_label' => $method->new_method_label,
                    'plugin_id' => $method->plugin_id,
                    'id' => $method->id,
                    'errors' => $method->errors,
                    'settings' => $method->settings,
                    'form_fields' => $method->form_fields,
                    'instructions' => $method->instructions,
                );*/
            }

            break;
    }

    echo '1|' . json_encode(array('shipping_methods' => $shippingMethods, 'payment_methods' => $paymentMethods));
}

function get_store_file_archive() {
    global $temporary_dir, $errors;

    if (version_compare(phpversion(), '5.2.1', '<')) {
        die(json_encode(
            array(
                'response_code' => ERROR_GENERATE_STORE_FILE_ARCHIVE,
                'message' => 'It is supported in php version >= 5.2.1'
            )
        ));
    }

    $result = false;
    $file = "$temporary_dir/emagicone_store.zip";
    $arr_ignore_dir = !empty($_REQUEST['ignore_dir']) ? explode(';' ,$_REQUEST['ignore_dir']) : array();

    if (file_exists($file)) {
        unlink($file);
    }

    $zipObj = new ZipArchive();

    if ($zipObj->open($file, ZipArchive::CREATE) === true) {
        $store_root_dir = './';
        generate_file_archive($zipObj, $store_root_dir, strlen($store_root_dir), $arr_ignore_dir);
        $zipObj->close();
        $result = generate_file_data($file, true);
    }

    if (!$result) {
        generate_error($errors['cannot_archive_files']);
    }

    echo $result;
}

function get_phpinfo() {
    echo "<a href='" . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . "?task=self_test'>back</a><br>";
    phpinfo();
    echo "<br><a href='" . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . "?task=self_test'>back</a>";
    die();
}

function generate_file_archive($zipObj, $path, $store_root_dir_length, $arr_ignore_dir) {
    $skip = array('.', '..');

    if ($fp = opendir($path)) {
        while (false !== ($value = readdir($fp))) {
            $item = "$path/$value";

            if (is_file($item)) {
                $zipObj->addFile($item);
            } elseif (
                    is_dir($item)
                    && !in_array($value, $skip)
                    && !in_array(substr($item, $store_root_dir_length), $arr_ignore_dir)
            ) {
                generate_file_archive($zipObj, $item, $store_root_dir_length, $arr_ignore_dir);
            }
        }

        closedir($fp);
    }
}

function generate_file_data($file, $allow_compression) {
    global $package_size;

    $file_size = filesize($file);
    $outpustr = "0\r\n" . ($allow_compression ? '1' : '0') . '|';
    $div_last = $file_size % $package_size;

    if ($div_last == 0) {
        $outpustr .= $file_size / $package_size;
    } else {
        $outpustr .= ($file_size - $div_last) / $package_size + 1;
    }

    $outpustr .= "|$file_size|\r\n" . basename($file) . "\r\n" . md5_file($file);

    if (!headers_sent()) {
        header('Content-Length: ' . strlen($outpustr));
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Pragma: no-cache');
    }

    return $outpustr;
}

/*function check_dump_generating() {
    global $temporary_dir;

    // TODO: add code 2 and final part
    return cMySQLBackUp::isDumpGenerating($temporary_dir) ? '1' : '0';
}*/

/************************************************************************
* Returns version etc
************************************************************************/
function get_version() {
    echo "0\r\n\$Revision: " . BRIDGE_VERSION . '$';
}

function generate_error($err_text = '1', $class = null) {
    if ($class) {
        $class->_del_tmp();
    }
    echo '1';
    echo "\r\n";
    echo $err_text . "<br>
         <a href='" . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER["SCRIPT_NAME"] . "?task=self_test' target='_blank' style='color: #0000dd;'>Click here to run Self Test</a> or
         <a name='error' style='color: #0000dd;' href='https://support.emagicone.com' target='_blank'>Click here for help</a>
         ";
    die();
}

function flush_buffers() {
    ob_end_flush();
    ob_flush();
    flush();
    ob_start();
}

function _set_sql_progress($handled_tables, $table_sizes, $handling_table, $handled_rows, $db_size) {
    $size_handled = 0;

    foreach ($handled_tables as $table) {
        $size_handled += $table_sizes[$table]['size'];
    }

    if ($handled_rows >= $table_sizes[$handling_table]['rows']) {
        $size_handled += $table_sizes[$handling_table]['size'];
    } else {
        $size_handled += round($table_sizes[$handling_table]['size'] / $table_sizes[$handling_table]['rows'] * $handled_rows, 0);
    }

    $percentage = round($size_handled / $db_size * 100, 0);
    _set_generating_dump_value(array(GET_SQL_TABLE => $handling_table, GET_SQL_PERCENTAGE => $percentage));
}

function _set_generating_dump_value($arr, $deleteItem = false) {
    global $temporary_dir;

    if (!is_array($arr)) {
        $arr = array($arr);
    }

    $file_data = _get_generating_dump_value_from_file();

    foreach ($arr as $key => $value) {
        if (GET_SQL_FILE_DUMP_PARTS == $key && !empty($file_data[$key])) {
            $value = array_merge($file_data[$key], $value);

            if (!empty($deleteItem) && array_key_exists($deleteItem, $value)) {
                unset($value[$deleteItem]);
            }
        }

        $file_data[$key] = $value;
    }

    file_put_contents($temporary_dir . '/' . FILE_NAME_GET_SQL_TMP, serialize($file_data));
}

function _get_generating_dump_value($name) {
    $ret = false;
    $values = _get_generating_dump_value_from_file();

    if (is_array($name)) {
        $ret = array();
        $count = count($name);

        for ($i = 0; $i < $count; $i++) {
            $ret[$name[$i]] = isset($values[$name[$i]]) ? $values[$name[$i]] : '';
        }
    } elseif (array_key_exists($name, $values)) {
        $ret = $values[$name];
    }

    return $ret;
}

function _get_generating_dump_value_from_file() {
    global $temporary_dir;

    $ret = array();
    $file = $temporary_dir . '/' . FILE_NAME_GET_SQL_TMP;

    if (file_exists($file)) {
        $content = file_get_contents($file);
        $ret = unserialize($content);
    }

    return $ret;
}

function _get_part_number_int($file_name) {
    $number = 0;

    // position of file extension
    $file_ext_pos = strrpos($file_name, '.');

    if ($file_ext_pos) {
        // file name without extension
        $file_name_raw = substr($file_name, 0, $file_ext_pos);

        if ($file_name_raw) {
            $number = ltrim(substr($file_name_raw, strlen($file_name_raw) - FILE_NAME_PART_NUMBER_COUNT_DIGITS), '0');
        }
    }

    return (int)$number;
}

function _get_part_number($number) {
    return str_pad($number, FILE_NAME_PART_NUMBER_COUNT_DIGITS, '0', STR_PAD_LEFT);
}

function setValueByKeyToFile($file, $key, $value) {
    $content = file_get_contents($file);
    $content = !empty($content) ? unserialize($content) : array();
    $content[$key] = $value;

    file_put_contents($file, serialize($content));
}

function getValueByKeyFromFile($file, $key) {
    $content = file_get_contents($file);

    if (empty($content)) {
        return false;
    }

    $content = unserialize($content);

    return array_key_exists($key, $content) ? $content[$key] : false;
}

class XmlConfig {
    private $file;
    private $xml;
    private $fields;
    private $items_node;
    private $items_info_node;
    private $items;
    private $items_info;
    private $items_list;
    private $filters;

    function __construct($xml_file){
        $this->file = strval($xml_file);
        if(!file_exists($this->file)) {
            throw new Exception("0|File {$this->file} not found!");
        }

        $this->xml = simplexml_load_file($xml_file);
    }

    function getItemsList($xml_fields, $items_node, $items_info_node, $xml_filters){
        $this->items_list = "";
        $this->fields = strval($xml_fields);

        $filters = explode(";", $xml_filters);
        foreach ( $filters as $filter) {
            preg_match('/^(.*)\:(.*)$/', $filter, $matches);
            $this->filters[$matches[1]] = $matches[2];
        }

        if($this->fields <> "") {
            $this->fields = explode(",", $this->fields);
            if(count($this->fields) == 0) {
                throw new Exception("0|String {$this->fields} doesnt contain fields names!\r\n");
            }
        } else throw new Exception("0|String with fields list cant be empty!\r\n");

        $this->items_node = $items_node;
        $this->items_info_node = $items_info_node;

        if(($this->items_node == "") || ($this->items_info_node == "")) {
            throw new Exception("0|Strings with node pathes cant be empty!\r\n");
        }
        $this->items = $this->xml->xpath("{$this->items_node}");
        foreach ($this->items[0] as $item_name => $item_value) {
            if($this->items_node != $this->items_info_node){
                $this->items_info = $this->xml->xpath("$this->items_info_node/$item_name");
                $this->items_info = $this->items_info[0];
            } else {
                $this->items_info = $item_value;
            }

            if(count($this->filters) > 0){
                foreach ( $this->filters as $filter_name => $filter_value) {
                    if(strval($this->items_info->$filter_name) <> $filter_value){
                        continue 2;
                    }
                }
            }

            foreach ($this->fields as $field) {
                $this->items_list[$item_name][$field] = (string)$this->items_info->$field;
            }
        }
        return "1|".json_encode($this->items_list)."\r\n";
    }
}

class cMySQLBackUp {
    var $sBackUpDir = '/tmp';     // directory to put back up
    var $iCurrTime;
    var $iTimeout = 15;
    var $sUniqDel = "{2C6ADA679885438688E6C9329B347146}";
    var $PingCount = 0;
    var $sBackUpFile = FILE_NAME_GET_SQL_MAIN;  // file name to make back up
    var $sBackUpFileExt = 'sql';// file extention to make back up
    var $bOverWrite = false;    // overwrite existing file ?
    var $bCompressed = false;   // use compression for back up
    var $sCompressor = 'gz';    // compressor type: 'bz', 'gz' ... (anything else supported by your system)
    var $iPackageSize = 0; //uses to gve files by packages
    var $bSturcture = true;  // include 'Create table definition'
    var $bData = true;      // include table data
    var $bFullInsert = false;   // create full form of 'INSERT INTO' query
    var $bDeleteBefore = true;  // insert 'DELETE TABLE' directive
    var $sDBHost = ''; // database host to connect
    var $sDBUser = '';      // database user login to connect
    var $sDBPwd  = '';      // database user pasword to connect
    var $rLink   = 0;         // DB link id
    var $sDBName = '';      // database to back up
    var $sDBSocket = '';
    var $aTables = array();  // tables to back up
    var $sReportLevel = 10;  // reporting level (30 | 20 | 10)
    var $sDateFrmt = 'm/d/y H:i:s';  // date format for get_list function
    var $_tmpfname = '';        // temporary file name
    var $_tmpfd = '';         // temporary file descriptor
    var $exclude_files = array('index\.htm', 'index\.php', '\.htaccess', '.\.tmp'); // file names to ignore
    var $sError = '';         // error messages
    var $resetLog = false;
    var $dump_data_prev = false;
    var $dump_file_part_number = 1;

    /**
     * Class constructor
     *
     * @param string $dir
     * @param string $file
     * @param bool $allow_compression
     * @param int $package_size log level
     *
     * @internal param \back $string up directory
     * @internal param \back $string up file name
     * @return  boolean  always true
     *
     * @access  public
     */
//    function cMySQLBackUp($dir = '', $file = '', $allow_compression = false, $package_size = 0, $is_get_sql_file_part = false) {
    function __construct($dir = '', $file = '', $allow_compression = false, $package_size = 0, $is_get_sql_file_part = false) {
        global $db_link, $is_reconnect;

        if ($is_get_sql_file_part) {
            if (!empty($dir)) {
                $this->sBackUpDir = $dir;
            }

            if (!empty($file)) {
                $this->sBackUpFile = $file;
            }

            if ($package_size > 0) {
                $this->iPackageSize = $package_size;
            }

            if ($allow_compression) {
                $this->bCompressed = true;
                $this->sBackUpFileExt = 'gz';
            }

            /*$this->sDBHost = (defined('USER_DB_SERVER')) ? USER_DB_SERVER : DB_SERVER; // database host to connect
            $this->sDBUser = (defined('USER_DB_SERVER_USERNAME')) ? USER_DB_SERVER_USERNAME : DB_SERVER_USERNAME;         // database user login to connect
            $this->sDBPwd  = (defined('USER_DB_SERVER_PASSWORD')) ? USER_DB_SERVER_PASSWORD : DB_SERVER_PASSWORD;         // database user pasword to connect
            $this->sDBName = (defined('USER_DB_DATABASE')) ? USER_DB_DATABASE : DB_DATABASE;
            $this->sDBSocket = (defined('SERVER_DB_SOCKET')) ? SERVER_DB_SOCKET : "";

            if(strpos($this->sDBHost, 'sock') != false) {
                $this->sDBHost = 'localhost:'.$this->sDBHost;
            }*/

            $this->setDbCredentials();
            $this->_connect(false);
            $db_link = $this->rLink;
        } elseif (!$is_reconnect) {
            if ($dir != '') {
                $this->sBackUpDir = $dir;
            }

//            if ($file != '') {
//                $this->sBackUpFile = $file;
//            }

//            $this->dump_data_prev = $this->getDumpData();
            $this->dump_data_prev = self::getDumpData($this->sBackUpDir/*, $this->sBackUpFile*/);

            if ($this->dump_data_prev) {
                $this->resetLog = true;
                $this->sBackUpFile = $this->dump_data_prev[GET_SQL_FILE_NAME_GENERATING];
                $this->dump_file_part_number = _get_part_number_int($this->sBackUpFile);
            } else {
                $this->sBackUpFile = $this->sBackUpFile . _get_part_number($this->dump_file_part_number) . '.sql';
            }

            $this->_report('Intializing', 30);
            $this->iCurrTime = time();

            if ($allow_compression) {
                $this->bCompressed = true;
                $this->sBackUpFileExt = 'gz';
            }

            if ($package_size > 0) {
                $this->iPackageSize = $package_size;
            }

            /*$this->sDBHost = (defined('USER_DB_SERVER')) ? USER_DB_SERVER : DB_SERVER; // database host to connect
            $this->sDBUser = (defined('USER_DB_SERVER_USERNAME')) ? USER_DB_SERVER_USERNAME : DB_SERVER_USERNAME;         // database user login to connect
            $this->sDBPwd  = (defined('USER_DB_SERVER_PASSWORD')) ? USER_DB_SERVER_PASSWORD : DB_SERVER_PASSWORD;         // database user pasword to connect
            $this->sDBName = (defined('USER_DB_DATABASE')) ? USER_DB_DATABASE : DB_DATABASE;
            $this->sDBSocket = (defined('SERVER_DB_SOCKET')) ? SERVER_DB_SOCKET : "";

            if(strpos($this->sDBHost, 'sock') != false) {
                $this->sDBHost = 'localhost:'.$this->sDBHost;
            }*/

            $this->setDbCredentials();
            $this->_connect();
            $db_link = $this->rLink;

            if ($_REQUEST['task'] == 'get_sql') {
                $this->fn_open($dir);
//                $this->_report('Creating backup file', 30);
            } else {
                $this->_report('Creating tmp file', 30);
                $this->_tmpfname = tempnam($dir, 'm1bridgetmp_');

                if(!$this->_tmpfname) {
                    generate_error('Error creating tmp file', $this);
                }

                $this->_report('Openning tmp file', 30);
                $this->_tmpfd = fopen($this->_tmpfname, "w+b");

                if(!$this->_tmpfd) {
                    generate_error('Error openning tmp file. ' . $php_errormsg, $this);
                }
            }

//            return true;
        } else {
            /*$this->sDBHost = (defined('USER_DB_SERVER')) ? USER_DB_SERVER : DB_SERVER; // database host to connect
            $this->sDBUser = (defined('USER_DB_SERVER_USERNAME')) ? USER_DB_SERVER_USERNAME : DB_SERVER_USERNAME;         // database user login to connect
            $this->sDBPwd  = (defined('USER_DB_SERVER_PASSWORD')) ? USER_DB_SERVER_PASSWORD : DB_SERVER_PASSWORD;         // database user password to connect
            $this->sDBName = (defined('USER_DB_DATABASE')) ? USER_DB_DATABASE : DB_DATABASE;
            $this->sDBSocket = (defined('SERVER_DB_SOCKET')) ? SERVER_DB_SOCKET : "";

            if(strpos($this->sDBHost, 'sock') != false) {
                $this->sDBHost = 'localhost:'.$this->sDBHost;
            }*/
            $this->setDbCredentials();
        }
    }

    function setDbCredentials() {
        $this->sDBHost = defined('USER_DB_SERVER')
                ? USER_DB_SERVER . (defined('USER_DB_PORT') && USER_DB_PORT ? ':' . USER_DB_PORT : '')
                : DB_SERVER; // database host to connect
        $this->sDBUser = (defined('USER_DB_SERVER_USERNAME')) ? USER_DB_SERVER_USERNAME : DB_SERVER_USERNAME;         // database user login to connect
        $this->sDBPwd  = (defined('USER_DB_SERVER_PASSWORD')) ? USER_DB_SERVER_PASSWORD : DB_SERVER_PASSWORD;         // database user password to connect
        $this->sDBName = (defined('USER_DB_DATABASE')) ? USER_DB_DATABASE : DB_DATABASE;
        $this->sDBSocket = (defined('SERVER_DB_SOCKET')) ? SERVER_DB_SOCKET : "";

        if (strpos($this->sDBHost, 'sock') != false) {
            $this->sDBHost = 'localhost:' . $this->sDBHost;
        }
    }

    function fn_int($num) {
        return number_format($num, 0, ',', ' ');
    }

    function fn_open($dir) {
//        global $allow_compression, $compress_level;

//        $name = $this->_generate_fname();
//        $name = 'em1_bridge_db_dump';
//        $mode = "w";
        $mode = 'a';

//        $this->_report('Delete old temp files', 30);

//        $this->_clearAll("m1bridge_");

        $this->_report('Creating backup file ' . $this->sBackUpFile, 30);

//        if($allow_compression) {
//            $this->sBackUpFile = "{$name}.gz";
//            $this->_tmpfd = gzopen($dir . '/' . $this->sBackUpFile, "{$mode}b{$compress_level}");
//        }
//        else{
//            $this->sBackUpFile = "{$name}.sql";
            $this->_tmpfd = fopen($dir . '/' . $this->sBackUpFile, "{$mode}b");

        if ($this->_tmpfd && $this->dump_data_prev) {
            $this->putDumpData($this->dump_data_prev['table'], $this->dump_data_prev['from']);
        }
//        }
    }

    function fn_write($fp, $str) {
//        global $allow_compression;

//        $this->fn_open($this->sBackUpDir);
//        $fp = $this->_tmpfd;

//        if($allow_compression) {
//            gzwrite($fp, $str);
//        } else {
            fwrite($fp, $str);
//        }

//        $this->fn_close($fp);
    }

    function fn_close($fp) {
//        global $allow_compression;

//        if($allow_compression) {
//            gzclose($fp);
//        } else {
            fclose($fp);
//        }
    }
/*******************************************************************

public methods:
create();
download();

*******************************************************************/
    /**
    * Creating a back up. This is a general function for creation of archive
    * @param   none
    * @return  none
    * @access  public
    */
    function create_dump() {
        global $db_link, $limit_query_size, $tables_with_structure_only;

        $table_prefix = get_table_prefix();
        $this->rLink = $db_link;
        $this->sError = '';

        if (empty($this->sBackUpDir)) {
            generate_error( 'Destination directory is not set.' , $this);
        }

        // Prepare tables with restricted data
        $arr_tables_with_restricted_data = array();
        $arr_tables_name_with_restricted_data = array();
        $arr_tables_with_structure_only = explode(';', $tables_with_structure_only);
        $count = count($arr_tables_with_structure_only);
        for ($i = 0; $i < $count; $i++) {
            $table_restricted_data = explode(':', $arr_tables_with_structure_only[$i]);
            $arr_tables_name_with_restricted_data[] = $table_restricted_data[0];
            $arr_tables_with_restricted_data[$table_restricted_data[0]] = empty($table_restricted_data[1])
                    ? 0
                    : (int) $table_restricted_data[1];
        }

        $this->_get_tables();
        $tables = $this->aTables;

        $result = $this->rLink->query("SHOW TABLE STATUS");
        $tabinfo = array();
        $table_sizes = array();
        $handled_tables = array();
        $tabinfo[0] = 0;
        $db_size = 0;

        while ($item = $this->rLink->results($result, 'ASSOC')) {
            if (in_array($item['Name'], $tables)) {
                $item['Rows'] = empty($item['Rows']) ? 0 : $item['Rows'];
                $tabinfo[0] += $item['Rows'];
                $tabinfo[$item['Name']] = $item['Rows'];
                $this->size += $item['Data_length'];
                $tabsize[$item['Name']] = 1 + round($limit_query_size * 1024 / ($item['Avg_row_length'] + 1));
                $table_sizes[$item['Name']]['size'] = $item['Data_length'] + $item['Index_length'];
                $table_sizes[$item['Name']]['rows'] = $item['Rows'];
                $db_size += $item['Data_length'] + $item['Index_length'];
            }
        }

        $continue = false;
        $dump_data = $this->dump_data_prev;
        $fp = $this->_tmpfd;

        if (!$dump_data) {
            $res = $this->rLink->query(
                'SELECT DEFAULT_CHARACTER_SET_NAME AS charset FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = "'
                . DB_DATABASE . '"'
            );

            if ($res) {
                $row = $this->rLink->results($res, 'ASSOC');
                $this->fn_write($fp, "ALTER DATABASE CHARACTER SET '{$row['charset']}';\nSET NAMES 'utf8';\n\n");
//                $this->fn_write($fp, "SET NAMES 'utf8';\n\n");
            }
        }

        $this->rLink->query("SET SQL_QUOTE_SHOW_CREATE = 1");
        $isSqlFinishedAfterContinue = empty($dump_data);

        foreach ($tables AS $table) {
            if ($dump_data) {
                if ($dump_data['table'] == $table) {
                    $this->_report('Next attempt of generating dump');
                    $continue = true;
                } elseif (!$continue) {
                    $handled_tables[] = $table;
                    continue;
                }
            }

            if (!$dump_data || $dump_data['table'] != $table) {
                $this->_report("Handling table `{$table}` [" . $this->fn_int($tabinfo[$table]) . "].");
            }

            $result = $this->rLink->query("SHOW CREATE TABLE `{$table}`");
            if ($result <> false) {
                $tab = $this->rLink->results($result, 'NUM');
                $tab = preg_replace('/(default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP|collate \w+)/i', '/*!40101 \\1 */', $tab);

                if ($dump_data && $dump_data['table'] != $table || !$continue) {
                    $this->fn_write($fp, "DROP TABLE IF EXISTS `{$table}`;\n{$tab[1]};\n\n");
                }

                $table_name_with_restricted_data = substr($table, strlen($table_prefix));
                $is_table_with_restricted_data = in_array(
                        $table_name_with_restricted_data,
                        $arr_tables_name_with_restricted_data
                );
//                if (in_array(substr($table, strlen($table_prefix)), $arr_tables_with_structure_only)) {
                if ($is_table_with_restricted_data && $arr_tables_with_restricted_data[$table_name_with_restricted_data] < 1) {
                    continue;
                }

                $NumericColumn = array();
                $result = $this->rLink->query("SHOW COLUMNS FROM `{$table}`");
                $field = 0;
                if ($result) {
                    while($col = $this->rLink->results($result, 'NUM')) {
                        $NumericColumn[$field++] = preg_match('/^(\w*int|year)/', $col[1]) ? 1 : 0;
                    }
                }
                $fields = $field;

                /*if ($dump_data && $dump_data['table'] == $table) {
                    $from = $dump_data['from'];
                } else {
                    $from = 0;
                }*/
                $from = $dump_data && $dump_data['table'] == $table ? $dump_data['from'] : 0;

                $limit = $tabsize[$table];
                $limit2 = round($limit / 3);

                if ($tabinfo[$table] > $limit2) {
                    $this->_wake_server();
                }

                if ($is_table_with_restricted_data) {
                    $limit = $arr_tables_with_restricted_data[$table_name_with_restricted_data];
                }

                // Get primary key column for table
                $tablePrimaryKeyColumn = self::getTablePrimaryKeyColumn($table, $tabinfo[$table]);

                $i = 0;
//                $query = "SELECT * FROM `{$table}` LIMIT {$from}, {$limit}";
                $query = self::generateSelectSqlStatement($table, $from, $limit, $tablePrimaryKeyColumn);
                $result = $this->rLink->query($query);
                $total = $this->rLink->num_rows($result);

                if ($total > 0) {
                    $newLine = $isSqlFinishedAfterContinue ? '' : ";\n";
                    $this->fn_write($fp, "{$newLine}INSERT INTO `{$table}` VALUES");
                    $isSqlFinishedAfterContinue = true;
                }

//                while (($result = $this->rLink->query($query)) && ($total = $this->rLink->num_rows($result))) {
                while ($result && $total) {
                    $agag = $this->rLink->error($result);
                    if (isset($agag[1]) && $agag[1] != null) {
                        $this->_report('Error selecting data. MySQL error: ' . $this->rLink->error($result[1]), 10);
                    }

                    $this->_report("-$query");
                    while ($row = $this->rLink->results($result, 'NUM')) {
                        $i++;

                        for ($k = 0; $k < $fields; $k++){
                            if ($NumericColumn[$k]) {
                                $row[$k] = isset($row[$k]) ? $row[$k] : 'NULL';
                            } else {
                                if (isset($row[$k])) {
                                    $row[$k] = ' ' . QOUTE_CHAR . $this->rLink->sanitize($row[$k]) . QOUTE_CHAR . " ";
                                } else {
                                    $row[$k] = 'NULL';
                                }
                            }
                        }

                        $row_ex = ',';
                        if ($i == 1) {
                            $row_ex = '';
                        }
                        if ($i % 500 == 0 && $i > 0) {
                            $this->fn_write($fp, ";\nINSERT INTO `{$table}` VALUES");
                            $row_ex = '';
                        }

                        $this->fn_write($fp, $row_ex . "\n(" . implode(', ', $row) . ")");
                        if ($i % $limit2 == 0) {
                            $this->_wake_server();
                        }
                    }
                    @$this->rLink->free_result($result);

                    // Put information about processed data into temporary file
                    $this->putDumpData($table, $from + $limit);

                    // Set data of generating database dump progress
                    _set_sql_progress($handled_tables, $table_sizes, $table, $from, $db_size);

                    // Generating database dump cancel
                    if (_get_generating_dump_value(GET_SQL_CANCEL_PARAM)) {
                        $this->_report(GET_SQL_CANCEL_MESSAGE);
                        $path_sm_tmp_get_sql_txt = $this->sBackUpDir . '/' . FILE_NAME_GET_SQL_TMP;
                        $path_dump_data_tmp_txt = $this->sBackUpDir . '/' . FILE_NAME_GET_SQL_FOR_CONTINUE;
                        $path_em1_bridge_db_dump_sql = $this->sBackUpDir . '/' . $this->sBackUpFile;

                        if (file_exists($path_sm_tmp_get_sql_txt)) {
                            unlink($path_sm_tmp_get_sql_txt);
                        }

                        if (file_exists($path_dump_data_tmp_txt)) {
                            unlink($path_dump_data_tmp_txt);
                        }

                        if (file_exists($path_em1_bridge_db_dump_sql)) {
                            $this->fn_close($fp);
                            unlink($path_em1_bridge_db_dump_sql);
                        }

                        die(GET_SQL_CANCEL_MESSAGE);
                    }

                    // If store manager needs to get part of dump
                    if (_get_generating_dump_value(GET_SQL_FILE_PART)) {
                        $this->fn_close($fp);
                        $this->generateArchive();
                        _set_generating_dump_value(
                            array(
//                                GET_SQL_FILE_PART_NAME => $this->sBackUpFile,
                                GET_SQL_FILE_DUMP_PARTS => array($this->sBackUpFile => 0),
                                GET_SQL_FILE_PART => 0,
                            )
                        );
                        $this->dump_file_part_number++;
                        $this->sBackUpFile = FILE_NAME_GET_SQL_MAIN
                            . _get_part_number($this->dump_file_part_number) . '.sql';
                        $this->fn_open($this->sBackUpDir);
                        $fp = $this->_tmpfd;
                    }

                    if ($total < $limit || $is_table_with_restricted_data) {
                        break;
                    }

                    $from += $limit;
//                    $query = "SELECT * FROM {$table} LIMIT {$from}, {$limit}";
                    $query = self::generateSelectSqlStatement($table, $from, $limit, $tablePrimaryKeyColumn);
                    $result = $this->rLink->query($query);

                    if ($result) {
                        $total = $this->rLink->num_rows($result);
                    }
                }

                $handled_tables[] = $table;
                $this->fn_write($fp, ";\n\n");
            }
        }

        $this->fn_close($fp);
        $this->generateArchive();
        _set_generating_dump_value(array(GET_SQL_FILE_DUMP_PARTS => array($this->sBackUpFile => 1)));
    }

    private function getTablePrimaryKeyColumn($table, $rowsCount) {
        if (100000 > $rowsCount) {
            return false;
        }

        $tablePrimaryKeyColumn = false;
        $sql = "SELECT `COLUMN_NAME` FROM `information_schema`.`COLUMNS`
            WHERE `TABLE_SCHEMA` = '$this->sDBName' AND `TABLE_NAME` = '$table' AND `COLUMN_KEY` = 'PRI'";

        if ($result = $this->rLink->query($sql)) {
            if (1 < $this->rLink->num_rows($result)) {
                return false;
            }

            while ($row = $this->rLink->results($result, 'ASSOC')) {
                $tablePrimaryKeyColumn = $row['COLUMN_NAME'];
                break;
            }
        }

        return $tablePrimaryKeyColumn;
    }

    private static function generateSelectSqlStatement($table, $from, $limit, $tablePrimaryKeyColumn) {
        if ($tablePrimaryKeyColumn) {
            $sql = "SELECT t1.* FROM `$table` t1 JOIN (SELECT $tablePrimaryKeyColumn FROM $table LIMIT $from, $limit) t2
                ON t1.$tablePrimaryKeyColumn = t2.$tablePrimaryKeyColumn";
        } else {
            $sql = "SELECT * FROM `$table` LIMIT $from, $limit";
        }

        return $sql;
    }

    private function generateArchive() {
        global $allow_compression, $package_size, $compress_level;

        if (!$allow_compression) {
            return;
        }

        $fname_gz = FILE_NAME_GET_SQL_MAIN . _get_part_number($this->dump_file_part_number) . '.gz';
        $fname_gz_path = $this->sBackUpDir . '/' . $fname_gz;
        $fp_gz = gzopen($fname_gz_path, "wb{$compress_level}");

        $fname_path = $this->sBackUpDir . '/' . $this->sBackUpFile;
        $fp = fopen($fname_path, 'r');

        if ($fp_gz && $fp) {
            while (!feof($fp)) {
                $content = fread($fp, $package_size);
                gzwrite($fp_gz, $content);
            }

            fclose($fp);
            @unlink($fname_path);

            $this->sBackUpFile = $fname_gz;
            fclose($fp_gz);
        }
    }

    /**
    * Download back up function
    * @param   string   backup file name
    * @return  none
    * @access  public
    */
    function download($fname = '', $is_log = true, $isPartLast = true) {
        if ($fname != '') {
            $this->sBackUpFile = $fname;
        }

        $fname = $this->sBackUpDir . '/' . $this->sBackUpFile;

        if (!file_exists($fname)) {
            if ($is_log) {
                $this->_report('File not exists. ', 20); // generating warning
            }

            die('File not exists');
        }

        if (!is_readable($fname)) {
            if ($is_log) {
                $this->_report('File is not readable. ', 20); // generating warning
            }

            die('File is not readable');
        }

        $file_size = filesize($fname);
        $file_checksum = md5_file($fname);

        if ($this->iPackageSize > 0) {
            $this->_file_parts($file_size, $this->sBackUpFile, $file_checksum, $isPartLast);
            return;
        }

        $outpustr = "0\r\n";

        if ($this->sBackUpFileExt == 'gz') {
            $outpustr .= '1'."\r\n";
        } else {
            $outpustr .= '0'."\r\n";
        }

        if (!headers_sent()) {
            header('Content-Length: ' . (strlen($outpustr) + $file_size));
            header('Content-Length-Alternative: ' . (strlen($outpustr) + $file_size));
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Pragma: no-cache');
        }

        echo $outpustr;
        $fp = fopen($fname, 'rb');

        while ($str = fread($fp, 2048)) {
            echo $str;
        }

        @fclose($fp);
        $this->_exit();
    }

/*******************************************************************
private methods:
_report();
_connect();
_exit();
_write_to_output();
_get_tables();
*******************************************************************/

    /**
    * Reporting function
    * @param   string   report string
    * @param   string   report level
    * @return  none
    * @access  private
    */
    function _report($str, $level = 10) {
//        $dump_data = $this->getDumpData();
//        if(!$this->resetLog && !$dump_data) {
        if(!$this->resetLog) {
            $log = @fopen(m1BridgeGetTempDir() . '/bridge_log.txt', 'w');
            $this->resetLog = true;
        } else {
            $log = @fopen(m1BridgeGetTempDir() . '/bridge_log.txt', 'a');
        }
        if($log) {
            fwrite($log, "[" . date('r') ."]" . $str . "\n");
            fclose($log);
        }
        if($level <= $this->sReportLevel)
        {
            $this->sError .= "$str<br />\r\n";
            flush();
        }
    }

    //sometimes prints dull info to show that script is not dead
    function _wake_server() {
        if (_get_generating_dump_value(GET_SQL_CANCEL_PARAM))
        {
            $this->_report(GET_SQL_CANCEL_MESSAGE);
            die(GET_SQL_CANCEL_MESSAGE);
        }

        $curr_time = time();
        if($curr_time - $this->iCurrTime > $this->iTimeout) {
            echo $this->sUniqDel;
            flush_buffers();
            $this->iCurrTime = $curr_time;
            $this->PingCount++;
            @$this->rLink->close($this->rLink);
            $this->_connect();
        }
    }

    //clears old files
    function _clearAll($prefix) {
        $dir = dir($this->sBackUpDir);

        while (false !== ($entry = $dir->read())) {
            if($entry != '.' && $entry != '..' && substr($entry, 0, strlen($prefix)) == $prefix) {
                @unlink($this->sBackUpDir. '/' . $entry);
            }
        }
    }

    //get part of big file
    function _file_parts($file_size, $file_name, $file_checksum, $isPartLast) {
        global $package_size;

        $outpustr = "0\r\n";

        if ($this->sBackUpFileExt == 'gz') {
            $outpustr .= '1';
        } else {
            $outpustr .= '0';
        }

        $outpustr .= '|';
        $div_last = $file_size % $this->iPackageSize;

        if ($div_last == 0) {
            $outpustr .= (($file_size - $div_last) / $this->iPackageSize);
        } else {
            $outpustr .= (($file_size - $div_last) / $this->iPackageSize + 1);
        }

        $outpustr .=  "|$file_size";
        $res = $this->rLink->query('select @@character_set_database as charset' );

        if ($res) {
            $row = $this->rLink->results($res, 'ASSOC');
            $outpustr .=  '|' . $row['charset'];
        }

        $outpustr .= "\r\n$file_name\r\n$file_checksum\r\npart_last=" . ($isPartLast ? 1 : 0) . "\r\n$package_size\r\n";

        if (!headers_sent()) {
            header('Content-Length: ' . (strlen($outpustr) + strlen($this->sUniqDel) * $this->PingCount));
            header('Content-Length-Alternative: ' . (strlen($outpustr) + strlen($this->sUniqDel) * $this->PingCount));
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Pragma: no-cache');
        }

        echo $outpustr;
    }

    /**
    * Connection to database. This release works with MySQL
    * @param   none
    * @return  none
    * @access  private
    */
    function _connect($is_log = true) {
        if ($is_log) {
            $this->_report('Connecting to database', 30);
        }

        $settings = array('hostname' => $this->sDBHost,
            'username' => $this->sDBUser,
            'password' => $this->sDBPwd,
            'socket' => $this->sDBSocket,
            'database' => $this->sDBName);

        $GLOBALS['settings'] = $settings;
        $this->rLink = dbconn::instance($settings);
        $this->rLink->query("SET NAMES 'utf8'");

        return $this->rLink;
    }

    function _exit() {
        $this->_del_tmp();
    }

    function _del_tmp() {
        if(!is_null($this->_tmpfd)) {
            @fclose($this->_tmpfd);
            @unlink($this->_tmpfname);
        }
    }

    /**
    * Writes string to temporary file
    * @param   none
    * @return  none
    * @access  private
    */
    function _write_to_output($out) {
        fwrite($this->_tmpfd, $out);
    }

    /**
    * Getting list of tables in database and putting it into $this->aTables array
    * @param   none
    * @return  none
    * @access  private
    */
    function _get_tables() {
        global $g_iCartType;

        $this->_report('Selecting tables', 30);
        $res = @$this->rLink->query("SELECT VERSION() as mysql_version");
        if($res) {
            $rowVersion = $this->rLink->results($res, 'NUM');
        }

        // getting list of tables
        // if(version_compare($rowVersion['mysql_version'], '5.0.1', '<')) {
        // $result = @mysql_list_tables($this->sDBName);
        // } else {
        $result = @$this->rLink->query("SHOW FULL TABLES FROM `" . $this->sDBName . "` WHERE Table_type = 'BASE TABLE'");
        // }

        $arr_exclude_db_tables = (isset($GLOBALS['exclude_db_tables']) ? (string)$GLOBALS['exclude_db_tables'] : '');
        $arr_exclude_db_tables = explode(';', $arr_exclude_db_tables);
        $quoted_tbls = array();
        foreach($arr_exclude_db_tables as $tbl) {
            $tbl = preg_quote($tbl, '/');
            $tbl = str_replace('\*', '.*', $tbl);
            $tbl = str_replace('\?', '?', $tbl);
            $quoted_tbls[] = '^' . $tbl . '$';
        }
        $tables_exclude_pattern = implode('|', $quoted_tbls);

        $db_prefix = (isset($_REQUEST['db_prefix']) ? $_REQUEST['db_prefix'] : '');

        if (isset($_REQUEST['include_tables']) && ($g_iCartType != 1)) {
            $db_prefix = ((DB_TABLE_PREFIX != '') ? DB_TABLE_PREFIX : '');
        }

//        $include_db_tables = (isset($GLOBALS['include_db_tables']) ? (string)$GLOBALS['include_db_tables'] : '');
        $quoted_tbls = array();
        if (!empty($_REQUEST['include_tables'])) {
            $arr_include_db_tables = explode(';', (string)$_REQUEST['include_tables']);
            foreach($arr_include_db_tables as $tbl) {
                $tbl = preg_quote($tbl, '/');
                $tbl = str_replace('\*', '.*', $tbl);
                $tbl = str_replace('\?', '?', $tbl);
                $quoted_tbls[] = '^' . $db_prefix.$tbl . '$';
            }
            $quoted_tbls[] = '^sm_.*$'; // Magento tables with prefix "sm_"
        }
        $tables_include_pattern = implode('|', $quoted_tbls);

        if(!$result) {
            generate_error('Error selecting tables. ' . $this->rLink->error(),$this);
        } else {
            $tables = array();
            $inc_tables = 0;
            while ($row = @$this->rLink->results($result, 'NUM')) {
                if(preg_match('/' . $tables_include_pattern . '/', $row[0])) {
                    $inc_tables++;
                }
                $tables[] = $row;
            }

            foreach($tables as $table) {
                if(preg_match('/' . $tables_exclude_pattern . '/', $table[0])) {
                    continue;
                }
                if(preg_match('/' . $tables_include_pattern . '/', $table[0]) || $inc_tables == 0) {
                    $this->aTables[] = $table[0];
                }
            }
        }
        @$this->rLink->free_result($result);
    }

    function _generate_fname() {
        return strtolower("m1bridge_" . $this->sDBName . '_' . date('H_i_s-d_M_Y'));
    }

    private function putDumpData($table, $from) {
        $data = array(
            'table' => $table,
            'from' => $from,
            GET_SQL_FILE_NAME_GENERATING => $this->sBackUpFile,
        );

        file_put_contents($this->sBackUpDir . '/' . FILE_NAME_GET_SQL_FOR_CONTINUE, serialize($data));
    }

    public static function getDumpData($tmp_dir/*, $db_file = 'em1_bridge_db_dump.sql'*/) {
        $file_with_prev_data = $tmp_dir . '/' . FILE_NAME_GET_SQL_FOR_CONTINUE;

        if (file_exists($file_with_prev_data)) {
            $content = file_get_contents($file_with_prev_data);
            $content = unserialize($content);

            if (isset($content[GET_SQL_FILE_NAME_GENERATING])) {
                $file_db_prev = $tmp_dir . '/' . $content[GET_SQL_FILE_NAME_GENERATING];

                if (file_exists($file_db_prev) && (time() - filemtime($file_db_prev)) > 600) {
                    unlink($file_db_prev);
                    return false;
                } elseif (!file_exists($file_db_prev)) {
                    return false;
                }

                return $content;
            }

            return false;
        }

        return false;
    }

    public static function isDumpGenerating($tmp_dir) {
        $file = $tmp_dir . '/bridge_log.txt';

        if (file_exists($file)) {
            $checksum_prev = md5_file($file);
            sleep(DELAY_TO_CHECK_DUMP_GENERATING);

            if ($checksum_prev != md5_file($file)) {
                return true;
            }
        }

        return false;
    }
}

function switch_reconnect() {
    global $db_flag, $settings, $db_link;

    switch ($db_flag) {
        case "0x001":
            try {
                $db_link = new pdoMySQL($settings);
            } catch (Exception $e) {
                return 0;
            }
            return 1;
            break;
        case "0x002":
            $GLOBALS['is_reconnect'] = true;
            $db_link = new dbMySQLi($settings);
            if ($db_link->dbconn === false) {
                return 0;
            } else {
                return 1;
            }
            break;
        case "0x003":
            $GLOBALS['is_reconnect'] = true;
            $db_link = new dbMySQL($settings);
            if ($db_link->dbconn === false) {
                return 0;
            } else {
                return 1;
            }
            break;
    }
}

function reconnect() {
    global $cur_count_attempt_post, $max_count_attempt_post;

    for ($i = $cur_count_attempt_post; $i < $max_count_attempt_post; $i++) {
        sleep(20);
        $answer = switch_reconnect();
        if ($answer == 1) {
            ob_clean();
            return 1;
        }
    }
    ob_clean();
    return 0;
}

function PMA_importRunQuery($sql = '', $full = '') {
    global $db_link,$import_run_buffer, $go_sql, $complete_query, $display_query, $sql_query, $my_die, $error, $reload, $finished, $timeout_passed, $skip_queries,
           $executed_queries, $max_sql_len, $read_multiply, $cfg, $sql_query_disabled, $db, $run_query, $is_superuser, $message, $show_error_header, $file_name_put_sql_tmp,
           $checksum_sm, $prev_sql_exec, $db_flag, $temporary_dir;

    $file_name = $temporary_dir . '/' . $file_name_put_sql_tmp;
    $run_query = true;
    $read_multiply = 1;
    $import_run_buffer['sql'] = $sql;
    $import_run_buffer['full'] = $full;
    $ret = '';
    $a_num_rows = 0;
    $a_aff_rows = 0;
    if (!isset($prev_sql_exec) || $prev_sql_exec == '') {
        $prev_sql_exec = 0;
    }
    if(isset($import_run_buffer)) {
        if($skip_queries > 0) {
            $skip_queries--;
        } else {
            if(!empty($import_run_buffer['sql']) && trim($import_run_buffer['sql']) != '') {
                $max_sql_len = max($max_sql_len, strlen($import_run_buffer['sql']));
                if(!$sql_query_disabled) {
                    $sql_query .= $import_run_buffer['full'];
                }
                if(!$cfg['AllowUserDropDatabase']
                    && !$is_superuser
                    && preg_match('@^[[:space:]]*DROP[[:space:]]+(ifEXISTS[[:space:]]+)?DATABASE @i', $import_run_buffer['sql'])) {
                    $message = $GLOBALS['strNoDropDatabases'];
                    $show_error_header = TRUE;
                    $error = TRUE;
                } else {
                    $executed_queries++;

                    $cur_sql_index = $executed_queries + $prev_sql_exec;
                    if($run_query) {
                        if ($db_flag == "0x001") {
                            try {
                                $result = $db_link->query($import_run_buffer['sql']);

                                if (isset($checksum_sm)) {
                                    $fp = fopen($file_name, "w");
                                    if ($fp) {
                                        fputs($fp, $checksum_sm . "|" . $cur_sql_index);
                                        fclose($fp);
                                    }
                                }
                            } catch (Exception $e) {
                                if (isset($checksum_sm)) {
                                    if (($e->errorInfo[1] == 2006) || ($e->errorInfo[1] == 1317)) {    // Error Code: 2006 - MySQL server has gone away; Error Code: 1317 - Query execution was interrupted
                                        if (reconnect() == 1) {
                                            try {
                                                $result = $db_link->query($import_run_buffer['sql']);
                                                $fp = fopen($file_name, "w");
                                                if ($fp) {
                                                    fputs($fp, $checksum_sm . "|" . $cur_sql_index);
                                                    fclose($fp);
                                                }
                                            } catch (Exception $e) {
                                                $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>' . $e->errorInfo[1] . '; ' . $e->errorInfo[2] . '</b></font><br>' . htmlspecialchars($import_run_buffer['sql']) . '<br>';
                                                $fp = fopen($file_name, "w");
                                                if ($fp) {
                                                    fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                                    fclose($fp);
                                                }
                                            }

                                            if ($result) {
                                                $fp = fopen($file_name, "w");
                                                if ($fp) {
                                                    fputs($fp, $checksum_sm . "|" . $cur_sql_index);
                                                    fclose($fp);
                                                }
                                            }
                                        } else {
                                            $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>' . $e->errorInfo[1] . '; ' . $e->errorInfo[2] . '</b></font><br>' . htmlspecialchars($import_run_buffer['sql']) . '<br>';
                                            $fp = fopen($file_name, "w");
                                            if ($fp) {
                                                fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                                fclose($fp);
                                            }
                                        }
                                    } else {
                                        $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>' . $e->errorInfo[1] . '; ' . $e->errorInfo[2] . '</b></font><br>' . htmlspecialchars($import_run_buffer['sql']) . '<br>';
                                        $fp = fopen($file_name, "w");
                                        if ($fp) {
                                            fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                            fclose($fp);
                                        }
                                    }
                                } else {
                                    $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>' . $e->errorInfo[1] . '; ' . $e->errorInfo[2] . '</b></font><br>' . htmlspecialchars($import_run_buffer['sql']) . '<br>';
                                }
                            }
                        } else {
                            $result = $db_link->query($import_run_buffer['sql']);

                            if(!$result) {
                                if ($db_flag == "0x002") {
                                    $st = mysqli_error($db_link->dbconn->dbconn);
                                    $err_no = mysqli_errno($db_link->dbconn->dbconn);
                                } elseif ($db_flag == "0x003") {
                                    $st = mysql_error($db_link->dbconn->dbconn);
                                    $err_no = mysql_errno($db_link->dbconn->dbconn);
                                }

                                if (isset($checksum_sm)) {
                                    if ($err_no == 2006 || $err_no == 1317) {    // Error Code: 2006 - MySQL server has gone away; Error Code: 1317 - Query execution was interrupted
                                        if (reconnect() == 1) {
                                            $result = $db_link->query($import_run_buffer['sql']);
                                            if (!$result) {
                                                if ($db_flag == "0x002") {
                                                    $st = mysqli_error($db_link->dbconn->dbconn);
                                                    $err_no = mysqli_errno($db_link->dbconn->dbconn);
                                                } elseif ($db_flag == "0x003") {
                                                    $st = mysql_error($db_link->dbconn->dbconn);
                                                    $err_no = mysql_errno($db_link->dbconn->dbconn);
                                                }

                                                $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>'.$err_no.'; '.$st.'</b></font><br>'.htmlspecialchars($import_run_buffer['sql']).'<br>';
                                                $fp = fopen($file_name, "w");
                                                if ($fp) {
                                                    fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                                    fclose($fp);
                                                }
                                            } else {
                                                $fp = fopen($file_name, "w");
                                                if ($fp) {
                                                    fputs($fp, $checksum_sm . "|" . $cur_sql_index);
                                                    fclose($fp);
                                                }
                                            }
                                        } else {
                                            $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>'.$st.'</b></font><br>'.htmlspecialchars($import_run_buffer['sql']).'<br>';
                                            $fp = fopen($file_name, "w");
                                            if ($fp) {
                                                fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                                fclose($fp);
                                            }
                                        }
                                    } else {
                                        $ret .= POST_ERROR_SQL_INDEX . "|" . $cur_sql_index . '|<font color="#000000"><b>'.$err_no.'; '.$st.'</b></font><br>'.htmlspecialchars($import_run_buffer['sql']).'<br>';
                                        $fp = fopen($file_name, "w");
                                        if ($fp) {
                                            fputs($fp, $checksum_sm . "|" . --$cur_sql_index);
                                            fclose($fp);
                                        }
                                    }
                                    return $ret;
                                } else {
                                    $ret .= '<font color="#000000"><b>'.$err_no.'; '.$st.'</b></font><br>'.$import_run_buffer['sql'].'<br>';
                                }
                            } else {
                                $fp = fopen($file_name, "w");
                                if ($fp) {
                                    fputs($fp, $checksum_sm . "|" . $cur_sql_index);
                                    fclose($fp);
                                }
                            }
                        }

                        $msg = '# ';

                        if($result === FALSE) {
                            if(!isset($my_die)) {
                                $my_die = array();
                            }
                            if($cfg['VerboseMultiSubmit']) {
                                $msg .= $GLOBALS['strError'];
                            }
                            if(!$cfg['IgnoreMultiSubmitErrors']) {
                                $error = TRUE;
                                return $ret;
                            }
                        } elseif($cfg['VerboseMultiSubmit']) {
                            if($a_num_rows > 0) {
                                $msg .= $GLOBALS['strRows'] . ': ' . $a_num_rows;
                            } elseif($a_aff_rows > 0) {
                                $msg .= $GLOBALS['strAffectedRows'] . ' ' . $a_aff_rows;
                            } else {
                                $msg .= $GLOBALS['strEmptyResultSet'];
                            }
                        }
                        if(!$sql_query_disabled) {
                            $sql_query .= $msg . "\r\n";
                        }

                        // ifa 'USE <db>' SQL-clause was found and the query succeeded, set our current $db to the new one
                        if($result != FALSE && preg_match('@^[\s]*USE[[:space:]]*([\S]+)@i', $import_run_buffer['sql'], $match)) {
                            $db = trim($match[1]);
                            $db = trim($db,';');
                            $reload = TRUE;
                        }

                        if($result != FALSE && preg_match('@^[\s]*(DROP|CREATE)[\s]+(ifEXISTS[[:space:]]+)?(TABLE|DATABASE)[[:space:]]+(.+)@im', $import_run_buffer['sql'])) {
                            $reload = TRUE;
                        }
                    } // end run query
                } // end ifnot DROP DATABASE
            } // end non empty query
            elseif(!empty($import_run_buffer['full'])) {
                if($go_sql) {
                    $complete_query .= $import_run_buffer['full'];
                    $display_query .= $import_run_buffer['full'];
                } else {
                    if(!$sql_query_disabled) {
                        $sql_query .= $import_run_buffer['full'];
                    }
                }
            }
            // check length of query unless we decided to pass it to sql.php
            if(!$go_sql) {
                if($cfg['VerboseMultiSubmit'] && !empty($sql_query)) {
                    if(strlen($sql_query) > 50000 || $executed_queries > 50 || $max_sql_len > 1000) {
                        $sql_query = '';
                        $sql_query_disabled = TRUE;
                    }
                } else {
                    if(strlen($sql_query) > 10000 || $executed_queries > 10 || $max_sql_len > 500) {
                        $sql_query = '';
                        $sql_query_disabled = TRUE;
                    }
                }
            }
        } // end do query (no skip)
    } // end buffer exists

    // Do we have something to push into buffer?
    if(!empty($sql) || !empty($full)) {
        $import_run_buffer = array('sql' => $sql, 'full' => $full);
    } else {
        unset($GLOBALS['import_run_buffer']);
    }

    return $ret;
}

function PMA_importGetNextChunk($size = 32768) {
    global $import_file, $import_text, $finished, $compression, $import_handle, $offset, $charset_conversion, $charset_of_file, $charset, $read_multiply, $read_limit;
    $compression = 'none';

    // Add some progression while reading large amount of data
    // We can not read too much
    if($finished) {
        return TRUE;
    }

    switch ($compression) {
        case 'none':
            $result = fread($import_handle, $size);
            $finished = feof($import_handle);
            break;
    }
    $offset += $size;

    if($charset_conversion) {
        return PMA_convert_string($charset_of_file, $charset, $result);
    } else {
        // Skip possible byte order marks (I do not think we need more
        // charsets, but feel free to add more, you can use wikipedia for
        // reference: <http://en.wikipedia.org/wiki/Byte_Order_Mark>)
        // @TODO: BOM could be used for charset autodetection
        if($offset == $size) {
            // UTF-8
            if(strncmp($result, "\xEF\xBB\xBF", 3) == 0) {
                $result = substr($result, 3);
                // UTF-16 BE, LE
            } elseif(strncmp($result, "\xFE\xFF", 2) == 0 || strncmp($result, "\xFF\xFE", 2) == 0) {
                $result = substr($result, 2);
            }
        }
        return $result;
    }
}

function running($import_handle) {
    global $finished, $checksum_sm, $errors, $checksum_prev, $prev_sql_exec, $f_name, $file_name_put_sql_tmp, $temporary_dir, $put_sql_encoded;
    $buffer = $ret = '';
    $file_name = $temporary_dir . '/' . $file_name_put_sql_tmp;
    $checksum_prev = '';
    $replace_from_sm = array('-' => '+', '_' => '/', ',' => '=');
    $replace_to_sm = array_flip($replace_from_sm);

    if (file_exists($file_name)) {
        $fp = fopen($file_name, "r");
        if ($fp) {
            if (filesize($file_name) > 0) {
                $content = fread($fp, filesize($file_name));
                $checksum_arr = explode("|", $content);
                $checksum_prev = $checksum_arr[0];

                if (!isset($checksum_arr[1]) || $checksum_arr[1] < 0) {
                    $checksum_arr[1] = 0;
                }
            }
            fclose($fp);
        }
    }

    // Get encoded string in base64 to check below if data are encoded in base64
    $encoded_data_begin = strtr(base64_encode($put_sql_encoded), $replace_to_sm);

    // Defaults for parser
    $offset = 0;

    if(isset($_POST['sql_delimiter'])) {
        $sql_delimiter = $_POST['sql_delimiter'];
    } else {
        $sql_delimiter = '/*DELIMITER*/';
        //$sql_delimiter = ';/*DELIMITER*/'; // Ruslan - should be without leading ;
        //$sql_delimiter = ';';
    }

    // Handle compatibility option
    if(isset($_REQUEST['sql_compatibility'])) {
        PMA_importRunQuery("SET sql_mode = '" . $_REQUEST['sql_compatibility'] . "'");
    }
//    PMA_importRunQuery("SET sql_mode = ''");

    $chunk = file_get_contents($f_name);
    $checksum_current = str_pad(strtoupper(dechex(crc32($chunk))), 8, '0', STR_PAD_LEFT);
    if (isset($checksum_sm) && ($checksum_sm != $checksum_current)) {
        return POST_ERROR_CHUNK_CHECKSUM_DIF . "|" . $errors['checksum_dif'];    //chunk checksum from the store manager and chunk checksum from the bridge file are different
    } else {
        if (isset($checksum_sm))
        {
            if (strpos($chunk, $encoded_data_begin) === 0) {  // http://core:8080/browse/SMFW-181
                $chunk = base64_decode(strtr(substr($chunk, strlen($encoded_data_begin)), $replace_from_sm));
                file_put_contents($f_name, $chunk);
            }
        }

        while (!$finished) {
            $data = PMA_importGetNextChunk();

            if($data === FALSE) {
                // subtract data we didn't handle yet and stop processing
                $offset -= strlen($buffer);
                break;
            } elseif($data === TRUE) {
                // Handle rest of buffer
            } else {
                // Append new data to buffer
                $buffer .= $data;

                // Do not parse string when we're not at the end and don't have ; inside
                if((strpos($buffer, $sql_delimiter) === FALSE) && !$finished) {
                    continue;
                }
                $sql_queries = explode($sql_delimiter,$buffer);
                $c_queries = count($sql_queries);
                if(!$finished) {
                    $buffer = $sql_queries[$c_queries-1];
                    $sql_queries = array_splice($sql_queries,0,$c_queries-1);
                }

                if (isset($checksum_sm)) {
                    if ($checksum_current != $checksum_prev) {
                        foreach ($sql_queries as $query) {
                            if(strlen($query)!= 0) {
                                if ($ret == '') {
                                    $ret .= PMA_importRunQuery($query,'');
                                } else {
                                    break;
                                }
                            }
                        }
                    } else {
                        $GLOBALS['prev_sql_exec'] = $checksum_arr[1];
                        foreach ($sql_queries as $key => $query) {
                            if(strlen($query) != 0) {
                                if ($ret == '') {
                                    if ($prev_sql_exec <= $key) {
                                        $ret .= PMA_importRunQuery($query,'');
                                    } else {
                                        continue;
                                    }
                                } else {
                                    break;
                                }
                            }
                        }
                    }
                } else {
                    foreach ($sql_queries as $query) {
                        if(strlen($query)!=0) {
                            $ret .= PMA_importRunQuery($query,'');
                        }
                    }
                }
            }
         }
     }
     if ($ret == '' && isset($checksum_sm)) {
        $ret = SUCCESSFUL . '|Data were posted successfully';
     }
    return $ret;
}

/**
 * Temporary directory path autodiscovery
 *
 * @author alexerm
 * @return string|bool Temporary directory path or false ifcan't determine it
 */
function m1BridgeGetTempDir() {
    global $temporary_dir;
    if(empty($temporary_dir)) {
        $commonTempDir = dirname(__FILE__) . '/tmp/';
    } else {
        $commonTempDir = $temporary_dir;
    }

    if(is_dir($commonTempDir) && is_writable($commonTempDir) && is_executable($commonTempDir)) {
        return $commonTempDir;
    }

    global $xcart_dir;
    $dir_tmp1 = './tmp';
    $dir_tmp2 = './temp';
    $dir_tmp3 = '../tmp';
    $dir_tmp4 = '../temp';
    $dir_oscommerce = DIR_FS_CATALOG . 'images/';
    $dir_creloaded = DIR_FS_CATALOG . 'tmp/';
    $dir_zencart = DIR_FS_CATALOG . 'cache/';
    if( null != $xcart_dir) {
        $dir_xcart1 = $xcart_dir . '/var/tmp/';
        $dir_xcart2 = $xcart_dir . '/templates_c/';
    }

    if(is_dir($dir_oscommerce) && is_writable($dir_oscommerce)) {
        $temporaryDir = $dir_oscommerce;
    } elseif(is_dir($dir_tmp1) && is_writable($dir_tmp1)) {
        $temporaryDir = $dir_tmp1;
    } elseif(is_dir($dir_tmp2) && is_writable($dir_tmp2)) {
        $temporaryDir = $dir_tmp2;
    } elseif(is_dir($dir_tmp3) && is_writable($dir_tmp3)) {
        $temporaryDir = $dir_tmp3;
    } elseif(is_dir($dir_tmp4) && is_writable($dir_tmp4)) {
        $temporaryDir = $dir_tmp4;
    } elseif(is_dir($dir_creloaded) && is_writable($dir_creloaded)) {
        $temporaryDir = $dir_creloaded;
    } elseif(is_dir($dir_zencart) && is_writable($dir_zencart)) {
        $temporaryDir = $dir_zencart;
    } elseif(is_dir($dir_xcart1) && is_writable($dir_xcart1)) {
        $temporaryDir = $dir_xcart1;
    } elseif(is_dir($dir_xcart2) && is_writable($dir_xcart2)) {
        $temporaryDir = $dir_xcart2;
    } elseif(ini_get('open_basedir') == null) {
        // Get global temporary directory
        if(!empty($_ENV['TMP'])) {
            $temporaryDir = $_ENV['TMP'];
        } elseif(!empty($_ENV['TMPDIR'])) {
            $temporaryDir = $_ENV['TMPDIR'];
        } elseif(!empty($_ENV['TEMP'])) {
            $temporaryDir = $_ENV['TEMP'];
        } elseif(!empty($_ENV['windir'])) { // temporary dir under windows
            $temporaryDir = $_ENV['windir'];
        } elseif(ini_get('session.save_path') != null && is_dir(ini_get('session.save_path')) && is_writable(ini_get('session.save_path')) ) {
            $temporaryDir = ini_get('session.save_path');
        } elseif(is_writable('/tmp') && is_dir('/tmp')) {
            $temporaryDir = '/tmp';
        } elseif(is_dir(dirname(tempnam('', 'na'))) && is_writable(dirname(tempnam('', 'na')))) {
            $temporaryDir = dirname(tempnam('', 'na'));
        } else {
            $temporaryDir = '/tmp';
        }
    }
    return realpath($temporaryDir);
}

/**
 * Run Tests of main bridge functionality
 */
function run_self_test() {
    global $limit_query_size;
    if(!function_exists('curl_init')) {
        echo '<b>PHP CURL extension is disabled.</b><br />Please contact your hosting provider to enable PHP CURL extension. It is necessary for bridge self test only.';
        return;
    }

    $html = '<h2>'.basename($_SERVER["SCRIPT_NAME"]).' Self Test Tool</h2>';
    $html .= '<div style="padding: 5px; margin: 10px 0;">This tool checks your website to make sure there are no problems in your hosting configuration.<br />Your hosting support can solve all problems found here.</div>';
    $html .= '<table cellpadding=2>'
          . '<tr>'
          . '<th>Test Title</th>'
          . '<th>Result</th>'
          . '</tr>';

    $html .= '<tr><td>Bridge Version</td><td>' . $GLOBALS['version'] . '</td><td></td></tr>';

    $html .= '<tr><td>Temporary Directory Exists and Writable</td><td>'
          . (( $res = test_temp_directory() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td width=450>Create temporary dir ' . dirname(__FILE__) . '/tmp and set permissions to write</td>';
    }

    $html .= '<tr><td>Temporary Directory has enough free space </td><td>'
          . (( $res = test_temp_free_space() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Delete unused and temporary files or request more disk space from your hosting provider.</td>';
    }

    $html .= '<tr><td><a href="http://www.google.com/search?hl=en&q=post_max_size+php+&aq=f&aqi=&aql=&oq=&gs_rfai=" target="_blank">Post Maximum Size</a> </td><td>'
          . ini_get('post_max_size') . '</td>';

    $html .= '<tr><td><a href="http://php.net/manual/en/book.zlib.php" target="_blank">Zlib PHP Extension</a> Loaded</td><td>'
          . (( $res = test_is_gz_avaliable() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Ask your hosting provider to enable Zlib php extension</td>';
    }

    $html .= '<tr><td><a href="http://www.modsecurity.org/documentation/modsecurity-apache/2.5.12/modsecurity2-apache-reference.html" target="_blank">Apache mod_security</a> Disabled</td><td>'
          . (( $res = test_apache_mod_security() ) ? TEST_YES : test_is_cgi_mode() == true ? TEST_SKIP : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Ask your hosting provider to disable mod_security extension for bridge.php</td>';
    }

    $html .= '<tr><td><a href="http://www.hardened-php.net/suhosin/" target="_blank">Suhosin PHP extension</a> Disabled</td><td>'
          . (( $res = test_suhosin_extension_loaded() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Ask your hosting provider to disable Suhosin extension for bridge.php
                        or set suhosin.request.max_value_length equal 1048576 (currently ' . intval(ini_get('suhosin.request.max_value_length')) . ')
                 </td>';
    }

    $html .= '<tr><td>Default Login and Password Changed</td><td>'
          . (( $res = test_default_password_is_changed() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Change your login credentials in bridge.php to make your connection secure</td>';
    }

    $html .= '<tr><td><a href="http://php.net/manual/en/security.magicquotes.php" target="_blank">Magic Quotes GPC/Runtime</a> disabled</td><td>'
          . (( $res = test_magic_quotes() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Ask your hosting provider to disable Magic Quotes php extension</td>';
    }

    $html .= '<tr><td><a href="http://www.google.com/search?hl=en&q=post+multipart+form-data&aq=f&aqi=g2g-m8&aql=&oq=&gs_rfai=" target="_blank">Post (multipart/form-data)</a> Allowed</td><td>'
          . (( $res = test_post_to_self() ) ? TEST_YES : TEST_NO) . '</td>';

    if(!$res) {
        $html .= '<td>Method POST is not allowed. Please check your Apache configuration or contact your hosting provider to solve this problem.</td>';
    }

    if($limit_query_size) {
        $html .= '<tr><td>Size of database data at one query</td><td>'
            . $limit_query_size . 'Kb</td>';
    }

    $html .= '<tr><td>Check Default Timezone Set</td><td>'
        . ( (ini_get('date.timezone') != "") ? '<span style="color: #008000;">Ok</span> ('.date_default_timezone_get().')' : '<span style="color: #007000;">Ok</span> ('.date_default_timezone_get().')') . '</td>';

    $html .= '<tr><td><b>Database Permissions Check</b></td><td></td></tr>'
          . '<tr><td>Create Table</td><td>'
          . (( $res = test_create_table() ) ? TEST_OK : TEST_FAIL) . '</td>';

    if(!$res) {
        $html .= '<td>Error details: "' . $GLOBALS['testResult'] . '"</td>';
    }

    $html .= '<tr><td>Insert Data Row</td><td>'
          . (( $res = test_insert_row() ) ? TEST_OK : TEST_FAIL) . '</td>';

    if(!$res) {
        $html .= '<td>Error details: "' . $GLOBALS['testResult'] . '"</td>';
    }

    $html .= '<tr><td>Update Data Row</td><td>'
          . (( $res = test_update_row() ) ? TEST_OK : TEST_FAIL) . '</td>';

    if(!$res) {
        $html .= '<td>Error details: "' . $GLOBALS['testResult'] . '"</td>';
    }

    $html .= '<tr><td>Delete Data Row</td><td>'
          . (( $res = test_delete_row() ) ? TEST_OK : TEST_FAIL) . '</td>';

    if(!$res) {
        $html .= '<td>Error details: "' . $GLOBALS['testResult'] . '"</td>';
    }

    $html .= '<tr><td>Drop Table</td><td>'
          . (( $res = test_drop_table() ) ? TEST_OK : TEST_FAIL) . '</td>';

    if(!$res) {
        $html .= '<td>Error details: "' . $GLOBALS['testResult'] . '"</td>';
    }

    $html .= '</table><br /><br />'
//          . '<a href="' . getServerProtocol() . $_SERVER['SERVER_NAME'] . $_SERVER["SCRIPT_NAME"] . '?phpinfo">More information about your PHP configuration</a><br /><br />'
          . 'Log file path: ' . realpath(m1BridgeGetTempDir() . '/bridge_log.txt')
          . '<div style="font-size: 12px;">Type: ' . getCartType() . '</div>'
          . '<div style="margin-top: 15px; font-size: 13px;">PHP MySQL Bridge by <a href="http://emagicone.com" target="_blank" style="color: #15428B">eMagicOne</a></div>';
    echo $html;
}

function test_magic_quotes() {
    $test_magic_quotes_gpc      = true;
    $test_magic_quotes_runtime  = true;

    if(function_exists('get_magic_quotes_gpc')) {
        $test_magic_quotes_gpc =  !get_magic_quotes_gpc();
    }

    if(function_exists('get_magic_quotes_runtime')) {
        $test_magic_quotes_runtime =  !get_magic_quotes_runtime();
    }

    return $test_magic_quotes_gpc && $test_magic_quotes_runtime;
}

/**
 * Check if temporary dir is directory and is writable
 * @return bool
 */
function test_temp_directory() {
    $temp_dir = m1BridgeGetTempDir();
    $GLOBALS['testResult'] = $temp_dir;
    return (is_dir($temp_dir) && is_writable($temp_dir) && @dir($temp_dir)) && is_executable($temp_dir);
}

/**
 * Check if temporary dir disk has enough
 * @return bool
 */
function test_temp_free_space() {
    if(!function_exists('disk_free_space')) {
        return true;
    }
    $temp_dir = m1BridgeGetTempDir();
    $freespace = (int)(@disk_free_space($temp_dir)/1024/1024); // in MB
    $freespace = $freespace ? $freespace : true;

    $GLOBALS['testResult'] = $freespace;
    return $freespace > 0;
}

/**
 * Check if mod_security is not enabled
 * @return bool
 */
function test_apache_mod_security() {
    if(function_exists('apache_get_modules')) {
        $apache_modules = apache_get_modules();
        return !in_array('mod_security', $apache_modules);
    } else {
        return false;
    }
}

function test_is_cgi_mode() {
    if((function_exists('apache_get_modules') && apache_get_modules() == null) || (!function_exists('apache_get_modules'))) {
        return true;
    } else {
        return false;
    }
}

/**
 * Check if Suhosin Hardened-PHP security extension is loaded
 * @return unknown
 */
function test_suhosin_extension_loaded() {
    return intval(ini_get('suhosin.request.max_value_length')) > 1048576 || !extension_loaded('suhosin');
}

/**
 * Try to create table
 * Using post to self script
 * @return bool True if table created, false if not
 */
function test_create_table() {
    $result = st_post(array('sql' => 'CREATE TABLE `bridge_some_new_table` (`id_row` INT PRIMARY KEY AUTO_INCREMENT, `val` INT)'), 'task=put_sql&hash=' . st_gethash());
    $GLOBALS['testResult'] = $result;
    return trim($result) === '0';
}

/**
 * Try to insert data into table
 * Using post to self script
 * @return bool True if data inserted, false if not
 */
function test_insert_row() {
    $result = st_post(array('sql' => 'INSERT INTO `bridge_some_new_table` (`val`) VALUES (15)'), 'task=put_sql&hash=' . st_gethash());
    $GLOBALS['testResult'] = $result;
    return trim($result) === '0';
}

/**
 * Try to update data in table
 * Using post to self script
 * @return bool True if data updated, false if not
 */
function test_update_row() {
    $result = st_post(array('sql' => 'UPDATE `bridge_some_new_table` SET val = 21'), 'task=put_sql&hash=' . st_gethash());
    $GLOBALS['testResult'] = $result;
    return trim($result) === '0';
}

/**
 * Try to delete data from table
 * Using post to self script
 * @return bool True if data deleted, false if not
 */
function test_delete_row() {
    $result = st_post(array('sql' => 'DELETE FROM `bridge_some_new_table`'), 'task=put_sql&hash=' . st_gethash());
    $GLOBALS['testResult'] = $result;
    return trim($result) === '0';
}

/**
 * Try to drop table
 * Using post to self script
 * @return bool True if table dropped, false if not
 */
function test_drop_table() {
    $result = st_post(array('sql' => 'DROP TABLE `bridge_some_new_table`'), 'task=put_sql&hash=' . st_gethash());
    $GLOBALS['testResult'] = $result;
    return trim($result) === '0';
}

/**
 * Try to post request to self script
 * @return bool True if data successfully posted and response recieved, false if not
 */
function test_post_to_self() {
    $result = st_post(array(), 'task=test_post');
    return $result === TEST_POST_STRING;
}

function test_is_gz_avaliable() {
    return extension_loaded('zlib');
}

/**
 * Check ifdefault password was changed to another one
 * @return bool True if login or password defer with default
 */
function test_default_password_is_changed() {
    return ! ( $GLOBALS['username'] == '1' && $GLOBALS['password'] == '1' );
}

/**
 * Get auth hash
 * @return string MD5 encoded hash key
 */
function st_gethash() {
    return md5($GLOBALS['username'].$GLOBALS['password']);
}

/**
 * Send multipart post to current script
 *
 * @param array $data POST parameters
 * @param string $params GET parameters
 * @return string Response string
 */

function st_post($data, $params) {
    $user_agent = "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6";

    // Check for active SSL connection
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $ch = curl_init('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?' . $params);
        if ($_SERVER['SERVER_PORT'] != 80) {
            curl_setopt($ch, CURLOPT_PORT, $_SERVER['SERVER_PORT']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
    } else {
        $ch = curl_init('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?' . $params);
    }

    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $postResult = curl_exec($ch);
    curl_close($ch);
    return $postResult;
}

// Andriy Prudyus
function get_ftp_files($path, $mask, $ignore_dir) {
    global $all_files;

    $skip = array('.', '..');
    $arr_ignore_dir = explode(';', $ignore_dir);

    if ($fp = opendir($path)) {
        while (false !== ($value = readdir($fp))) {
            $item = "$path/$value";

            if (is_file($item)) {
                if (glob("$path/$mask")) {
                    $all_files[] = $item;
                }
            } elseif (!(in_array($value, $skip)) && is_dir($item) && !(in_array($item, $arr_ignore_dir))) {
                    get_ftp_files($item, $mask, $ignore_dir);
            }
        }

        closedir($fp);
    }

    return is_array($all_files) ? '1|' . json_encode($all_files, JSON_FORCE_OBJECT) : '0|';
}

function get_file_list($searchPath) {
    global $allow_compression, $temporary_dir;

    if (empty($searchPath)) {
        generateJsonResponse(array(KEY_MESSAGE => 'Parameter search_path is incorrect'), true);
    }

    $filePathTxt = $temporary_dir . '/' . FILE_NAME_FILE_LIST . '.txt';
    $filePathGz = $temporary_dir . '/' . FILE_NAME_FILE_LIST . '.gz';
    $filePathFinal = $filePathTxt;

    $includeMask            = isset($_REQUEST['include_mask']) ? $_REQUEST['include_mask'] : '';
    $excludeMask            = isset($_REQUEST['exclude_mask']) ? $_REQUEST['exclude_mask'] : '';
//    $includeRegexp          = !empty($_REQUEST['include_regexp']) ? '\\' . $_REQUEST['include_regexp'] . '\\' : '';
    $includeRegexp          = !empty($_REQUEST['include_regexp']) ? $_REQUEST['include_regexp'] : '';
//    $excludeRegexp          = !empty($_REQUEST['exclude_regexp']) ? '\\' . $_REQUEST['exclude_regexp'] . '\\' : '';
    $excludeRegexp          = !empty($_REQUEST['exclude_regexp']) ? $_REQUEST['exclude_regexp'] : '';
    $excludeDirectoryList   = isset($_REQUEST['exclude_dirs'])
        ? str_replace('\\', '/', $_REQUEST['exclude_dirs'])
        : '';
    $excludeDirectories     = !empty($excludeDirectoryList) ? explode(';', $excludeDirectoryList) : array();
    $excludeIsAbsolute      = strpos($excludeDirectoryList, '/') !== false;

    if (!empty($includeMask)) {
        $includeMask = '{' . str_replace(';', ',', $includeMask) . '}';
    }

    if (!empty($excludeMask)) {
        $excludeMask = '{' . str_replace(';', ',', $excludeMask) . '}';
    }

    if (file_exists($filePathGz)) {
        unlink($filePathGz);
    }

    $fileTmp = $temporary_dir . '/' . FILE_NAME_GET_FILE_LIST_TMP;
    $processId = md5(rand());
    setValueByKeyToFile($fileTmp, KEY_PROCESS_ID, $processId);

    // Init file
    file_put_contents($filePathTxt, '');

    recursiveScanFolder($fileTmp,
                        $processId,
                        $filePathTxt,
                        $searchPath,
                        $includeMask,
                        $excludeMask,
                        $includeRegexp,
                        $excludeRegexp,
                        isset($_REQUEST['include_subdir']) ? $_REQUEST['include_subdir'] == 1 : true,
                        $excludeDirectories,
                        $excludeIsAbsolute
    );

    if ($allow_compression) {
        $filePathFinal = $filePathGz;
        generateArchive($filePathTxt, $filePathFinal);
    }

//    generateJsonResponse(getDownloadableFileInfoJson($filePathFinal, $allow_compression));
    die(getDownloadableFileInfo($filePathFinal, $allow_compression));
}

function recursiveScanFolder (
    $fileTmp,
    $processId,
    $temporaryFileLocation,
    $searchPath,
    $includeMask,
    $excludeMask,
    $includeRegexp,
    $excludeRegexp,
    $includeSubDirectories,
    $excludeDirs = array(),
    $excludeIsAbsolute = true,
    $skipArray = array('.', '..')
) {
    if (getValueByKeyFromFile($fileTmp, KEY_PROCESS_ID) != $processId) {
        generateJsonResponse(array(KEY_MESSAGE => 'Another process has been run'), true);
    }

    if (!($objectPath = opendir($searchPath))) {
        return;
    }

    $files_processed = false;

    if (!empty($includeMask) || !empty($excludeMask)) {
        if (!empty($includeMask)) {
            $files = array_filter(glob("$searchPath/$includeMask", GLOB_BRACE), 'is_file');
        } else {
            $files = globNot($searchPath, $excludeMask, GLOB_BRACE);
        }

        for ($i = 0, $count = count($files); $i < $count; $i++) {
            file_put_contents($temporaryFileLocation, $files[$i] . "\r\n", FILE_APPEND);
        }

        $files_processed = true;

        if (!$includeSubDirectories) {
            return;
        }
    }

    while (($objectName = readdir($objectPath)) !== false) {
        $searchObjectPath = str_replace('\\', '/', "$searchPath/$objectName");

        if (is_file($searchObjectPath)) {
            if ($files_processed) {
                continue;
            }

            if (!empty($includeRegexp)) {
                if (preg_match($includeRegexp, $objectName)) {
                    file_put_contents($temporaryFileLocation, $searchObjectPath . "\r\n", FILE_APPEND);
                }

                continue;
            } elseif (!empty($excludeRegexp)) {
                if (!preg_match($excludeRegexp, $objectName)) {
                    file_put_contents($temporaryFileLocation, $searchObjectPath . "\r\n", FILE_APPEND);
                }

                continue;
            }

            file_put_contents($temporaryFileLocation, $searchObjectPath . "\r\n", FILE_APPEND);
        } elseif (is_dir($searchObjectPath)
                  && $includeSubDirectories
                  && ($excludeIsAbsolute ? !in_array($searchObjectPath, $excludeDirs) : !in_array($objectName, $excludeDirs))
                  && !in_array($objectName, $skipArray)) {

            recursiveScanFolder(
                $fileTmp,
                $processId,
                $temporaryFileLocation,
                $searchObjectPath,
                $includeMask,
                $excludeMask,
                $includeRegexp,
                $excludeRegexp,
                $includeSubDirectories,
                $excludeDirs,
                $excludeIsAbsolute,
                $skipArray
            );
        }
    }
}

function globNot($searchPath, $excludePattern, $globFlag = null)
{
    $allResults = array_filter(glob("$searchPath/*"), 'is_file');

    $differentResult = !empty($globFlag)
        ? array_filter(glob("$searchPath/$excludePattern", $globFlag), 'is_file')
        : array_filter(glob("$searchPath/$excludePattern"), 'is_file');

    return array_values(array_diff($allResults, $differentResult));
}

function generateJsonResponse($data, $isError = false) {
    if (!is_array($data)) {
        $data = array($data);
    }

    $data[KEY_RESPONSE_CODE] = $isError ? ERROR_CODE_COMMON : SUCCESSFUL;

    die(json_encode($data));
}

function generateArchive($fromFile, $toFile) {
    global $package_size, $compress_level;

    $fp_gz = gzopen($toFile, "wb{$compress_level}");
    $fp = fopen($fromFile, 'r');

    if ($fp_gz && $fp) {
        while (!feof($fp)) {
            $content = fread($fp, $package_size);
            gzwrite($fp_gz, $content);
        }

        fclose($fp);
        @unlink($fromFile);

        fclose($fp_gz);
    }
}

function getDownloadableFileInfo($file, $isCompressed) {
    global $package_size;

    $fileSize = filesize($file);
    $divLastPart = $fileSize % $package_size;

    return "0\r\n" . ($isCompressed ? '1' : '0') . '|'
        . floor($divLastPart > 0 ? $fileSize / $package_size + 1 : $fileSize / $package_size)
        . "|$fileSize\r\n" . basename($file) . "\r\n" . md5_file($file);
}

function getDownloadableFileInfoJson($file, $isCompressed) {
    global $package_size;

    $fileSize = filesize($file);
    $divLastPart = $fileSize % $package_size;

    return array(
        KEY_IS_COMPRESSED => $isCompressed ? 1 : 0,
        KEY_FILE_SIZE => $fileSize,
        KEY_PARTS_COUNT => floor($divLastPart > 0 ? $fileSize / $package_size + 1 : $fileSize / $package_size),
        KEY_CHECKSUM => md5_file($file),
        KEY_FILE_NAME => basename($file)
    );
}

function get_cart_version() {
    global $g_iCartType;

    // Magento 1
    if ($g_iCartType == 3) {
        require_once 'app/Mage.php';
        return '1|' . Mage::getVersion();
    } elseif ($g_iCartType == 10) { // Magento 2
        $composer_data = json_decode('[' . file_get_contents('./composer.json') . ']', true);

        if ($composer_data && !empty($composer_data[0]['version'])) {
            return '1|' . $composer_data[0]['version'];
        }

        return '0|';
    }

    return '0|';
}

function check_data_changes($table_name) {
    global $db_link, $errors;

    if (!$table_name) {
        generate_error($errors['invalid_parameters']);
    }

    $arr_result = array();
    $obj = new cMySQLBackUp();
    $obj->rLink = $db_link;
    $arr_tables = explode(';', base64_decode($table_name));

    foreach ($arr_tables as $table) {
        if (trim($table) != '') {
            try {
                $query = "SELECT `AUTO_INCREMENT` AS 'auto_increment'
                            FROM INFORMATION_SCHEMA.TABLES
                            WHERE TABLE_SCHEMA = '" . DB_DATABASE . "'
                            AND TABLE_NAME = '" . $table . "'";
                $result = $db_link->query($query);
                $res = $db_link->results($result, 'ASSOC');

                if ($res === false) {
                    continue;
                }

                if (!is_null($res['auto_increment'])) {
                    $arr_result[$table] = $res['auto_increment'] - 1;
                } else {
                    $query = "SELECT
                                    `COLUMN_NAME` AS 'primary_key' INTO @primary_key_field
                                FROM
                                    `information_schema`.`COLUMNS`
                                WHERE
                                    (`TABLE_SCHEMA` = '" . DB_DATABASE . "')
                                        AND (`TABLE_NAME` = '" . $table . "')
                                        AND (`COLUMN_KEY` = 'PRI')";
                    $db_link->query($query);
                    $query = "SET @s = CONCAT('SELECT MAX(', @primary_key_field, ') AS max_id FROM " . $table . "')";
                    $db_link->query($query);
                    $query = "PREPARE stmt FROM @s";
                    $db_link->query($query);
                    $query = "EXECUTE stmt;";
                    $result = $db_link->query($query);
                    $res = $db_link->results($result, 'ASSOC');
                    $arr_result[$table] = $res['max_id'];
                }
            } catch (Exception $e) {
                return '0|' . $e->getMessage();
            }
        }
    }

    return "1|" . base64_encode(json_encode($arr_result));
}

function get_new_orders($order_id) {
    global $db_link, $g_iCartType, $errors;

    $order_id = (int)$order_id;

    if ($order_id < 1) {
        generate_error($errors['invalid_parameters']);
    }

    $obj = new cMySQLBackUp();
    $obj->rLink = $db_link;
    $order_info = array();

    if ($g_iCartType == MAGENTO_1) {    // Magento
        try {
            // Select new order count
            $query = "SELECT COUNT(entity_id) AS CountNewOrder FROM " . DB_TABLE_PREFIX . "sales_flat_order WHERE entity_id > " . $order_id;
            $result = $db_link->query($query);
            $count_new_orders = array_shift($db_link->results($result, 'ASSOC'));

            // Select maximum order id
            $query = "SELECT  MAX(entity_id) AS MaxOrderId FROM " . DB_TABLE_PREFIX . "sales_flat_order";
            $result = $db_link->query($query);
            $max_order_id = array_shift($db_link->results($result, 'ASSOC'));

            // Select new orders
            $query = "SELECT main_table.entity_id AS order_id,
                            main_table.customer_id AS customer_id,
                            main_table.grand_total AS grand_total,
                            main_table.total_paid AS total_paid,
                            main_table.order_currency_code AS order_currency_code,
                            table_order_firstname.value AS firstname,
                            table_order_lastname.value AS lastname
                     FROM " . DB_TABLE_PREFIX . "sales_flat_order AS main_table
                        LEFT JOIN " . DB_TABLE_PREFIX . "eav_entity_type AS et ON entity_type_code = 'customer'
                        LEFT JOIN " . DB_TABLE_PREFIX . "eav_attribute AS attr_firstname ON attr_firstname.entity_type_id = et.entity_type_id AND attr_firstname.attribute_code = 'firstname'
                        LEFT JOIN " . DB_TABLE_PREFIX . "eav_attribute AS attr_lastname ON attr_lastname.entity_type_id = et.entity_type_id AND attr_lastname.attribute_code = 'lastname'
                        LEFT JOIN " . DB_TABLE_PREFIX . "customer_entity_varchar AS table_order_firstname ON main_table.customer_id = table_order_firstname.entity_id AND table_order_firstname.attribute_id = attr_firstname.attribute_id
                        LEFT JOIN " . DB_TABLE_PREFIX . "customer_entity_varchar AS table_order_lastname ON main_table.customer_id = table_order_lastname.entity_id AND table_order_lastname.attribute_id = attr_lastname.attribute_id
                     WHERE main_table.entity_id > " . $order_id;
            $result = $db_link->query($query);

            while ($order = $db_link->results($result, 'ASSOC')) {
                $order_info[] = $order;
            }

            $arr_result = array('CountNewOrder' => $count_new_orders, 'MaxOrderId' => $max_order_id, 'OrderInfo' => $order_info);
        } catch (Exception $e) {
            return '0|' . $e->getMessage();
        }

        return '1|' . base64_encode(json_encode($arr_result));
    }
}

/**
 *! @class dbConn
 *  @abstract Proxy for all available MySQL class methods
 *  @discussion Utilizes PDO/mysqli/mysql class extenders by degrading
 *              gracefully to any available method bsed on system configuration
 */
class dbConn {
    /**
     *! @var instance object - class singleton object
     */
    protected static $instance;

    /**
     *! @var flag string - used to determine class method
     */
    private $flag='0x001';

    /**
     *! @var dbconn object - MySQL handle object
     */
    public $dbconn;

    /**
     *! @function __construct
     *  @abstract Provides MySQL object based on system configuration for accessing
     *            PDO, MySQLi or MySQL access methods
     *  @param configuration array - Server address, username, password, database
     */
    private function __construct($configuration) {
        $this->flag = $this->decide($this->flag);
        switch($this->flag) {
            case '0x001':
                $this->dbconn = new pdoMySQL($configuration);
                return $this->dbconn;
            case '0x002':
                $this->dbconn = new dbMySQLi($configuration);
                return $this->dbconn;
            case '0x003':
                $this->dbconn = new dbMySQL($configuration);
                return $this->dbconn;
            default:
                trigger_error('The MySQL extensions are not loaded.', E_USER_ERROR);
                unset($instance);
                exit;
        }
    }

    /**
     *! @function decide
     *  @abstract Determines best method for MySQL functionality
     *  @return flag string - Used to call appropriate class extension
     */
    private function decide() {
        global $database_extension; // 'auto' or 'pdo' or 'mysqli' or 'mysql'

        if($database_extension == 'pdo') {
            $this->flag = '0x001';

        } elseif($database_extension == 'mysqli') {
            $this->flag = '0x002';

        } elseif($database_extension == 'mysql') {
            $this->flag = '0x003';

        } else {
            if(@class_exists('PDO')) {
                $pdo_drivers = @PDO::getAvailableDrivers();
                if(!empty($pdo_drivers)) {
                    $this->flag = '0x001';
                } elseif (@class_exists('mysqli')) {
                    $this->flag = '0x002';
                } else {
                    $this->flag = '0x003';
                }
            } elseif (@class_exists('mysqli')) {
                $this->flag = '0x002';
            } else {
                $this->flag = '0x003';
            }
        }
        $GLOBALS['db_flag'] = $this->flag;
        return $this->flag;
    }

    /**
     *! @function instance
     *  @abstract Creates non-deserializing, non-cloneable instance object
     *  @param configuration array - server, username, password, database
     *  @return Singleton - Singleton object
     */
    public static function instance($configuration) {
        if (!isset(self::$instance)  || (!is_null(self::$instance)) ) {
            $c = __CLASS__;
            self::$instance = new self($configuration);
        }
        return self::$instance;
    }

    /**
     *! @function query
     *  @abstract Proxy like class interface for PDO, MySQLi or MySQL class
     *            extensions
     *  @param query string - SQL query string
     *  @return object - Last query handle
     */
    public function query($query) {
        return $this->dbconn->query($query);
    }

    /**
     *! @function sanitize
     *  @abstract Proxy like class interface for string sanitation
     *  @param string string - Dynamic variable(s) used in SQL statement
     *  @return string - Sanitized version of $string
     */
    public function sanitize($string) {
        return $this->dbconn->sanitize($string);
    }

    /**
     *! @function results
     *  @abstract Proxy like class interface for associative array results
     *  @param link object - Object handle of query
     *  @return array - Associative array of results
     */
    public function results($link, $type) {
        return $this->dbconn->results($link, $type);
    }

    /**
     *! @function affected
     *  @abstract Proxy like class interface for checking number of rows affected
     *  @param link object - Object handle of query
     *  @return int - Number of rows affected
     */
    public function affected($link) {
        return $this->dbconn->affected($link);
    }

    public function num_rows($result) {
        return $this->dbconn->num_rows($result);
    }

    public function free_result($result){
        return $this->dbconn->free_result($result);
    }

    /**
     *! @function error
     *  @abstract Proxy like class interface for error messages
     *  @param link object - Object handle of query
     *  @return string - Error message returned
     */
    public function error($link) {
        return $this->dbconn->error($link);
    }


    /**
     *! @function close
     *  @abstract Proxy like class interface for close connection
     *  @return string - Result
     */
    public function close($link) {
        return $this->dbconn->close($link);
    }

    /**
     *! @function __clone
     *  @abstract Prevent cloning of singleton object
     */
    public function __clone() {
        trigger_error('Cloning prohibited', E_USER_ERROR);
    }

    /**
     *! @function __wakeup
     *  @abstract Prevent deserialization of singleton object
     */
    public function __wakeup() {
        trigger_error('Deserialization of singleton prohibited ...', E_USER_ERROR);
    }
}

/**
 *! @class pdoMySQL
 *  @abstract Extends class dbConn for PDO MySQL functionality
 *  @discussion Utilizes PDO for MySQL database access, queries, results etc
 */
class pdoMySQL extends dbConn {

    /**
     *! @var dbconn object - class singleton object
     */
    public $dbconn;

    /**
     *! @var configuration array - server, username, password, database
     */
    private $configuration;

    /**
     *! @function __construct
     *  @abstract Creates new PDO link based on configured credentials
     *  @param configuration array - server, username, password, database
     *  @return object - PDO link resource
     */
    public function __construct($configuration) {
        if(defined('SERVER_DB_SOCKET') && SERVER_DB_SOCKET != '')
            $configuration['hostname'] =  SERVER_DB_SOCKET;
        else
        {
            $hostname = explode(":", $configuration['hostname']);
            $configuration['hostname'] = $hostname[0];
            $configuration['port'] = isset($hostname[1]) ? $hostname[1] : '';
        }

        $this->configuration = $configuration;
        $this->dbconn = new PDO($this->createdsn($configuration),
            $configuration['username'],
            $configuration['password']);

        // DEBUG
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbconn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $this->dbconn;
    }

    /**
     *! @function createdsn
     *  @abstract Format configuration settings into valid DSN for PDO connection
     *  @param settings array - server, username, passsword, database
     *  @return string - Valid PDO DSN connection string
     */
    private function createdsn($settings) {
        if (strval($settings['socket']) != "") {
            return 'mysql:unix_socket='.$settings['socket'].';dbname='.$settings['database'];
        } elseif (strval($settings['port']) != "") {
            return 'mysql:host='.$settings['hostname'].';port='.$settings['port'].';dbname='.$settings['database'];
        } else {
            return 'mysql:host='.$settings['hostname'].';dbname='.$settings['database'];
        }
    }

    /**
     *! @function query
     *  @abstract Handles PDO queries
     *  @param query string - SQL statement
     *  @return object - Returns SQL object
     */
    public function query($query) {
        return $this->dbconn->query($query);
    }

    /**
     *! @function sanitize
     *  @abstract Sanitizes dynamic variables in SQL statement
     *  @param string string - String or Integer variables
     *  @return string - Returns sanitized variable
     */
    public function sanitize($string) {
        $result = $this->dbconn->quote($string);
        if ($result[0] == '\'') $result = substr($result,1);
        if ($result[strlen($result)-1] == '\'') $result = substr($result,0,strlen($result)-1);

        return $result;
    }

    /**
     *! @function results
     *  @abstract Returns PDO associative array from last SQL statement
     *  @param link object - Object handle of last query
     *  @return array - Associative array
     */
    public function results($link, $type) {

        switch ($type) {
            case 'ASSOC':
                $result = $link->fetch(PDO::FETCH_ASSOC);
                break;
            case 'NUM':
                $result = $link->fetch(PDO::FETCH_NUM);
                break;
            case 'ROW':
                $result = $link->fetch(PDO::FETCH_NUM);
                break;
        }
        return $result;


        // return $link->fetch(PDO::FETCH_ASSOC);
//        return $link->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *! @function affected
     *  @abstract Handle affected amount of rows on last SQL statement
     *  @param link object - Object handle of query
     *  @return int - Number of affected rows
     */
    public function affected($link) {
        return $link->rowCount();
    }


    public function num_rows($result)
    {
        // $res = $link->query("SELECT COUNT(*) FROM {$table}");
        return $result->rowCount();;
    }

    public function free_result($result){
        return $result->closeCursor();
    }

    /**
     *! @function error
     *  @abstract Return error message from last SQL statement
     *  @param link object - Object handle of query
     *  @return string - Error message returned
     */
    public function error($link) {

        return $link->errorInfo();
    }

    /**
     *! @function index
     *  @abstract Executed upon destruction of class instance to perform
     *            repair, optimize and flush commands on each table in database
     *  @param link object - Object handle of connection
     *  @param database string - Database name
     */
    public function index($link, $database) {
        $obj = $link->query('SHOW TABLES');
        $results = $this->results($obj, 'ASSOC');
        foreach($results as $key => $value) {
            if (isset($value['Tables_in_'.$database])) {
                $this->query('REPAIR TABLE '.$value['Tables_in_'.$database]);
                $this->query('OPTIMIZE TABLE '.$value['Tables_in_'.$database]);
                $this->query('FLUSH TABLE '.$value['Tables_in_'.$database]);
            }
        }
    }

    public function close($link) {
        try {
            $this->dbconn = null;
        } catch (Exception $e) {
            return 0;
        }
        return 1;
    }

    /**
     *! @function __clone
     *  @abstract Prevent cloning of singleton object
     */
    public function __clone() {
        trigger_error('Cloning prohibited', E_USER_ERROR);
    }

    /**
     *! @function __wakeup
     *  @abstract Prevent deserialization of singleton object
     */
    public function __wakeup() {
        trigger_error('Deserialization of singleton prohibited ...', E_USER_ERROR);
    }

    /**
     *! @function __destruct
     *  @abstract Release database handle and perform index functionality
     */
    public function __destruct() {
        //$this->index($this->dbconn, $this->configuration['database']);
        $this->dbconn = null;
    }
}

/**
 *! @class dbMySQLi
 *  @abstract Extends class dbConn for MySQLi functionality
 *  @discussion Utilizes MySQLi for database access, queries, results etc
 */
class dbMySQLi extends dbConn {

    /**
     *! @var dbconn object - class singleton object
     */
    public $dbconn;

    /**
     *! @var configuration array - server, username, password, database
     */
    private $configuration;

    /**
     *! @function __construct
     *  @abstract Creates new MySQLi link based on configured credentials
     *  @param configuration array - server, username, password, database
     *  @return object - MySQLi link resource
     */
    public function __construct($configuration) {
        $hostname = explode(":", $configuration['hostname']);
        $configuration['hostname'] = $hostname[0];
        $configuration['port'] = isset($hostname[1]) ? $hostname[1] : '';
        $configuration['socket'] = isset($configuration['socket']) ? $configuration['socket'] : '';

        $this->configuration = $configuration;

        if (!empty($configuration['port']) || !empty($configuration['socket']) && !empty($configuration['socket']))
            $this->dbconn = mysqli_connect(
                $configuration['hostname'],
                $configuration['username'],
                $configuration['password'],
                $configuration['database'],
                $configuration['port'],
                $configuration['socket']
            );
        elseif (!empty($configuration['port']))
            $this->dbconn = mysqli_connect(
                $configuration['hostname'],
                $configuration['username'],
                $configuration['password'],
                $configuration['database'],
                $configuration['port']
            );
        else
            $this->dbconn = mysqli_connect(
                $configuration['hostname'],
                $configuration['username'],
                $configuration['password'],
                $configuration['database']
            );

//        $this->dbconn = new mysqli($configuration['hostname'],
//        $this->dbconn = mysqli_connect($configuration['hostname'],
//            $configuration['username'],
//            $configuration['password'],
//            $configuration['database'],
//            $configuration['port'],
//            $configuration['socket']);
        return $this->dbconn;
    }

    /**
     *! @function query
     *  @abstract Handles MySQLi queries
     *  @param query string - SQL statement
     *  @return object - Returns SQL object
     */
    public function query($query) {
//        global $db_link;
//        return $this->dbconn->query($query);
        return mysqli_query($this->dbconn, $query);
    }

    /**
     *! @function sanitize
     *  @abstract Sanitizes dynamic variables in SQL statement
     *  @param string string - String or Integer variables
     *  @return string - Returns sanitized variable
     */
    public function sanitize($string) {
        return $this->dbconn->real_escape_string($string);
    }

    /**
     *! @function results
     *  @abstract Returns associative array from last SQL statement
     *  @param link object - Object handle of last query
     *  @return array - Associative array
     */
    public function results($link, $type) {
        switch ($type) {
            case 'ASSOC':
                $result = mysqli_fetch_assoc($link);
                break;
            case 'NUM':
                $result = mysqli_fetch_array($link, MYSQLI_NUM);
                break;
            case 'ROW':
                $result = mysqli_fetch_row($link);
                break;
        }
        return $result;
//        return $link->fetch_assoc();

//        $z = array();
//        while ($y = $link->fetch_array(MYSQLI_ASSOC)) {
//            $z[] = $y;
//        }
//        return $z;
    }

    /**
     *! @function affected
     *  @abstract Handle affected amount of rows on last SQL statement
     *  @param link object - Object handle of query
     *  @return int - Number of affected rows
     */
    public function affected($link) {
        return $this->dbconn->affected_rows;
    }

    public function num_rows($result)
    {
        return mysqli_num_rows($result);
        // $res = $link->query('SELECT COUNT(*) FROM table');
//        return 0;
    }

    public function free_result($result){
        return true;
    }

    /**
     *! @function error
     *  @abstract Return error message from last SQL statement
     *  @param link object - Object handle of query
     *  @return string - Error message returned
     */
    public function error($link) {
        return $this->dbconn->error;
    }

    /**
     *! @function index
     *  @abstract Executed upon destruction of class instance to perform
     *            repair, optimize and flush commands on each table in database
     *  @param link object - Object handle of connection
     *  @param database string - Database name
     */
    public function index($link, $database) {
        $obj = $link->query('SHOW TABLES');
        $results = $this->results($obj, 'ASSOC');
        foreach($results as $key => $value) {
            if (isset($value['Tables_in_'.$database])) {
                $this->query('REPAIR TABLE '.$value['Tables_in_'.$database]);
                $this->query('OPTIMIZE TABLE '.$value['Tables_in_'.$database]);
                $this->query('FLUSH TABLE '.$value['Tables_in_'.$database]);
            }
        }
    }

    /**
     *! @function __clone
     *  @abstract Prevent cloning of singleton object
     */
    public function __clone() {
        trigger_error('Cloning prohibited', E_USER_ERROR);
    }

    /**
     *! @function __wakeup
     *  @abstract Prevent deserialization of singleton object
     */
    public function __wakeup() {
        trigger_error('Deserialization of singleton prohibited ...', E_USER_ERROR);
    }

    /**
     *! @function __destruct
     *  @abstract Release database handle and perform index functionality
     */
    public function __destruct()
    {
        global $is_reconnect, $db_link;
        //$this->index($this->dbconn, $this->configuration['database']);
        if ($is_reconnect !== true) {
            mysqli_close($this->dbconn);
//            $this->dbconn->close();
        }
    }
}

/**
 *! @class dbMySQL
 *  @abstract Extends class dbConn for standard MySQL functionality
 *  @discussion Utilizes MySQL for database access, queries, results etc
 */
class dbMySQL extends dbConn
{

    /**
     *! @var dbconn object - class singleton object
     */
    public $dbconn;

    /**
     *! @var configuration array - server, username, password, database
     */
    private $configuration,$persistent;

    /**
     *! @function __construct
     *  @abstract Creates new MySQL link based on configured credentials
     *  @param configuration array - server, username, password, database
     *  @return object - MySQL link resource
     */
    public function __construct($configuration)
    {
        $this->configuration = $configuration;

        if(defined('SERVER_DB_SOCKET') && SERVER_DB_SOCKET != "") {
            $configuration['hostname'] .=  ":" . SERVER_DB_SOCKET;
        }
//            try {
            if($allow_pconnect = ini_get("mysql.allow_persistent") && function_exists('mysql_pconnect')) {
                $this->persistent = true;
                $this->dbconn = mysql_pconnect($configuration['hostname'], $configuration['username'], $configuration['password']);
            } else {
                $this->persistent = false;
                $this->dbconn = mysql_connect($configuration['hostname'], $configuration['username'], $configuration['password']);
            }
//        } catch (ErrorException $e) {
//                $m = 0;
//            }
        return mysql_select_db($configuration['database'], $this->dbconn);
    }

    /**
     *! @function query
     *  @abstract Handles MySQLi queries
     *  @param query string - SQL statement
     *  @return object - Returns SQL object
     */
    public function query($query)
    {
//        return $this->rLink->query($query);
        return mysql_query($query);
    }

    /**
     *! @function sanitize
     *  @abstract Sanitizes dynamic variables in SQL statement
     *  @param string string - String or Integer variables
     *  @return string - Returns sanitized variable
     */
    public function sanitize($string)
    {
        return mysql_real_escape_string($string);
    }

    /**
     *! @function results
     *  @abstract Returns associative array from last SQL statement
     *  @param link object - Object handle of last query
     *  @return array - Associative array
     */
    public function results($link, $type)
    {
        switch ($type) {
            case 'ASSOC':
                $result = mysql_fetch_assoc($link);
                break;
            case 'NUM':
                $result = mysql_fetch_array($link, MYSQL_NUM);
                break;
            case 'ROW':
                $result = mysql_fetch_row($link);
                break;
        }
        return $result;

    }

    /**
     *! @function affected
     *  @abstract Handle affected amount of rows on last SQL statement
     *  @param link object - Object handle of query
     *  @return int - Number of affected rows
     */
    public function affected($link)
    {
        return mysql_affected_rows();
    }


    public function num_rows($result)
    {
        return mysql_num_rows($result);
    }

    public function free_result($result){
        return mysql_free_result($result);
    }

    /**
     *! @function error
     *  @abstract Return error message from last SQL statement
     *  @param link object - Object handle of query
     *  @return string - Error message returned
     */
    public function error($link)
    {
        return mysql_error();
    }

    /**
     *! @function close
     *  @abstract Closes the database connection
     *  @param link object - Object handle of connection
     *  @return boolean - Results of close
     */
    public function close($link)
    {
        if($this->persistent) {
            if(is_null($link)){
                $result = mysql_close();
            } else $result = mysql_close($link);
        } else $result = true;

        if($result){
            $this->dbconn = null;
        }
        return $result;
    }

    /**
     *! @function index
     *  @abstract Executed upon destruction of class instance to perform
     *            repair, optimize and flush commands on each table in database
     *  @param link object - Object handle of connection
     *  @param database string - Database name
     */
    public function index($link, $database)
    {
        $obj = $this->query('SHOW TABLES');
        $results = $this->results($obj, 'ASSOC');
        foreach($results as $key => $value) {
            if (isset($value['Tables_in_'.$database])) {
                $this->query('REPAIR TABLE '.$value['Tables_in_'.$database]);
                $this->query('OPTIMIZE TABLE '.$value['Tables_in_'.$database]);
                $this->query('FLUSH TABLE '.$value['Tables_in_'.$database]);
            }
        }
    }

    /**
     *! @function __clone
     *  @abstract Prevent cloning of singleton object
     */
    public function __clone() {
        trigger_error('Cloning prohibited', E_USER_ERROR);
    }

    /**
     *! @function __wakeup
     *  @abstract Prevent deserialization of singleton object
     */
    public function __wakeup() {
        trigger_error('Deserialization of singleton prohibited ...', E_USER_ERROR);
    }

    /**
     *! @function __destruct
     *  @abstract Release database handle and perform index functionality
     */
    public function __destruct()
    {
        global $is_reconnect;
        //$this->index($this->dbconn, $this->configuration['database']);
        if ($is_reconnect !== true) {
            $this->close($this->dbconn);
        }
    }
}
