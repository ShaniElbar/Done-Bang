<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Laravel</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600px" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    
                    
                    <tr>
                        <td style="text-align: center; padding-bottom: 20px;">
                            <img src="https://i.ibb.co/XZN67hbV/LogoDD.png" alt="Logo" width="50" style="display: block; margin: 0 auto;">
                            <h2 style="color: #726C65; font-size: 20px; margin-top: 10px;">Email Verification</h2>
                        </td>
                    </tr>

                    
                    <tr>
                        <td style="padding: 20px; text-align: center; font-size: 16px; color: #333;">
                            <p>Hi <strong>{{ $data['name'] }}</strong>!</p>
                            <p>To complete your request, please verify your email address:</p>
                            
                            <a href="{{ route('auth.verify') }}">
                                <button type="submit" style="display: inline-block; padding: 12px 20px; background-color: #335166; color: #ffffff; text-decoration: none; font-size: 16px; border-radius: 5px; margin-top: 15px; border: none; cursor: pointer;">Verify Email</button>
                            </a>
                            
                            

                            <p style="margin-top: 20px; font-size: 14px; color: #555;">
                                If you didn’t request this, please ignore this email. Have questions or need help? 
                                <a href="#" style="color: #335166; text-decoration: underline;">Get in touch with us.</a>
                            </p>
                        </td>
                    </tr>

                    
                    <tr>
                        <td style="text-align: center; padding-top: 20px; font-size: 14px; color: #555;">
                            <p>Productively,</p>
                            <img src="https://i.ibb.co/S4HnwRn6/TTD.png" alt="Signature" width="170" style="display: block; margin: 10px auto;">
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
