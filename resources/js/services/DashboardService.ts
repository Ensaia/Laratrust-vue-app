import axios from 'axios'
import BaseService from '@/services/BaseService'
export default class DashboardService extends BaseService{
  constructor() {
      super()
      this.url = '/';
      this.setupApi(axios.defaults.baseURL);
  }
  async getDataCounts(){
    return this.get('api/auth/dashboard/data/counts')
  }
}
