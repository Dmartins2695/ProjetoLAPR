<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Allegro')
        <h2>{{ config('app.name') }}</h2>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
