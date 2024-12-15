<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request){
        // $contacts = Contact::with('category')
        //     ->KeywordSearch($request->keyword)
        //     ->GenderSearch($request->gender)->Category_idSearch($request->category_id)
        //     ->Updated_atSearch($request->date)->get();
        $contacts = Contact::with('category')->GenderSearch($request->gender)->get();
        $contacts = Contact::paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
