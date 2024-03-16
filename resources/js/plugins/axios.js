import axios from 'axios'
import { emitter } from '@/utils'

export default function ({ app, store }) {
  // The API instance
  const api = axios.create({
    baseURL: `/`,
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true,
  })

  // Request interceptor
  api.interceptors.request.use(
    (config) => {
      config.headers.Authorization = `Bearer ${localStorage.getItem('_token')}`
      config.headers.locale = localStorage.getItem('lang') || 'en'
      return config
    },
    (error) => Promise.reject(error)
  )


  api.interceptors.response.use(
    (response) => {
      if (response.data.message) {
        store.dispatch("ShowNotification", {
          text: `${response.data.message}   `,
          color: "success",
        });

      }
      return response;
    },
    (error) => {
      if ([422, 409].includes(error.response.status)) {
        store.dispatch("ShowNotification", {
          text: error.response.data.message,
          color: "red",
        });
      }
      return Promise.reject(error);
    }
  );
  app.config.globalProperties.$axios = api
}
