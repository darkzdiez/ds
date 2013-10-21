<div class="row">
    <div class="col-sm-4">
        <ul class="list-group link" id="listasRep">
            <li class="list-group-item"><strong>Banner</strong></li>
        </ul>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Imagenes</div>
                <div class="panel-body">
                    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row fileupload-buttonbar">
                            <div class="col-lg-12">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Agregar Archivos...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Iniciar Subida</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancelar Subida</span>
                                </button>
                                <button type="button" class="btn btn-danger delete">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span>Borrar</span>
                                </button>
                                <input type="checkbox" class="toggle">
                                <!-- The loading indicator is shown during file processing -->
                                <span class="fileupload-loading"></span>
                            </div>
                            <!-- The global progress information -->
                            <div class="col-lg-12 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress information -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" id="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                    </form>
                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-upload fade">
<td>
<span class="preview"></span>
</td>
<td>
<p class="name">{%=file.name%}</p>
{% if (file.error) { %}
<div><span class="label label-danger">Error</span> {%=file.error%}</div>
{% } %}
</td>
<td>
<p class="size">{%=o.formatFileSize(file.size)%}</p>
{% if (!o.files.error) { %}
<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
{% } %}
</td>
<td>
{% if (!o.files.error && !i && !o.options.autoUpload) { %}
<button class="btn btn-primary start">
<i class="glyphicon glyphicon-upload"></i>
<span>Subir</span>
</button>
{% } %}
{% if (!i) { %}
<button class="btn btn-warning cancel">
<i class="glyphicon glyphicon-ban-circle"></i>
<span>Cancelar</span>
</button>
{% } %}
</td>
</tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-download fade">
<td>
<span class="preview">
{% if (file.thumbnailUrl) { %}
<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
{% } %}
</span>
</td>
<td>
<p class="name">
{% if (file.url) { %}
<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
{% } else { %}
<span>{%=file.name%}</span>
{% } %}
</p>
{% if (file.error) { %}
<div><span class="label label-danger">Error</span> {%=file.error%}</div>
{% } %}
</td>
<td>
<span class="size">{%=o.formatFileSize(file.size)%}</span>
</td>
<td>
{% if (file.deleteUrl) { %}
<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
<i class="glyphicon glyphicon-trash"></i>
<span>Borrar</span>
</button>
<input type="checkbox" name="delete" value="1" class="toggle">
{% } else { %}
<button class="btn btn-warning cancel">
<i class="glyphicon glyphicon-ban-circle"></i>
<span>Cancelar</span>
</button>
{% } %}
</td>
</tr>
{% } %}
</script>
<link rel="stylesheet" href="<?php print DOMAIN; ?>public/css/fileupload/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?php print DOMAIN; ?>public/css/fileupload/jquery.fileupload.css">
<link rel="stylesheet" href="<?php print DOMAIN; ?>public/css/fileupload/jquery.fileupload-ui.css">
<script src="<?php print DOMAIN; ?>public/js/fileupload/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- blueimp Gallery script -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php print DOMAIN; ?>public/js/fileupload/main.js"></script>