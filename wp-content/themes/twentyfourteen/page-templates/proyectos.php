<?php
/*
Theme:Mi theme
Template name: Proyectos
*/
?>
<?php get_header(); ?>
<div id="main-content" class="main-content">
    <h1>Proyectos</h1>
    <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args=array('paged'=>$paged, 'post_type'=>'proyecto');
        query_posts($args);
    ?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="proyecto">
                <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php
                            $client = get_the_term_list( $post->ID, 'cliente', '<strong>Cliente:</strong> ', ', ', '',', ' );
                            $categoria = get_the_term_list( $post->ID, 'categoria', '<strong>Categoria:</strong> ', ', ', '',', ' );
                            echo $client.'<br />'.$categoria;
                        ?>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="navigation">
                        <?php posts_nav_link(' ','&laquo; Siguientes proyectos', 'Proyectos anteriores'); ?>
                </div>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>