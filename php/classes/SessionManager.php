<?php
class SessionManager {
    
    public static function startSession() {
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function destroySession() {
        if(session_status() == PHP_SESSION_ACTIVE)
            session_destroy();
    }

    public static function restartSession() {
        self::destroySession();
        self::startSession();
    }
}