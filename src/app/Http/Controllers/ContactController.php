<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->first_tel . $request->second_tel . $request->third_tel;
        $name = $request->last_name . '　' . $request->first_name;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'first_tel', 'second_tel', 'third_tel', 'address', 'building', 'category_id', 'detail']);

        return view('confirm', compact('tel', 'name', 'contact'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
