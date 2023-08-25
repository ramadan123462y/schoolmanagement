<?php

namespace App\Http\Livewire;

use App\Models\My_Parent;
use Livewire\Component;
use App\Models\Blood;
use App\Models\Nationalitie;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;

class Viewbarent extends Component
{
    public $update_mode = false;
    public $table_mode = true;
    public $current_step = 1;
    public $Parent_id;
    public $message_error=false;

    public $my_parents;
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

    public function render()
    {



        $Nationalities = $this->Nationalities = Nationalitie::get();
        $Type_Bloods = $this->Type_Bloods = Blood::get();
        $Religions = $this->Religions = Religion::get();
        $my_parents= $this->my_parents = My_Parent::get();
        return view(
            'livewire.viewbarent',

            [
                'my_parents' => $my_parents,
                'Nationalities' => $Nationalities,
                'Type_Bloods' => $Type_Bloods,
                'Religions' => $Religions,
            ]
        );
    }

    public function next_step($step)
    {
        $this->current_step++;
    }


    public function next_step2($step)
    {
        $this->current_step++;
    }

    public function back($step)
    {
        $this->current_step--;
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

    public function active_update_mode()
    {

        $this->table_mode = false;
        $this->update_mode = true;
    }

    public function un_active_update_mode()
    {

        $this->table_mode = true;
        $this->update_mode = false;
    }
    public function edit($id)
    {
        $this->active_update_mode();
        $My_Parent = My_Parent::find($id);
        $this->Parent_id = $id;
        $this->Email = $My_Parent->Email;
        $this->Password = $My_Parent->Password;
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father = $My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father = $My_Parent->Address_Father;
        $this->Religion_Father_id = $My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother = $My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother = $My_Parent->Address_Mother;
        $this->Religion_Mother_id = $My_Parent->Religion_Mother_id;
    }
    public function update()
    {
        $this->update_parent();
        $this->emptyy();

        $this->un_active_update_mode();
        $this->message();
    }
    public function update_parent()
    {

        try {


            My_Parent::find($this->Parent_id)->update([
                'Email' => $this->Email,
                'Password' => Hash::make($this->Password),
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],

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
        } catch (\Exception $e) {
            $this->message_error="An error occurred, please refresh the page";
        }
    }
    public function message()
    {

        $this->dispatchBrowserEvent('update_parent');
    }
    public function delete($id)
    {
        try {

            My_Parent::find($id)->delete();
            $this->my_parents= My_Parent::get();
             $this->dispatchBrowserEvent('delete_parent');
        } catch (\Exception $e) {
            $this->message_error="An error occurred, please refresh the page or parent have data not deleted";
        }
    }
}
