<?php
namespace App\Services;
require DIR . '/../Config/constants.php';

class SessionManager {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function isLoggedIn() {
        return isset($_SESSION['id']) && isset($_SESSION['role']);
    }
    public static function getId() {
        return $_SESSION['id'] ?? null;
    }
    public static function getRole() {
        return $_SESSION['role'] ?? null;
    }
    public static function setId($id) {
        $_SESSION['id'] = $id;
    }
    public static function setRole($role) {
        $_SESSION['role'] = $role;
    }
    public static function destroy() {
        session_unset();
        session_destroy();
    }
    public static function redirect($path) {
        header("Location: " . BASE_URL . $path);
        exit();
    }
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }
}
