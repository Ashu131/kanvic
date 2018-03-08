<table>
    <tr>
        <td>Name</td>
        <td>{{$old['name']}}</td>
    </tr>
    <tr>
        <td>Professional</td>
        <td> {{$old['professional']}}  </td>
    </tr>
   <tr>
        <td>Phone</td>
        <td> {{$old['phone']}}  </td>
    </tr>
    <tr>
        <td>Email</td>
        <td> {{$old['email']}}  </td>
    </tr>
    <tr>
        <td>City</td>
        <td> {{$old['city']}}  </td>
    </tr>
    <tr>
        <td>Age</td>
        <td> {{$old['age']}}  </td>
    </tr>
    <tr>
        <td>Address</td>
        <td> {{$old['address']}}  </td>
    </tr>
        <tr>
        <td>Message</td>
        <td> {{$old['message']}}  </td>
    </tr>
    <tr>
        <td>Resume</td>
        <td>@if(isset($old['resume'])) <a href="{{$old['resume']}}">Download</a> @endif </td>
    </tr>

</table>