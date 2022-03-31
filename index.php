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

        <div class="contato-mapa d-flex flex-column flex-lg-row justify-content-between">
            <div class="contato w-100">
                <form action="" method="post" class="contato-form d-flex flex-column gap-2" target="_blank">
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

                    if ($loop->have_posts()) :
                        $loop->the_post();

                        $whatsapp = (string) get_the_content();
                        $whatsapp = preg_replace('/\D/', '', $whatsapp);
                        $whatsapp = "55{$whatsapp}";

                    endif;
                    ?>
                    <input type="hidden" id="whatsapp-number" name="" value="<?= $whatsapp ?>">
                    <input type="text" name="nome" id="nome" placeholder="Nome" autocomplete="off" required>
                    <textarea name="mensagem" id="mensagem" placeholder="Mensagem" autocomplete="off" required></textarea>
                    <button type="submit" class="btn-enviar primario gap-1">
                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                        <p>Enviar</p>
                    </button>
                </form>
            </div>

            <div class="mapa w-100">
                <?php
                $args = array(
                    'post_type' => 'contatos',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'tax_query' => [
                        [
                            'taxonomy'  => 'contatos_categories',
                            'field'     => 'slug',
                            'terms'     => 'mapa_iframe',
                        ]
                    ],
                    'orderby' => 'title',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) :
                    $loop->the_post();

                    $mapa_iframe = (string) get_the_content();
                endif;
                ?>
                <iframe src="<?= $mapa_iframe ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
