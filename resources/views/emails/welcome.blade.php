<p>
    Thank you <strong>{{$data['name']}}</strong> for your
@if($data['payment_info']['payment_type'] == 'subscription')
    Subscription of: ${{$data['form']['amount']}} / month.
@elseif($data['payment_info']['payment_type'] == 'simple-donation')
    Single Donation of: ${{$data['form']['amount']}}
@endif
</p>

@if($data['payment_info']['payment_type'] == 'subscription')
    <p>As a subscriber, you can always come back to cancel your subscription later @ {{url('/cancel-subscription')}}. We always appreciate your patronage</p>
@endif