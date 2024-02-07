<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Code;

trait HasCode
{
    public function autoCode( $prefix, $date ): string
    {
        $time = strtotime($date);
        $prefix = $prefix . date('y',$time).date('m',$time);
        Code::updateOrCreate(
            ['prefix' => $prefix],
        )->increment('num');
        $code = Code::where('prefix', $prefix)->first();
        return $code->prefix . Str::padLeft($code->num, 4, '0');
    }
}
