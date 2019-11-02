<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Contact;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

}
