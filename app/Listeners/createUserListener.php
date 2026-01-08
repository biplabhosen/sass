<?php

namespace App\Listeners;

use App\Events\MakeUser;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class createUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MakeUser $event): void
    {
        $customer= $event->customer;
        $user= new User();
        $user->name= $customer->name;
        $user->email= $customer->email;
        $user->password= Hash::make('password');
        $user->save();

        $customer->user_id = $user->id;
        $customer->save();
    }
}
