<?php

namespace App\Http\Controllers;

use \Auth;


class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   function check() {
    $permissions = [];
    foreach (Auth::user()->getAllPermissions() as $permission) {
      $permissions[] = $permission->name;
    }

    return $permissions;
     //return Auth::user()->getAllPermissions();
     
    }
}