<?php
/**
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$post = Timber::get_post();
$terms = get_the_terms($post, 'cursos');
$slug = $terms[0] ? $terms[0]->slug : 'notvalid';
$context['post'] = $post;
$context['testimonials'] = new Timber\PostQuery('post_type=depoimento&showposts=-1&cursos=' . $slug);
$context['events'] = new Timber\PostQuery('post_type=evento&showposts=-1&cursos=' . $slug);

Timber::render(['single-curso.twig', 'single.twig'], $context );

