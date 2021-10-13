@props(['url'])
<td>
    @isset($url)
        <a href="{{$url}}">
    @endisset
    {{$slot}}
    @isset($url)
        </a>
    @endisset
</td>
