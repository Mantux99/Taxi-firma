<?php

/**
 *checking validate field is empty or not
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field): bool
{
    if (!$field_value) {
        $field['error'] = 'You left an empty field!';
        return false;
    } else {
        return true;
    }
}

/**
 * checking entered value is numeric
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_numeric($field_value, &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelis turi buti skaicius';
        return false;
    } else {
        return true;
    }
}

/**
 * checking entered value is an email
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_email($field_value, &$field): bool
{
    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'Field must be an email';
        return false;
    }

    return true;
}

/**
 * checking entered value doesn't contain a number, symbol or space
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_contains_only_letters($field_value, &$field): bool
{
    if (preg_match('/[\W\d]/', $field_value) > 0) {
        $field['error'] = 'Field cannot contain numbers, symbols and spaces';
        return false;
    }

    return true;
}


/**
 * checking entered value is not numeric
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_not_numeric($field_value, &$field): bool
{
    if (is_numeric($field_value)) {
        $field['error'] = 'Must be only alphabet letters!';
        return false;
    } else {
        return true;
    }
}

/**
 * checking age not les then 18 not greater 100
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_age_is_under_18($field_value, &$field): bool
{
    if ($field_value < 18 || $field_value > 100) {
        $field['error'] = 'Jūsų amžius netinkamas';
        return false;
    } else {
        return true;
    }
}

/**
 * check name has space between first and last names
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_name_has_space($field_value, &$field): bool
{
    if (!strpos(trim($field_value), " ")) {
        $field['error'] = 'Vardas ir pavardė turi būti atskirti tarpu';
        return false;
    } else {
        return true;
    }
}

/**
 * checking the number from 50 to 100
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_number_50_100($field_value, &$field): bool
{
    if ($field_value < 50 || $field_value > 100) {
        $field['error'] = 'Skaičius netinkamas!';
        return false;
    } else {
        return true;
    }
}

/**
 * Validate field number range
 *
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_range($field_value, array &$field, array $params): bool
{
    if ($field_value >= $params['min'] && $field_value <= $params['max']) {
        return true;
    } else {
        $field['error'] = "Netinkamas skaičius skaičius turi būti nuo {$params['min']} iki {$params['max']}";
        return false;
    }
}

/**
 * @param $field_value
 * @param array $field
 * @return bool
 */
function validate_field_has_upper_case($field_value, array &$field): bool
{
    if (!preg_match('/[A-Z]/', $field_value)) {
        $field['error'] = "Slaptažodyje turi būti Didžioji raidė";
        return false;
    }

    return true;
}
/**
 * checking the number from 100 to 200
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_number_100_200($field_value, &$field): bool
{
    if ($field_value < 100 || $field_value > 200) {
        $field['error'] = 'Skaičius netinkamas!';
        return false;
    } else {
        return true;
    }
}

/**
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_length($field_value, array &$field, array $params): bool
{
    if (isset($params['max']) && strlen($field_value) >= $params['max']) {
        $field['error'] = "Laukelis turi būti iki {$params['max']} simbolių";
        return false;
    }

    if (isset($params['min']) && strlen($field_value) <= $params['min']) {
        $field['error'] = "Laukelis turi būti nuo {$params['min']} simbolių";
        return false;
    }

    return true;
}

/**
 * validate_fields_match
 * @param  mixed $filtered_input
 * @param  mixed $form
 * @param  mixed $params
 * @return bool
 */
function validate_fields_match(array $filtered_input, array &$form, array $params): bool {
    foreach ($params as $field_id) {
        $reference_value = $reference_value ?? $filtered_input[$field_id];

        if ($reference_value !== $filtered_input[$field_id]) {
            $form['fields'][$field_id]['error'] = 'Fields does not match!';

            return false;
        }
    }

    return true;
}

/**
 * validate login
 *
 * @param  mixed $filtered_input
 * @param  mixed $form
 * @return void
 */
function validate_login(array $filtered_input, array &$form): bool {
    $user = App\App::$db->getRowWhere('users', ['email' => $filtered_input['email']]);

    if (!$user || !password_verify($filtered_input['password'], $user['password'])) {
        $form['fields']['password']['error'] = 'Neteisingas slaptažodis';
        return false;
    }

    return true;
}



/**
 * patikrina ar vartotojas prisijunges
 *
 * @param array $filtered_input
 * @param array $form
 * @return boolean
 */
function validate_is_logged_in(array $filtered_input, array &$form): bool {
    if (\App\App::$session->getUser()) {
        return true;
    }

    $form['message'] = 'Vartotojas neprisijungęs';
    return false;
}

/**
 *checking if user is logged in
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_user_logged_in($field_value, &$field): bool
{
    if (!App\App::$session->getUser()) {
        $field['error'] = 'You must be logged in to leave a comment';
        return false;
    }

    return true;
}