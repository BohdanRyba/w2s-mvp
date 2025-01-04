<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\ContactFormResource;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function index()
    {
        return ContactFormResource::collection(ContactForm::all());
    }

    public function store(ContactFormRequest $request)
    {
        $result = $this->checkCaptcha($request);

        if (!$result) {
            return (new ContactFormResource(ContactForm::create($request->validated())))->additional(['meta'=>['message'=>'Message was send successfully!']])->toJson();
        }
        return $result;
    }

    private function checkCaptcha($request)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = config('recaptcha.api_secret_key');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);
        $responseBody = $response->json();
        if (!$responseBody['success'] || $responseBody['score'] < 0.5) {
            return back()->withErrors(['captcha' => 'reCAPTCHA verification failed.']);
        }
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
