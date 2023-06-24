<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    private static $customer, $image, $imageExtension, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(100,100000).'.'.self::$imageExtension;
        self::$directory = 'img/teacher-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->amount = $request->amount;
        self::$customer->email = $request->email;
        self::$customer->password = bcrypt($request->password);
        self::$customer->mobile = $request->mobile;
        self::$customer->image = self::getImageUrl($request);
        self::$customer->save();

    }

    public static function updatedCustomer($request,$id)
    {
        self::$customer = Customer::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$customer->image))
            {
                unlink(self::$customer->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$customer->image;
        }


        self::$customer->name = $request->name;
        self::$customer->amount = $request->amount;
        self::$customer->email = $request->email;

        if($request->password)
        {
            self::$customer->password = bcrypt($request->password);
        }
        self::$customer->mobile = $request->mobile;
        self::$customer->image = self::$imageUrl;
        self::$customer->save();
    }

    public static function deleteCustomer($id)
    {
        self::$customer = Customer::find($id);

        if (file_exists(self::$customer->image))
        {
            unlink(self::$customer->image);
        }

        self::$customer->delete();
    }
}
