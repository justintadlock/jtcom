<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
	version="3.0"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:blush="https://justintadlock.com/blush/rss"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title><xsl:value-of select="/rss/channel/title"/> &#8212; Feed</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link type="text/css" rel="stylesheet">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:stylesheet']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="apple-touch-icon" sizes="180x180">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:favicon-180']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="96x96">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:favicon-96']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="48x48">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:favicon-48']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="32x32">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:favicon-32']/@href"/>
		</xsl:attribute>
	</link>
	<link rel="icon" sizes="16x16">
		<xsl:attribute name="href">
			<xsl:value-of select="/rss/*[name()='blush:favicon-16']/@href"/>
		</xsl:attribute>
	</link>
</head>

<body>
<div class="feed o-container-base">
	<div class="feed__welcome-message stretch-full o-container-base">
		<h2>👋 Hello, Web Traveler!</h2>
		<p>
		It looks like you've stumbled upon my web feed.
		If you don't know what that is, no worries.
		Here's a great <a href="https://en.wikipedia.org/wiki/Web_feed">Wikipedia article</a> on it.
		Essentially, you can subscribe to a blog and get its latest posts via a feed reader like <a href="https://inoreader.com">Inoreader</a> or <a href="https://feedly.com">Feedly</a>.
		Plus, you control the experience and don't have to give me your email.
		Now that's a win-win combo!
		</p>
	</div>
	<header class="feed__header">
		<xsl:if test="/rss/channel/image">
			<a class="feed__image">
				<xsl:attribute name="href">
					<xsl:value-of select="/rss/channel/link"/>
				</xsl:attribute>
				<img>
					<xsl:attribute name="src">
						<xsl:value-of select="/rss/channel/image/url"/>
					</xsl:attribute>
					<xsl:attribute name="title">
						<xsl:value-of select="/rss/channel/title"/>
					</xsl:attribute>
				</img>
			</a>
		</xsl:if>

		<div class="feed__branding">
			<h1 class="feed__title">
				<xsl:value-of select="/rss/channel/title"/>
			</h1>
			<xsl:if test="/rss/channel/description">
				<div class="emoji-row">
					<span class="emoji-row__emoji">📝</span>
					<div class="feed__description">
						<xsl:value-of select="/rss/channel/description" disable-output-escaping="yes"/>
					</div>
				</div>
			</xsl:if>
			<div class="emoji-row">
				<span class="emoji-row__emoji">🌎</span>
				<a class="feed__link" target="_blank">
					<xsl:attribute name="href">
						<xsl:value-of select="/rss/channel/link"/>
					</xsl:attribute>
					Visit Website &#x2192;
				</a>
			</div>
		</div>
	</header>

	<main class="feed__entries">
		<xsl:for-each select="/rss/channel/item">

			<article class="feed__entry entry">
				<xsl:if test="(
					(media:content) and
					(media:content/@url) and
					('image' = media:content/@medium)
				)">
					<figure class="entry__enclosure entry__enclosure--image">
						<img>
							<xsl:attribute name="src">
								<xsl:value-of select="media:content/@url"/>
							</xsl:attribute>
						</img>
					</figure>
				</xsl:if>

				<header class="entry__header">
					<h2 class="entry__title">
						<a class="entry__link" target="_blank">
							<xsl:attribute name="href">
								<xsl:value-of select="link"/>
							</xsl:attribute>
							<xsl:value-of select="title"/>
						</a>
					</h2>
					<div class="emoji-row">
						<span class="emoji-row__emoji">🗓️</span>
						<div class="entry__pubdate">
							<xsl:value-of select="pubDate" />
						</div>
					</div>
					<div class="emoji-row">
						<span class="emoji-row__emoji">📂</span>
						<div class="entry__category">
							<xsl:for-each select=".//category">
								<span><xsl:value-of select="."/></span>
								<xsl:if test="position() != last()">
									<xsl:text>, </xsl:text>
								</xsl:if>
							</xsl:for-each>
						</div>
					</div>
				</header>

				<div class="entry__description">
					<xsl:value-of select="description" disable-output-escaping="yes"/>
					<p class="entry__more">
						<a class="entry__link" target="_blank">
							<xsl:attribute name="href">
								<xsl:value-of select="link"/>
							</xsl:attribute>
							Continue Reading &#x2192;
						</a>
					</p>
				</div>
			</article>
		</xsl:for-each>
	</main>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
