<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::id(), // Mengambil ID pengguna yang sedang login
        ]);

        session()->flash('message', 'Post successfully created.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
