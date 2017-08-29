<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TryController extends Controller
{
 
    $items=array('product_name'=>$<wbr />product_name,'product_price'=<wbr />>$product_price,'product_description'=>$product_description);
            view()->share('items',$items);
            $pdf = PDF::loadView('pdf_folder.pdf');
            $filename=time().'.pdf';
            //PDF will be storage in storage/app/public/pdf_folder folder
            Storage::put('public/pdf/'.$<wbr />filename, $pdf->output());
   return View('PDFS.pdf')
   ->with('items', $items);
}
