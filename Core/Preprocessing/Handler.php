<?php

class Handler
{
    public static function Handle($raw_request)
    {
        // Split the request up
        $split_request = explode('?', $raw_request);

        // Use regex to split the main request up (the first match for explode)
        $uri_pattern = '~^/?(?P<controller>\w*)((/?(?P<action>\w*))?(/?(?P<data>(\w*\/?)*)))?$~';
        $matches = array();
        preg_match($uri_pattern, $split_request[0], $matches);

        // Split the data bits up (as in /controller/action/data1/data2/data3)
        $raw_request_data = $matches['data'];
        $nice_data = explode('/', $raw_request_data);

        // Split the query string up
        if (isset($split_request[1]))
        {
            $nice_query = explode('&', $split_request[1]);
        }
        else
        {
            $nice_query = array();
        }

        // Collect request fragments
        $nice_request = array(
            'controller' => $matches['controller'],
            'action' => $matches['action'],
            'data' => $nice_data,
            'query' => $nice_query
        );
        
        Router::Route($nice_request);
    }
}
