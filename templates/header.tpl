<html>
	<head>
		<title>
			{if isset($title)}
				{$title}
			{else}
				Title
			{/if}
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="images/favicons/manifest.json">
		<link rel="mask-icon" href="images/favicons/safari-pinned-tab.svg" color="#4cbb8f">
		<link rel="shortcut icon" href="images/favicons/favicon.ico">
		<meta name="msapplication-config" content="images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#f7efe2">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		{foreach from=$stylesheets item=link}
		  <link href="{$link}" rel="stylesheet">
		{/foreach}
	</head>
	<body>


