<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentToBankTransfer extends Model
{
    use HasFactory;
    private static  $agent;

    public static function newAgent($request)
    {
        self::$agent = new AgentToBankTransfer();
        self::$agent->mobile = $request->mobile;
        self::$agent->amount = $request->amount;
        self::$agent->save();

    }
}
