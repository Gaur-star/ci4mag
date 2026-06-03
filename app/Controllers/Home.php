<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Welcome Home');
    }

    public function Home(){
        echo "U at Home function";
    }
}

?>
