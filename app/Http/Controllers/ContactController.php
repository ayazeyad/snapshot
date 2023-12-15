<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request): ContactResource
    {
        $validatedData = $request->validated();

        $contact = Contact::query()->create($validatedData);

        return new ContactResource($contact);
    }
}
