{{--
    
    OperOrder Status 
    @see \App\Model\OperOrder

    WAITING_FOR_DRIVER = 0;
    GET_DRIVER = 1;
    SERVICE_ADVISOR_OPEN_ORDER = 2;
    SERVICE_ADVISOR_SUBMIT_PKB = 3;
    FOREMAN_TASK = 4;
    SERVICE_ADVISOR_UPLOAD_INVOICE = 5;
    WAITING_FOR_DRIVER_AFTER_INVOICE = 6;
    GET_DRIVER_AND_SHOW_DRIVER = 7;

    --}}

<div id="service" class="content_area ">
    <div class="div_wrapper">
        <div class="container">
            <div class="row bott_margin_1">
                <div class="col">
                  <h6 class="heading normal_font">STATUS</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 double_left_padd bott_padd">

                    @php
                        /**
                         * Sorry for using this bizzare approach.
                         * 
                         * These codes are an algorithm to check which dot is eligible to be active. 
                         */

                        /**
                         * @var integer active
                         * Represent currently active dot. 
                         */
                        $active = 0;

                        foreach($data->task->tasks ?? [] as $key => $task){

                            /**
                             * Since key 0 will always active, I'm skipping
                             * the check of key. 
                             */
                            if($key != 0){
                                if(!empty($data->task->tasks[$key-1]->list_done)){
                                    $active = $key;
                                }
                            }

                        }
                    @endphp


                    @foreach($data->task->tasks ?? [] as $key => $task)
                        <div class="box_list">
                            <div class="circle_dot full_round @if($key == $active) active @endif"></div>
                            <div class="inner_box">
                                <h4 class="no_margin">{{ $task->list_name }}</h4>   
                                
                                @if($task->list_done !== null)
                                    <img id="myImg" src="{{ $task->image_url }}" alt="Proses pengerjaan oleh mekanik" style="width:100%;height:220px;object-fit: cover;margin-top:25px;border-radius:8px;">
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>