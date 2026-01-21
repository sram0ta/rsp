<?php
get_header();
?>
<main class="main page-gallery main-top">
    <div class="container gallery">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php
        $all_folders = [
            2 => 'Все фото',
            3 => 'Производство',
            4 => 'Продукция',
        ];

        $folders = [];

        if ( class_exists('\FileBird\Classes\Helpers') ) {
            foreach ( $all_folders as $folder_id => $label ) {
                $ids = \FileBird\Classes\Helpers::getAttachmentIdsByFolderId( $folder_id );

                if ( ! empty($ids) ) {
                    $folders[$folder_id] = [
                        'name' => $label,
                        'ids'  => $ids,
                    ];
                }
            }
        }

        if ( empty($folders) ) {
            echo '<p>Изображений пока нет.</p>';
        } else {

            $active_id = array_key_first($folders);
            ?>
            <div class="gallery__navigation">
                <?php foreach ( $folders as $folder_id => $folder ) : ?>
                    <button class="gallery__navigation__button <?= ($folder_id === $active_id) ? 'active' : ''; ?>" data-id="<?= esc_attr($folder_id); ?>" type="button" ><?= esc_html($folder['name']); ?></button>
                <?php endforeach; ?>
            </div>
            <div class="gallery__content">
                <?php foreach ( $folders as $folder_id => $folder ) : ?>
                    <div class="gallery__group grid-12 <?= ($folder_id === $active_id) ? 'active' : ''; ?>" data-folder="<?= esc_attr($folder_id); ?>">
                        <?php foreach ( $folder['ids'] as $id ) : ?>
                            <a data-fslightbox="gallery-<?= esc_attr($folder_id); ?>" href="<?= esc_url( wp_get_attachment_url($id) ); ?>">
                                <?= wp_get_attachment_image(
                                    $id,
                                    'large',
                                    false,
                                    [
                                        'class' => 'gallery__group__image',
                                        'loading' => 'lazy'
                                    ]
                                ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php }?>
    </div>
</main>
<?php
get_footer();
