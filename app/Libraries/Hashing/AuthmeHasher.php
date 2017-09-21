<?php

namespace App\Libraries\Hashing;

use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class AuthmeHasher implements HasherContract
{
    public function make($value, array $options = [])
    {
        return md5($value.'kaichuang');
    }

    public function check($value, $hashedValue, array $options = [])
    {
        return md5($value.'kaichuang') == $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        // TODO: Implement needsRehash() method.
    }

    public function isDeferred(){

    }
}