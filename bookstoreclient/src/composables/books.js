import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useBooks() {
    const books = ref([])
    const book = ref([])
    const router = useRouter()
    const errors = ref('')

    const getBooks = async () => {
        let response = await axios.get('/api/v1/books')
        books.value = response.data.data;
    }

    const getBook = async (id) => {
        let response = await axios.get(`/api/v1/books/${id}`)
        book.value = response.data.data;
    }

    const storeBook = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/v1/books', data)
            await router.push({name: 'books.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateBook = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/v1/books/${id}`, book.value)
            await router.push({name: 'books.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyBook = async (id) => {
        await axios.delete('/api/v1/books/' + id)
    }


    return {
        books,
        book,
        errors,
        getBooks,
        getBook,
        storeBook,
        updateBook,
        destroyBook
    }
}