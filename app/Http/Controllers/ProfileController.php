<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SwitchMail;
use Auth;
use Mail;
use App\User;
use Illuminate\Contracts\Routing\ResponseFactory;

class ProfileController extends Controller
{
    public function processImage(Request $request)
    {
    	$img = $request->file('profile_image');
        if ($img) {
            $path = base_path('public/uploads');
            //$path = public_path('uploads');
            $name = $img->getClientOriginalName();
            $img->move($path, $name);
            $myDp = $name;

            if (!empty(Auth::user()->profile->image)) {
                Auth::user()->profile->update(['image'=> $myDp] );
                return redirect()->back();
            }



            if (empty(Auth::user()->profile->image)) {
                Auth::user()->profile()->create(['image'=> $myDp])->save();
                return redirect()->back();
            }


           /* Auth::user()->profile()->create(['image'=> $myDp])->save();
           return redirect()->back();*/
       }


   }


   public function showForm()
   {

       return view('email_form');

   }


   public function processForm(Request $request)
   {
        /*Mail::send(['text'=>'email'], ['name'=> 'Adeojo Tunde'], function($message) {
            $message->to('olotudammy@gmail.com', 'Switch Email')->subject('Testing');
            $message->from(Auth::user()->email, 'Switch Email');

        });*/


        $user = Auth::user()->profile()->update(['message'=> $request->message]);


        $file = $request->file('attach_file');
        if ($file) {
            $path = base_path('public/uploads');
            //$path = public_path('uploads');
            $name = $file->getClientOriginalName();
            $file->move($path, $name);
            $myFile = $name;
            Auth::user()->profile()->update(['file'=> $myFile]);
            //return redirect()->back();
        }







        $sendToUser = User::find(Auth::id());

        Mail::to(Auth::user()->email)->send(new SwitchMail());

        $request->session()->put('status', 'Mail was successful!');

        return redirect(route('home'));
    }




    public function textForm()
    {
        return view('text_form');
    }



    public function orderTxt(Request $request)
    {

        $order = 'I will update the function and push later';
        return view('order', compact('order'));
        /*$data = $request->myMessage;
        $content = \View::make('order', compact('data'));
        \Response::make($content, '200')->header('Content-Type', 'plain/txt');
         return view('order');*/


         /*$fileText = "This is some text\nThis test belongs to my file download\nBooyah";
        $myName = "ThisDownload.txt";
        $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo', 'Content-Disposition'=>sprintf('attachment; filename="%s"', $myName),'X-BooYAH'=>'WorkyWorky','Content-Length'=>sizeof($fileText)];
        return Response::make($fileText, 200, $headers);*/

    }
}

