import Vue from "vue"
Vue.mixin({
    methods: {
        validationError: function(name,data){
            if(data != '' || data > 0){
                return true ;
            }
            else{
                toastr.error(name+" does not exist");
                return false ;
            }
        },
        showNotification: function (name,statusCode) {
            if(statusCode === 200){
                toastr.success(name+" save successfully");
            }
            else if (statusCode === 500){
                toastr.error("Internal server error");
            }
            else{
                toastr.error("Something is wrong at time of processing :"+name + " | "+statusCode);
            }
        },
    }
});


