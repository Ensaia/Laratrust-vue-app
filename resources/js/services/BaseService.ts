import axios from "@/plugins/axios"
import type {AxiosInstance} from "axios";
import middleware401 from '@/plugins/middleware401'
import middlewareCsrf from '@/plugins/middlewareCsrf'

export default abstract class BaseService {

    api: AxiosInstance;
    url: string;

    setupApi(baseURL) {
        this.api = axios.create({
            baseURL: baseURL,
            withCredentials: true,
        });
        // this.api.interceptors.response.use(middlewareCsrf, error => Promise.reject(error))
        // this.api.interceptors.response.use(response => response ,middleware401)
        this.api.interceptors.response.use(
            (response) => { return response; },

            (error) => {
              console.log(error.response.status)
                let data = window.localStorage.getItem('currentUser');
                if (
                    error.response &&
                    [401, 419].includes(error.response.status) &&
                    data
                ) {
                    let tmpAxios = axios.create({
                        withCredentials: true,
                    });
                    tmpAxios.post("/logout").then((error) => {
                        window.location.href = '/';
                    })
                }
                return Promise.reject(error.response);
            },
        )
    }


    protected post(url, data, config = {}) {
        if(!config) {
            config = {};
        }
        if(data instanceof FormData) {
            config = this.setHeaders(config);
        }
        return this.api.post(url, data, config);
    }

    protected put(url, data, config = {}) {
        if(!config) {
            config = {};
        }
        if(data instanceof FormData) {
            config = this.setHeaders(config);
            data.append('_method', 'PUT');
        } else {
            data._method = 'PUT';
        }
        return this.api.post(url, data, config);
    }

    protected patch(url, data, config = {}) {
        if(!config) {
            config = {};
        }
        if(data instanceof FormData) {
            config = this.setHeaders(config);
            data.append('_method', 'PATCH');
        } else {
            data._method = 'PATCH';
        }
        return this.api.post(url, data, config);
    }

    protected get(url, config = {}) {
        return this.api.get(url, config);
    }

    protected delete(url, config = {}) {
        return this.api.delete(url, config);
    }

    protected setHeaders(config) {
        if(!config) {
            config = {};
        }
        if(!config?.headers) {
            config.headers = {};
        }
        config.headers['Content-Type'] = 'multipart/form-data';
        return config;
    }
}
