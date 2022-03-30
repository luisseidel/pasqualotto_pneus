<?php get_header(); ?>

<main>
    <section class="banners" id="home">

        <div class="banner-container">
            <div class="slider-banner mobile">
                <?php global $post;
                $args = array('numberposts' => 5, 'category_name' => 'banner-mobile');
                $posts = get_posts($args);
                foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="swiper-slide">
                        <?php the_post_thumbnail(); ?>
                        <div class="slider-text"><?php the_content(); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slider-banner desktop">
                <?php global $post;
                $args = array('numberposts' => 5, 'category_name' => 'banner-desk');
                $posts = get_posts($args);
                foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="swiper-slide">
                        <?php the_post_thumbnail(); ?>
                        <div class="slider-text"><?php the_content(); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="container" id="sobre-nos">
        <h1>Sobre Nós</h1>
    </section>

    <section class="container" id="servicos">
        <h1>Serviços</h1>

    </section>

    <section class="container" id="contato">
        <h1>Contato</h1>

        <div class="contato">
            <form action="" method="post" class="contato-form" target="_blank">
                <?php
                $args = array(
                    'post_type' => 'contatos',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'tax_query' => [
                        [
                            'taxonomy'  => 'contatos_categories',
                            'field'     => 'slug',
                            'terms'     => 'whatsapp',
                        ]
                    ],
                    'orderby' => 'title',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) :
                    $loop->the_post();

                    $whatsapp = (string) get_the_content();
                    $whatsapp = preg_replace('/\D/', '', $whatsapp);
                    $whatsapp = "55{$whatsapp}";

                endwhile;
                ?>
                <input type="hidden" id="whatsapp-number" name="" value="<?= $whatsapp ?>">
                <input type="text" name="nome" id="nome" placeholder="Nome" autocomplete="off" required>
                <textarea name="mensagem" id="mensagem" placeholder="Mensagem" autocomplete="off" required></textarea>
                <button type="submit" class="btn-enviar">
                    <p>Enviar</p> <i class="fa-brands fa-whatsapp fa-lg"></i>
                </button>
            </form>
        </div>
    </section>
</main>

<?php get_footer(); ?>