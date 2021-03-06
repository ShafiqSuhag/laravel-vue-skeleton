import Vue from "vue"


Vue.filter("specificChars", str => (str !=null ? str.substring(0, 20)+'...' : '')   );
Vue.filter("first4Chars", str => str.substring(0, 4));
Vue.filter("last4Chars", str => str.substring(str.length - 4));
Vue.filter("bdDate", function(d){
    let moment = require('moment');
    return  moment.utc(d).utc().format('DD-MM-YYYY');
});
Vue.filter("newDate", function(d){
    let moment = require('moment');
    return  moment.utc(d).utc().format('DD-MM-YYYY hh:mm A');
});
Vue.filter("newDateOnly", function(d){
    let moment = require('moment');
    return  moment.utc(d).utc().format('DD-MM-YYYY');
});
Vue.filter("bdDateFormat", function(d){

    //helo
    let moment = require('moment');
    // let d2 = moment.utc(d), 'DD-MM-YYYY');
    return  moment.utc(d).utc().format('YYYY-MM-DD');
    // let d2 = moment.utc(d), 'DD-MM-YYYY');
    //let moment = require('moment');
    // let d2 = moment.utc(d), 'DD-MM-YYYY');
    //let mydate =   moment.utc(d).utc().format('YYYY-MM-DD');


});
Vue.filter("mySqlDate", function(d){
    let moment = require('moment');
    // let d2 = moment.utc(d), 'DD-MM-YYYY');
    return  moment.utc(d).utc().format('YYYY-MM-DD');

});
Vue.filter("roundNumber",function (n) {
    return  Math.round(n);


});
Vue.filter("roundNumberToFloat",function (n) {
    return  Math.round(n*100)/100;
});
Vue.filter("sexConvert", function(d){

    if(d == 1){
        return  'Male';
    }
    else if (d == '2'){
        return  'Female';
    }
    else{
        return ''
    }



});
Vue.filter("yearToAge",function (n) {


    if(n >0){
        return new Date().getFullYear()-parseInt(n);
    }else{
        return '';

    }



});

