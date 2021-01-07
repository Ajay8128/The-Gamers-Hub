<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;
class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');//auth(logged in) is for only authenticated users can access this pages if we write guest then only guest(logged out) ones can access

        //if u write $this->middleware('auth')->except('index')
           // -->the index part will be unlocked 
           // -->others will be locked until u authenticate
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database.

        $posts=Post::all();

        //return a view and pass in the above variable
        $posts=Post::orderBy('id','desc')->paginate(4);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts/create')->withCategories($categories)->withtags($tags);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        // validate the data
         $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',//all other validation rules are in laravel documentation.
            'category_id'=>'required|integer',
            'tags'=>'required',
            'body'=>'required',
            'featured_image'=>'sometimes|image'
        ));

         // store in the database
         $post= new Post;
         $post->title=$request->title;
         $post->slug=$request->slug;
         $post->category_id=$request->category_id;
         $post->body=Purifier::clean($request->body);

         //save our image
          if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename=time() . '.' . $image->getClientOriginalExtension();
            $location=public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image=$filename;
          }


          $post->save();

          $post->tags()->sync($request->tags,false);

          Session::flash('success','The blog post was saved successfully!');

           return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable 
        $post= Post::find($id);// the post written in light blue is our model
        $categories=Category::all();
        // return the view and pass it in the var we  previously created

        $tags=Tag::all();
        $tags2=array();
        foreach ($tags as $tag){
            $tags2[$tag->id]=$tag->name;
        }

        // return the view and pass it in the var we  previously created
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    //the request variable contains all the data of elements of model
        // Validate the data
        $post=Post::find($id);
       
        
        $this->validate($request,array( 
            'title'=>'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'=>'required|integer',
            'body'=>'required',
            'featured_image'=>'image'
             ));
    
            // Save the dta to the database
            $post= Post::find($id);//this finds the appropriate item and put in post variable

            $post->title=$request->input('title');//u can use this or directly write title.
            $post->slug=$request->input('slug');
            $post->category_id=$request->input('category_id');
            $post->body=Purifier::clean($request->body);

            if($request->hasFile('featured_image')){
                
                //add new photo
                 $image=$request->file('featured_image');
                 $filename=time() . '.' . $image->getClientOriginalExtension();
                 $location=public_path('images/' . $filename);
                 Image::make($image)->resize(800,400)->save($location);
                 
                 $oldFilename=$post->image;
                //update the database
                 $post->image=$filename;

                //Delete the old photo
                 Storage::delete('$oldFilename');//for this we also changed the local storage in the config folder under the filesystems line 48
            } 
            $post->save();//this also update the update time stamp

            $post->tags()->sync($request->tags,true);

        // Set flash data with success message
            Session::flash('success','The Post was Updated Successfully!');

        // redirect with fash data to posts.show
            return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);//this finds/access the item we want to delete

        $post->tags()->detach();//this removes any references of the post in the post_tag table

        Storage::delete($post->image);

        $post->delete();//this delete the item

        Session::Flash('success','The Post was Deleted Successfully!');

        return redirect()->route('posts.index');
    }
}
