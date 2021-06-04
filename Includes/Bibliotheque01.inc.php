<?php

function formSelectDepuisRecordset($label, $name, $id, $tabIndex, $jeuEnregistrement, $selected = null) {
    $ligne = $jeuEnregistrement->fetch(PDO::FETCH_NUM);
    $options = '';

    if ($selected === null) {
        while ($ligne) {
            $options .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $jeuEnregistrement->fetch();
        }
    } else {
        while ($ligne) {
            $options .= '<option ' . ($ligne[0] == $selected ? 'selected="selected"' : '') . ' value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $jeuEnregistrement->fetch();
        }
    }

    return '<label for="' . $name . '">' . $label . ' :</label><br />' . "\n"
            . '<select name="' . $name . '" id="' . $id . '" tabindex="' . $tabIndex . '">' . "\n"
            . $options
            . '</select>' . "\n";
}

function formInputPassword($label, $name, $id, $value, $size, $maxLength, $tabIndex, $readonly, $required) {
    return '<label class="titre" for="' . $id . '">' . $label . ' :</label>' . "\n"
            . '<input type="password" class="zone" name="' . $name . '" id="' . $id . '" value="' . $value . '" size="' . $size . '" maxlength="' . $maxLength . '" tabindex="' . $tabIndex . '" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . '><br /><br />' . "\n";
}

function formInputText($label, $name, $id, $value, $size, $maxLength, $tabIndex, $readonly, $required) {
    return '<label class="titre" for="' . $id . '">' . $label . ' :</label>' . "\n"
            . '<input type="text" class="zone" name="' . $name . '" id="' . $id . '" value="' . $value . '" size="' . $size . '" maxlength="' . $maxLength . '" tabindex="' . $tabIndex . '" ' . ($readonly ? 'readonly="readonly"' : '') . ' ' . ($required ? 'required="required"' : '') . '><br /><br />' . "\n";
}

function formBoutonSubmit($name, $îd, $value, $tabindex) {
    return '<input type="submit" name="' . $name . '" id="' . $îd . '" value="' . $value . '" tabindex="' . $tabindex . '">' . "\n";
}

function formInputHidden($name, $id, $value) {
    return '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '">' . "\n";
}

function formTextArea($label, $name, $id, $value, $cols, $rows, $maxLength, $tabIndex, $readonly) {
    return '<label class="titre" for="' . $id . '">' . $label . ' :</label>' . "\n"
            . '<textarea class="zone" name="' . $name . '" id="' . $id . '" cols="' . $cols . '" rows="' . $rows . '" maxlength="' . $maxLength . '" tabindex="' . $tabIndex . '" ' . ($readonly ? 'readonly="readonly"' : '') . '>' . "\n"
            . $value . "\n"
            . '</textarea>' . "\n";
}

?>