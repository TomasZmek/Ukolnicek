<?php
function hlavicka()
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="generator" content="PSPad editor, www.pspad.com">
		<link rel="stylesheet" type="text/css" media="all" href="knihovny/kalendar/jsDatePick_ltr.min.css" />
		<link rel="stylesheet" media="screen,projection,tv" href="vzhled/screen.css">
		<script type="text/javascript" src="knihovny/kalendar/jquery.1.4.2.js"></script>
		<script type="text/javascript" src="knihovny/kalendar/jsDatePick.jquery.min.1.3.js"></script>
		<link rel="stylesheet" href="knihovny/texyla/css/style.css" type="text/css">
	<link rel="stylesheet" href="knihovny/themes/default/theme.css" type="text/css">

	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" type="text/css">

	<!-- JUSH -->
	<script src="https://jush.svn.sourceforge.net/svnroot/jush/trunk/jush.js"></script>
	<link rel="stylesheet" type="text/css" href="https://jush.svn.sourceforge.net/svnroot/jush/trunk/jush.css">

	<!-- Texyla core -->
	<script src="knihovny/texyla/js/texyla.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/selection.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/texy.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/buttons.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/dom.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/view.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/ajaxupload.js" type="text/javascript"></script>
	<script src="knihovny/texyla/js/window.js" type="text/javascript"></script>

	<!-- languages -->
	<script src="knihovny/texyla/languages/cs.js" type="text/javascript"></script>
	<script src="knihovny/texyla/languages/sk.js" type="text/javascript"></script>
	<script src="knihovny/texyla/languages/en.js" type="text/javascript"></script>

	<!-- plugins -->
	<script src="knihovny/texyla/plugins/keys/keys.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/resizableTextarea/resizableTextarea.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/img/img.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/table/table.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/link/link.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/emoticon/emoticon.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/symbol/symbol.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/files/files.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/color/color.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/textTransform/textTransform.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/youtube/youtube.js" type="text/javascript"></script>
	<script src="knihovny/texyla/plugins/gravatar/gravatar.js" type="text/javascript"></script>

	<!-- init -->
	<script type="text/javascript">
		//<![CDATA[

		$.texyla.setDefaults({
			texyCfg: "admin",
			baseDir: 'knihovny/texyla',
			previewPath: "knihovny/preview.php",
			filesPath: "filesplugin/files.php",
			filesThumbPath: "filesplugin/thumbnail.php?image=%var%",
			filesUploadPath: "filesplugin/files/upload.php"
		});

		$(function () {
			$("#text2").texyla({
				toolbar: [
					'h1', 'h2', 'h3', 'h4',
					null,
					'bold', 'italic',
					null,
					'center', ['left', 'right', 'justify'],
					null,
					'ul', 'ol', ["olAlphabetSmall", "olAlphabetBig", "olRomans", "olRomansSmall"],
					null,
					{type: "label", text: "Vložit"}, 'link', 'img', 'table', 'emoticon', 'symbol',
					null,
					'color', 'textTransform',
					null,
					'files', 'youtube', 'gravatar',
					null,
					'div', ['html', 'blockquote', 'text', 'comment'],
					null,
					'code',	['codeHtml', 'codeCss', 'codeJs', 'codePhp', 'codeSql'], 'codeInline',
					null,
					{type: "label", text: "Ostatní"}, ['sup', 'sub', 'del', 'acronym', 'hr', 'notexy', 'web']

				],
				texyCfg: "admin",
				bottomLeftToolbar: ['edit', 'preview', 'htmlPreview'],
				buttonType: "span",
				tabs: true
			});

			$.texyla({
				buttonType: "button"
			});

		});
		//]]>
	</script>
		<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"kalendar",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
		<title>Úkolníček</title>
	</head>
	<body>
	<div id="header">
	<div id="header-inner">
		<div class="title">
			<h1>Úkolníček</h1>
		</div>
	</div>
	</div>
	<div id="container">	
<?php
}
?>