import axios from 'axios'

const getCookiesArray = () => document.cookie.split(';').reduce((cookieArray, cookie) => {
	let [key] = cookie.split('=')
	if (key) cookieArray.push(key.trim())
	return cookieArray
}, [])

const middlewareCsrf = async (axiosConfig) => {
	let cookies = getCookiesArray()
	let isTokenMissing = !cookies.includes('XSRF-TOKEN')

	let methodsNeedCSRF = ['post', 'put', 'delete'] //other methods you want to add here
	let doesMethodRequireCSRF = methodsNeedCSRF.includes( axiosConfig.method )

	if ( isTokenMissing && doesMethodRequireCSRF ) {
		// then first get the CSRF Token
		await axios.get('http://localhost:8000/sanctum/csrf-cookie', {withCredentials:true})
		// then continue with the request
		return axiosConfig
	}
	// console.log(axiosConfig)
	return axiosConfig
}

export  default middlewareCsrf
