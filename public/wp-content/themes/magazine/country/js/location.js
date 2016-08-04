
    function ajaxCall() {
        this.send = function(data, url, method, success, type) {
          type = type||'json';
          var successRes = function(data) {
              success(data);
          };

          var errorRes = function(e) {
              console.log(e);
              alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
          };
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

          }

        }

function locationInfo() {
    var rootUrl = "http://lab.iamrohit.in/php_ajax_country_state_city_dropdown/api.php";
    var call = new ajaxCall();
    this.getCities = function(id) {
        $(".cities option:gt(0)").remove();
        var url = rootUrl+'?type=getCities&stateId=' + id;
        var method = "post";
        var data = {};
        $('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.cities').find("option:eq(0)").html("Select City");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.cities').append(option);
                });
                $(".cities").prop("disabled",false);
            }
            else{
                 alert(data.msg);
            }
        });
    };

    this.getStates = function(id) {
        $(".states option:gt(0)").remove();
        $(".cities option:gt(0)").remove();
        var url = rootUrl+'?type=getStates&countryId=' + id;
        var method = "post";
        var data = {};
        $('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.states').find("option:eq(0)").html("Select State");
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.states').append(option);
                });
                $(".states").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        var url = rootUrl+'?type=getCountries';
        var method = "post";
        var data = {};
        $('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.countries').find("option:eq(0)").html("Select Country");
            console.log(data);
            if(data.tp == 1){
                $.each(data['result'], function(key, val) {
                    var option = $('<option />');
                    option.attr('value', key).text(val);
                    $('.countries').append(option);
                });
                $(".countries").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };
}

$(function() {
var loc = new locationInfo();
loc.getCountries();
 $(".countries").on("change", function(ev) {
        var countryId = $(this).val();
        if(countryId != ''){
        loc.getStates(countryId);
        }
        else{
            $(".states option:gt(0)").remove();
        }
    });
 $(".states").on("change", function(ev) {
        var stateId = $(this).val();
        if(stateId != ''){
        loc.getCities(stateId);
        }
        else{
            $(".cities option:gt(0)").remove();
        }
    });
});

function showCountry(countryId) {
     var retorno = '';
     var country = countryId;

     var sendInfo = {
         type: 'showCountry',
         countryId: country
     };

     $.ajax({
         type: "GET",
         url: "/php_ajax_country_state_city_dropdown/api.php",
         dataType: "json",
         success: function (msg) {
             if (msg) {
                 document.getElementById("txtcountry").innerHTML = msg['country'];
             } else {
                 document.getElementById("txtcountry").innerHTML = "Erro ao coletar pais!";
             }
         },
         data: sendInfo
     });
}

function showState(stateId) {
     var retorno = '';
     var state = stateId;

     var sendInfo = {
         type: 'showState',
         stateId: state
     };

     $.ajax({
         type: "GET",
         url: "/php_ajax_country_state_city_dropdown/api.php",
         dataType: "json",
         success: function (msg) {
             if (msg) {
                  //$('#label-state').text(msg['state']);
                  //alert(msg['state']);
                  document.getElementById("txtstate").innerHTML = msg['state']+"1";
             } else {
              document.getElementById("txtstate").innerHTML = "Erro ao coletar estado!"+"1";
             }
         },
         data: sendInfo
     });
}


function showCountry(countryId, nomeelemento) {
     var retorno = '';
     var country = countryId;

     var sendInfo = {
         type: 'showCountry',
         countryId: country
     };

     $.ajax({
         type: "GET",
         url: "/php_ajax_country_state_city_dropdown/api.php",
         dataType: "json",
         success: function (msg) {
             if (msg) {
                 document.getElementById(nomeelemento).innerHTML = msg['country']+"1";
             } else {
                 document.getElementById(nomeelemento).innerHTML = "Erro ao coletar pais!"+"1";
             }
         },
         data: sendInfo
     });
}

function showState(stateId, nomeelemento) {
     var retorno = '';
     var state = stateId;

     var sendInfo = {
         type: 'showState',
         stateId: state
     };

     $.ajax({
         type: "GET",
         url: "/php_ajax_country_state_city_dropdown/api.php",
         dataType: "json",
         success: function (msg) {
             if (msg) {
                  //$('#label-state').text(msg['state']);
                  //alert(msg['state']);
                  document.getElementById(nomeelemento).innerHTML = msg['state']+"1";
             } else {
                  document.getElementById(nomeelemento).innerHTML = "Erro ao coletar estado!"+"1";
             }
         },
         data: sendInfo
     });
}
