<?php
class SessionManager {
    
    public static function startSession() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public static function destroySession() {
		self::startSession();
        session_destroy();
    }
}