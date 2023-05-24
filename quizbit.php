<?php

/**
 * Plugin Name:       QuizBit
 * Description:       A quiz making plugin for WordPress
 * Requires at least: 6.2
 * Requires PHP:      7.0
 * Version:           1.0
 * Author:            LII Lab
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       quizbit
 */


if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Quizbit
{

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }


    /**
     * Initializes a singleton instance
     *
     * @return \Quizbit
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('QUIZBIT_VERSION', self::version);
        define('QUIZBIT_FILE', __FILE__);
        define('QUIZBIT_PATH', __DIR__);
        define('QUIZBIT_URL', plugins_url('', QUIZBIT_FILE));
        define('QUIZBIT_ASSETS', QUIZBIT_URL . '/assets');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin()
    {

        if (is_admin()) {
            new QuizBit\Admin();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate()
    {
        $installed = get_option('quizbit_installed');

        if (!$installed) {
            update_option('quizbit_installed', time());
        }

        update_option('quizbit_version', QUIZBIT_VERSION);
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Quizbit
 */
function quizbit()
{
    return Quizbit::init();
}

// kick-off the plugin
quizbit();
