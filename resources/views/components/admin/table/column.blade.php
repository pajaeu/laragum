@if($type === 'td')
    <td {{ $attributes->merge(['class' => 'table__cell']) }}>
        {{ $slot }}
    </td>
@elseif($type === 'th')
    <th {{ $attributes->merge(['class' => 'table__cell table__cell--head']) }}>
        {{ $slot }}
    </th>
@endif