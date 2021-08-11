<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //make a constructor middleware auth check
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        //make form validate
        $this->validate($request, [
            'title' => 'required',
            'pdf' => 'required|mimes:pdf',
        ]);

        $newsletter = new Newsletter;
        $newsletter->title = $request->title;
        $newsletter->save();
      
        if($request->hasfile('pdf')){
           	$file = $request->pdf;
                $originalName =  $file->getClientOriginalName();
                $pdfName = time().'_'.$originalName; 
                $file->move(public_path('newsletter'), $pdfName);  
                $newsletterPdf = Newsletter::where('id', $newsletter->id)->first();
                $newsletterPdf->pdf = $pdfName;
                $newsletterPdf->save();
        } 

        return back()->with('success','Newsletter has been Created successfully');

    }
}
