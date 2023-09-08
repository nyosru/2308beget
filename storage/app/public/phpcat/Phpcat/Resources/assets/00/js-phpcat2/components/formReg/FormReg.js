import { ref } from 'vue'
import axios from 'axios'

// const form_now = ref('')
const loaded = ref(false)
const loading = ref(false)
const loadError = ref(false)
    // const pageData = ref('');

/**
 * получить данные по странице
 * @param pageName название страницы
 */
// const getData = async (pageName = null) => {

//   pageData.value = '';

//   if (pageName === null) {
//     return false;
//   }

//   loading.value = true;
//   loadError.value = false;

//   // console.log("commis ts", "getData (idata irefund)");
//   if (loading.value === true) {

//     // loading.value = false;
//     await axios
//       .get(
//         "/api47/pageText/" + pageName
//       )
//       .then((response) => {

//         // console.log('getData - response.data',response.data);
//         pageData.value = response.data.data;
//         // idata.value = response.data.idata.BOOM ?? {};
//         // irefund.value = response.data.idata.REFUND ?? {};
//         // deductions.value = response.data.idata.deductions ?? {};
//         // bonuses.value = response.data.idata.bonuses ?? {};

//         // if (type == 'comisFee') {
//         //   const { filtrComisToTimeType } = ComisFee();
//         //   filtrComisToTimeType(type2, type3);
//         // }

//         loading.value = false;
//       })
//       .catch((error) => {
//         console.log(error);
//         loadError.value = true;
//       });

//   }
// };

const sendForm = async(pageName = null, datar = []) => {
    // console.log('datar', datar, 'form_now', form_now.value)
    console.log('pageName', pageName, 'datar', datar)
        // pageData.value = '';

    if (pageName === null) {
        return false
    }

    datar['start'] = pageName
    loading.value = true
        // loadError.value = false;

    // // console.log("commis ts", "getData (idata irefund)");
    // if (loading.value === true) {

    //   // loading.value = false;
    await axios
    //     .get(
        .post(
            '/api/sendMsg',
            datar,
            //   "/api47/pageText/" + pageName
        )
        .then((response) => {
            console.log('response', response)

            if (response.status == 200) {
                loaded.value = true
            }

            //       // console.log('getData - response.data',response.data);
            //       pageData.value = response.data.data;
            //       // idata.value = response.data.idata.BOOM ?? {};
            //       // irefund.value = response.data.idata.REFUND ?? {};
            //       // deductions.value = response.data.idata.deductions ?? {};
            //       // bonuses.value = response.data.idata.bonuses ?? {};

            //       // if (type == 'comisFee') {
            //       //   const { filtrComisToTimeType } = ComisFee();
            //       //   filtrComisToTimeType(type2, type3);
            //       // }

            loading.value = false
        })
        .catch((error) => {
            console.log(error)
            loadError.value = true
        })

    // }

    return false
}

export default function FormReg() {
    return {
        sendForm,
        // form_now,
        loading,
        loaded,
        // getData,
        // pageData,
        loadError,
    }
}