<?php

class Robo47_Widget_SensioConnectBadgesWidget extends Robo47_Widget_BaseWidget {

    function Robo47_Widget_SensioConnectBadgesWidget($id_base = false, $name = 'r47SensioConnect Badges', $widget_additional_options = array(), $control_options = array()) {
        // Instantiate the parent object
        $control_options = array_merge($control_options, $this->widget_additional_options());
        parent::__construct($id_base, $name, $widget_additional_options, $control_options);
    }

    /**
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance) {
        if (isset($instance['title'], $instance['username'], $instance['cachetime'])) {
            $this->render($instance['title'], $instance['username'], $instance['cachetime']);
        }
    }

    /**
     *
     * @return array
     */
    public function widget_additional_options() {
        return array('title' => 'Title', 'username' => 'Username', 'cachetime' => 'Cache Time');
    }

    /**
     *
     * @param string $title
     * @param string $username
     * @param integer $count
     * @param integer $cachetime
     */
    public function render($title, $username, $cachetime) {
        echo '<!-- r47SensioConnectBadges | ' . $username . ' cachetime: ' . $cachetime . ' -->';
        $profile = $this->fetchSensioProfileData($username, $cachetime);

        if (isset($profile['badges']) && count($profile['badges']) > 0) {
            echo '<div class="rfourseven-sensioconnect-badges">';
            echo '<h3 class="widget-title">' . $title . '</h3>';
            foreach ($profile['badges'] as $badge) {
                if (isset($badge['name']) && isset($badge['url']) && isset($badge['picture_url'])) {
                    echo <<<PROFILE
                <a style="float: left; margin-right: 10px; display: block; width: 80px; height: 130px;" href="{$badge['url']}">
                <img src="{$badge['picture_url']}" alt="{$badge['name']}"/>
                <div>{$badge['name']}</div>
                </a>
PROFILE;
                }
            }
            echo '</div>';
        }
        echo '<!-- /r47SensioConnectBadges -->';
    }

}