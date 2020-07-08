<?php

namespace Core\Views;

use Core\View;

class Form extends View
{
    public function render(string $template_path = ROOT . '/core/templates/form.tpl.php')
    {
        return parent::render($template_path);
    }

    /**
     * Validate form based on field validators
     *
     * @return boolean
     */
    public function validate(): bool
    {
        $is_valid = true;

        if (!$this->isSubmitted()) {
            return false;
        }

        $form_values = $this->getSubmitData();

        foreach ($this->data['fields'] as $field_id => &$field) {
            $field['value'] = $form_values[$field_id];

            foreach ($field['validators'] ?? [] as $validator_key => $validator) {
                if (is_array($validator)) {
                    $validator_function = $validator_key;
                    $params = $validator;
                } else {
                    $validator_function = $validator;
                }

                $field_is_valid = $validator_function($field['value'], $field, $params ?? null);
                if (!$field_is_valid) {
                    $is_valid = false;
                    break;
                }
            }
        }

        if ($is_valid) {
            foreach ($this->data['validators'] ?? [] as $key => $validator) {
                if (is_array($validator)) {
                    $validator_function = $key;
                    $params = $validator;
                } else {
                    $validator_function = $validator;
                }
                $form_is_valid = $validator_function($form_values, $this->data, $params ?? null);

                if (!$form_is_valid) {
                    $is_valid = false;
                    break;
                }
            }
        }

        if ($is_valid) {
            if (isset($this->data['callbacks']['success'])) {
                $this->data['callbacks']['success']($this->data, $form_values);
            }
        } else {
            if (isset($this->data['callbacks']['fail'])) {
                $this->data['callbacks']['fail']($this->data, $form_values);
            }
        }

        return $is_valid;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isSubmitted(): bool
    {
        if ($this->getSubmitData()) {
            return true;
        }
        return false;
    }

    /**
     * Undocumented function
     *
     * @param boolean $filter
     * @return array|null
     */
    public function getSubmitData(bool $filter = true): ?array
    {
        $field_indexes = array_keys($this->data['fields']);

        $params = [];

        foreach ($field_indexes as $field) {
            $params[$field] = $filter ? FILTER_SANITIZE_SPECIAL_CHARS : null;
        }
        return filter_input_array(INPUT_POST, $params);
    }
}
