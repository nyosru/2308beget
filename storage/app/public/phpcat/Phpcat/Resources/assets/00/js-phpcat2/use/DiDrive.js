// import { ref } from 'vue'
// import axios from 'axios'

// // массив для отслеживания выбранных товаров на витрине
// const page = ref('')
// const loading = ref(true)
// const loadError = ref(false)
// const pageData = ref('')

// получить случайное число от min до max
const randomInteger = (min, max) => {
    // получить случайное число от (min-0.5) до (max+0.5)
    let rand = min - 0.5 + Math.random() * (max - min + 1)
    return Math.round(rand)
}

// /**
//  * получить данные по странице
//  */
// const getData = async(pageNow) => {
//     page.value = pageNow
//     pageData.value = ''

//     loading.value = true
//     loadError.value = false

//     // console.log("commis ts", "getData (idata irefund)");
//     if (loading.value === true) {
//         // // loading.value = false;
//         // axios
//         //   .get("/api47/getVitrin")
//         //   .then((response) => {
//         //     pageData.value = response.data.data;
//         //   })
//         //   .catch((error) => {
//         //     console.log(error);
//         //     // loadError.value = true;
//         //   });

//         try {
//             // loading.value = false;
//             await axios
//             // .get( "/api47/getVitrin" )
//                 .get('/api/page/' + page.value)
//                 .then((response) => {
//                     pageData.value = response.data.data.html
//                         // console.log(77, response.data.html);
//                         // console.log(771, response.data);
//                         // console.log(772, response);
//                     loading.value = false
//                 })
//                 .catch((error) => {
//                     console.log(error)
//                     loadError.value = true
//                 })
//         } catch (error) {
//             console.log(error)
//             loadError.value = true
//         }
//     }
// }

export default function DiDrive() {
    return {
        // page,
        // loading,
        // getData,
        // pageData,
        // loadError,
        randomInteger
    }
}