{{-- resources/views/filament/resources/activity-log/subject-entry.blade.php --}}
@php
    $type = $record->subject_type ? class_basename($record->subject_type) : '-';
@endphp

<div class="text-sm text-gray-700">
    <div class="font-medium">{{ $type }}</div>
    @if($record->subject_id)
        <div class="text-xs text-gray-500 mt-1">ID: <span class="font-mono">{{ $record->subject_id }}</span></div>
    @endif
</div>