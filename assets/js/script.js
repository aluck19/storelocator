//on page load: to show relative options in filter
$(window).load(function() {

    var item = document.getElementById("s_itemName");

   try {
       var option1 = item.options[item.selectedIndex].value;
       // console.log(option1);
       showBrands(option1);
   }catch(err){

   }
    var brand = document.getElementById("s_brandName");
    try{
        var option2 = brand.options[brand.selectedIndex].value;
        //console.log(option2);
        showDistricts(option2);
    }catch (err){
        //console.log("Error");
    }
});

//bootstrap modal on report  button click
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('store_id');// Extract info from data-* attributes
    var name = button.data('store_name');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Report: ' + name);
    modal.find('#r_store_id').val(id);
});

//introjs tour
function startTour() {
    var tour = introJs();
    tour.setOption('tooltipPosition', 'auto');
    tour.setOption('positionPrecedence', ['left', 'right', 'bottom', 'top']);
    tour.start();
}

//ajax_calls function:  Report
$(document).ready(function(){

    //submit report
    $("#submit_report").click(function(){

        var store_id = $("#r_store_id").val();
        var topic = $("#r_topic").val();
        var name = $("#r_name").val();
        var email = $("#r_email").val();
        var message = $("#r_message").val();

        // Returns successful data submission message when the entered information is stored in push_files.
        var dataString = 'r_store_id='+ store_id + '&r_topic='+ topic + '&r_name='+ name + '&r_email='+ email + '&r_message='+ message;
        if(store_id==''||topic==''|| name==''||email =='' ||message =='')
        {
            alert("Please fill all the form fields!");
            //console.log("Error");
        }
        else
        {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "report.php",
                data: dataString,
                cache: false,
                success: function(result){
                    alert(result);
                    $('#exampleModal').modal('hide');
                    // initializes and invokes show immediately
                }
            } );
        }
        return false;
    });






});

$("#create_item_create").click(function() {
        console.log("create");
});

//create item create
// $("#create_item_create").click(function(){
//     console.log("called");
//     var name = $("#i_name").val();
//
//     // Returns successful data submission message when the entered information is stored in push_files.
//     var dataString = 'i_name='+ name ;
//     if(name=='')
//     {
//         alert("Please fill all the form fields!");
//     }
//     else
//     {
//         // AJAX Code To Submit Form.
//         $.ajax({
//             type: "POST",
//             url: "create-item-create.php",
//             data: dataString,
//             cache: false,
//             success: function(result){
//                 alert(result);
//                 $('#create_item_modal').modal('hide');
//                 // initializes and invokes show immediately
//             }
//         });
//     }
//     return false;
// });




//ajax_calls function to show brands
function showBrands(str) {
    if (str=="") {
        document.getElementById("s_brandName").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("s_brandName").innerHTML=this.responseText;

            var brand = document.getElementById("s_brandName");
            var option2 = brand.options[brand.selectedIndex].value;
           // console.log(option2);
            showDistricts(option2);
        }
    };
    xmlhttp.open("GET","http://localhost/storelocator/supports/ajax_calls/getBrands.php?q="+str,true);
    xmlhttp.send();
}

//ajax_calls function to show districts
function showDistricts(str) {
        if (str=="") {
            document.getElementById("s_district").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("s_district").innerHTML=this.responseText;
            }
        };
        xmlhttp.open("GET","http://localhost/storelocator/supports/ajax_calls/getDristicts.php?q="+str,true);
        xmlhttp.send();
}



//ajax_calls function to show districts
function viewReport(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#view_report_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/report/view-report.php?q=" + str, true);
    xmlhttp.send();
}

//ajax_calls function to show districts
function createItem() {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#create_item_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/item/create-item.php", true);
    xmlhttp.send();
}

//ajax_call function to edit items
function editItem(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#edit_item_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/item/edit-item.php?q=" + str, true);
    xmlhttp.send();
}

function editBrand(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#edit_brand_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/brand/edit-brand.php?q=" + str, true);
    xmlhttp.send();
}

function editStore(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#edit_store_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/store/edit-store.php?q=" + str, true);
    xmlhttp.send();
}

function viewStore(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("crud_pop_up").innerHTML = this.responseText;
            $('#view_store_modal').modal('show');
        }
    };
    xmlhttp.open("GET", "http://localhost/storelocator/str_lctr_admin/store/view-store.php?q=" + str, true);
    xmlhttp.send();
}



