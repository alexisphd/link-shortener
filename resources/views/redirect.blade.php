@if($fullLink)

@php
header("Location: ". URL::to($fullLink), true, 302);
exit();
@endphp
@endif

