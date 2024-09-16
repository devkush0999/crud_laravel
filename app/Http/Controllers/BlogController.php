<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //This method will return all blog
    public function index(){

    }
    // this method 
    public function show($id){

    }
    // this method will store a blog
    public function store(Request  $request){
        //validation
        //store in database
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:10',
            'author' => 'required|min:3',

        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Please fix the errors',
                'errors' => $validator->errors()
            ]);

    }
    $blog = new Blog();
    $blog->title = $request->title;
    $blog->author = $request->author;
    $blog->description = $request->description;
    $blog->shortDesc = $request->shortDesc;
    $blog->save();

    return
    response()->json([
        'status' => true,
        'message' => 'Blog created successfully',
        'data' => $blog
        ]);

    }

    // this method will update a blog
    public function update(){

    }
    // this method will delete a blog
    public function destroy($id){

    }
}
