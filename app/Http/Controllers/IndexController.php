<?php

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function index() {
        return $this->responseAsJson([
            "name" => "Smart Motors"
        ]);
    }
}
