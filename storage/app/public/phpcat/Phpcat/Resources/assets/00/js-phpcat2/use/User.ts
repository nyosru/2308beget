import { ref } from "vue";
// import axios from "axios";

// массив для отслеживания выбранных товаров на витрине
const userId = ref(0);
const userName = ref('');
const userAvatar = ref('');

export default function User() {
  return {
    userId,
    userName,
    userAvatar
  }
}