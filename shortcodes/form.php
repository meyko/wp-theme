<?php 
$form_html = '
	<form role="form" class="feedback-form" id="feedbck">	
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Имя*" required>
		</div>	
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="E-mail*" required>
		</div>
		<div class="form-group">
			<input type="tel" class="form-control" name="phone" placeholder="Телефон">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="theme" placeholder="Тема" >
		</div>
		<div class="form-group">
		<textarea class="form-control" name="message" placeholder="Ваше сообщение" rows="6"></textarea>
		</div>
		<button type="submit" class="btn active form" id="send-z-form">Отправить</button>
		<button type="reset" class="btn active form">Очистить</button>
		<p class="text-info" id="result-answer">Ваше сообщение было отправлено</p>
	</form>';