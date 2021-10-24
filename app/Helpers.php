<?php

if (!function_exists('hasRole')) {

    /*
     * Function has Role
     * - checks if the user has the given role
     * - return true if they have the role
     * - return false if they do not have the role or if they are not logged in
     * */
    function hasRole($role): bool
    {
        if (Auth::check()) {
            if (Auth::user()->role == $role) {
                return true;
            }
        }

        return false;
    }
}
