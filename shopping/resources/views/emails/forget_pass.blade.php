<p>hi  {{$customer->name}},</p><br>
<p>We received a request to reset your shopping account password.</p><br>
<p>Click <a style="text-decoration: none; color:#ff5722;" href="{{route('customer.get_pass', ['email'=>$customer->email , 'token'=>$token])}}">here</a> to set up a new password for your Shopee account.</p>
<p>Or please copy and paste the link below into your browser:
<a>{{route('customer.get_pass', ['email'=>$customer->email , 'token'=>$token])}}</a></p>

