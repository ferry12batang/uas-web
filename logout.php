<?php
/**
 * Logout action performed
 * 
 * @since 1.0.0
 * @return HTTPHeader
 * @author Cak Adi <cakadi190@gmail.com>
 */

require_once __DIR__ . '/inc/include.php';

$auth->logout();
redirect(base_url("auth/login"));
