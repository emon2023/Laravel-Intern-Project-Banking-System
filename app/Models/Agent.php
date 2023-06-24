<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;


    private static $agent, $image, $imageExtension, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(100,100000).'.'.self::$imageExtension;
        self::$directory = 'img/agent-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newAgent($request)
    {
        self::$agent = new Agent();
        self::$agent->name = $request->name;
        self::$agent->amount = $request->amount;
        self::$agent->email = $request->email;
        self::$agent->password = bcrypt($request->password);
        self::$agent->mobile = $request->mobile;
        self::$agent->image = self::getImageUrl($request);
        self::$agent->save();

    }

    public static function updatedAgent($request,$id)
    {
        self::$agent = Agent::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$agent->image))
            {
                unlink(self::$agent->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$agent->image;
        }


        self::$agent->name = $request->name;
        self::$agent->amount = $request->amount;
        self::$agent->email = $request->email;

        if($request->password)
        {
            self::$agent->password = bcrypt($request->password);
        }
        self::$agent->mobile = $request->mobile;
        self::$agent->image = self::$imageUrl;
        self::$agent->save();
    }

    public static function deleteAgent($id)
    {
        self::$agent = Agent::find($id);

        if (file_exists(self::$agent->image))
        {
            unlink(self::$agent->image);
        }

        self::$agent->delete();
    }
}
