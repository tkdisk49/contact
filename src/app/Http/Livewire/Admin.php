<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class Admin extends Component
{

    public $showModal = false;
    public $contact;

    protected $contacts;

    public function mount()
    {
        $this->contacts = Contact::with('category')->get();
    }

    public function render()
    {
        return view('livewire.admin', [
            'contacts' => $this->contacts,
        ]);
    }

    public function openModal($id)
    {
        // $this->contact = Contact::with('category')->find($id);

        $contact = Contact::find($id);

        $contact->last_name;
        $contact->

        $this->showModal = true;
        // $lastName = $this->contact->last_name;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
