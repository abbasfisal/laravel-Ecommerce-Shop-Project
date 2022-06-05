$(document).ready(function () {

    var i = 1;
    $("#btn-add-attribute").click(function () {
        var element =
            '<div class="row" id="main-holder' + i + '">' +
            '<div class="col-lg-10 border rounded-3 p-1 shadow bg-white m-auto">' +
            '<div class="row">' +
            '<div class="col-lg-8  m-auto  ">' +
            '<textarea name="attr_values[]" placeholder="enter values" id="" class="form-control "rows="3"></textarea>' +
            '</div>' +
            '<div class="col-lg-4  ">' +
            '<input type="text" name="attr_titles[]" class="form-control form-text" placeholder="enter title"/><br>' +
            '<button type="button" id="btn-remove-attr" value="' + i + '"  class="btn btn-danger float-end" >remove</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $("#attributes-holder").append(element)
        i++;
    });

    $(document).on('click' ,"#btn-remove-attr",function(){
        $("#main-holder"+$(this).attr('value')).remove();
       //alert('btn remove clicked' + $(this).attr('value'))
    });

})
