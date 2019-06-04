<?php
use TBI\Models\Widgets_Area;

new Widgets_Area([
    'name' => 'Home - Colonna centrale',
    'id' => 'home_main',
    'class' => 'home__main',
    'before_widget' => '<section class="widget home__main__widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
]);