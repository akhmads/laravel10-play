<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

new class extends Component {

    public $debug;

    public function mount()
    {
        DB::enableQueryLog();

        $user = User::find(1);
        $user->posts()->create([
            'title' => 'The Title',
            'body' => 'The body with long text',
        ]);

        $user->posts()->createMany([
            [
                'title' => 'The Second Title',
                'body' => 'The second body with long text',
            ],
            [
                'title' => 'The Third Title',
                'body' => 'The third body with long text',
            ],
        ]);

        $query = DB::getQueryLog();
        dd($query);
    }

    public function with(): array
    {
        return [];
    }
}; ?>

<div>

</div>
