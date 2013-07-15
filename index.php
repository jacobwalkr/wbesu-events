<?php

// Split the request up
$split_request = explode('&', $_GET['request']);

// Use regex to split the main request up (the first match for explode)
$uri_pattern = '~^/?(?P<controller>\w*)((/?(?P<action>\w*))?(/?(?P<data>(\w*/?)*)))?$~';
$matches = array();
preg_match($uri_pattern, $split_request[0], $matches);

// Split the query string up
print_r($split_request);
if (isset($split_request[1]))
{
    $query_string_split = array_values($split_request[1]);
}
else
{
    $query_string_split = array();
}

// Split the data bits up (as in /controller/action/data1/data2/data3)
$raw_request_data = $matches['data'];
$request_data = explode('/', $raw_request_data);

// Display URL fragments nicely
echo "<br><strong>Controller:</strong><br>{$matches['controller']}<br><br>\n";
echo "<strong>Action:</strong><br>{$matches['action']}<br><br>\n";
echo "<strong>Data:</strong><br>\n";
print_r($request_data);
echo "<br><br>\n<strong>Query:</strong><br>\n";
print_r($query_string_split);

?>