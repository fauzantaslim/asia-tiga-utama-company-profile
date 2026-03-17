{{-- resources/views/filament/resources/activity-log/properties-comparison.blade.php --}}
@php
    // $record adalah instance Activity (Spatie\Activitylog\Models\Activity)
    $old = $record->properties['old'] ?? [];
    $after = $record->properties['attributes'] ?? [];

    // union keys
    $keys = array_unique(array_merge(array_keys($old), array_keys($after)));
@endphp

<div class="space-y-3">
    @if(empty($keys))
        <div class="text-sm text-gray-500">No property changes recorded.</div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-left text-xs text-gray-500 uppercase">
                    <tr>
                        <th class="py-2 pr-4">Field</th>
                        <th class="py-2 pr-4">Before</th>
                        <th class="py-2 pr-4">After</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($keys as $key)
                        @php
                            $a = array_key_exists($key, $old) ? $old[$key] : null;
                            $b = array_key_exists($key, $after) ? $after[$key] : null;
                            // simple stringify
                            $aStr = is_scalar($a) ? (string) $a : json_encode($a);
                            $bStr = is_scalar($b) ? (string) $b : json_encode($b);
                            $changed = $aStr !== $bStr;
                        @endphp
                        <tr class="{{ $changed ? 'bg-red-50' : '' }}">
                            <td class="py-2 pr-4 align-top font-mono text-xs text-gray-700">{{ $key }}</td>
                            <td class="py-2 pr-4 align-top text-sm text-gray-700">
                                @if($aStr === '' || is_null($a))
                                    <span class="text-gray-400">—</span>
                                @else
                                    <div class="max-w-md break-words">{{ $aStr }}</div>
                                @endif
                            </td>
                            <td class="py-2 pr-4 align-top text-sm">
                                @if($bStr === '' || is_null($b))
                                    <span class="text-gray-400">—</span>
                                @else
                                    <div class="max-w-md break-words">
                                        <span class="{{ $changed ? 'font-semibold text-gray-900' : 'text-gray-700' }}">{{ $bStr }}</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>