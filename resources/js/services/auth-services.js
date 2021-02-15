/**
 * authServices.js
 * 
 * This file contains all services related to Authentication.
 */

class AuthServices{

    async authentication(phone){
        try {
            return axios.post(
                process.env.MIX_APP_URL + "/api/login",
                {
                    "phone_number": phone
                }
            );
        } catch (err) {
            console.log(err);
        }
    }

    // async sendOtp(phone, otp){
    //     return axios.post(
    //         process.env.MIX_APP_URL + "/api/login",
    //         {

    //         }
    //     );
    // }
 }