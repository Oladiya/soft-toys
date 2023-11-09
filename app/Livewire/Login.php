<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email' => [
                'required' => 'Как нам без Вашего мыла узнать, кто Вы?',
                'email' => "Email должен быть email'ом",
                'exists' => "Пользователя с таким email'ом не найдено"
            ],
            'password' => [
                'required' => 'Как нам без Вашего пароля убедиться, что это действительно Вы?',
            ],
        ];
    }

    public function login(Request $request)
    {
        $validated = $this->validate();

        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return $this->redirect(route('home'), navigate: true);
        }

        $this->addError('email', "Упс. Кажется, пароль к данному Email'у не подходит.");
    }

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
