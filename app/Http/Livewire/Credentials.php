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
    $search = '',
    $pass = false;
    public $detail = "", $username = "", $password = "";
    public $mTitle = "New credential", $btnSave = "Save", $modal = false;

    function __construct()
    {
        // $this->setID(58);
        // $this->openModal(true);
    }
    protected $listeners = [
        'getSearch' => 'getSearch',
    ];
    function getCredentials($search = '')
    {
        if (auth()) {
            $this->credentials = Credential::where('userID', auth()->user()->id)
                ->where('detail', 'like', '%' . $search . '%')
                ->get()
            ;
        }
    }

    public function getSearch($data)
    {
        $this->search = $data;
        $this->getCredentials();
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
        $this->render();
    }

    public function setPass($on)
    {
        if ($on === true) {
            $this->pass = true;
        } else {
            $this->pass = false;
        }
    }

    public function create()
    {
        dd('create');
        $this->credential = new Credential;
        $this->mTitle = 'New credential';
        $this->btnSave = 'Save';
        $this->error = ['detail' => false, 'username' => false, 'password' => false];
        $this->clearForm();
        $this->openModal(true);
    }
    public function edit($id)
    {
        dd('edit');
        $this->credential = Credential::find($id);
        $this->detail = $this->credential->detail;
        $this->username = $this->credential->username;
        $this->password = $this->credential->password;
        $this->error = ['detail' => false, 'username' => false, 'password' => false];
        $this->mTitle = 'Update credential';
        $this->btnSave = 'Update';
        $this->openModal(true);
    }
    public function save()
    {
        dd('save');
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
        if ($this->error['detail'] === true || $this->error['username'] === true || $this->error['password'] === true) {
            // dd('error validation');
            return;
        }
        // GUARDAR
        $this->credential->userID = auth()->user()->id;
        $this->credential->detail = $this->detail;
        $this->credential->username = $this->username;
        $this->credential->password = $this->password;
        $this->credential->save();

        if ($this->btnSave === 'Update') {
            $this->route = 'update';
            // $this->status = "Credential added successful";
        } else if ($this->btnSave === 'Save') {
            $this->route = 'save';
            // $this->status = "Credential updated successful";
            $this->clearForm();
            $this->credential = new Credential;
        }

    }

    public function delete($id)
    {
        dd('delete');
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
        $this->getCredentials($this->search);
// dd($this->modal);

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
        // return view('livewire.credentials')->with('Status', $this->status);
    }
}