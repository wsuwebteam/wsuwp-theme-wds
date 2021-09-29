<?php namespace WSUWP\Theme\WDS; ?>

<main class="wsu-wrapper-content">
    <h1>Search</h1>
    <form class="wsu-announcements__form" method="get">
        <div class="wsu-search-field wsu-search-field--secondary">
            <input class="wsu-search-field__input" type="text" name="s" value="<?php echo esc_html( $_REQUEST['s'] ?: '' ); ?>" placeholder="Search" />
            <button class="wsu-search-field__button" type="submit">Search</button>
        </div>
    </form>
    <h2>Search Results</h2>
    <?php 
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();

            Template::render( 'block-templates/article-card-horizontal', get_post_type() );

        } // end while
    } else {

        echo '<p class="wsu-search-results">No results found...</p>';

    }
    ;?>
</main>