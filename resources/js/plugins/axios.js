import axios from 'axios'

axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8000/'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['Content-Type'] = 'application/json'
axios.defaults.headers.common['Accept'] = 'application/json'
export default axios;
// axios.defaults.headers.common['X-Locale'] = localStorage.hasOwnProperty('locale') ? localStorage.locale : window.AppConfig.defaultLocale;
// axios.defaults.headers.common['Access-Control-Allow-Origin'] = ''
// axios.defaults.headers.common['Access-Control-Request-Method'] = ''
// axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
