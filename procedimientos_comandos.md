# Archivo de procedimientos y comandos generales del proyecto

## Instalación y configuración de Inertia --------------------------------

### Server-side
1- Instalar paquete composer:
composer require inertiajs/inertia-laravel

2- Setear el template raíz:
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  </head>
  <body>
    @inertia
  </body>
</html>

3- Agregar Inertia middleware:
php artisan inertia:middleware

4- Agregar HandleInertiaRequests middleware en App\Http\Kernel:
'web' => [
  // ...
  \App\Http\Middleware\HandleInertiaRequests::class,
],


### Client-side

1- Instalar dependencias:
npm install @inertiajs/inertia @inertiajs/inertia-vue

2- Inicializar, archivo main: app.js
import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.use(plugin)

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)

3- Agregar componente barra de progreso:
npm install @inertiajs/progress

4- En archivo main: app.js
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()