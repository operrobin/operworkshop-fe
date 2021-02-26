/**
 * workshop-services.js
 * 
 * This file contains all services related to Workshop.
 */

class WorkshopServices{

    async getWorkshopNearMe(lat, lng){
        return await axios.get(
            APP_URL + `/api/workshop/near-me?lat=${lat}&lng=${lng}`
        ).catch(
            (err) => {
                console.log(err);
            }
        );
    }

    async getWorkshopByBatchId(batch_id, bengkel_type, vehicle_type){
        try{
            return await axios.get(
                APP_URL + `/api/workshop/by-batch-id?batch_id=${batch_id}&bengkel_type=${bengkel_type}&vehicle_type=${vehicle_type}`
            );
        }catch(err){
            console.log(err);
        }
    }
}