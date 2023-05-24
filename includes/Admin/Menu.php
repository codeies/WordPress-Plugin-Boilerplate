<?php

namespace QuizBit\Admin;

/**
 * The Menu handler class
 */
class Menu
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    /**
     * Enqueue scripts and styles.
     *
     * @return void
     */
    public function admin_enqueue_scripts()
    {
        wp_enqueue_style('quizbit-style',  QUIZBIT_URL . '/build/index.css');
        wp_enqueue_script('quizbit-script', QUIZBIT_URL . '/build/index.js', array('wp-element'), '1.0.0', true);
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu()
    {
        add_menu_page(__('Quiz Bit', 'quizbit'), __('Quiz Bit', 'quizbit'), 'manage_options', 'quizbit', [$this, 'admin_page'], 'dashicons-admin-post', '2.1');
    }

    /**
     * Render the plugin page
     *
     * @return void
     */
    public function admin_page()
    {
        // echo QUIZBIT_VERSION;
        // echo "<br>";
        // echo QUIZBIT_FILE;
        // echo "<br>";
        // echo QUIZBIT_PATH;
        // echo "<br>";
        // echo QUIZBIT_URL;
        // echo "<br>";
        // echo QUIZBIT_ASSETS;
        // echo "<br>";
        //echo plugin_dir_url(__FILE__) . '/build/index.js';

        require_once QUIZBIT_PATH . '/template/app.php';
    }
}
