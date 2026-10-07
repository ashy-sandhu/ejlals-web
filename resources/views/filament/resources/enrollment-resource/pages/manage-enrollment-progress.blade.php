<x-filament-panels::page>
    @php
        $modules = $this->getCourseModules();
        $attendances = $this->getAttendances();
        $progress = $this->record->getProgressPercentage();
    @endphp

    <div class="mb-4">
        <h2 class="text-lg font-bold">Course: {{ $this->record->course->title }}</h2>
        <p class="text-sm text-gray-500">Student: {{ $this->record->user->name }}</p>
        
        <div class="mt-4 p-4 bg-white rounded-xl shadow-sm dark:bg-gray-900 ring-1 ring-gray-950/5 dark:ring-white/10">
            <div class="flex items-center justify-between mb-2">
                <span class="font-medium">Overall Progress</span>
                <span class="font-bold text-primary-600">{{ $progress }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-primary-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        @forelse($modules as $module)
            <x-filament::section>
                <x-slot name="heading">
                    {{ $module->title }}
                </x-slot>

                <div class="flex flex-col gap-4">
                    @forelse($module->lessons as $lesson)
                        @php
                            $isAttended = $attendances->has($lesson->id);
                            $attendance = $attendances->get($lesson->id);
                        @endphp
                        
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <h4 class="font-medium text-gray-900 dark:text-white">{{ $lesson->title }}</h4>
                                    @if($isAttended)
                                        <x-filament::badge color="success" icon="heroicon-m-check-circle">
                                            Completed
                                        </x-filament::badge>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Duration: {{ $lesson->duration ?? 'N/A' }}</p>
                                
                                @if($isAttended && $attendance->notes)
                                    <div class="mt-2 text-sm bg-white dark:bg-gray-900 p-3 rounded border border-gray-200 dark:border-gray-700">
                                        <span class="font-semibold">Notes:</span> {{ $attendance->notes }}
                                    </div>
                                @endif
                                
                                @if($isAttended && $attendance->attachment_path)
                                    <div class="mt-2">
                                        <x-filament::button
                                            tag="a"
                                            href="{{ asset('storage/' . $attendance->attachment_path) }}"
                                            target="_blank"
                                            size="sm"
                                            color="gray"
                                            icon="heroicon-m-arrow-down-tray"
                                        >
                                            Download Attachment
                                        </x-filament::button>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="ml-4 flex-shrink-0">
                                @if(!$isAttended)
                                    {{ ($this->markAsAttendedAction)(['lesson' => $lesson->id]) }}
                                @else
                                    <span class="text-sm text-gray-500">
                                        Attended on {{ $attendance->attended_at->format('M d, Y h:i A') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No lessons in this module.</p>
                    @endforelse
                </div>
            </x-filament::section>
        @empty
            <div class="text-center p-6 bg-white rounded-xl shadow-sm dark:bg-gray-900 ring-1 ring-gray-950/5 dark:ring-white/10">
                <p class="text-gray-500">This course has no modules/lessons defined yet.</p>
            </div>
        @endforelse
    </div>

    <x-filament-actions::modals />
</x-filament-panels::page>
