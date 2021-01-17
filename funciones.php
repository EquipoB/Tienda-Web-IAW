<?php

function chgvar ($variable) {

    str_replace(",", ".", $variable);
    return $variable;

}