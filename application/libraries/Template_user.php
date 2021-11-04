<?php

class Template_user
{

    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }
    function load($template_user = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI = &get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template_user, $this->template_data, $return);
    }
}
