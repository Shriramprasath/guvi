<?php
require '../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $client = new MongoDB\Client("mongodb+srv://shriramprasathvu20it:123456@cluster0.0oqdsyr.mongodb.net/?retryWrites=true&w=majority");
    $collection = $client->db2->user;
    $search = $collection->find([
        'name'=>$name
    ]);
    $data = array();
    foreach ($search as $document) {
        $data[] = $document;
    }
    $json =  json_encode($data);
    echo $json;

exit;
}
?>