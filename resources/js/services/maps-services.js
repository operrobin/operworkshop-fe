/**
 * maps-services.js 
 * 
 * This file contains all services related to Google Maps.
 */

class MapsServices{

    async getWorkshopNearMe(lat, lng, bengkel_type, vehicle_type){
        try{
            return await axios.get(
                APP_URL + `/api/google/get-workshop-near-me?lat=${lat}&lng=${lng}&bengkel_type=${bengkel_type}&vehicle_type=${vehicle_type}`
            );
        }catch(err){
            console.log(err);
        }
    }
}