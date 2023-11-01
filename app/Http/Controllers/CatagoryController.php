<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;



class CatagoryController extends Controller
{
public function cstore(Request $request)
{
    $request->validate(
        [
            'name'=>'required'
        ]);
        $category = new category();
        $category->name=$request->name;
        $request->save();
        return back()->withSuccess('Catagory added Successful!!');
}
};
