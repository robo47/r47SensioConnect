<?php

class Robo47_Widget_SensioConnectProfileWidget extends Robo47_Widget_BaseWidget {

    function Robo47_Widget_SensioConnectProfileWidget($id_base = false, $name = 'r47SensioConnect Profile', $widget_additional_options = array(), $control_options = array()) {
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
        echo '<!-- r47SensioConnectProfile | ' . $username . ' cachetime: ' . $cachetime . ' -->';
        $profile = $this->fetchSensioProfileData($username, $cachetime);

        if ($profile) {
            echo <<<PROFILE

<style type="text/css">
    .rfourseven-sensioconnect-profile span { margin-left: 10px; display: block;}
    .rfourseven-sensioconnect-profile span.label { font-weight: bold; width: 90px; margin-left: 0;}
</style>
<div class="rfourseven-sensioconnect-profile">
<h3 class="widget-title">{$title}</h3>
   <span class="label">Username:</span>
       <span>{$profile['username']}</span><br />
   <span class="label">Name:</span>
       <span>{$profile['display_name']}</span><br />
   <span class="label">Company:</span>
       <span>{$profile['company']}</span><br />
   <span class="label">Country:</span>
       <span>{$profile['country']}</span><br />
   <span class="label">Biography:</span>
       <span>{$profile['biography']}</span><br />
</div>
PROFILE;
        }
        echo '<!-- /r47SensioConnectProfile -->';
    }

}
