<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CSS Grid Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

  </head>
  <body>
	  
	<div class="container">
	  <div class="row">
		<div class="col">
			<form>
			  <div class="form-group">
				<label for="larguraSite">Largura do site</label>
				<input type="text" class="form-control calcularGrid" id="larguraSite" aria-describedby="larguraSiteHint" placeholder="Largura do site">
				<small id="larguraSiteHint" class="form-text text-muted">Largura do site em px.</small>
			  </div>
			  
			  <div class="form-group">
				<label for="quantidadeColunas">Quantidade de colunas</label>
				<input type="text" class="form-control calcularGrid" id="quantidadeColunas" placeholder="Quantidade de colunas">
			  </div>
			  
			  <div class="form-group">
				<label for="entreColunas">Entre colunas</label>
				<input type="text" class="form-control calcularGrid" id="entreColunas" placeholder="Entre colunas">
			  </div>

			  <div class="form-group">
				<label for="margemExterna">Margem externa</label>
				<input type="text" class="form-control calcularGrid" id="margemExterna" placeholder="Margem externa">
			  </div>
			  
			  <div class="form-group">
				<label for="classeCSS">Classe CSS</label>
				<input type="text" class="form-control calcularGrid" id="classeCSS" placeholder="Margem externa">
			  </div>
			</form>
		</div>
	  </div>
	  
		<div id="" class="row">
			<div class="col tamanho-coluna">
			
			</div>
			<div class="col entre-colunas">
			
			</div>
		</div>
		</div class="row">
			<div class="col">
				<table class="table table-repsonse">
					<thead>
						<tr>
							<th>Largura (px)</th>
							<th>Largura (%)</th>
							<th>Classe CSS</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	  
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$(".calcularGrid").keyup(function(){
				var larguraSite = $("#larguraSite").val();
				var quantidadeColunas = $("#quantidadeColunas").val();
				var entreColunas = $("#entreColunas").val();
				var margemExterna = $("#margemExterna").val();
				var classeCSS = $("#classeCSS").val();
				
				if (larguraSite && quantidadeColunas && entreColunas && margemExterna){
					var entreColunasPercent = "";
					if (larguraSite && entreColunas){
						entreColunasPercent = entreColunas/larguraSite*100;
					}
					
					var tamanhoColuna = (larguraSite-(quantidadeColunas-1)*entreColunas-margemExterna*2)/quantidadeColunas;
					$(".tamanho-coluna").html("<b>Tamanho coluna: </b>"+tamanhoColuna+"px");
					$(".entre-colunas").html("<b>Entre colunas: </b>"+entreColunasPercent+"%");
					
					$(".table-repsonse tbody").html("");
					if (quantidadeColunas && quantidadeColunas > 0){
						for (i=1;i<=quantidadeColunas;i++){
							if (i==1){
								var widthCol = i*tamanhoColuna;
							} else {
								var widthCol = tamanhoColuna*i+entreColunas*(i-1);
								//$C$6*A10+$B$4*(A10-1)
							}
							var percentCol = widthCol/(larguraSite-margemExterna*2)*100;
							$(".table-repsonse tbody").append('<tr>\
								<td>'+widthCol+'px</td>\
								<td>'+percentCol+'%</td>\
								<td>.'+classeCSS+'-'+i+'{width:'+percentCol+'%;}</td>\
							</tr>');
						}
					}
				}
				// console.log("OOO");
			});
		})
	</script>
  </body>
</html>