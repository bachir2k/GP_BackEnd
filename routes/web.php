<?php

use App\Mail\testMyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/mailtest', function ()  {
    $name="bachir";
    Mail::to("piscondiaye182004@gmail.com")->send(new testMyEmail($name));
});
