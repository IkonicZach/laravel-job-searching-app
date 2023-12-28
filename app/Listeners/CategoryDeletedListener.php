<?php

namespace App\Listeners;
use App\Models\Category;

class CategoryDeletedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Category $category)
    {
        if ($category->trashed()) { // Check if it's a soft delete
            $category->subcategories()->delete(); // Soft delete related subcategories
        }
    }
}
