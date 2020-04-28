<?php

namespace App\Http\Controllers;

class LocalizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['index']]);
    }

    public function index()
    {
        if(app()->environment() == 'local') {
            \Cache::forget('lang.js.ar');
            \Cache::forget('lang.js.en');
        }
        $strings = \Cache::rememberForever('lang.js.' . app()->getLocale(), function () {
            $lang = app()->getLocale();

            $file = glob(resource_path('lang/' . $lang . '/js.php'))[0];

            return require($file);
        });

        return response('window.i18n = ' . json_encode($strings) . ';', 200, [
            'Content-Type' => 'text/javascript',
        ]);
    }

    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($locale)
    {
        if(in_array($locale, ['en', 'ar']) && request()->has('redirectTo')) {
            session()->put('locale', $locale);
            return redirect(request('redirectTo'));
        }

        return redirect()->route('home');
    }
}
