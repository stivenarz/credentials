<?php

namespace App\Http\Livewire;

use App\Models\Credential;
use Livewire\Component;

class Credentials extends Component
{
    public $credentials = [],
        $credential,
        $user,
        $ind = null,
        $error = ['detail' => false, 'username' => false, 'password' => false],
        $route = '',
        $status,
        $filter = null,
        $pass=false;
    public $detail = "", $username = "", $password = "";
    public $mTitle = "New credential", $btnSave = "Save", $modal = false;

    function __construct($id)
    {
        // $this->openModal(true);
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
            $this->credential = null;
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

    public function setPass($on)
    {
        if ($on === true) {
            $this->pass = true;
        }else{
            $this->pass = false;
        }
    }

    public function create()
    {
        $this->credential = new Credential;
        $this->mTitle = 'New credential';
        $this->btnSave = 'save';
        $this->clearForm();
        $this->openModal(true);
    }
    public function edit($id)
    {
        $this->credential = Credential::find($id);
        $this->detail = $this->credential->detail;
        $this->username = $this->credential->username;
        $this->password = $this->credential->password;
        $this->mTitle = 'Update credential';
        $this->btnSave = 'Update';
        $this->openModal(true);
    }
    public function save()
    {
        $this->error = ['detail' => false, 'username' => false, 'password' => false];

        // VALIDAR CAMPOS
        if ($this->detail == "") {
            $this->error['detail'] = true;
        }
        if ($this->username == "") {
            $this->error['username'] = true;
        }
        if ($this->password == "") {
            $this->error['password'] = true;
        }
        if ($this->error['detail'] === true || $this->error['username'] === true || $this->error['password'] === true ) {
            // dd('error validation');
            return;
        }
        // GUARDAR
        if ($this->credential->id) {
            $this->route = 'update';
        } else {
            $this->route = 'save';
        }
        $this->credential->userID = auth()->user()->id;
        $this->credential->detail = $this->detail;
        $this->credential->username = $this->username;
        $this->credential->password = $this->password;
        $this->credential->save();

        if ($this->route === 'save') {
            $this->clearForm();
        }
    }

    public function delete($id)
    {
        $credential = Credential::find($id);
        $credential->delete();
    }
    function clearForm()
    {
        $this->detail = "";
        $this->username = "";
        $this->password = "";
    }

    public function render()
    {
        $this->getCredentials();

        switch ($this->route) {
            case 'save':
                $this->route = '';
                return view('livewire.credentials')->with('Status', "Credential added successful");
            case 'update':
                $this->route = '';
                return view('livewire.credentials')->with('Status', "Credential updated successful");

            default:
                return view('livewire.credentials');
        }
    }
}