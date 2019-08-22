
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.sidenav').sidenav();
				$('.tooltipped').tooltip();
				$('.modal').modal();
				$('.tooltipped').tooltip();
				$('.materialize-textarea').characterCounter();
				$('input').keypress(function(e){
					var code = null;
					code = (e.keyCode ? e.keyCode : e.which);
					return (code == 13) ? false : true;
				});
			});
			function validar()
				{
					var senha, senha01;
					senha = $("#senha").val();
					senha01 = $("#senha01").val();
					if (senha != senha01) {
						M.toast({html: 'Senhas não Correspondem', displayLength: '8000', classes: 'red darken-4'});
						return false;
					}
				}

			function textLower(x)
			{
				text = x.value.toLowerCase();
				x.value = text;
			}
			function showPwd()
			{
				var x = document.getElementById("password");
				tipo = (x.type == "password") ? "text" : "password";
				x.type = tipo;
				
			}
			function showPwd01()
			{
				var x = document.getElementById("senha01");
				tipo = (x.type == "password") ? "text" : "password";
				x.type = tipo;
			}

				function changeIcon(eye)
				{
					icon = (eye.innerHTML == "visibility_off") ? "remove_red_eye" : "visibility_off";
					eye.innerHTML = icon;
				}
		</script>
	</body>
</html>
