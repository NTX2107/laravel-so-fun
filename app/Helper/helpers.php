<?php

function processCurrentUrl()
{
    $url = str_replace(route('admin.show.dashboard'), 'home', url()->current());
    $url = str_replace(array(':', '-'), ' ', $url);
    return explode('/', $url);
}
