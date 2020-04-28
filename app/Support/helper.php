<?php

if(! function_exists('activeUrl')) {
    function activeUrl($segment)
    {
        if(request()->segment(1) == $segment) return 'active';
    }
}

if(! function_exists('notificationOpen')) {
    function notificationOpen($type)
    {
        $notifications = config('site.settings.notifications');

        return $notifications['open'] && isset($notifications[$type]) && $notifications[$type];
    }
}

if(! function_exists('notificationIcon')) {
    function notificationIcon($type)
    {
        $icons = config('site.notifications_icons');

        return isset($icons[$type]) ? $icons[$type] : null;
    }
}

if(! function_exists('site')) {
    function site($key = null)
    {
        return config($key ? "site.{$key}" : "site");
    }
}

if(! function_exists('theme')) {
    function theme($asset, $file)
    {
        return site("settings.theme.{$asset}") . "{$file}";
    }
}

if(! function_exists('currentLocale')) {
    function currentLocale($regional = null)
    {
        if(auth()->user()) {
            return auth()->user()->locale();
        }

        if(session()->has('locale')) {
            return session()->get('locale');
        }

        return app()->getLocale();
    }
}

if(! function_exists('currentDir')) {
    function currentDir()
    {
        return currentLocale() == 'ar' ? 'rtl' : 'ltr';
    }
}

if(! function_exists('pointsHandler')) {
    function pointsHandler($event, $doer, $objectOwner, $props = null)
    {
        return resolve(\App\Support\Points\PointHandler::class)
            ->handle($event, $doer, $objectOwner, $props);
    }
}

if(! function_exists('sendExternalMessage')) {
    function sendExternalMessage($type, $to, $props)
    {
        if(!$to) return;

        $props['chat_id'] = $to;

        return resolve(\App\Services\Bands\Contracts\MessagingInterface::class)
            ->{"send" . ucfirst($type)}($props);
    }
}

if(! function_exists('externalNotificationMessage')) {
    function externalNotificationMessage($event, $payload)
    {
        return resolve(\App\Support\Notifications\ExternalNotificationMessages::class)->{$event}($payload);
    }
}

if(! function_exists('postTypes')) {
    function postTypes()
    {
        return ['question', 'advice', 'information', 'other'];
    }
}


if(! function_exists('timesToPay')) {
    function timesToPay()
    {
        return [
            'day' => __('bands.payments.times.day'),
            'month' => __('bands.payments.times.month'),
            'half_year' => __('bands.payments.times.half_year'),
            'year' => __('bands.payments.times.year'),
        ];
    }
}
