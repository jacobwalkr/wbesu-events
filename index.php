<?php

// Split the request up
$split_request = explode('?', $_SERVER['REQUEST_URI']);

// Use regex to split the main request up (the first match for explode)
$uri_pattern = '~^/?(?P<controller>\w*)((/?(?P<action>\w*))?(/?(?P<data>(\w*/?)*)))?$~';
$matches = array();
preg_match($uri_pattern, $split_request[0], $matches);

// Split the data bits up (as in /controller/action/>data1/data2/data3<)
$raw_request_data = $matches['data'];
$request_data = explode('/', $raw_request_data);

// Split the query string up and make it a nice associative array
if (isset($split_request[1]))
{
    $query_string_fragments = explode('&', $split_request[1]);
    
    $query_string_assoc = array();

    foreach ($query_string_fragments as $fragment)
    {
        $split_fragment = explode('=', $fragment, 2);
        $key = $split_fragment[0];
        
        if (count($split_fragment) == 2)
        {
            $value = $split_fragment[1];
            $query_string_assoc[$key] = $value;
        }
        else
        {
            $query_string_assoc[$key] = true;
        }
    }
}
else
{
    $query_string_assoc = array();
}

// Display URL fragments nicely
echo "Controller:\n{$matches['controller']}\n\n";
echo "Action:\n{$matches['action']}\n\n";
echo "Data:\n";
print_r($request_data);
echo "\n\nQuery:\n";
print_r($query_string_assoc);

?>