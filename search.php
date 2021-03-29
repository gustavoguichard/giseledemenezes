<?php
/**
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['search_term'] = get_search_query();

Timber::render( 'search.twig', $context );
