<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUserRoleController extends Controller
{
    public function home() {
        return "user home";
    }

    public function adminHome() {
        return "admin home";
    }

    public function pimpinanHome() {
        return "pimpinan home";
    }
}
