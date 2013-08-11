<?php
/*
 * Controlador ComisionContratacion V1
 */

/**
 * Controlador para ComisionContratacion
 *
 * @author sistemas01
 */
class Sitemap extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->css = array('sitemap/css/default.css');
	}
	public function index() {
		$_POST['TITLE_WEBSITE'] = 'Comisión de Contrataciones en ' . TITLE_WEBSITE;
		$this->view->render('sitemap/index');
	}
	public function xml(){
		header("Content-type: text/xml");
		$xml='<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
		xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
		<url>
		<loc>http://yaracuy.gob.ve/web/</loc>
		<lastmod>2005-01-01</lastmod>
		<changefreg>hourly</changefreg>
		<priority>1</priority>
		</url>
		<url>
		<loc>http://yaracuy.gob.ve/web/noticias</loc>
		<lastmod>2009-01-02</lastmod>
		<changefreg>daily</changefreg>
		<priority>0.8</priority>
		</url>
		<url>
		<loc>http://yaracuy.gob.ve/web/galeria</loc>
		<lastmod>2009-01-02</lastmod>
		<changefreg>daily</changefreg>
		<priority>0.8</priority>
		</url>
		<url>
		<loc>http://yaracuy.gob.ve/web/informacion</loc>
		<lastmod>2009-01-02</lastmod>
		<changefreg>daily</changefreg>
		<priority>0.8</priority>
		</url>
		<url>
		<loc>http://yaracuy.gob.ve/web/contacto</loc>
		<lastmod>2009-01-02</lastmod>
		<changefreg>daily</changefreg>
		<priority>0.8</priority>
		</url>';
		$xml.='	<url>
		<loc>http://yaracuy.gob.ve/web/noticias/more/5493-Len-El-4F-fue-una-insurreccin-del-pueblo-en-contra-de-la-oligarqua-</loc>
		<news:news>
		<news:publication>
		<news:name>GobiernodeYaracuy</news:name>
		<news:language>es</news:language>
		</news:publication>
		<news:genres>Turismo</news:genres>
		<news:publication_date>2008-12-23</news:publication_date>
		<news:title>A y B negocian una posible fusión</news:title>
		<news:keywords>nacionales, tecnología</news:keywords>
		</news:news>
		</url>';
		$xml.='</urlset>';
		print $xml;
	}
}

?>