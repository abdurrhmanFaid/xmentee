<?php

// Route /

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('breadcrumbs.home'), route('home'));
});

Breadcrumbs::for('bands.show', function ($trail, $band) {
    $trail->parent('home');
    $trail->push($band->name, route('bands.show', $band->slug));
});

Breadcrumbs::for('bands.settings', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.bands.settings', ['band' => $band->name]), route('bands.edit', $band->slug));
});

Breadcrumbs::for('bands.messaging', function ($trail, $band) {
    $trail->parent('bands.settings', $band);
    $trail->push(__('breadcrumbs.bands.messaging'), route('bands.messaging.show', $band->slug));
});

Breadcrumbs::for('batches.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.batches.name', ['band' => $band->name]), route('batches.index'));
});

Breadcrumbs::for('tickets.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.tickets.name', ['band' => $band->name]), route('tickets.index'));
});

Breadcrumbs::for('tickets.index.unrequested', function ($trail, $band) {
    $trail->parent('tickets.index', $band);
    $trail->push(__('breadcrumbs.tickets.unrequested_name', ['band' => $band->name]), route('tickets.unrequested.index'));
});

Breadcrumbs::for('categories.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.categories.name', ['band' => $band->name]), route('categories.index'));
});

Breadcrumbs::for('categories.show', function ($trail, $category, $band) {
    $trail->parent('categories.index', $band);
    $trail->push($category->name, route('categories.show', $category->name));
});

Breadcrumbs::for('lessons.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.lessons.name', ['band' => $band->name]) , route('lessons.index'));
});

Breadcrumbs::for('lessons.show', function ($trail, $lesson, $band) {
    $trail->parent('lessons.index', $band);
    $trail->push($lesson->title , route('lessons.show', $lesson->slug));
});

Breadcrumbs::for('lessons.create', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.lessons.create') , route('lessons.create'));
});

Breadcrumbs::for('lessons.edit', function ($trail, $lesson, $band) {
    $trail->parent('lessons.index', $band);
    $trail->push(__('breadcrumbs.lessons.edit', ['lesson' => $lesson->title]) , route('lessons.edit', $lesson->slug));
});


Breadcrumbs::for('posts.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.posts.name'), route('posts.index'));
});

Breadcrumbs::for('posts.create', function ($trail, $band) {
    $trail->parent('posts.index', $band);
    $trail->push(__('breadcrumbs.posts.create'), route('posts.create'));
});

Breadcrumbs::for('posts.edit', function ($trail, $band, $post) {
    $trail->parent('posts.index', $band);
    $trail->push(__('breadcrumbs.posts.edit', ['post' => $post->title]), route('posts.edit', $post->slug));
});

Breadcrumbs::for('payments.index', function ($trail, $band) {
    $trail->parent('bands.show', $band);
    $trail->push(__('breadcrumbs.payments.name'), route('payments.index'));
});

Breadcrumbs::for('payments.show', function ($trail, $payment, $band) {
    $trail->parent('payments.index', $band);
    $trail->push(__('breadcrumbs.payments.show', ['payment' => $payment->slug]), route('payments.show', $payment->slug));
});
