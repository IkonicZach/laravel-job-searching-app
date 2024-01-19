<?php

namespace App\Livewire;

use Livewire\Component;

class BookmarkJobs extends Component
{
    public $jobId;

    public function mount($jobId)
    {
        $this->jobId = $jobId;
    }

    public function getBookmarkedProperty()
    {
        // Check if the current user has bookmarked the job
        return auth()->check() && auth()->user()->bookmarkedJobs->contains('id', $this->jobId);
    }

    public function toggleBookmark()
    {
        // Toggle the bookmark status for the current user and job
        $user = auth()->user();

        if ($this->bookmarked) {
            $user->bookmarkedJobs()->detach($this->jobId);
        } else {
            $user->bookmarkedJobs()->attach($this->jobId);
        }
    }

    public function render()
    {
        return view('livewire.bookmark-jobs');
    }
}