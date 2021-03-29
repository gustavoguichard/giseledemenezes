<?php
/**
 * Template Name: Agenda Page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['posts'] = index_loop('evento', 1, -1);
Timber::render(['page-agenda.twig', 'page.twig'], $context );
