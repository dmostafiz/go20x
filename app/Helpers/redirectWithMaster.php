<?php

use Illuminate\Support\Facades\Redirect;

function redirectWithMaster($request, $path){
//    if(!$request->uname){
        return redirect($path.'/master');
        exit;
//    }
}