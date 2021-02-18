/**
 * bookingServices.js
 * 
 * This file contains all services related to Booking
 */


class BookingServices{
    
    async getWorkshop(type = 1){
        return axios.get(
            APP_URL + `/api/workshop?type=${type}`
        ).catch(
            (err) => {
                console.log(err);
            }
        );
    }

    async getVehicleTypes(type){
        try {
            return await axios.get(
                APP_URL + `/api/vehicle/brands?type=${type}`
            );
        } catch (err) {
            console.log(err);
        }
    }

    async getVehicle(type = 1){
        return axios.get(
            APP_URL + `/api/vehicle?type=${type}`
        ).catch(
            (err) => {
                console.log(err);
            }
        );
    }
}