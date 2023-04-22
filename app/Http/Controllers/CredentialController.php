<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Credentials;
use App\Models\Credential;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    public function credentials(){
        
        return Credential::get();
    }
}
