<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;


class PublicController extends Controller
{

    // select * from `category` ORM Object-relational Mapping
    // Eloquent

    public function welcome(){
        // CREATE
        //
        // $category = Category::create([
        //     'name'  =>  'testing category',
        //     'color' =>  '000001',
        //     'user_id'   =>  1
        // ]);


        // READ
        //
        // $category = Category::find(50);
        // $category = Category::all();
        // $get_category = Category::where('id', 50)->get();
        // $first_category = Category::where('id', 50)->first();
        // echo $get_category[0]->name;
        // echo $first_category->name;


        // UPDATE
        //
        // $all_categories = Category::where('id', '>', 100)->get();
        // foreach($all_categories as $category){
        //     $category->update([
        //         'color'  =>  'FFFFFF'
        //     ]);
        // }
        // dd($all_categories);


        // DELETE
        //
        // $category = Category::find(104);
        // $category->delete();

        $user = User::find(1);
        $user->delete();
    }


    public function create_user(){
        // write your code here
    }
}
