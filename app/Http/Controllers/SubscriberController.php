<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;

        $subscriber->save();

        flashy()->primary('You are added to our subscriber list!');
        return redirect()->back();
    }
}
