<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.form');
    }


}
