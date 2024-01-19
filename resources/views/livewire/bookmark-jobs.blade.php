<div>
    <button wire:click="toggleBookmark">
        @if (optional($bookmarked)->exists)
            Remove from Bookmarks
        @else
            Add to Bookmarks
        @endif
    </button>
</div>