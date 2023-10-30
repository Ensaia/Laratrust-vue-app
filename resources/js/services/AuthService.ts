import axios from 'axios'
import BaseService from './BaseService'

export default class AuthService extends BaseService {

    constructor() {
        super()
        this.setupApi(axios.defaults.baseURL);
    }

    async getCurrentUser() {
        await this.get("/sanctum/csrf-cookie");
        return this.get("api/auth/user");
    }
    async forgotPassword(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.post("/forgot-password", payload)
    }

    async resetPassword(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.post("/reset-password", payload)
    }

    async registerUser(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.post("/register", payload)
    }

    async updatePassword(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.put("/user/password", payload)
    }

    async sendVerification(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.post("/email/verification-notification", payload)
    }

    async updateUser(payload) {
        await this.get("/sanctum/csrf-cookie");
        return this.put("/user/profile-information", payload)
    }

    async login(payload) {
        await this.get("/sanctum/csrf-cookie")
        return this.post("/login", payload)
    }

    logout() {
        return this.post("/logout", {}, {})
    }
}
