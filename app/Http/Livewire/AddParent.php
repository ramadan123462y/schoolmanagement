<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Parent_attchement;
use Livewire\Component;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class AddParent extends Component
{

    use WithFileUploads;
    public $update_mode = false;
    public $store_mode = false;
    public $current_step = 1;


    public $images = [];
    public $Nationalities, $Type_Bloods, $Religions, $Email, $Password,
        $Name_Father, $Name_Father_en, $Job_Father, $Job_Father_en,
        $National_ID_Father, $Passport_ID_Father, $Phone_Father,
        $Nationality_Father_id, $Blood_Type_Father_id, $Religion_Father_id,
        $Address_Father, $Name_Mother, $Name_Mother_en, $Job_Mother, $Job_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother, $Phone_Mother,

        $Nationality_Mother_id,
        $Blood_Type_Mother_id,
        $Religion_Mother_id,
        $Address_Mother;


    protected $rules = [



        'Email' => 'required|email',
        'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        'Passport_ID_Father' => 'min:10|max:10',
        'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        'Passport_ID_Mother' => 'min:10|max:10',
        'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'


    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $Nationalities = $this->Nationalities = Nationalitie::get();
        $Type_Bloods = $this->Type_Bloods = Blood::get();
        $Religions = $this->Religions = Religion::get();
        return view('livewire.add-parent', [
            'Nationalities' => $Nationalities,
            'Type_Bloods' => $Type_Bloods,
            'Religions' => $Religions,

        ]);
    }
    public function next_step($step)
    {
        $this->validate([
            'Email' => 'required|unique:my__parents,Email,' . $this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',

        ]);

        $this->current_step++;
    }

    public function next_step2($step)
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->current_step++;
    }
    public function back($step)
    {

        $this->current_step--;
    }
    public function store()
    {

        try {

            $this->store_parent();
            $this->save_image();


            $this->emptyy();

            $this->message();

            $this->current_step = 1;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "An error occurred, please refresh the page"]);
        }
    }
    public function emptyy()
    {

        $this->Email = '';
        $this->Password = '';
        $this->Name_Father_en = '';
        $this->Name_Father = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Job_Father_en = '';
        $this->Job_Father = '';
        $this->Passport_ID_Father = '';
        $this->Religion_Father_id = '';
        $this->Address_Father = '';
        $this->Name_Mother_en = '';
        $this->Name_Mother = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Job_Mother_en = '';
        $this->Job_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Religion_Mother_id = '';
        $this->Address_Mother = '';
    }

    public function message()
    {

        $this->dispatchBrowserEvent('name-updated');
    }
    public function store_parent()
    {
        My_Parent::create([
            'Email' => $this->Email,
            'Password' => $this->Password,
            'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
            'National_ID_Father' => $this->National_ID_Father,
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Phone_Father' => $this->Phone_Father,
            'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Nationality_Father_id' => $this->Nationality_Father_id,
            'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
            'Religion_Father_id' => $this->Religion_Father_id,
            'Address_Father' => $this->Address_Father,


            'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
            'National_ID_Mother' => $this->National_ID_Mother,
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Nationality_Mother_id' => $this->Nationality_Mother_id,
            'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
            'Religion_Mother_id' => $this->Religion_Mother_id,
            'Address_Mother' => $this->Address_Mother,


        ]);
    }
    public function save_image()
    {

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $image->storeAs($this->National_ID_Father, $image->getClientOriginalName(), $disk = 'parent_attachments');
                Parent_attchement::create([
                    'file_name' => $image->getClientOriginalName(),
                    'parent_id' => My_Parent::latest()->first()->id,
                ]);
            }
        }
    }
}
