<?php

abstract class Robo47_Widget_BaseWidget extends WP_Widget {

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        foreach ($this->widget_additional_options() as $option => $description) {
            $instance[$option] = strip_tags($new_instance[$option]);
        }
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        foreach ($this->widget_additional_options() as $option => $description) {
            $value = '';
            if (isset($instance[$option])) {
                $value = $instance[$option];
            }
            $fieldid = $this->get_field_id($option);
            $fieldname = $this->get_field_name($option);
            $label = _e($option);
            echo <<<EOT
<p>
    <label for="{$fieldid}">{$label}</label>
    <input class="widefat" id="{$fieldid}" name="{$fieldname}" type="text" value="{$value}" />
</p>
EOT;
        }
    }

    /**
     * @param string $username
     * @param integer $count [currently unused]
     * @param integer $cachetime
     * @return string 
     */
    public function fetchSensioProfileData($username, $cachetime = 500) {
        try {
            $profile = get_transient(R47SENSIOCONNECT_TRANSIENT_PREFIX . $username. '_' . $cachetime);
            if (!$profile) {
                $scp = new Robo47_Wordpress_SensioConnect();
                $profile = $scp->fetchSensioProfile($username);
                set_transient(R47SENSIOCONNECT_TRANSIENT_PREFIX . $username. '_' . $cachetime, $profile, $cachetime);
            }
        } catch (Exception $e) {
            // ignore anything - just return empty string - we are doing frontend stuff! :)
            return '';
        }
        return $profile;
    }

    /**
     * @return array
     */
    abstract function widget_additional_options();
}