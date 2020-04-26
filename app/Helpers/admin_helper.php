<?php

function is_admin()
{
    if (session()->has("user") && session()->get("user")["is_admin"]) {
        return true;
    }
    return false;
}
