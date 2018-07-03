<?php

namespace App\NotificationHandler;

class SnarlNotification {

    public static function setMsg(array $propertys) {
        session()->flash('SnarlNotification', json_encode($propertys));
    }

    public static function setSuccessMsg(string $title, string $message, int $time = null)
    {
        self::setMsg([
                'title' => $title,
                'text' => $message,
                'icon' => '<i class=\'fa fa-check-circle-o\'> </i>',
                'time' => $time,
                'action' => null,
                'dismissable' => true,
                'color' => 'success'
            ]
        );
    }

    public static function setErrorMsg(string $title, string $message, int $time = null)
    {
        self::setMsg([
                'title' => $title,
                'text' => $message,
                'icon' => '<i class=\'fa fa-remove\'> </i>',
                'time' => $time,
                'action' => null,
                'dismissable' => true,
                'color' => 'danger'
            ]
        );
    }

    public static function setWarningMsg(string $title, string $message, int $time = null)
    {
        self::setMsg([
                'title' => $title,
                'text' => $message,
                'icon' => '<i class=\'fa fa-exclamation-triangle\'> </i>',
                'time' => $time,
                'action' => null,
                'dismissable' => true,
                'color' => 'warning'
            ]
        );
    }

    public static function setInfoMsg(string $title, string $message, int $time = null)
    {
        self::setMsg([
                'title' => $title,
                'text' => $message,
                'icon' => '<i class=\'fa fa-info-circle\'> </i>',
                'time' => $time,
                'action' => null,
                'dismissable' => true,
                'color' => 'info'
            ]
        );
    }

    public static function getMsg()
    {
        return session('SnarlNotification');
    }
}