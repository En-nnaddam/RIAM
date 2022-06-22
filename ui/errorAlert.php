<?php
function errorAlert($message)
{
    echo <<<HTML
        <div class='error-alert'>$message</div>
    HTML;
}
