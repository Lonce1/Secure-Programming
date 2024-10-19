// email/forgotpassword.blade.php
<p>Hi,</p>
<p>Click the following link to reset your password:</p>
<a href="{{ route('reset.password', $token) }}">Reset Password</a>
<p>Thanks!</p>