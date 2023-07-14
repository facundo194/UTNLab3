

<?php
     session_start();

	 if (!isset($_SESSION['idEjer14Session'])){
		 header('Location:../index.php');
	 
	 }
?>

<!DOCTYPE html>

<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.js"></script>


	<script src="javascript.js"></script>


</head>


<body>
	<div id="contenedorTablaArticulos" class="contenedorTabla" classname="contenedorActivo">
		<header>
			<h1 style="width:30%">Articulos</h1>

			<label>Orden:</label>
			<input type="text" name="orden" id="orden" readonly="" value="">

			<button id="btAccionCarga">Cargar datos</button>
			<button id="btAccionVacia">Vaciar datos</button>
			<button id="btLimpiaFiltros">Limpiar filtros</button>
			<button id="btAlta">Alta registroo</button>
			<?php
			echo "<button class='btAlta' onClick=\"location.href='../destruirSesion.php'\">Terminar sesion </button>";
			?>
		</header>



		<table>
			<thead>
				<tr style="height:50%">
					<td class="titulosColumnas" campo-dato="articulos_codArt" id="th_articulos_codArt">Cod Art</td>
					<td class="titulosColumnas" campo-dato="articulos_familia" id="th_articulos_familia">familia</td>
					<td class="titulosColumnas" campo-dato="articulos_um" id="th_articulos_um">Descripcion</td>
					<!-- <td class="titulosColumnas" campo-dato="articulos_descripcion" id="th_articulos_descripcion">descrip</td> -->
					<td class="titulosColumnas" campo-dato="articulos_fechaAlta" id="th_articulos_fechaAlta">fecha Alta
					</td>
					<!-- <td class="titulosColumnas" campo-dato="articulos_saldoStock" id="th_articulos_saldoStock">Saldo stock</td> -->
					<!-- <td class="titulosColumnas" campo-dato="articulos_pdf" id="th_articulos_pdf">PDFs</td>  -->
					<!--<td class="titulosColumnas" campo-dato="articulos_btC" id="th_articulos_btC">C</td>	-->
					<td class="titulosColumnas" campo-dato="articulos_btModi">Modis</td>
					<td class="titulosColumnas" campo-dato="articulos_btModi">Bajas</td>
				</tr>

				<tr style="height:50%">
					<td campo-dato="articulos_codArt"><input id="f_articulos_codArt"></td>
					<td campo-dato="articulos_familia">
						<select id="f_articulos_familia" name="familia">
							<option value=""></option>
							<option value="CONFR"> Martillos </option>
							<option value="CONPE"> Serruchos </option>
							<option value="CONVE"> Destornilladores</option>
	
						</select>
						<!--<input id="f_articulos_familia"></input>-->
					</td>
					<td campo-dato="articulos_um"><input id="f_articulos_um"></td>
					<!--<td campo-dato="articulos_descripcion"><input id="f_articulos_descripcion"></td>-->
					<td campo-dato="articulos_fechaAlta"><input id="f_articulos_fechaAlta"></td>
					<td campo-dato="articulos_saldoStock"></td>
					<td campo-dato="articulos_pdf"></td>
					<td campo-dato="articulos_btC"></td>
					<td campo-dato="articulos_btModi"></td>
					<td campo-dato="articulos_btbaja"></td>
				</tr>
			</thead>

			<tbody id="tbDatos">
			</tbody>

			<tfoot>
				<tr>
					<td class="totalizador" campo-dato="articulos_codArt" id="tf_articulos_codArt"></td>
					<td class="totalizador" campo-dato="articulos_familia" id="tf_articulos_familia"></td>
					<td class="totalizador" campo-dato="articulos_um" id="tf_articulos_um"></td>
					<td class="totalizador" campo-dato="articulos_descripcion" id="tf_articulos_descripcion"></td>
					<td class="totalizador" campo-dato="articulos_fechaAlta" id="tf_articulos_fechaAlta"></td>
					<td class="totalizador" campo-dato="articulos_saldoStock" id="tf_articulos_saldoStock"></td>
					<td class="totalizador" campo-dato="articulos_pdf" id="tf_articulos_pdf"></td>
					<!--<td class="titulosColumnas" campo-dato="articulos_btC" id="th_articulos_btC"></td>	-->
					<td class="totalizador" campo-dato="articulos_btModi" id="tf_articulos_saldoStock"></td>
					<td class="totalizador" campo-dato="articulos_btBaja" id="tf_articulos_saldoStock"></td>
				</tr>
			</tfoot>

		</table>

		<footer>
			<div id="totalRegistros" class="totalRegistros">
			</div>
			<div id="textoPie" class="textoPie">
				<h1>Pie</h1>
			</div>
		</footer>
	</div> <!-- cierra contenedorTablaArticulos -->









	<!--Ventana Modal para formulario de alta que debe estar fuera del contenedor-->
	<div id="ventanaModalFormularioAlta" class="ventanaModalFormulario" style="visibility: hidden;">

		<header>
			<p>Formulario de alta</p>
			<div id="btCruzFormularioAlta" class="btCruz">X</div>
		</header>

		<div id="contenidoModalFormularioAlta" class="contenidoModal">

			<form id="formArticulosAlta" method="post" enctype="multipart/form-data">

				<ul>
					<li>
						<label>codArt: </label>
						<input id="formArticulosEntCodArtAlta" name="codArt" required="" value="hola">
					</li>

					<!-- 
				<li>
				<label>Descripción: </label>
				<input id="formArticulosEntDescripcionAlta" name="descripcion" required="">
				</li>-->


					<li>
						<label>Familia de artículo: </label>
						<select id="formArticulosEntFamiliaAlta" name="familia" required="" value="hola"></select>
					</li>


					<li>
						<label>Descripcion: </label>
						<input id="formArticulosEntUmAlta" name="um" required="" value="hola">
					</li>

					<li>
						<label>Fecha Alta:</label>
						<input type="date" id="formArticulosEntfechaAltaAlta" name="fechaAlta" required="">
					</li>

					<!--
				<li>
				<label>Saldo stock: </label>
				<input type="number" min="0" id="formArticulosEntSaldoStockAlta" name="saldoStock" value="0" required="">
				</li>

				<li>
				<label>Pdf: </label>
				<input type="file" id="formArticulosEntDocumentoPdfAlta" name="documentoPdf">
				</li>-->


				</ul>

			</form>
		</div> <!--Cierra contenido Modal-->

		<footer>
			<button id="btEnvioFormAlta" class="btAlta" disabled="disabled">Enviar Alta</button>
		</footer>

	</div> <!--Cierra ventana modal formulario-->

	<!--Ventana Modal para formulario de Modi que debe estar fuera del contenedor-->
	<div id="ventanaModalFormularioModi" class="ventanaModalFormulario" style="visibility: hidden;">

		<header>
			<p>Encabezado modal Formulario de modificación</p>
			<div id="btCruzFormularioModi" class="btCruz">X</div>
		</header> <!--Cierra encabezado modal-->

		<div id="contenidoModalFormularioModi" class="contenidoModal">

			<form id="formArticulosModi" method="post" enctype="multipart/form-data">
				<ul>

					<li>
						<label>codArt: </label>
						<input id="formArticulosEntCodArtModi" name="codArt" required="">
					</li>
					<!-- 
			<li>
			<label>Descripción: </label>
			<input id="formArticulosEntDescripcionModi" name="descripcion" required="">
			</li>-->

					<li>
						<label>Familia de artículo: </label>
						<select id="formArticulosEntFamiliaModi" name="familia" required="" value="hola"></select>
					</li>


					<li>
						<label>Descripcion: </label>
						<input id="formArticulosEntUmModi" name="um" required="">
					</li>

					<li>
						<label>Fecha Alta:</label>
						<input type="date" id="formArticulosEntfechaAltaModi" name="fechaAlta" required="">
					</li>
					<!--
			<li>
			<label>Saldo stock: </label>
			<input type="number" min="0" id="formArticulosEntSaldoStockModi" name="saldoStock" value="0" required="">
			</li> -->

					<!-- 
			<li>
			<label>Documento Pdf: </label>
			<input type="file" id="formArticulosEntDocumentoPdfModi" name="documentoPdf">
			</li>
			-->
				</ul>

			</form>
		</div> <!--Cierra contenido Modal-->

		<footer>
			<button id="btEnvioFormModi" class="btModi" disabled="disabled">Enviar Modi</button>
		</footer>

	</div> <!--Cierra ventana modal formulario-->

	<!--Ventana Modal para respuesta que debe estar fuera del contenedor-->
	<div id="ventanaModalRespuesta" class="ventanaModalRespuesta" style="visibility: hidden;">

		<!--<div id="encabezadoModalRespuesta" class="encabezadoModal" >Encabezado modal Respuesta-->
		<header>
			<p>Respuesta del servidor</p>
			<div id="btCruzRespuesta" class="btCruz">X</div>
		</header> <!--Cierra encabezado modal respuesta-->

		<div id="contenidoModalRespuesta" class="contenidoModal">
		</div><!-- cierra contenidoModalRespuesta-->

	</div> <!--Cierra ventana modal-->

</body>

</html>