<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:5', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name' => [
                'required' => 'Имя обязательно',
                'max:255' => 'Имя не должно состоять более чем из 255 символов',
            ],
            'email' => [
                'required' => 'Email обязателен',
                'email' => "Email должен быть email'ом",
                'unique' => 'Пользователь с таким email уже зарегестрирован',
                'max:255' => 'Email не должен состоять более чем из 255 символов',
            ],
            'password' => [
                'required' => 'Пароль обязателен',
                'confirmed' => 'Пароли не совпадают',
                'min:5' => 'Пароль должен состоять минимум из 5 символов',
                'max:255' => 'Пароль не должен состоять более чем из 255 символов',
            ],
        ];
    }

    public function register()
    {
        $validated = $this->validate();

        $user = User::create($validated);

        Auth::login($user);

        return $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
