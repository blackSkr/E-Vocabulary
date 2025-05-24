<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;

class Register extends BaseRegister
{
    protected function handleRegistration(array $data): Model
    {
        $user = User::create([
            'nim' => $data['nim'],
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'prodi_id' => $data['prodi_id'],
            // 'kelas_id' => $data['kelas_id'],
            'password' => $data['password'],
        ]);

        // $user->assignRole('mahasiswa');

        return $user;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique(User::class)
                    ->maxLength(20)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(50)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(User::class)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP / WA')
                    ->required()
                    ->unique(User::class)
                    ->maxLength(15)
                    ->columnSpanFull(),

                Forms\Components\Select::make('prodi_id')
                    ->options(\App\Models\Prodi::pluck('nama_prodi', 'id')->toArray())
                    ->native(false)
                    ->label('Program Studi')
                    // ->relationship('prodi', 'nama_prodi')
                    ->required()
                    ->columnSpanFull(),

                $this->getPasswordFormComponent()
                    ->label('Password')
                    ->columnSpanFull(),

                $this->getPasswordConfirmationFormComponent()
                    ->label('Konfirmasi Password')
                    ->columnSpanFull(),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function loginAction(): Action
    {
        return parent::loginAction()->label('Sudah punya akun? Masuk di sini');
    }

    public function homeAction(): Action
    {
        return Action::make('home')
            ->label('Kembali ke Beranda')
            ->url('/')
            ->link();
    }

    protected function getFormActions(): array
    {
        return [
            $this->getRegisterFormAction()
                ->label('Daftar'),
        ];
    }
}
