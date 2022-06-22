<?php
function arrayToSelect($array, $name)
{
    $options = '';
    foreach ($array as $element) {
        $element = substr($element, 1, -1);
        $options .= <<<HTML
                <option value="{$element}">{$element}</option>
            HTML;
    };

    return <<<HTML
            <select class="primary-input" name="{$name}">
                {$options}
            </select>
        HTML;
}
