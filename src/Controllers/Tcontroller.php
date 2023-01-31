<?php

namespace Router\Controllers;

use Router\Support\HTTP\Request;
class Tcontroller
{

    function testFunc(Request $request)
    {
        echo 'from testFunc';
    }
    function testFunc2(Request $request)
    {
        echo 'from testFunc';
    }
}