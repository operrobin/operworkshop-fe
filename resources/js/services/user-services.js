/**
 * user-services.js
 * 
 * This file contains all services related to Users.
 */

class UserServices{

    async getUserByPhone(phone){
        try{
            return await axios.get(
                APP_URL + `/api/user?phone=${phone}`
            );
        }catch(err){
            console.log(err);
        }
    }
}