<?php

namespace app;

class Request
{
    private $data;
    private $firtsLevel;
    public function __construct(array $data = [])
    {
        $formData = array();
        if (isset($_SERVER['argv'])) {

            if (!empty($_SERVER['argv'])) {
                $array = array();
                foreach ($_SERVER['argv'] as $key_Val) {
                    $key_Val = explode(':', $key_Val);
                    if (!isset($key_Val[1])) continue;
                    $key = $key_Val[0];
                    $val = $key_Val[1];
                    $array[$key] = $val;
                }
                $_SERVER['argv'] = $array;
            }

            $formData[] = $_SERVER['argv'];
        }

        if (!empty($_POST)) {
            $formData[] = $_POST;
        }

        if (!empty($_GET)) {
            $formData[] = $_GET;
        }

        if (!empty($data = @file_get_contents('php://input'))) {
            if ($data = json_decode($data)) {
                $formData[] = $data;
            }
        } {
        }

        $this->data = (object) $formData;
        $this->firtsLevel = (object) ($formData[0] ?? []);
    }

    public function all()
    {
        return $this->firtsLevel;
    }
    public function getData()
    {
        return $this->data;
    }
}
