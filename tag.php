<?php
/**
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$context['term'] = new Timber\Term();
$context['posts'] = new Timber\PostQuery();

Timber::render( 'tag.twig', $context );
