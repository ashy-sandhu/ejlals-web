<x-filament::tabs>
    <x-filament::tabs.item 
        wire:click="$set('tableFilters.type.value', null)" 
        :active="blank($this->tableFilters['type']['value'] ?? null)"
    >
        All
    </x-filament::tabs.item>
    
    <x-filament::tabs.item 
        wire:click="$set('tableFilters.type.value', 'course')" 
        :active="($this->tableFilters['type']['value'] ?? null) === 'course'"
    >
        Course
    </x-filament::tabs.item>
    
    <x-filament::tabs.item 
        wire:click="$set('tableFilters.type.value', 'book')" 
        :active="($this->tableFilters['type']['value'] ?? null) === 'book'"
    >
        Book
    </x-filament::tabs.item>
    
    <x-filament::tabs.item 
        wire:click="$set('tableFilters.type.value', 'post')" 
        :active="($this->tableFilters['type']['value'] ?? null) === 'post'"
    >
        Post
    </x-filament::tabs.item>
</x-filament::tabs>

<style>
    /* Hide the standard funnel icon and active indicator to prevent duplicate UI */
    .fi-ta-filters-trigger,
    .fi-ta-filters-active-indicator {
        display: none !important;
    }
</style>
