<? get_header();?>

<? if (have_posts()): while (have_posts()): the_post();?>
<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">
            <? get_template_part('post-templates/post', get_post_format()); ?>
        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<!-- Tweets Section
================================================== -->
<section id="tweets">

    <div class="row">

        <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
                <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
        </ul>

        <p class="align-center"><a href="#" class="button">Follow us</a></p>

    </div>

</section> <!-- Tweets Section End-->
<?endwhile; endif;?>

<?// параметры по умолчанию
$args = array(
	'numberposts' => 3,
	'post_type'   => 'portfolio',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
);

$posts = get_posts($args);
foreach( $posts as $post ): setup_postdata($post);?>
<div><? the_title(); ?></div>
<?endforeach;?>

<? get_footer(); ?>