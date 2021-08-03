<?php

class Validator {
    public function validate($data, $rules) {
        foreach($data as $key => $value){
            foreach ($rules[$key] as $rule){
                $isValid = $rule->isValid($value);
                if (!$isValid) {
                    $message = $rule->message($key);
                    echo $message . "<br/>";
                }
            }
        }
    }
}

new ErrorHandler();

function debug($array){
    echo "<pre>" . print_r($array, true) . "</pre>";
}
