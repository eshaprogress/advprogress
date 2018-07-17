<p>
    Hi {{$data['name']}},<br />
    <br />
    Your consultation has been submitted with this information.
</p>

<div>
    <div><strong>First Name:</strong> {{$data['first_name']}}</div>
    <div><strong>Last Name:</strong> {{$data['last_name']}}</div>
@if($data['isOrganization'])
    <div><strong>Organization Name:</strong> {{$data['organization_name']}}</div>
@endif
    <div>
        <div><strong>Address:</strong></div>
        <div>{{$data['address']}}</div>
        <div>{{$data['city']}}, {{$data['state']}} {{$data['zip_code']}}</div>
    </div>
    <div><strong>Email:</strong> {{$data['email']}}</div>
    <div><strong>Phone:</strong> {{$data['phone']}}</div>
</div>

<p><strong>Comment</strong> <br /> {{$data['comment']}}</p>