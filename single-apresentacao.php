<?php
/**
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$post = Timber::get_post();
$terms = get_the_terms($post, 'sessao');
$slug = $terms[0] ? $terms[0]->slug : 'notvalid';
$context['post'] = $post;
$context['courses'] = new Timber\PostQuery('post_type=curso&showposts=-1&sessao=' . $slug);
$context['testimonials'] = new Timber\PostQuery('post_type=depoimento&showposts=-1&sessao=' . $slug);
$context['events'] = new Timber\PostQuery('post_type=evento&showposts=-1&sessao=' . $slug);

Timber::render(['single-apresentacao.twig', 'single.twig'], $context );

