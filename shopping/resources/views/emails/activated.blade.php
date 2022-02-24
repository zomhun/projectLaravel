<div>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
        <tbody>
            <tr>
                <td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px">
                    <div>
                        <div align="center">
                            <h2>Activation Email</h2>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="100">&nbsp;</td>
                <td width="400" align="center">
                    <div>
                        <div align="left">
                            <p>
                                Hi <b style="color:#0674ec">{{$customer->name}},</b>
                                <br>
                                <br>
                                Welcome to our shop<br>
                                This is the account activation email. Please click the button below to go to the
                                activation page<br>
                            </p>
                        </div>
                    </div>
                </td>
                <td width="100">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
        <tbody>
            <tr>
                <td width="200">&nbsp;</td>
                <td width="200" align="center" style="padding-top:25px">
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
                        <tbody>
                            <tr>
                                <td bgcolor="#0674ec" align="center" style="border-radius:4px" width="200" height="50">
                                    <div>
                                        <div align="center">
                                            <a href="{{route('customer.activated', ['email'=>$customer->email , 'token'=>$token])}}"
                                                style="text-decoration: none;font-size: 16px; color: #fff;border-radius: 4px;"
                                                arget="_blank">active account</a>



                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="200">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>