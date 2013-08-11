<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<!-- Scripts down here -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<!-- Code editor -->

		<script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

		<!-- Scripts in development mode -->
		<script type="text/javascript" src="jspdf.js"></script>
		<script type="text/javascript" src="./libs/FileSaver.js/FileSaver.js"></script>
		<script type="text/javascript" src="./libs/Blob.js/Blob.js"></script>
		<script type="text/javascript" src="./libs/Blob.js/BlobBuilder.js"></script>

		<script type="text/javascript" src="./libs/Deflate/deflate.js"></script>
		<script type="text/javascript" src="./libs/Deflate/adler32cs.js"></script>

		<script type="text/javascript" src="./jspdf.plugin.addimage.js"></script>
		<script type="text/javascript" src="./jspdf.plugin.from_html.js"></script>
		<script type="text/javascript" src="./jspdf.plugin.ie_below_9_shim.js"></script>
		<script type="text/javascript" src="./jspdf.plugin.sillysvgrenderer.js"></script>
		<script type="text/javascript" src="./jspdf.plugin.split_text_to_size.js"></script>
		<script type="text/javascript" src="./jspdf.plugin.standard_fonts_metrics.js"></script>

		<!-- Editor -->
		<script type="text/javascript" src="./examples/js/editor.js"></script>
		<script type="text/javascript">
		htmldemo(){
		    var doc = new jsPDF();

			// We'll make our own renderer to skip this editor
			var specialElementHandlers = {
			    '#editor': function(element, renderer){
			        return true;
			    }
			};

			// All units are in the set measurement for the document
			// This can be changed to "pt" (points), "mm" (Default), "cm", "in"
			doc.fromHTML($('body').get(0), 15, 15, {
			    'width': 170, 
			    'elementHandlers': specialElementHandlers
			}); 
		}
		htmldemo();
	</script>
	</head>
	<body>
		<br><br><br>
		<br><br>
		<div id="miboton"><input name=idPrint type=button value="Imprimir" onclick="doPrint()"></div>
		laaaaaaaaaaaalalalal
		laalala
		<div class="bypass ace_editor ace-twilight ace_dark" id="editor"><textarea wrap="off" style="position: fixed; z-index: 100000; left: 53px; top: -1px; height: 20px; width: 8px;"></textarea><div class="ace_gutter"><div class="ace_gutter_active_line" style="top: 0px; height: 20px;"></div><div class="ace_layer ace_gutter-layer ace_folding-enabled" style="margin-top: 0px; height: 427px; width: 49px;"><div style="height:20px;" class="ace_gutter-cell ">1</div><div style="height:20px;" class="ace_gutter-cell ">2</div><div style="height:20px;" class="ace_gutter-cell ">3</div><div style="height:20px;" class="ace_gutter-cell ">4<span class="ace_fold-widget start open"></span></div><div style="height:20px;" class="ace_gutter-cell ">5<span class="ace_fold-widget start open"></span></div><div style="height:20px;" class="ace_gutter-cell ">6</div><div style="height:20px;" class="ace_gutter-cell ">7</div><div style="height:20px;" class="ace_gutter-cell ">8</div><div style="height:20px;" class="ace_gutter-cell ">9</div><div style="height:20px;" class="ace_gutter-cell ">10</div><div style="height:20px;" class="ace_gutter-cell ">11</div><div style="height:20px;" class="ace_gutter-cell ">12<span class="ace_fold-widget start open"></span></div><div style="height:20px;" class="ace_gutter-cell ">13</div><div style="height:20px;" class="ace_gutter-cell ">14</div><div style="height:20px;" class="ace_gutter-cell ">15</div><div style="height:20px;" class="ace_gutter-cell ">16</div></div></div><div class="ace_scroller" style="height: 400px; left: 49px; right: 13px; overflow-x: scroll;"><div class="ace_content" style="margin-top: 0px; width: 544px; height: 427px;"><div class="ace_layer ace_marker-layer"><div style="height:20px;right:0;top:0px;left:4px;" class="ace_selection start"></div><div style="height:20px;width:0px;top:300px;left:4px;" class="ace_selection"></div><div style="height:280px;right:0;top:20px;left:4px;" class="ace_selection"></div></div><div class="ace_print_margin_layer"><div class="ace_print_margin" style="left: 644px; visibility: visible;"></div></div><div class="ace_layer ace_text-layer" style="padding: 0px 4px;"><div style="height:20px" class="ace_line"><span class="ace_storage ace_type">var</span>&nbsp;<span class="ace_identifier">doc</span>&nbsp;<span class="ace_keyword ace_operator">=</span>&nbsp;<span class="ace_keyword">new</span>&nbsp;<span class="ace_identifier">jsPDF</span><span class="ace_paren ace_lparen">(</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div><div style="height:20px" class="ace_line"></div><div style="height:20px" class="ace_line"><span class="ace_comment">//&nbsp;We'll&nbsp;make&nbsp;our&nbsp;own&nbsp;renderer&nbsp;to&nbsp;skip&nbsp;this&nbsp;editor</span></div><div style="height:20px" class="ace_line"><span class="ace_storage ace_type">var</span>&nbsp;<span class="ace_identifier">specialElementHandlers</span>&nbsp;<span class="ace_keyword ace_operator">=</span>&nbsp;<span class="ace_paren ace_lparen">{</span></div><div style="height:20px" class="ace_line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string">'#editor'</span>:&nbsp;<span class="ace_storage ace_type">function</span><span class="ace_paren ace_lparen">(</span><span class="ace_variable ace_parameter">element</span><span class="ace_punctuation ace_operator">,&nbsp;</span><span class="ace_variable ace_parameter">renderer</span><span class="ace_paren ace_rparen">)</span><span class="ace_paren ace_lparen">{</span></div><div style="height:20px" class="ace_line"><span class="ace_indent-guide">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_keyword">return</span>&nbsp;<span class="ace_constant ace_language ace_boolean">true</span><span class="ace_punctuation ace_operator">;</span></div><div style="height:20px" class="ace_line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_paren ace_rparen">}</span></div><div style="height:20px" class="ace_line"><span class="ace_paren ace_rparen">}</span><span class="ace_punctuation ace_operator">;</span></div><div style="height:20px" class="ace_line"></div><div style="height:20px" class="ace_line"><span class="ace_comment">//&nbsp;All&nbsp;units&nbsp;are&nbsp;in&nbsp;the&nbsp;set&nbsp;measurement&nbsp;for&nbsp;the&nbsp;document</span></div><div style="height:20px" class="ace_line"><span class="ace_comment">//&nbsp;This&nbsp;can&nbsp;be&nbsp;changed&nbsp;to&nbsp;"pt"&nbsp;(points),&nbsp;"mm"&nbsp;(Default),&nbsp;"cm",&nbsp;"in"</span></div><div style="height:20px" class="ace_line"><span class="ace_identifier">doc</span><span class="ace_punctuation ace_operator">.</span><span class="ace_identifier">fromHTML</span><span class="ace_paren ace_lparen">(</span><span class="ace_keyword ace_operator">$</span><span class="ace_paren ace_lparen">(</span><span class="ace_string">'body'</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">.</span><span class="ace_keyword">get</span><span class="ace_paren ace_lparen">(</span><span class="ace_constant ace_numeric">0</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">,</span>&nbsp;<span class="ace_constant ace_numeric">15</span><span class="ace_punctuation ace_operator">,</span>&nbsp;<span class="ace_constant ace_numeric">15</span><span class="ace_punctuation ace_operator">,</span>&nbsp;<span class="ace_paren ace_lparen">{</span></div><div style="height:20px" class="ace_line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string">'width'</span><span class="ace_punctuation ace_operator">:</span>&nbsp;<span class="ace_constant ace_numeric">170</span><span class="ace_punctuation ace_operator">,</span>&nbsp;</div><div style="height:20px" class="ace_line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="ace_string">'elementHandlers'</span><span class="ace_punctuation ace_operator">:</span>&nbsp;<span class="ace_identifier">specialElementHandlers</span></div><div style="height:20px" class="ace_line"><span class="ace_paren ace_rparen">}</span><span class="ace_paren ace_rparen">)</span><span class="ace_punctuation ace_operator">;</span></div><div style="height:20px" class="ace_line"></div></div><div class="ace_layer ace_marker-layer"></div><div class="ace_layer ace_cursor-layer"><div class="ace_cursor ace_hidden" style="left: 4px; top: 0px; width: 8px; height: 20px;"></div></div></div></div><div style="height: auto; width: auto; top: -100px; left: -100px; visibility: hidden; position: fixed; overflow: visible; white-space: nowrap;">X</div><div class="ace_sb" style="width: 18px; height: 387px;"><div style="height: 320px;"></div></div><div class="ace_gutter_tooltip" style="max-width: 500px; display: none;"></div></div>
		<iframe class="preview-pane" width="100%" height="650" frameborder="0"></iframe>
	</body>
</html>
