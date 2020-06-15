
<article class="post">

	<div class="entry-header cf">

		<h1><?the_title();?></h1>

		<p class="post-meta">
			<time class="date" datetime="2014-01-14T11:24"><? the_time('F jS, Y'); ?></time>
			/
			<span class="categories">
                            <? the_tags('', ' / '); ?>
			</span>
		</p>

	</div>

	<div class="post-thumb">
		<? the_post_thumbnail('anime'); ?>
	</div>

	<div class="post-content">

		<p><? the_content(); ?> </p>

	</div>

</article>

