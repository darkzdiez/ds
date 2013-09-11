<div class="row">
	<div class="col-sm-4">
		<ul class="list-group link" id="listasRep">
			<li class="list-group-item"><strong>Listas de reproducción</strong></li>
		</ul>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">Videos</div>
				<div class="panel-body">
					<div class="row" id="listadoVideos">
						
					</div>
					<div class="row">
						<div class="col-sm-6">
							<form name="form1" method="post" id="searchForm" class="input-group input-group-sme ajaxForm" action="<?php print PATH_NAV; ?>videoyoutube/crear">
								<div class="input-group">
									<input type="text" id="idvideoyoutube" name="idvideoyoutube" class="form-control">
									<input type="hidden" id="listaactiva" name="listaactiva" value="">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="summit"><i class="icon icon-youtube"></i> Insertar Video</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>