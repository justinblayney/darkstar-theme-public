<?php

$toc_items = []; // Store TOC items

// Check if the flexible content field has rows of data
if (have_rows('page_content')):

    // First pass: Collect TOC items
    while (have_rows('page_content')) : the_row();
        if (get_sub_field('add_to_toc')) { // Check if the component should be in TOC
            $layout = get_row_layout();
            $heading = get_sub_field('heading');

            if ($heading) {
                $unique_id = str_replace('component-', '', $layout) . '-' . get_row_index();
                $toc_items[] = [
                    'id' => $unique_id,
                    'title' => $heading
                ];
            }
        }
    endwhile;

    // Reset rows to loop again
    reset_rows();

    // If TOC items exist, include the TOC component before rendering content
    if (!empty($toc_items)) {
?>
        <section class="toc" id="toc">
            <div class="toc__wrap">
                <h2>Table of Contents</h2>
                <ul>
                    <?php foreach ($toc_items as $item) : ?>
                        <li><a href="#<?php echo esc_attr(str_replace(
                                            ['component-banner', 'component-cards', 'component-faqs', 'component-quote', 'component-recent-news', 'component-simple-content', 'component-testimonial', 'component-two-column-content'],
                                            ['banner', 'cards', 'faqs', 'quote', 'recent-news', 'simple-content', 'testimonial', 'two-column-content'],
                                            $item['id']
                                        )); ?>"><?php echo esc_html($item['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "ItemList",
                        "itemListElement": [
                            <?php foreach ($toc_items as $index => $item) : ?> {
                                    "@type": "ListItem",
                                    "position": <?php echo $index + 1; ?>,
                                    "name": "<?php echo esc_js($item['title']); ?>",
                                    "url": "#<?php echo esc_attr($item['id']); ?>"
                                }
                                <?php echo $index + 1 < count($toc_items) ? ',' : ''; ?>
                            <?php endforeach; ?>
                        ]
                    }
                </script>
            </div>
        </section>
<?php
    }

    // Second pass: Render the components
    while (have_rows('page_content')) : the_row();
        $layout = get_row_layout();
        $unique_id = str_replace('component-', '', $layout) . '-' . get_row_index();
        if ($layout == 'component-banner'):
            include("component-banner.php");
        endif;

        if ($layout == 'component-simple-content'):
            include("component-simple-content.php");
        endif;

        if ($layout == 'component-quote'):
            include("component-quote.php");
        endif;

        if ($layout == 'component-testimonial'):
            include("component-testimonial.php");
        endif;

        if ($layout == 'component-cards'):
            include("component-cards.php");
        endif;

        if ($layout == 'component-two-column-content'):
            include("component-two-column-content.php");
        endif;

        if ($layout == 'component-recent-news'):
            include("component-recent-news.php");
        endif;

        if ($layout == 'component-review'):
            include("component-review.php");
        endif;

        if ($layout == 'component-faqs'):
            include("component-faqs.php");
        endif;
    endwhile;

endif;
