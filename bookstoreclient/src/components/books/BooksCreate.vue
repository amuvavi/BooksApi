<template>
<div>
      <div>
 <h1 class="text-center text-3xl">Create Books</h1>
 </div>
 <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
     <div><form class="space-y-6" v-on:submit.prevent="saveBook">
          <div class="space-y-4 rounded-md shadow-sm">
                <label for="name" class="block text-l font-medium text-gray-700">Book Title</label>
                <div class="mt-1">
                    <input type="text" name="title" id="title"
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                           v-model="form.title">
                </div>
                <div>
                <label for="email" class="block text-l font-medium text-gray-700">Author Name</label>
                <div class="mt-1">
                    <input type="text" name="author_name" id="author_name"
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                           v-model="form.author_name">
                </div>
            </div>

            <div>
                <label for="address" class="block text-l font-medium text-gray-700">Genre</label>
                <div class="mt-1">
                    <input type="text" name="genre" id="genre"
                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                           v-model="form.genre">
                </div>
            </div>
             <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
          </div>
        </form>
     </div>
    
</div>
</template>

<script>
import { reactive } from "vue";
import useBooks from "../../composables/books";
export default {
    setup() {
        const form = reactive({
            'title': '',
            'author_name': '',
            'genre': '',
            
        })
        const { errors, storeBook } = useBooks()
        const saveBook = async () => {
            await storeBook({...form});
        }
        return {
            form,
            errors,
            saveBook
        }
    }
}
</script>