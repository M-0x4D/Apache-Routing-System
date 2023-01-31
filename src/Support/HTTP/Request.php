<?php

namespace Router\Support\HTTP;
class Request
{
    private static array $data = [];

    private static array $routeParams = [];
    function __construct()
    {
        if (!!$_GET) {
            foreach ($_GET as $key => $item) {
                self::$data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if (!!$_POST) {

            foreach ($_POST as $key => $item) {

                if (is_array($item)) {

                    $re = "/[^A-Za-z0-9]+/";

                    self::$data[$key] = array_map(fn($cell) => preg_replace($re, "", $cell), $item);
                } else {

                    self::$data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
        if (!!$_FILES) {
            foreach ($_FILES as $key => $file) {
                self::$data[$key] = $file;
            }
        }

        $data = file_get_contents('php://input');

        if (!!$data) {
            $data = json_decode($data, true);
            if ((is_array($data)) && (count($data) > 0)) {
                foreach ($data as $key => $item) {
                    self::$data[$key] = filter_var($item, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }

    }


}