<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Form Value
 *
 * Grabs a value from the POST array for the specified field so you can
 * re-populate an input field or textarea.  If Form Validation
 * is active it retrieves the info from the validation class
 *
 * @access	public
 * @param	string
 * @param       array
 * @return	mixed
 */
if (!function_exists('set_value')) {

    function set_value($field = '', $default = '') {
        if (FALSE === ($OBJ = & _get_validation_object())) {
            if (!isset($_POST[$field])) {
                if (is_array($default)) {
                    for ($i = 0; $i < count($default); $i++) {
                        //If the last value of the array is null then us empty string otherwise
                        //use first value that is not null
                        if ($default[$i] === null && $i === count($default)) {
                            return $default = '';
                        } else {
                            return $default = $default[$i];
                        }
                    }
                } else {
                    if ($default !== null) {
                        return $default;
                    }
                    return $default = '';
                }
            }
            return form_prep($_POST[$field], $field);
        }
        return form_prep($OBJ->set_value($field, $default), $field);
    }

}