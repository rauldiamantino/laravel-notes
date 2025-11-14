<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    public static function decryptId($value)
    {
        // Check if $value is encrypted
        try {
            return Crypt::decrypt($value);
        }
        catch (DecryptException $e) {
            return redirect()->route('home');
        }
    }
}
