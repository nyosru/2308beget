<template>
  <!-- <nav class="navbar2"> -->
  <span class="nav-up" v-for="m in menu" :key="m">
    <!-- userId: {{ userId }} -->
    <!-- m {{ m }}    <br/>    <br/> -->
    <router-link
      v-if="m.onAuth != true || (m.onAuth === true && userId > 0)"
      :to="{ path: m.level, meta: { type: m.type ?? 'other' } }"
      :class="{ active: $route.name == m.level }"
      class="nobr"
    >
      {{ m.name }}
    </router-link>
  </span>
  <!-- </nav> -->
</template>

<script setup>
// import axios from "axios";
import User from './../../use/User.ts'

// export default {
//   setup(props) {
const { userId, userName, userAvatar } = User()
// const { userId } = User();

try {  
let u2 = document.head.querySelector('meta[name="user-name"]')
userName.value = u2.content
} catch (error) {
  
}

try{
let u3 = document.head.querySelector('meta[name="user-avatar"]')
userAvatar.value = u3.content
} catch (error) {
  
}

let u1 = document.head.querySelector('meta[name="user"]')
if (u1 && u1.content > 0) {
  userId.value = u1.content
}

const menu = [
  {
    name: 'О нас',
    level: 'about',
    type: 'PageText',
  },
  {
    name: 'Добро',
    // level: 'vitrin',
    // level: 'index',
    level: '/',
    type: 'Vitrin',
  },
  {
    name: 'Хочу стать участником',
    level: 'reg',
    // type: "RegUser",
    type: 'formReg',
  },
  {
    name: 'Документы',
    level: 'documents',
    type: 'PageText',
  },
  {
    name: 'Требы',
    level: 'trebs',
    type: 'PageText',
  },
  // {
  //   name: 'Наша экономика',
  //   level: 'balance',
  //   type: 'PageText',
  // },
  {
    name: 'Контакты',
    level: 'contacts',
    type: 'PageText',
  },
  // {
  //   name: 'Ваше участие',
  //   level: 'participation',
  //   type: 'PageText',
  //   onAuth: true,
  // },
  {
    name: 'Наша экономика',
    level: 'participation2',
    type: 'PageText',
    onAuth: true,
  },
]

//     return {
//       menu,
//       userId,
//     }
//   },
// }
</script>

<style lang="scss">
.nav-up {
  display: inline-block;
  margin-right: 15px;
  //   line-height: 36px;

  a {
    //     padding: 4px 6px;
    //     margin-right: 5px;
    //     xmargin-top: 14px;
    //     xbackground-color: rgba(255, 255, 255, 0.7);
    //     color: white;
    //     text-shadow: 0 0 10px black;
    font-size: 1rem;
    //     border-radius: 5px;
  }

  a:HOVER,
  //   a:HOVER{
  //     xcolor: rgb(255,255,255);
  //     text-shadow: 2px 2px 5px black;
  //   }

  a.router-link-active {
    //     background-color: white;
    //     xcolor: white;
    text-decoration: underline;
  }
}

// .navbar2 {
//   top: 0;
//   position: sticky;
//   background-color: rgb(200, 200, 200);
//   text-align: center;

//   a {
//     color: black;
//     padding: 10px 20px 10px 20px;
//     display: inline-block;
//     text-decoration: none;
//   }
//   a:hover {
//     text-decoration: underline;
//   }
//   a.active {
//     background-color: rgba(0, 0, 0, 0.2);
//   }
// }

.nobr {
  white-space: pre;
}
</style>
