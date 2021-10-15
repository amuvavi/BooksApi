<template>
    <div>
        <p class="text-xl font-bold">Book Title</p>
       <span>{{book.title}}</span>
       <p class="text-xl mt-1 font-bold">Author Name</p>
        <span> {{book.author_name}}</span>
        <p class="text-xl mt-1 font-bold">Genre</p>
        <span class="mt-2">{{book.genre}}</span><hr>

          <router-link :to="{ name: 'books.index', }"
           class=" mt-2 mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            back
         </router-link>
    </div>
</template>

<script>
import useBooks from "../../composables/books";
import { onMounted } from "vue";
export default {
    props: {
        id:{
            required: true,
            type: String
        }
    },

    setup(props){
        const{book, getBook} = useBooks()
         
        onMounted(getBook(props.id))
        return {
            book 
        }
    }
}
</script>