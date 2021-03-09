/**
 * authServices.js
 * 
 * This file contains all services related to Authentication.
 */

class AuthServices{

    async authentication(phone){
        try {
            return axios.post(
                APP_URL + "/api/auth/login",
                {
                    "phone_number": phone
                }
            );
        } catch (err) {
            console.log(err);
        }
    }

    async sendOtp(phone, otp, todo = null){
        try{
            return await axios.post(
                APP_URL + "/api/auth/send-otp",
                {
                    "phone": "0" + phone,
                    "otp": otp
                }
            );
        }catch(err){
            console.log(err);
        }

    }

    async saveCookies(phone){
        try{
            return await axios.post(
                APP_URL + "/set-web-session",
                {
                    "key": "customer_phone",
                    "value": phone
                }
            );
        }catch(err){
            console.log(err);
        }
    }
 }