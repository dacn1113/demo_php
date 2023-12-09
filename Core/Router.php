<?php

class Router
{
    function handleRouter($url)
    {
        global $routers;
        unset($routers['default_controller']);

        $url = trim($url, '/');

        if (empty($url)) {
            $url = '/';
        }

        // echo '<pre>';
        // print_r($routers);
        // echo '</pre>';

        $handleUrl = $url;
        if (!empty($routers)) {
            foreach ($routers as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                }
            }
        }
        return $handleUrl;
    }
}
