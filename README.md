# budget-absorption

[![Join the chat at https://gitter.im/budget-absorption/Lobby](https://badges.gitter.im/budget-absorption/Lobby.svg)](https://gitter.im/budget-absorption/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/budget-absorption/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/budget-absorption/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/budget-absorption/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/budget-absorption/build-status/master)

Informasi anggarandan penyerapan pada organisai perangkat daerah

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/budget-absorption:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/budget-absorption:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/budget-absorption.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\BudgetAbsorption\BudgetAbsorptionServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=budget-absorption-assets
$ php artisan vendor:publish --tag=budget-absorption-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/budget-absorption',
    components: {
      main: resolve => require(['./components/views/bantenprov/budget-absorption/DashboardBudgetAbsorption.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Budget absorption"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/budget-absorption',
      components: {
        main: resolve => require(['./components/bantenprov/budget-absorption/BudgetAbsorptionAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Budget absorption"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Budget absorption',
          link: '/dashboard/budget-absorption',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import BudgetAbsorption from './components/bantenprov/budget-absorption/BudgetAbsorption.chart.vue';
Vue.component('echarts-budget-absorption', BudgetAbsorption);

import BudgetAbsorptionKota from './components/bantenprov/budget-absorption/BudgetAbsorptionKota.chart.vue';
Vue.component('echarts-budget-absorption-kota', BudgetAbsorptionKota);

import BudgetAbsorptionTahun from './components/bantenprov/budget-absorption/BudgetAbsorptionTahun.chart.vue';
Vue.component('echarts-budget-absorption-tahun', BudgetAbsorptionTahun);

import BudgetAbsorptionAdminShow from './components/bantenprov/budget-absorption/BudgetAbsorptionAdmin.show.vue';
Vue.component('admin-view-budget-absorption-tahun', BudgetAbsorptionAdminShow);

//== Echarts Angka Partisipasi Kasar

import BudgetAbsorptionBar01 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionBar01.vue';
Vue.component('budget-absorption-bar-01', BudgetAbsorptionBar01);

import BudgetAbsorptionBar02 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionBar02.vue';
Vue.component('budget-absorption-bar-02', BudgetAbsorptionBar02);

//== mini bar charts
import BudgetAbsorptionBar03 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionBar03.vue';
Vue.component('budget-absorption-bar-03', BudgetAbsorptionBar03);

import BudgetAbsorptionPie01 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionPie01.vue';
Vue.component('budget-absorption-pie-01', BudgetAbsorptionPie01);

import BudgetAbsorptionPie02 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionPie02.vue';
Vue.component('budget-absorption-pie-02', BudgetAbsorptionPie02);

//== mini pie charts
import BudgetAbsorptionPie03 from './components/views/bantenprov/budget-absorption/BudgetAbsorptionPie03.vue';
Vue.component('budget-absorption-pie-03', BudgetAbsorptionPie03);
```

