<br>
<h1>Bienvenido a tu red de eventos</h1>
<br>

<div id="cajalog">
	<? echo form_open('welcome/login'); ?>
	<p>Usuario:<br> <? echo form_input('usuario'); ?><br>
	<br>Contraseña:<br> <? echo form_password('pass'); ?></p>
	<? echo form_submit('Entrar', 'Entrar'); ?><br>
	<a href=/redsocialpw/>¿Has olvidado tu contraseña?</a>
</div>
