@php
$customer= ["Arrora", "Rouf"];
print_r($customer)
@endphp

<table border="1" cellspacing="0" cellpadding="5" >
    <tr>
        <td>Id</td>
        <td>Name</td>
    </tr>
    @foreach ($customer as $key => $value)
        <tr>
        <td>{{ $key }} </td>
        <td>{{ $value }} </td>
    </tr>
    @endforeach
    
</table>