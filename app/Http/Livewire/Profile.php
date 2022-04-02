<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;

    public $idUser;
    public $panelShow = 'profile';

    public $avatar;
    public $fullName = '';
    public $phone = '';
    public $email = '';
    public $address = '';
    public $gender = '';
    public $avatarUser = '';
    public $orders = [];

    public $password = '';
    public $newPassword = '';
    public $newPassword_confirmation = '';

    protected $rules = [
        'password' => 'required|min:8|max:255',
        'newPassword' => 'required|min:8|max:255',
        'avatar' => 'image|max:1024'
    ];

    protected $messages = [
        'password.required' => 'Bạn chưa nhập password',
        'password.min' => 'Mật khẩu ít nhất 8 kí tự',
        'password.max' => 'Mật khẩu nhiều nhất 8 kí tự',

        'newPassword.required' => 'Bạn chưa nhập mật khẩu',
        'newPassword.min' => 'Mật khẩu ít nhất 8 kí tự',
        'newPassword.max' => 'Mật khẩu nhiều nhất 255 kí tự',
    ];

    public function mount($id) {
        $this->idUser = $id;

        $user = User::findOrFail($this->idUser);

        $this->fullName = $user->fullname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->gender = $user->gender;
        $this->avatarUser = $user->avatar;

        $this->orders = $user->orders;
        // dd($this->orders);
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
        if($propertyName == 'newPassword_confirmation' && $this->newPassword_confirmation != $this->newPassword) {
            $this->addError('newPassword_confirmation', 'Mật khẩu không chính xác');
        }
    }

    public function changePanel($name) {
        $this->panelShow = $name;
    }

    public function submitChangeInfo() {
        $user = User::findOrFail($this->idUser);

        $existedPhone = User::query()
                            ->where('phone', $this->phone)
                            ->get();
        // dd($this->phone != $user->phone);
        if(count($existedPhone) > 0 && $this->phone != $user->phone){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Số điện thoại đã tồn tại',
                'icon' => 'error',
                'timer' => 2000,
            ]);

            return ;
        }

        $user->fullName = $this->fullName;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->gender = $this->gender;
        
        $user->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Thay đổi thông tin cá nhân thành công',
            'icon' => 'success',
            'timer' => 2000,
        ]);
    }

    public function submitChangePassword() {
        $user = User::findOrFail($this->idUser);

        if(!Hash::check($this->password, $user->password)){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thất bại',
                'text' => 'Mật khẩu hiện tại không đúng',
                'icon' => 'error',
                'timer' => 2000,
            ]);

            return;
        }

        $user->password = Hash::make($this->newPassword);
        
        $user->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Thành công',
            'text' => 'Thay đổi mật khẩu thành công',
            'icon' => 'success',
            'timer' => 2000,
        ]);
    }

    public function deleteImagePreview() {
        $this->avatar = null;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
