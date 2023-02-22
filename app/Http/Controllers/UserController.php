<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\post_like;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::latest()->get();
        return view('user.userDashboard',compact('posts'));

    }

     public function userDashboard()
    {
        return view('user/userDashboard', ['posts' => Post::all()]);
    }

    public function savePost(Request $request)
    {
            
        $request->validate([
            'postTitle'=>'required',
            'post'=>'required'
        ]);
        $image=array();
        if( $files=$request->file('file')){
           

             //'folderkoname','kun bhitra rakhne ho'
             foreach($files as $file)
             {
                $imagename=time().rand(1000,99999);
                $extension=strtolower($file->getClientOriginalExtension());
                $imagefullname=$imagename.".".$extension;
                $uploadspath="public/uploads/";
                $imageurl=$uploadspath.$imagefullname;
                $file->move($uploadspath,$imagefullname);
                $image[]=$imageurl;
             }
            
            }
            Post::create([
                'title' => $request->postTitle,
                'post' => $request->post,
                'user_id' => $request->user_id,
                'img'=>implode('|',$image)
            ]);
     
        return redirect()->back()->with(['posts' => Post::all()]);
    
  
    }

    public function deletePost($id)
    {
        $data=Post::find($id);
        $images=explode('|',$data->img);
        foreach($images as $image)
        {

            if(file_exists($image)){
                unlink($image);
            }
        }
        
        $data->delete();
        return redirect()->back();
    }

    public function displaypost($id){
        
            $post=Post::where('id',$id)->first();
            return view('user.displaypost',compact('post'));
    }
        
        public function editpost($id){
            $data=Post::find($id);
            return view('user.editpost',compact('data'));
        }

        public function updatepost(Request $req){

            $data=Post::find($req->id);
            
        $images=explode('|',$data->img);
        foreach($images as $image)
        {

            if(file_exists($image)){
                unlink($image);
            }
        }
        $image=array();
        if( $files=$req->file('file')){
           

             //'folderkoname','kun bhitra rakhne ho'
             foreach($files as $file)
             {
                $imagename=time().rand(1000,99999);
                $extension=strtolower($file->getClientOriginalExtension());
                $imagefullname=$imagename.".".$extension;
                $uploadspath="public/uploads/";
                $imageurl=$uploadspath.$imagefullname;
                $file->move($uploadspath,$imagefullname);
                $image[]=$imageurl;
             }
            
            }


             $data->title=$req->postTitle;
             $data->post=$req->post;
             $data->user_id=$req->user_id;
             $data->img=implode('|',$image);
             $data->save();
            return redirect()->route('login');
        }



        public function likePost(Request $request){
           
            if($request->ajax())
            {
                $data=$request->all();
                
                
                $postsearch=post_like::where('post_id',$data['postid'])->where('user_id',auth()->user()->id);            
                if($postsearch->count()<1)
                {
                    
                    
                    post_like::create([
                        'post_id' => $data['postid'],
                        'user_id' => auth()->user()->id,
                        
                    ]);
                    $postcount=post_like::where('post_id',$data['postid'])->count();
                             return response()->json(array('msg' => 'liked' , 'postcount'=>$postcount));
                         }
                         else{
                             $postsearch->delete();
                             $postcount=post_like::where('post_id',$data['postid'])->count();
                             return response()->json(array('msg' => 'disliked' , 'postcount'=>$postcount));
                         }
                    
                         
            }
              
        }


        public function likePosts(Request $request){
           
            if($request->ajax())
            {
                $data=$request->all();
                
                
                $postsearch=post_like::where('post_id',$data['postid'])->where('user_id',auth()->user()->id);            
                if($postsearch->count()<1)
                {
                    
                    
                    post_like::create([
                        'post_id' => $data['postid'],
                        'user_id' => auth()->user()->id,
                        
                    ]);
                    $postcount=post_like::where('post_id',$data['postid'])->count();
                             return response()->json(array('msg' => 'liked' , 'postcount'=>$postcount));
                         }
                         else{
                             $postsearch->delete();
                             $postcount=post_like::where('post_id',$data['postid'])->count();
                             return response()->json(array('msg' => 'disliked' , 'postcount'=>$postcount));
                         }
                    
                         
            }
              
        }

       
        public function profilepage(){
           
            return view('user.profile',['posts' => Post::all()]);
        }

        
    // public function dashboard(){
    //     return view('user.userDashboard');
    // }


}