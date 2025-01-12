<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;



class RecordController extends Controller
{
    function store(Request $request) {
        
        $record = Record::create([
            'event_id' => 1,
            'name' => $request->name,
            'last_name' => $request->lastName,
            'occupation' => $request->occupation,
            'bar_name' => $request->barName,
            'shop_name' => $request->shopName,
            'city' => $request->city,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_customer' => $request->isCustomer,
            'is_user' => $request->isUser,
            'marketing_check' => $request->marketingCheck 
        ]);
        
        return $record;
    }
}
