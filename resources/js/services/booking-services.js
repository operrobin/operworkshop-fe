/**
 * bookingServices.js
 * 
 * This file contains all services related to Booking
 */


class BookingServices{

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

    /**
     * @param object request
     * The request object must have these parameters below:
     * 
     * @param string customer_name
     * @param string customer_phone
     * @param string customer_email
     * @param string customer_address
     * @param date booking_date
     * @param time booking_time
     * @param string vehicle_type
     * @param integer vehicle_brand_id
     * @param string vehicle_license_plat
     * @param integer bengkel_type
     * @param double customer_lat
     * @param double customer_lng
     * @param integer workshop_id
     * 
     * @example booking-view-model.js:211-257
     */
    async createBooking(request){
        try{
            return await axios.post(
                APP_URL + "/api/booking",
                request
            );
        }catch(err){
            console.log(err);
        }
    }

    async checkCurrentBooking(phone){
        try{
            return await axios.get(
                APP_URL + `/api/booking?phone=${phone}`,
            );
        }catch(err){
            console.log(err);
        }
    }
}