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
        
        $user = Auth::user()->profile()->update(['message'=> $request->message]);
        $email = $request->to;


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

        Mail::to($email)->send(new SwitchMail());
        $request->session()->put('status', 'Mail was successful!');
        return redirect(route('home'));
    }




    public function textForm()
    {
        return view('text_form');
    }



    public function orderTxt(Request $request)
    {

        /*$order = 'I will update the function and push later';
        return view('order', compact('order'));*/

        $my_file = 'file.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $data = $request->myMessage;
        fwrite($handle, $data);

        $link = '';

        $link = response()->download(base_path('public/'.$my_file.''));

        return view('text_result', compact('my_file', 'link'));
        

    }


    public function download( $filename = '' )
    {

        //File download code
        $filename = "file.txt";
        $file_path = base_path('public/'.$filename.'');
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
           
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }
}

