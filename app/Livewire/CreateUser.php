<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
class CreateUser extends Component
{

    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $profile;

    public $id = null;
    
    public function createUpdate(){
        if($this->id){
            $user = User::find($this->id);

            $user->name = $this->name;
            $user->email = $this->email;

            if($this->password)
            $user->password = $this->password;

            if($this->profile)
            $user->profile = $this->profile->store('profile' , 'public');

            $user->save();
            session()->flash('success' , "updated");
            
        }else{
            $this->validate([
                'name' => 'required|min:2|max:50',
                'email' => 'required|min:2|max:50|unique:users',
                'password' => 'required|min:2|max:50',
                'profile' => 'required|file',
            ]);
    
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'profile' => $this->profile->store('profile' , 'public'),
            ]);
            session()->flash('success' , "kob");
        }

        $this->reset(['name' , 'email' , 'password' , 'profile' , 'id']);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('delete' , "deleted");
    }


    public function edit($id){
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->id = $user->id;
    }
    
    
    public function render()
    {
        $users = User::get();
        return view('livewire.create-user' , compact('users'));
    }
}
