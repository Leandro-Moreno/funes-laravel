@php
    $logged = false;
    if(Auth::check()){
        $logged = true;
    }
@endphp
<menu-lateral :logged='@json( $logged )'></menu-lateral>

