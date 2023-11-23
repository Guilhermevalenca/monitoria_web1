import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Default',
      component: () => import('@/layout/Default.vue'),
      children: [
        {
          path: '/',
          name: 'home',
          component: () => import('@/views/HomeView.vue'),
        },
        {
          path: '/test/:id?/:name?/',
          name: 'test',
          component: () => import('@/views/TestView.vue'),
          props: true
        },
        {
          path: '/todos',
          name: 'todoDefault',
          component: () => import('@/layout/TodoLayout.vue'),
          children: [
            {
              path: '',
              name: 'todo',
              component: () => import('@/views/todo/ListTodos.vue')
            },
            {
              path: 'create',
              name: 'todoCreate',
              component: () => import('@/views/todo/CreateTodo.vue')
            },
            {
              path: ':id',
              name: 'todoEdit',
              component:() => import('@/views/todo/EditTodo.vue'),
              props: true
            }
          ]
        }
      ]
    }
  ]
})

export default router
