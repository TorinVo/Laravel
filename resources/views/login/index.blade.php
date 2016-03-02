<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<style type="text/css">
	.error {width: 220px;background: #F25252;color:white;line-height: 30px;text-align: center;}
	</style>
</head>
<body>
@if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="" method="POST">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="user" value="{{ old('user') }}" />
				 @if ($errors->has('user'))
	                <span class="help-block">
	                    <strong>{!! $errors->first('user') !!}</strong>
	                </span>
	            @endif
				
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass" />{!! $errors->first('pass') !!}</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnLogin" value="Login" /></td>
		</tr>
	</table>
</form>
</body>
</html>