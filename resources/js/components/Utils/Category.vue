<template>
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
            <div v-bind:key="book.id" v-for="book in books">
                <li>
                    <BookCard v-bind:book="book"/>
                </li>
            </div>

        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>
</template>

<script>
import BookCard from './BookCard.vue';

export default {
    name: 'Category',
    components: {
        BookCard,
    },
    props: ['books'],
}
</script>
