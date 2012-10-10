<?php

function create_form_input($name, $type='input', $options=array())
{   
    $options['name'] = $name;
    $options['value'] = set_value($name);
    
    if ($type == 'textarea')
    {
        $options['rows'] = '5';
        $options['cols'] = '75';
    }
    
    $form_error = form_error($name);
    if ($form_error)
    {
        $options['class'] = 'error';
    }

    $func = "form_$type";
    return $func($options) . " $form_error";
}

function set_selected($string)
{       
    if ($string == strtolower(uri_string()))
    {
        return "class='selected'";
    }
}
