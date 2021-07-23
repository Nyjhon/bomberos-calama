@extends('email.master')

@section('content')
<p>Hola: <strong>{{$nombre}}</strong></p>
<p>Este es un correo electrónico que le ayudara a reestablecer la contraseña de su cuenta en el software de la “Dirección Departamental de Bomberos Calama”.</p>
<p>Para continuar haga clic en el siguiente Botón e ingrese el siguiente código: </p>
<h2 style="text-align: center;">{{ $code }}</h2>
<p><a href="{{ url('/reset')}}" style="display: inline-block; background-color: #2caaff; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Cambiar mi contraseña</a></p>
<p>Si el botón anterior no le funciona, copie y pegue la siguiente url en su navegador:</p>
<p>{{url('/reset?email='.$email)}}</p>
@stop
