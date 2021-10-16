<?php

namespace MyApp\Client;

use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    private HttpClientInterface $client;
    private string $token;
    private string $url;

    public function __construct(HttpClientInterface $client, string $url, string $username, string $password)
    {
        $this->client = $client;
        $this->url = $url;
        $response_register = $this->client->request(
            'POST',
            $url.'/register', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Connection' => 'keep-alive'
                ],
                'body' => ['_username' => $username, '_password' => $password]
            ]
        );
        echo $response_register->getContent()."\n";
        $response_login_check = $this->client->request(
            'POST',
            $url.'/login_check', [
                'json' => ['username' => $username, 'password' => $password]
            ]
        );
        $this->token = json_decode($response_login_check->getContent(), true)['token'];
        echo $response_login_check->getContent()."\n";
    }

    public function getTodos()
    {
        $response_get_todos = $this->client->request(
            'GET',
            $this->url.'/api/todo', [
                'auth_bearer' => $this->token,
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
            ]
        );
        try {
            return new Response($response_get_todos->getContent());
        }
        catch (ClientException $ex)
        {
            return new Exception($ex->getMessage(), $ex->getCode());
        }
    }

    public function addTodo(string $newTodo)
    {
        $response_add_todo = $this->client->request(
            'POST',
            $this->url.'/api/todo', [
                'auth_bearer' => $this->token,
                'json' => ['name' => $newTodo]
            ]
        );
        try {
            return new Response($response_add_todo->getContent());
        }
        catch (ClientException $ex)
        {
            return new Exception($ex->getMessage(), $ex->getCode());
        }
    }

    public function updateTodo(string $updatedTodo, int $id)
    {
        $response_update_todo = $this->client->request(
            'PUT',
            $this->url.'/api/todo/'.$id, [
                'auth_bearer' => $this->token,
                'json' => ['name' => $updatedTodo]
            ]
        );
        try {
            return new Response($response_update_todo->getContent());
        }
        catch (ClientException $ex)
        {
            return new Exception($ex->getMessage(), $ex->getCode());
        }
    }

    public function deleteTodo(int $id)
    {
        $response_delete_todo = $this->client->request(
            'DELETE',
            $this->url.'/api/todo/'.$id, [
                'auth_bearer' => $this->token,
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
            ]
        );
        try {
            return new Response($response_delete_todo->getContent());
        }
        catch (ClientException $ex)
        {
            return new Exception($ex->getMessage(), $ex->getCode());
        }
    }
}