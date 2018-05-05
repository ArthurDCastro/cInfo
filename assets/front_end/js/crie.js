
$(document).ready(function() {
    $('select.dropdown')
        .dropdown()
    ;

    var max_fields = 3; //maximum input boxes allowed
    var wrapper = $(".gastos"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var cop = $(".select_input");

    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        var length = wrapper.find("div").length;

        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="add field"><div class="field"><select class="ui search dropdown"> <option class="item" data-value="null">...</option> <option class="item" data-value="educ">Educação</option> <option class="item" data-value="saud">Saúde</option> <option class="item" data-value="agri">Agricultura</option> <option class="item" data-value="tecn">Ciência e Tecnologia</option> </select> </div><div class="inline field remove_field"><div class="circular ui vertical animated inverted red mini button" tabindex="0"><div class="hidden content">excluir</div> <div class="visible content"> <i class="remove icon"></i> </div> </div> </div> </div>'); //add input box
        }
    });

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })

});

/*
$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
}

 <i class="remove icon"></i>excluir

 */
