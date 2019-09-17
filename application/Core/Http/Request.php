<?php

namespace App\Core\Http;


class Request
{
    protected $body, $get, $post, $server;

    public function __construct()
    {
        $this->body = $_REQUEST;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;

    }

    public function get($key = null)
    {
        if ($key) {
            return isset($this->get[$key]) ? $this->get[$key] : null;
        }
        return $this->get;
    }

    public function post($key = null)
    {
        if ($key) {
            return isset($this->post[$key]) ? $this->post[$key] : null;
        }
        return $this->post;
    }

    public function server($key)
    {
        return isset($this->server[$key]) ? $this->server[$key] : null;
    }

    public function json($key)
    {
        $object = json_decode(file_get_contents('php://input'));


        if(is_object($object)) {
            return $object->$key;
        }

        return null;
    }

}