{{-- resources/views/filament/resources/activity-log/causer-entry.blade.php --}}
@php
    $causer = $record->causer;
@endphp

<div class="flex items-center gap-3">
    @if($causer)
        {{-- kalau model user punya avatar/email, tampilkan ringkas --}}
        <div class="flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-sm text-gray-500">
                {{-- fallback inisial --}}
                {{ strtoupper(substr($causer->name ?? ($causer->email ?? 'U'), 0, 1)) }}
            </div>
        </div>
        <div>
            <div class="font-medium text-sm text-gray-800">{{ $causer->name ?? ($causer->email ?? 'User') }}</div>
            @if(property_exists($causer, 'email') && $causer->email)
                <div class="text-xs text-gray-500">{{ $causer->email }}</div>
            @endif
            <div class="text-xs text-gray-400 mt-1">ID: <span class="font-mono text-xs">{{ $causer->getKey() }}</span></div>
        </div>
    @else
        <div class="text-sm text-gray-600">System</div>
    @endif
</div>