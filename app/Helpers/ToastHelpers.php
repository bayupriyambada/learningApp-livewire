<?php


namespace App\Helpers;

class ToastHelpers
{
    public static function toast($type, $message = null)
    {
        return ['type' => $type,  'message' => $message];
    }
}
