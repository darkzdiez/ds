<div class="title_section cufon_myriad">Directorio - Tren Ejecutivo:</div>
<?php for ($i=0; $i < 5; $i++) { ?>
<div class="more_article directorioList" style="padding: 10px;">
	<table>
		<tr>
			<td colspan="2"><div class="title_section cufon_myriad">Gobernador Bolivariano del Estado Yaracuy</div></td>
		</tr>
		<tr>
			<td>
				<?php
				$filename='1.jpg';
				$fileThumb='system/webgob/temp/thumbnail/directorio-150x150-'.$filename;
				if(!file_exists($fileThumb)){
					$obj = new Thumbnail();
					$thumbnail = $obj->generateThumbnail('system/webgob/media/images/directorio/' . $filename, $fileThumb, 150, 150);
				}else{
					$thumbnail=$fileThumb;
				}
				?>
				<img src="<?php print DOMAIN.$thumbnail; ?>" alt="Gobernador bolivariano del Estado Yaracuy">
			</td>
			<td>
				<table style="font-size: 16px; margin-left: 5px">
					<tr>
						<td><i></i><strong>Nombre:</strong> Lcdo. Julio César Leon Heredia</td>
					</tr>
					<tr>
						<td><i class="icon-phone btntext"></i> <strong>Telefono:</strong> 0254-2320772/2320992</td>
					</tr>
					<tr>
						<td><i class="icon-envelope-alt btntext"></i> <strong>Correo Electronico:</strong> gobernador@yaracuy.gob.ve </td>
					</tr>
					<tr>
						<td><i class="icon-location-arrow btntext"></i> <strong>Direccion:</strong> Palacio de Gobierno, Piso 2 </td>
					</tr>
					<tr>
						<td><i class="icon-twitter btntext"></i> <strong>Twitter:</strong> <a class="estiloEnlace" target="_blank" title="Twitter" href="https://twitter.com/#!/JULIOLEONYARA">@JULIOLEONYARA</a></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<?php } ?>