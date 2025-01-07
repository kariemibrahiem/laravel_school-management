<?php

namespace App\Http\Livewire;

use App\Models\Blood_type;
use App\Models\Myparent;
use App\Models\Nationalities;
use App\Models\Religion;
use Exception;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddParent extends Component
{
    
   
        public $currentStep = 1, $updateModel = false , $Parent_id ,
    
            // Father_INPUTS
            $Email, $Password,
            $Name_Father, $Name_Father_en, $showTable = true,
            $National_ID_Father, $Passport_ID_Father,
            $Phone_Father, $Job_Father, $Job_Father_en,
            $Nationality_Father_id, $Blood_Type_Father_id,
            $Address_Father, $Religion_Father_id,
    
            // Mother_INPUTS
            $Name_Mother, $Name_Mother_en,
            $National_ID_Mother, $Passport_ID_Mother,
            $Phone_Mother, $Job_Mother, $Job_Mother_en,
            $Nationality_Mother_id, $Blood_Type_Mother_id,
            $Address_Mother, $Religion_Mother_id;
    
        public function render()
        {
            return view('livewire.add-parent', [
                'Nationalities' => Nationalities::all(),
                'Type_Bloods' => Blood_type::all(),
                'Religions' => Religion::all(),
                "my_parents" => Myparent::all()
            ]);
    
        }

        // real-time render
        public function updated($requst){

            $this->validateOnly($requst , [
                'Email' => 'required|email|unique:myparents,F_email',
                "Name_Father"=>"required|min:5|max:50|unique:myparents,F_name",
                "Password"=>"required|min:7|max:10",
                'National_ID_Father' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
                'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:myparents,F_phone',
                'National_ID_Mother' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
                'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            ]);

        }
    
        //firstStepSubmit
        public function firstStepSubmit()
        {
            $this->validate([
                'Password' => 'required',
                'Name_Father' => 'required|unique:myparents,F_name',
                'Job_Father' => 'required',
                'National_ID_Father' => 'required|unique:myparents,F_nationality_id,' . $this->id,
                'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'Nationality_Father_id' => 'required', // the error
                'Blood_Type_Father_id' => 'required',
                'Religion_Father_id' => 'required',
                'Address_Father' => 'required',
            ]);
    
            $this->currentStep = 2;
        }
    
        //secondStepSubmit
        public function secondStepSubmit()
        {
            // $this->validate([
            //     'Name_Mother' => 'required|unique:myparents,M_name',
            //     'National_ID_Mother' => 'required|unique:myparents,M_nationality_id,' . $this->id,
            //     'Phone_Mother' => 'required|unique:myparents,M_phone',
            //     'Job_Mother' => 'required',
            //     'Nationality_Mother_id' => 'required',
            //     'Blood_Type_Mother_id' => 'required',
            //     'Religion_Mother_id' => 'required',
            //     'Address_Mother' => 'required',
              
            // ]);
            $this->currentStep = 3;
        }


        // update method 

        public function edit($id)
        {
            $this->showTable = false;
            $this->updateModel = true;
            $My_Parent = Myparent::where('id',$id)->first();
            $this->Parent_id = $id;
            $this->Email = $My_Parent->F_email;
            $this->Password = $My_Parent->F_password;
            $this->Name_Father = $My_Parent->F_name;
            $this->Job_Father = $My_Parent->F_job;
            $this->National_ID_Father =$My_Parent->National_ID_Father;
            $this->Phone_Father = $My_Parent->F_phone;
            $this->Nationality_Father_id = $My_Parent->F_nationality_id;
            $this->Blood_Type_Father_id = $My_Parent->F_blood_id;
            $this->Address_Father =$My_Parent->F_address;
            $this->Religion_Father_id =$My_Parent->F_religion_id;
    // 
            $this->Name_Mother = $My_Parent->M_name;
            $this->Job_Mother = $My_Parent->M_job;
            $this->Phone_Mother = $My_Parent->M_phone;
            $this->Nationality_Mother_id = $My_Parent->M_nationality_id;
            $this->Blood_Type_Mother_id = $My_Parent->M_blood_id;
            $this->Address_Mother =$My_Parent->M_address;
            $this->Religion_Mother_id =$My_Parent->M_religion_id;
        }

        public function firstStepSubmit_edit()
    {
        $this->updateModel = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateModel = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parent = Myparent::find($this->Parent_id);
            $parent->F_email = $this->Email;
                $parent->F_address = $this->Address_Father;
                $parent->F_name = $this->Name_Father;
                $parent->F_phone = $this->Phone_Father;
                $parent->F_job =  $this->Job_Father;
                $parent->F_nationality_id = $this->Nationality_Father_id;
                $parent->F_blood_id = $this->Blood_Type_Father_id;
                $parent->F_religion_id = $this->Religion_Father_id;



                // Mother_INPUTS
                $parent->M_name =  $this->Name_Mother;
                $parent->M_phone = $this->Phone_Mother;
                $parent->M_job = $this->Job_Mother;
                $parent->M_blood_id = $this->Blood_Type_Mother_id;
                $parent->M_religion_id = $this->Religion_Mother_id;
                $parent->M_address = $this->Address_Mother;

                $parent->save();
        }

        return redirect('/addparents');
    }



        // insert in database 
        public function submitForm(){
            $myparent = new Myparent();
            try{
                $myparent->F_email = $this->Email;
                $myparent->F_password = Hash::make($this->Password);
                $myparent->F_address = $this->Address_Father;
                $myparent->F_name = $this->Name_Father;
                $myparent->F_phone = $this->Phone_Father;
                $myparent->F_job =  $this->Job_Father;
                $myparent->National_ID_Father =  $this->National_ID_Father;
                $myparent->F_nationality_id = $this->Nationality_Father_id;
                $myparent->F_blood_id = $this->Blood_Type_Father_id;
                $myparent->F_religion_id = $this->Religion_Father_id;



                // Mother_INPUTS
                $myparent->M_name =  $this->Name_Mother;
                $myparent->M_phone = $this->Phone_Mother;
                $myparent->M_job = $this->Job_Mother;
                $myparent->M_nationality_id = $this->Nationality_Mother_id;
                $myparent->M_blood_id = $this->Blood_Type_Mother_id;
                $myparent->M_religion_id = $this->Religion_Mother_id;
                $myparent->M_address = $this->Address_Mother;

                $myparent->save();
                // $this->successMessage = trans('messages.success');
                $this->clearForm();
                $this->currentStep = 1;
                toastr()->success("the insert successfully added");
        }catch (Exception $e) {
                toastr()->error("not accepted insert" .$e);
            }
           return redirect("addparents");
        }
    
        public function showformad(){
            $this->showTable = false;
        }
        public function hideFrom(){
            $this->showTable = true;
        }

        // delete record 
        public function delete($id){
            Myparent::findOrFail($id)->delete();
            return redirect("addparents");
        }

        public function clearForm(){
            // Father_INPUTS
            $Email = "";
             $Password= "";

            $Name_Father= "";
             $Name_Father_en= "";

            $National_ID_Father= "";
             $Passport_ID_Father= "";

            $Phone_Father= "";
             $Job_Father= "";
             $Job_Father_en= "";

            $Nationality_Father_id= "";
             $Blood_Type_Father_id= "";

            $Address_Father= "";
             $Religion_Father_id= "";

    
            // Mother_INPUTS
            $Name_Mother= "";
            $Name_Mother_en= "";

            $National_ID_Mother= "";
             $Passport_ID_Mother= "";

            $Phone_Mother= "";
            $Job_Mother= "";
             $Job_Mother_en= "";

            $Nationality_Mother_id= "";
             $Blood_Type_Mother_id= "";

            $Address_Mother= "";
            $Religion_Mother_id= "";

        }
    
        //back
        public function back($step)
        {
            $this->currentStep = $step;
        }
    
    
}
