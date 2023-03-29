@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ $settings->logo }}" class="logo" alt="Yazılım Eğitim">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
