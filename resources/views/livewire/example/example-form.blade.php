<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\HasCode;
use App\Models\Example;

new class extends Component {
    use WithFileUploads, HasCode;

    public $set_id;
    public $code;
    public $name;
    public $gender;
    public $birth_date;
    public $address;
    public $number;
    public $active;
    public $email;
    public $avatar;
    public $showAvatar;
    public $user_id;

    public function mount(Request $request)
    {
        $example = Example::where('id', $request->id)->first();
        $this->set_id = $example->id ?? '';
        $this->code = $example->code ?? '[auto]';
        $this->name = $example->name ?? '';
        $this->gender = $example->gender ?? '';
        $this->birth_date = isset($example->birth_date) ? ($example->birth_date)->format('Y-m-d') : '';
        $this->address = $example->address ?? '';
        $this->number = $example->number ?? '';
        $this->active = $example->active ?? '';
        $this->email = $example->email ?? '';
        $this->showAvatar = $example->avatar ?? '';
        $this->user_id = $example->user_id ?? '';
    }

    public function store()
    {
        if(empty($this->set_id))
        {
            $valid = $this->validate([
                'name' => 'required',
                'birth_date' => 'required',
                'address' => 'required',
                'number' => '',
                'user_id' => 'required',
                'email' => 'required|email|unique:example,email',
                'avatar' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            ]);

            $avatar = $this->avatar->store('/', 'avatar_disk');

            $valid['code'] = $this->autoCode('INV-', Carbon::now());
            $valid['active'] = $this->active ? 1 : 0;
            $valid['avatar'] = $avatar;

            $example = Example::create($valid);
            session()->flash('success', __('Example has been saved'));
            $this->redirectRoute('example.example.form', $example->id);
        }
        else
        {
            $valid = $this->validate([
                'name' => 'required',
                'birth_date' => 'required',
                'address' => 'required',
                'number' => '',
                'user_id' => 'required',
                'email' => 'required|email|unique:example,email,'.$this->set_id,
                'avatar' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp,svg',
            ]);

            unset($valid['avatar']);
            if ( !empty($this->avatar) ) {
                $avatar = $this->avatar->store('/', 'avatar_disk');
                $valid['avatar'] = $avatar;
            }

            $valid['active'] = $this->active ? 1 : 0;

            Example::where('id', $this->set_id)->update($valid);
            session()->flash('success', __('Example has been saved'));
        }
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Example / Volt') }}
        </h2>
    </x-slot>

    <x-hyco.flash-alert />
    <div wire:loading class="fixed top-0">
        <x-hyco.loading />
    </div>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <x-hyco.section submit="store">
                <x-slot name="body">

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="name" :value="__('Full Name')" class="mb-1" />
                        <x-hyco.input id="name" wire:model="name" class="w-full" autofocus />
                        <x-hyco.input-error class="mt-2" for="name" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="code" :value="__('Code')" class="mb-1" />
                        <x-hyco.input id="code" wire:model="code" class="w-full bg-slate-100" readonly />
                        <x-hyco.input-error class="mt-2" for="code" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="email" :value="__('Email')" class="mb-1" />
                        <x-hyco.input id="email" wire:model="email" class="w-full" />
                        <x-hyco.input-error class="mt-2" for="email" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="birth_date" :value="__('Birth Date')" class="mb-1" />
                        <x-hyco.input type="date" id="birth_date" wire:model="birth_date" class="w-full" />
                        <x-hyco.input-error class="mt-2" for="birth_date" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="address" :value="__('Address')" class="mb-1" />
                        <x-hyco.textarea id="address" wire:model="address" class="w-full h-[100px]"></x-hyco.textarea>
                        <x-hyco.input-error class="mt-2" for="address" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="number" :value="__('Number')" class="mb-1" />
                        <x-hyco.input id="number" wire:model="number" class="w-full" />
                        <x-hyco.input-error class="mt-2" for="number" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="avatar" :value="__('Avatar')" class="mb-1" />
                        <x-hyco.input-avatar id="avatar" wire:model.live="avatar" :show="$showAvatar" />
                        <x-hyco.input-error class="mt-2" for="avatar" />
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-hyco.label for="user_id" :value="__('User')" class="mb-1" />
                        <x-hyco.select wire:model="user_id" :options="\App\Models\User::pluck('name','id')" class="w-full"></x-hyco.select>
                        <x-hyco.input-error class="mt-2" for="user_id" />
                    </div>

                </x-slot>

                <x-slot name="footer" class="justify-center">
                    <x-hyco.link href="{{ route('example.example') }}" wire:navigate icon="x-mark" class="bg-yellow-500 hover:bg-yellow-400">Back</x-hyco.link>
                    <x-hyco.button wire:loading.attr="disabled" icon="check">Save</x-hyco.button>
                </x-slot>
            </x-hyco.section>

        </div>
    </div>
</div>
