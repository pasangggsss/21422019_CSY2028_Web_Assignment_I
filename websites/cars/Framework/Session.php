<?php
namespace Framework;

class Session {
    public static function  session_user_exists() {
        return isset($_SESSION['id']);
    }
    public static function  owner() {
        if (!Session::session_user_exists() || $_SESSION['user_system_accesss'] < 10) Route::g_link_header('/login');
    }

    public static function  adminAny() {
        if (!Session::session_user_exists()) Route::g_link_header('/login');
    }
}