<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerToCustomerTransferModel extends Model
{
    use HasFactory;

    private static  $customer;

    public static function newCustomer($request)
    {
        self::$customer = new CustomerToCustomerTransferModel();
        self::$customer->mobile = $request->mobile;
        self::$customer->amount = $request->amount;
        self::$customer->save();

    }
}
