@props(['url'])
@php
    $logoPath = public_path('storage/ejlals-horizontal.png');
    $logoBase64 = '';
    if (file_exists($logoPath)) {
        $logoData = file_get_contents($logoPath);
        $logoBase64 = 'data:image/png;base64,' . base64_encode($logoData);
    }
@endphp
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if ($logoBase64)
<img src="{{ $logoBase64 }}" class="logo" alt="{{ config('app.name') }}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
