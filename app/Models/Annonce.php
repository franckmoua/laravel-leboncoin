<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use App\Mail\AnnonceMail;

class Annonce extends Model

{
    use HasFactory;

    public $fillable = ['name','token','email','description','title','price','status','location'];

    public static function boot() {
        parent::boot();
        static::created(function ($item) {

            Mail::to("franckmoua@gmail.com")->send(new AnnonceMail($item));
        });
    }
}