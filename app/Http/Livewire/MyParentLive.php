<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use Livewire\Component;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Notionlitie;
use Livewire\WithFileUploads;
use App\Models\ParentAttachment;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyParentLive extends Component
{

    use WithFileUploads;

    public $catchError,$updateMode = false,$photos,$show_table = true,$parent_id;

    public $currentStep = 1,
    $email,$password,
    // father
    $name_father,$name_father_en,$nat_id_father,$passport_father,$phone_father,
    $job_father,$job_father_en,$religion_father_id,$gender_father_id,$notionlitie_father_id,
    $addres_father,

    // mather
    $name_mather,$name_mather_en,$nat_id_mather,$passport_mather,$phone_mather,$job_mather,$job_mather_en
    ,$religion_mather_id,
    $gender_mather_id,$notionlitie_mather_id,$addres_mather
    ;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'nat_id_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_father' => 'min:10|max:10',
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nat_id_mather' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_mather' => 'min:10|max:10',
            'phone_mather' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }



    public function render()
    {
        return view('livewire.my-parent-live',[
            'religions'=>Religion::all(),
            'genders'=>Gender::all(),
            'notionlities'=>Notionlitie::all(),
            'myparents'=>MyParent::all(),
        ]);
    }

    public function showformadd(){
        $this->show_table = false;
    }
    //firstStepSubmit
    public function firstStepSubmit()
    {
       $this->validate([
            'email' => 'required|unique:my_parents,email,'.$this->id,
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'nat_id_father' => 'required|unique:my_parents,nat_id_father,' . $this->id,
            'passport_father' => 'required|unique:my_parents,passport_father,' . $this->id,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'notionlitie_father_id' => 'required',
            'religion_father_id' => 'required',
            'gender_father_id' => 'required',
            'addres_father' => 'required',
        ]);

        $this->currentStep = 2;
    }
       //secondStepSubmit
       public function secondStepSubmit()
       {

           $this->validate([
               'name_mather' => 'required',
               'name_mather_en' => 'required',
               'nat_id_mather' => 'required|unique:my_parents,nat_id_mather,' . $this->id,
               'passport_mather' => 'required|unique:my_parents,passport_mather,' . $this->id,
               'phone_mather' => 'required',
               'job_mather' => 'required',
               'job_mather_en' => 'required',
               'religion_mather_id' => 'required',
               'gender_mather_id' => 'required',
               'notionlitie_mather_id' => 'required',
               'addres_mather' => 'required',
           ]);

           $this->currentStep = 3;
       }

       public function submitForm(){

        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->name_father = ['en' => $this->name_father_en, 'ar' => $this->name_father];
            $My_Parent->nat_id_father = $this->nat_id_father;
            $My_Parent->passport_father = $this->passport_father;
            $My_Parent->phone_father = $this->phone_father;
            $My_Parent->job_father = ['en' => $this->job_father_en, 'ar' => $this->job_father];
            $My_Parent->passport_father = $this->passport_father;
            $My_Parent->notionlitie_father_id = $this->notionlitie_father_id;
            $My_Parent->gender_father_id = $this->gender_father_id;
            $My_Parent->religion_father_id = $this->religion_father_id;
            $My_Parent->addres_father = $this->addres_father;

            // Mother_INPUTS
            $My_Parent->name_mather = ['en' => $this->name_mather_en, 'ar' => $this->name_mather];
            $My_Parent->nat_id_mather = $this->nat_id_mather;
            $My_Parent->passport_mather = $this->passport_mather;
            $My_Parent->phone_mather = $this->phone_mather;
            $My_Parent->job_mather = ['en' => $this->job_mather_en, 'ar' => $this->job_mather];
            $My_Parent->passport_mather = $this->passport_mather;
            $My_Parent->religion_mather_id = $this->religion_mather_id;
            $My_Parent->gender_mather_id = $this->gender_mather_id;
            $My_Parent->notionlitie_mather_id = $this->notionlitie_mather_id;
            $My_Parent->addres_mather = $this->addres_mather;
            $My_Parent->save();

            // MyParent::create([
            //     'email'=>$this->email,
            //     'password'=>$this->password,
            //     'name_father'=>['en' =>$this->name_father_en, 'ar' =>$this->name_father],
            //     'nat_id_father'=>$this->nat_id_father,
            //     'passport_father'=>$this->passport_father,
            //     'phone_father'=>$this->phone_father,
            //     'job_father'=>['en' =>$this->job_father_en, 'ar' =>$this->job_father],
            //     'notionlitie_father_id'=>$this->notionlitie_father_id,
            //     'gender_father_id'=>$this->gender_father_id,
            //     'religion_father_id'=>$this->religion_father_id,
            //     'addres_father'=>$this->addres_father,


            //     'name_mather'=>['en' =>$this->name_mather_en, 'ar' =>$this->name_mather],
            //     'nat_id_mather'=>$this->nat_id_mather,
            //     'passport_mather'=>$this->passport_mather,
            //     'phone_mather'=>$this->phone_mather,
            //     'job_mather'=>['en' =>$this->job_mather_en, 'ar' =>$this->job_mather],
            //     'religion_mather_id'=>$this->religion_mather_id,
            //     'gender_mather_id'=>$this->gender_mather_id,
            //     'notionlitie_mather_id'=>$this->notionlitie_mather_id,
            //     'addres_mather'=>$this->addres_mather,
            // ]);

            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->nat_id_father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => MyParent::latest()->first()->id,
                    ]);
                }
            }
            $this->successMessage = 'Photo was successfully';
            $this->clearForm();
            $this->currentStep = 1;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id',$id)->first();
        $this->parent_id = $id;
        $this->email = $My_Parent->email;
        $this->password = $My_Parent->password;
        $this->name_father = $My_Parent->getTranslation('name_father', 'ar');
        $this->name_father_en = $My_Parent->getTranslation('name_father', 'en');
        $this->job_father = $My_Parent->getTranslation('job_father', 'ar');;
        $this->job_father_en = $My_Parent->getTranslation('job_father', 'en');
        $this->nat_id_father =$My_Parent->nat_id_father;
        $this->passport_father = $My_Parent->passport_father;
        $this->phone_father = $My_Parent->phone_father;
        $this->notionlitie_father_id = $My_Parent->notionlitie_father_id;
        $this->gender_father_id = $My_Parent->gender_father_id;
        $this->religion_father_id =$My_Parent->religion_father_id;
        $this->addres_father =$My_Parent->addres_father;

        $this->name_mather = $My_Parent->getTranslation('name_mather', 'ar');
        $this->name_mather_en = $My_Parent->getTranslation('name_mather', 'en');
        $this->job_mather = $My_Parent->getTranslation('job_mather', 'ar');;
        $this->job_mather_en = $My_Parent->getTranslation('job_mather', 'en');
        $this->nat_id_mather =$My_Parent->nat_id_mather;
        $this->passport_mather = $My_Parent->passport_mather;
        $this->phone_mather = $My_Parent->phone_mather;
        $this->religion_mather_id = $My_Parent->religion_mather_id;
        $this->gender_mather_id = $My_Parent->gender_mather_id;
        $this->addres_mather =$My_Parent->addres_mather;
        $this->notionlitie_mather_id =$My_Parent->notionlitie_mather_id;
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->parent_id){
            $parent = MyParent::find($this->parent_id);
            $parent->update([
                'passport_father' => $this->passport_father,
                'nat_id_father' => $this->nat_id_father,
            ]);

        }

        return redirect()->to('/my-parent');
    }

    public function delete($id){
        MyParent::findOrFail($id)->delete();
        return redirect()->to('/my-parent');
    }


    //clearForm
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->job_father = '';
        $this->job_father_en = '';
        $this->name_father_en = '';
        $this->nat_id_father ='';
        $this->passport_father = '';
        $this->phone_father = '';
        $this->notionlitie_father_id = '';
        $this->gender_father_id = '';
        $this->addres_father ='';
        $this->religion_father_id ='';

        $this->name_mather = '';
        $this->job_mather = '';
        $this->job_mather_en = '';
        $this->name_mather_en = '';
        $this->nat_id_mather ='';
        $this->passport_mather = '';
        $this->phone_mather = '';
        $this->religion_mather_id = '';
        $this->gender_mather_id = '';
        $this->addres_mather ='';
        $this->notionlitie_mather_id ='';

    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }


}
