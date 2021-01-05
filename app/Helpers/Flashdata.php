<?php

namespace App\Helpers;

class Flashdata
{

    public static function success_alert($message)
    {
        session()->flash('type', 'primary');
        session()->flash('message', $message);
        session()->flash('icon', 'zmdi zmdi-check-circle');
    }
    public static function danger_alert($message)
    {
        session()->flash('type', 'danger');
        session()->flash('message', $message);
        session()->flash('icon', 'zmdi zmdi-block');
    }

    public static function warning_alert($message)
    {
        session()->flash('type', 'warning');
        session()->flash('message', $message);
        session()->flash('icon', 'zmdi zmdi-help');
    }
}
