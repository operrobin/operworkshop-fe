console.log(process.env);class AuthServices{async authentication(e){try{return axios.post(process.env.MIX_APP_URL+"/api/login",{phone_number:e})}catch(e){console.log(e)}}}class BookingServices{async getWorkshop(e=1){return axios.get(process.env.MIX_APP_URL+"/api/workshop",{type:e}).catch(e=>{console.log(e)})}async getVehicleTypes(){try{return axios.get(process.env.MIX_APP_URL+"/api/vehicle/type",null)}catch(e){console.log(e)}}async getVehicle(e=1){return axios.get(process.env.MIX_APP_URL+"/api/vehicle",{type:e}).catch(e=>{console.log(e)})}}
