<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function login(){
        session_start();
        $_SESSION['adminLogin'] = true ;
    }

    public function products(){
        return redirect('http://fonixmall.com/admin/crm/getProductsOffer.php');
    }
}
