<?php
/**
 * Template Name: Cursos Page
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['posts'] = index_loop('curso', 1, -1);
Timber::render( array( 'page-cursos.twig', 'page.twig' ), $context );
