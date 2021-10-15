import { createRouter, createWebHistory } from 'vue-router'
import BooksIndex from '../components/books/BooksIndex'
import BooksCreate from '../components/books/BooksCreate'
import BooksEdit from '../components/books/BooksEdit'
import Book from '../components/books/Book'

const routes = [
  {
    path: '/',
    name: 'books.index',
    component: BooksIndex
  },
  {
    path: '/books/create',
    name: 'books.create',
    component: BooksCreate
},
{
    path: '/books/:id/edit',
    name: 'books.edit',
    component: BooksEdit,
    props: true
},
{
  path: '/books/:id',
  name: 'book',
  component: Book,
  props: true
}
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
