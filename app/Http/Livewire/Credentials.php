<?php

namespace App\Http\Livewire;

use App\Models\Credential;
use Livewire\Component;

class Credentials extends Component
{
    public $credentials = [], $user, $ind = null, $error = null;
    public $detail = "", $username = "", $password = "";
    public $mTitle = "New credential", $btnSave = "Save", $modal = false;

    function __construct($id)
    {
        $error = null;
        $this->getCredentials();
    }

    function getCredentials()
    {
        if (auth()) {
            $this->credentials = Credential::get()->where('userID', auth()->user()->id);
        }
    }

    public function openModal($on)
    {
        if ($on) {
            $this->modal = true;
        } else {
            $this->modal = false;
        }
    }

    public function setID($id)
    {
        if ($id) {
            if ($id === $this->ind) {
                $this->ind = null;
            } else {
                $this->ind = $id;
            }
        } else {
            $this->ind = null;
        }
    }

    public function edit($id)
    {
        dd(`Editar credential con ID: {{$id}}`);
    }
    public function save($id)
    {
        if ($this->detail == "") {
            $this->error = 'detail';
            return;
        }
        if ($this->username == "") {
            $this->error = 'username';
            return;
        }
        if ($this->password == "") {
            $this->error = 'password';
            return;
        }

        if (!$id ) {
            $newcredential = new Credential;
            $newcredential->userID = auth()->user()->id;
        } else {
            $newcredential = Credential::get($id);
        }
        $newcredential->detail = $this->detail;
        $newcredential->username = $this->username;
        $newcredential->password = $this->password;

        $newcredential->save();

        $this->clearForm();
        $this->getCredentials();
    }

    function clearForm()
    {
        $this->detail = "";
        $this->username = "";
        $this->password = "";
    }

    public function render()
    {
        return view('livewire.credentials')->with(['modal' => $this->modal]);
    }
}