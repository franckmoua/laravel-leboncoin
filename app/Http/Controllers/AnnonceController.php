<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Mail\AnnonceMail;
use App\Mail\DeleteAnnonce;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnnonceController extends Controller
{
    public function front()
    {
        $annonces = Annonce::where('status', true)->orderBy('created_at')->get();
        return view('annonceFrontPage',compact('annonces'));
    }

    public function index()
{

    return view('annonceForm');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'title' => 'required|min:3',
        'name' => 'required',
        'description' => 'required|min:15',
        'location' => 'required',
        'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
    ]);

    $message = new Annonce([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'title' => $validated['title'],
        'token' => Str::random(32),
        'description' => $validated['description'],
        'location' => $validated['location'],
        'price' => $validated['price'],
    ]);

    $message->save();

    Mail::to($validated['email'])->send(new AnnonceMail($message));

    return redirect()->route('annonce.create')->with('success', 'Message sent successfully!');
}

public function show($token)
{
    $message = Annonce::where('token', $token)->firstOrFail();

    $message->delete();

    return view('show', ['message' => $message]);
}
 public function validateAnnonce($token)
    {
        $message = Annonce::where('token', $token)->firstOrFail();
        
        if ($message->status === false) {
            $message->status = true;
            $message->save();

            return $this->mailDelete($token);
        } else {
            return view('alreadyValidated');
        }
    }

    public function details($id)
    {
        $annonces = Annonce::findOrFail($id);
        return view('annonce.details',compact('annonces'));
    }

    public function mailDelete($token)
    {
        $annonce = Annonce::where('token',$token)->firstorFail();
        Mail::to($annonce->email)->send(new AnnonceMail($token));
        return redirect()->route('annonces.details', $annonce->id);
    }
}

