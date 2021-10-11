<?php

use MyApp\Client\ApiClient;
use Symfony\Component\HttpClient\CurlHttpClient;

require_once dirname(__DIR__) .'/vendor/autoload.php';

$client = new ApiClient(new CurlHttpClient(), 'http://178.62.205.95', 'sveta', '123456');
echo $client->getTodos()->getMessage()."\n";
echo $client->addTodo("new todo")->getMessage()."\n";
echo $client->updateTodo("updated todo", 1)->getMessage()."\n";
echo $client->getTodos()->getMessage()."\n";
echo $client->deleteTodo(1)->getMessage()."\n";
echo $client->getTodos()->getMessage()."\n";