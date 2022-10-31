<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
	version="3.0"
	xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sitemap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link type="text/css" rel="stylesheet">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:stylesheet']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="apple-touch-icon" sizes="180x180">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:favicon-180']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="96x96">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:favicon-96']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="48x48">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:favicon-48']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="32x32">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:favicon-32']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="16x16">
		<xsl:attribute name="href">
			<xsl:value-of select="sitemap:urlset/*[name()='blush:favicon-16']/@href"/>
		</xsl:attribute>
	</link>
</head>

<body>
<div class="sitemap sm:container">
	<div class="sitemap__welcome-message layout-full 2xl:container">
		<h2>👋 Hello, Web Traveler!</h2>
		<p>
		It looks like you've stumbled upon my sitemap.
		If you're not Google, Bing, some other search engine, or a bot crawling the site for data for some reason, this page might seem all a little strange.
		But, feel free to poke around.
		</p>
	</div>
	<main class="sitemap__urlset layout-2xl">
		<table class="sitemap__entries">
			<thead>
				<tr>
					<th class="sitemap-url__lastmod">
						Last Updated
					</th>
					<th class="sitemap-url__loc">
						Location
					</th>
				</tr>
			</thead>
			<tbody>
			<xsl:for-each select="sitemap:urlset/sitemap:url">
				<tr class="sitemap__entry">
					<td class="sitemap-url__lastmod">
						<div class="emoji-row">
							<span class="emoji-row__emoji">🗓️</span>
							<div>
								<xsl:value-of select="sitemap:lastmod"/>
							</div>
						</div>
					</td>
					<td class="sitemap-url__loc">
						<div class="emoji-row">
							<span class="emoji-row__emoji">🔗</span>
							<div>
								<a target="_blank">
								<xsl:attribute name="href">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:attribute>
								<xsl:value-of select="sitemap:loc"/>
								</a>
							</div>
						</div>
					</td>
				</tr>
			</xsl:for-each>
			</tbody>
		</table>
	</main>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
