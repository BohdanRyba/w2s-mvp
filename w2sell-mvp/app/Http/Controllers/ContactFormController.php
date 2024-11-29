<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\ContactFormResource;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function index()
    {
        return ContactFormResource::collection(ContactForm::all());
    }

    public function store(ContactFormRequest $request)
    {
        return (new ContactFormResource(ContactForm::create($request->validated())))->additional(['meta'=>['message'=>'Message was send successfully!']]);
    }

    public function show(ContactForm $contactForm)
    {
        return new ContactFormResource($contactForm);
    }

    public function update(ContactFormRequest $request, ContactForm $contactForm)
    {
        $contactForm->update($request->validated());

        return new ContactFormResource($contactForm);
    }

    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();

        return response()->json();
    }
}
