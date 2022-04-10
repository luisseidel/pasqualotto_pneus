<?php get_header(); ?>

<main>
    <section class="banners" id="home">

        <div class="banner-container">
            <div class="slider-banner d-none d-lg-block" id="banner-desktop">

                <?php
                $args = array(
                    'post_type' => 'banners',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        [
                            'taxonomy'  => 'banner_categories',
                            'field'     => 'slug',
                            'terms'     => 'banner-desktop',
                        ]
                    ],
                    'orderby' => 'title',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) :
                    $loop->the_post();

                    $sobre_nos = (string) get_the_content();
                ?>
                    <div class="swiper-slide">
                        <?php the_post_thumbnail(); ?>
                        <div class="slider-text"><?php the_content(); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="slider-banner d-xs-block d-sm-block d-md-block d-lg-none" id="banner-mobile">

                <?php
                $args = array(
                    'post_type' => 'banners',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        [
                            'taxonomy'  => 'banner_categories',
                            'field'     => 'slug',
                            'terms'     => 'banner-mobile',
                        ]
                    ],
                    'orderby' => 'title',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) :
                    $loop->the_post();

                    $sobre_nos = (string) get_the_content();
                ?>
                    <div class="swiper-slide">
                        <?php the_post_thumbnail(); ?>
                        <div class="slider-text"><?php the_content(); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>


    <section class="container" id="sobre-nos">
        <h1>Sobre Nós</h1>

        <?php
        $args = array(
            'post_type' => 'sobrenos',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'tax_query' => [
                [
                    'taxonomy'  => 'sobrenos_categories',
                    'field'     => 'slug',
                    'terms'     => 'sobrenos',
                ]
            ],
            'orderby' => 'title',
            'order' => 'ASC',
        );

        $loop = new WP_Query($args);

        if ($loop->have_posts()) :
            $loop->the_post();

            $sobre_nos = (string) get_the_content();
            $imagem_destaque_url = (string) get_the_post_thumbnail_url(get_the_ID());
        endif;
        ?>

        <div class="sobre-content">
            <p class="text-justify">
                <?= $sobre_nos ?>
            </p>
        </div>

        <?php if ($imagem_destaque_url) : ?>
            <div class="py-5 text-center">
                <img src="<?= $imagem_destaque_url ?>" class="w-lg-50 w-xsm-100" alt="sobre-nos" />
            </div>
        <?php endif; ?>
    </section>

    <section class="container" id="pneus">
        <h1>Pneus</h1>

        <div class="pneus d-flex flex-wrap flex-column flex-lg-row justify-content-between align-items-center">
            <?php
            $args = array(
                'post_type' => 'pneus',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'tax_query' => [
                    [
                        'taxonomy'  => 'pneus_categories',
                        'field'     => 'slug',
                        'terms'     => 'pneus',
                    ]
                ],
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) :
                $loop->the_post();

                $titulo_pneu = (string) get_the_title();
                $imagem_destaque_pneu = (string) get_the_post_thumbnail_url(get_the_ID());
            ?>
                <div class="single-pneu my-2">
                    <img src="<?= $imagem_destaque_pneu ?>" alt="<?= $titulo_pneu ?>" />
                </div>
            <?php endwhile; ?>
        </div>

    </section>

    <section class="container" id="servicos">
        <h1>Serviços</h1>

        <div class="pneus d-flex flex-wrap flex-column flex-lg-row justify-content-between align-items-center">
            <?php
            $args = array(
                'post_type' => 'servicos',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'tax_query' => [
                    [
                        'taxonomy'  => 'servicos_categories',
                        'field'     => 'slug',
                        'terms'     => 'servicos',
                    ]
                ],
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) :
                $loop->the_post();

                $titulo_servico = (string) get_the_title();
                $servico_slug = str_replace(' ', '', strtolower($titulo_servico));
                $unwanted_array = array(
                    'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
                    'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
                    'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
                    'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
                    'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y'
                );
                $servico_slug = strtr($servico_slug, $unwanted_array);
                $texto_servico = (string) get_the_content();
                $imagem_destaque_servico = (string) get_the_post_thumbnail_url(get_the_ID());
            ?>
                <div class="card-servico my-2 <?= (($texto_servico && strlen($texto_servico) ? "pointer-cursor" : "")) ?>" data-toggle="modal" data-target="<?= "#{$servico_slug}" ?>">
                    <div class="card-img">
                        <img src="<?= $imagem_destaque_servico ?>" alt="<?= $titulo_servico ?>" class="servico-image" />
                        <div class="servico-title">
                            <h5 class="servico-title-text"><?= $titulo_servico ?></h5>
                        </div>
                    </div>

                    <?php if ($texto_servico && strlen($texto_servico) > 1) : ?>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" id="<?= $servico_slug ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $titulo_servico ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?= $texto_servico ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>

    </section>

    <section class="container" id="contato">
        <h1>Contato</h1>

        <div class="contato-mapa d-flex flex-column flex-lg-row justify-content-between">
            <div class="contato w-100">
                <form action="" method="post" class="contato-form d-flex flex-column gap-5" target="_blank">
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

            <div class="embed-responsive embed-responsive-4by3">
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
                <iframe src="<?= $mapa_iframe ?>" class="embed-responsive-item" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
