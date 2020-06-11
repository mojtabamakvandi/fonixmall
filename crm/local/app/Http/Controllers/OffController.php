<?php

namespace App\Http\Controllers;
use App\Group;
use App\Pishnahad;
use App\Takhfif;
use App\Product;
use Session;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffController extends Controller
{
    public function index()
    {
        $allProducts = \DB::table('product')->get();
        $takhfifs = Takhfif::all();
        return view('scores.off',compact('takhfifs','allProducts'));
    }

    public function getSubCategory(Request $request)
    {
        $catId = $request->catId;
        $subcategories = Subcategory::where('subCatId',$catId)->get();
    }

    public function MakeOff(Request $request)
    {
        $request->validate([
            'productId' => 'required',
            'takhfif' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);
        $off = new Takhfif();
        $off->productId = $request->productId;
        $off->takhfif = $request->takhfif;
        $off->fromDate = $request->from;
        $off->toDate = $request->to;
        $off->user_id = Auth::id();
        $off->save();
        $product = Product::where('productId',$request->productId)->first();
        $product->offer = $request->takhfif;
        $product->save();
        $this->alert('success','تخفیف با موفقیت ایجاد شد.');
        return back();
    }

    public function MakePish(Request $request)
    {
        $request->validate([
            'toBuy' => 'required',
            'toSuggest' => 'required',
            'group_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'takhfif' => 'required'
        ]);
        $pish = new Pishnahad();
        $pish->productBuy = $request->toBuy;
        $pish->productSuggestion = $request->toSuggest;
        $pish->group_id = $request->group_id;
        $pish->fromDate = $request->from;
        $pish->off = $request->takhfif;
        $pish->toDate = $request->to;
        $pish->user_id = Auth::id();
        $pish->save();
        $this->alert('success','تخفیف با موفقیت ایجاد شد.');
        return back();
    }

    public function UpdateTakhfif(Request $request,Takhfif $takhfif)
    {
        $off = Takhfif::find($takhfif->id);
        $off->takhfif = $request->takhfif;
        $off->fromDate = $request->from;
        $off->toDate = $request->to;
        $off->save();
        $product = Product::where('productId',$off->productId)->first();
        $product->offer = $request->takhfif;
        $product->save();
        $this->alert('success','تخفیف با موفقیت ویرایش شد.');
        return back();
    }

    public function UpdatePishnahad(Request $request,Pishnahad $pish)
    {
        $pishnahad = Pishnahad::find($request->id);
        $pishnahad->off = $request->off;
        $pishnahad->fromDate = $request->from;
        $pishnahad->toDate = $request->to;
        $pishnahad->save();
        $this->alert('success','پیشنهاد با موفقیت ویرایش شد.');
        return back();
    }

    public function DeleteTakhfif(Takhfif $takhfif)
    {
        $takhfif->delete();
        $this->alert('success','پیشنهاد مورد نظر حذف شد!');
        return back();
    }

    public function DeletePishnahad(Pishnahad $pish)
    {
        $pish->delete();
        $this->alert('success','پیشنهاد مورد نظر حذف شد!');
        return back();
    }

    public function alert($type,$msg)
    {
        Session::flash('msg',$msg);
        Session::flash('type',$type);
    }

    public function pish()
    {
        $allProducts = \DB::table('product')->get();
        $pishnahad = Pishnahad::all();
        $groups = Group::all();
        return view('scores.pishnahad',compact('pishnahad','allProducts','groups'));


    }
}
