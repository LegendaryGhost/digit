<?php

namespace Core\HTML;

class BootstrapForm extends Form {

    protected function surround($html) {
        return "<div class=\"form-group\">{$html}</div>";
    }

    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $required = isset($options['required']) ? ($options['required'] ? ' required ' : ' ') : ' required ';
        $label = '<label>' . $label . '</label>';
        if($type == 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control"' . $required . '>' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"' . $required . '>';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options) {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v) {
            $attributes = $k == $this->getValue($name) ? ' selected' : '';
            $input .= '<option value="' . $k . '"' . $attributes . '>' . $v . '</option >';
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function  submit($message = 'Envoyer') {
        return $this->surround('<button type="submit" class="btn btn-primary">' . $message . '</button>');
    }

}