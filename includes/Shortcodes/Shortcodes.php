<?php

namespace EventMaster\Shortcodes;

class Shortcodes
{

    private $shortcodes;

    public function __construct()
    {
        $this->shortcodes = array(
            'eventmaster-x-new-event' => array(
                'script' => 'newEvent/newEvent.bundle.js',
                'style' => 'newEvent.css'
            ),
            'eventmaster-x-add-user' => array(
                'script' => 'new-user/script.js',
                'style' => 'new-user/style.css'
            )
        );

        $this->register_shortcodes();
    }

    public function register_shortcodes()
    {
        foreach ($this->shortcodes as $shortcode => $attributes) {
            add_shortcode($shortcode, array($this, 'render_shortcode'));
        }
    }

    public function render_shortcode($atts, $content, $tag)
    {
        if (isset($this->shortcodes[$tag])) {
            $attributes = $this->shortcodes[$tag];

            wp_enqueue_script($tag . '-script', QUIZBIT_URL . '/dist/' . $attributes['script'], array('wp-element'), null, true);
            wp_enqueue_style($tag . '-style', QUIZBIT_URL . '/dist/' . $attributes['style']);
        }

        // Replace this with your actual shortcode content generation logic
        return '<div id="eventmaster"></div>';
    }
}
